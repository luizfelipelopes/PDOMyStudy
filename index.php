<?php

require 'Config.php';

echo '<h1>TESTE BD</h1>';

try {

	$db = new PDO(INFO_BD['driver'] . ':host=' . INFO_BD['host'] . ';dbname=' . INFO_BD['dbname'], 
		INFO_BD['user'], INFO_BD['pass'], INFO_BD['attributes']);

	echo 'Conected!<br>';
	
} catch (PDOException $e) {
	
	die("Error!:" . $e->getMessage());
}

/** 
*	Repeated inserts using prepared statements (named placeholders) 
**/

// try {

// 	$stmt = $db->prepare("INSERT INTO users (first_name, last_name, genre) VALUES (:fname, :lname, :genre)");

// 	$stmt->bindParam(':fname', $name);
// 	$stmt->bindParam(':lname', $lName);
// 	$stmt->bindParam(':genre', $genre);

// 	$name = 'Maria Fernanda';
// 	$lName = 'Cordeiro Lopes';
// 	$genre = 'f';
// 	$stmt->execute();

// 	var_dump($stmt);
	
// } catch (PDOException $e) {
	
// 	echo 'Failed: ' . $e->getMessage();

// }

/** 
* Repeated inserts using prepared statements (positional placeholders) 
**/

// try {

// 	$stmt = $db->prepare("INSERT INTO users (first_name, last_name, genre) VALUES (?, ?, ?)");

// 	$stmt->bindParam(1, $name);
// 	$stmt->bindParam(2, $lName);
// 	$stmt->bindParam(3, $genre);

// 	$name = 'Eduardo';
// 	$lName = 'Brandão';
// 	$genre = 'm';
// 	$stmt->execute();

// 	var_dump($stmt);
	
// } catch (PDOException $e) {
	
// 	echo 'Failed: ' . $e->getMessage();

// }


/** 
* Fetching data using prepared statements 
**/

// try {

// 	$stmt = $db->prepare("SELECT * FROM users WHERE first_name = :fname");
// 	$stmt->bindParam(':fname', $name);
// 	$name = 'Luiz';

// 	$stmt->execute();

// 	while ($row = $stmt->fetch()){
// 		print_r($row);	
// 	}

	
// } catch (PDOException $e) {
	
// 	echo 'Failed: ' . $e->getMessage();

// }


/**
* Calling a stored procedure with an output parameter
**/

// try {

// 	$stmt = $db->prepare("CALL sp_returns_string(?)");
// 	$stmt->bindParam(1, $return_value, PDO::PARAM_STR, 4000);
	

// 	$stmt->execute();

// 	print 'procedure returned: ' . $return_value;

	
// } catch (PDOException $e) {
	
// 	echo 'Failed: ' . $e->getMessage();

// }

/** 
* Use valid of placeholder with LIKE 
**/

// try {
	
// 	$stmt = $db->prepare("SELECT * FROM users WHERE first_name LIKE ?");

// 	$name = 'Luiz';

// 	$stmt->execute(array('%'.$name.'%'));

// 	while($row = $stmt->fetch()){
// 		print_r($row);
// 	}

// } catch (Exception $e) {
// 	echo 'Failed: ' . $e->getMessage();
// }


/**
* Errors and error handling
**/
	
$db->query("SELECT * FROM user");


