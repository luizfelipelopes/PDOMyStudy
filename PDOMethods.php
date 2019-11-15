<?php

require 'Config.php';

echo '<h1>Methods PDO</h1>';


/**
* Connection BD
**/

try {

	$db = new PDO(INFO_BD['driver'] . ':host=' . INFO_BD['host'] . ';dbname=' . INFO_BD['dbname'], 
		INFO_BD['user'], INFO_BD['pass'], INFO_BD['attributes']);

	echo 'Conected!<br>';
	
} catch (PDOException $e) {
	
	die("Error!:" . $e->getMessage());
}


/**
* PDO::beginTransaction()
* PDO::exec()
* PDO::rollBack()
* PDO::commit()
**/

$db->beginTransaction();

$sth = $db->exec('CREATE TABLE lunch 
(id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
datecreate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
dateupdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)'
);

$sth = $db->exec('DROP TABLE lunch');
$sth = $db->exec('INSERT INTO dessert (name) VALUES ("tomato")');
$sth = $db->exec('UPDATE dessert SET name = "hamburguer"');

$db->rollBack();
// $db->commit();

/**
* PDO::errorCode()
* PDO::errorInfo()
**/

$db->exec('INSERT INTO bones (skull) VALUES ("lucy")');

echo '<br>PDO::errorCode: ', $db->errorCode();
var_dump($db->errorInfo());


