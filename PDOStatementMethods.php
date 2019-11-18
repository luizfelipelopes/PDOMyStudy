<?php 
require 'Config.php';

/**
* In this archive i study the PDOStatements Methods. 
*/

echo '<h1>PDOStatements Methods</h1>';


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
* bindColumn()
**/

/** Binding result set output to PHP variables **/

// $sql = 'SELECT first_name, last_name, genre FROM users';

// try {
	
// 	$stmt = $db->prepare($sql);
// 	$stmt->execute();

// 	$stmt->bindColumn(1, $firstName); // bind column number
// 	$stmt->bindColumn(2, $lastName); // bind column number
// 	$stmt->bindColumn('genre', $genre); // bind column name

// 	while($row = $stmt->fetch(PDO::FETCH_BOUND)){
// 		$data = $firstName . "\t" . $lastName . "\t" . $genre . "<br>";
// 		print $data;
// 	}

// } catch (PDOException $e) {
		
// 		print $e->getMessage();

// }

/**
* bindParam()
**/

/** Execute a prepared statement with named placeholders **/

// $genre = 'm';
// $sth = $db->prepare('SELECT first_name, last_name, genre FROM users WHERE genre = :genre');
// $sth->bindParam(':genre', $genre, PDO::PARAM_STR);
// $sth->execute();
// var_dump($sth->fetchAll());


// * Execute a prepared statement with marked placeholders *

// $genre = 'f';
// $sth = $db->prepare('SELECT first_name, last_name, genre FROM users WHERE genre = ?');
// $sth->bindParam(1, $genre, PDO::PARAM_STR);
// $sth->execute();
// var_dump($sth->fetchAll());

/**
* bindValue()
**/

/** Execute a prepared statement with named placeholders **/

// $genre = 'm';
// $sth = $db->prepare('SELECT first_name, last_name, genre FROM users WHERE genre = :genre');
// $sth->bindValue(':genre', $genre, PDO::PARAM_STR);
// $sth->execute();
// var_dump($sth->fetchAll());


/** Execute a prepared statement with marked placeholders **/

// $genre = 'f';
// $sth = $db->prepare('SELECT first_name, last_name, genre FROM users WHERE genre = ?');
// $sth->bindValue(1, 'f', PDO::PARAM_STR);
// $sth->execute();
// var_dump($sth->fetchAll());

/**
* PDO::columnCount()
**/

// $genre = 'm';
// $sth = $db->prepare('SELECT * FROM users WHERE genre = :genre');
// $sth->bindValue(':genre', $genre, PDO::PARAM_STR);
// var_dump($sth->columnCount());
// $sth->execute();
// var_dump($sth->columnCount());

/**
* PDO::debugDumpParams()
**/

/** PDOStatement::debugDumpParams() example with named parameters **/

// $genre = 'm';
// $sth = $db->prepare('SELECT * FROM users WHERE genre = :genre');
// $sth->bindParam(':genre', $genre, PDO::PARAM_STR);
// $sth->execute();
// $sth->debugDumpParams();

/** PDOStatement::debugDumpParams() example with named parameters **/

// $genre = 'f';
// $sth = $db->prepare('SELECT * FROM users WHERE genre = ?');
// $sth->bindParam(1, $genre, PDO::PARAM_STR);
// $sth->execute();
// $sth->debugDumpParams();


/**
* PDO::fetch()
**/

/** Fetching rows using different fetch styles **/

// $sth = $db->prepare('SELECT * FROM users');
// $sth->execute();

// // DEFAULT
// $result = $sth->fetch();
// var_dump($result);

// // PDO::FETCH_ASSOC
// $result = $sth->fetch(PDO::FETCH_ASSOC);
// var_dump($result);

// // PDO::FETCH_BOTH
// $result = $sth->fetch(PDO::FETCH_BOTH);
// var_dump($result);

// // PDO::FETCH_LAZY
// $result = $sth->fetch(PDO::FETCH_LAZY);
// var_dump($result);

// // PDO::FETCH_OBJ
// $result = $sth->fetch(PDO::FETCH_OBJ);
// var_dump($result);

/** Fetching rows with a scrollable cursor **/

$sth = $db->prepare('SELECT * FROM users ORDER BY FIRST_NAME', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$sth->execute();

while($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
	$data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "<br>";
	print $data;
}
$sth =null;

echo '<br>===============<br>';
$sth = $db->prepare('SELECT * FROM users ORDER BY first_name', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$sth->execute();
$row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_LAST);

do{
	$data = $row[0] . "\t" . $row[1] . "\t" . $row[2] . "<br>";
	print $data;
} while($row = $sth->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_PRIOR));

$sth =null;