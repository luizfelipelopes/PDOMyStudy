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
var_dump($db->lastInsertId());
$sth = $db->exec('UPDATE dessert SET name = "hamburguer"');

$db->rollBack();
$db->commit();

/**
* PDO::errorCode()
* PDO::errorInfo()
**/

$db->exec('INSERT INTO bones (skull) VALUES ("lucy")');

echo '<br>PDO::errorCode: ', $db->errorCode();
var_dump($db->errorInfo());

/**
* PDO::getAvailableDrivers()
**/

var_dump(PDO::getAvailableDrivers());

/**
* PDO::prepare()
* PDOStatment::execute();
* PDOStatment::fetchAll();
**/

// SQL statement template with named parameters
$sql = 'SELECT * FROM dessert WHERE name = :name';
$sth = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array(':name' => 'avocato'));
$result = $sth->fetchAll();
var_dump($result);

// SQL statement template with question mark parameters
$sql = 'SELECT * FROM dessert WHERE name = ?';
$sth = $db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$sth->execute(array('hamburguer'));
$result = $sth->fetchAll();
var_dump($result);

/**
* PDO::query()
**/
$sql = 'SELECT name FROM dessert WHERE name = "avocato" ORDER BY name';
foreach($db->query($sql) as $row){
	print $row['name'] . '<br>';
}  



