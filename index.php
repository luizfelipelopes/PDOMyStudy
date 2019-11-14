<?php

require 'Config.php';

echo '<h1>TESTE BD</h1>';

$dbname = 'test';
$host = 'localhost';
$user = 'root';
$pass = '';
$driver = 'mysql';

try {

	$db = new PDO($driver . ':host=' . $host . ';dbname=' . $dbname, $user, $pass, 
		[PDO::ATTR_PERSISTENT => true]);
	
	echo 'Conected!<br>';
	
} catch (PDOException $e) {
	
	die("Error!:" . $e->getMessage());
}

try {

	$stmt = $db->prepare("INSERT INTO users (first_name, last_name, genre) VALUES (:fname, :lname, :genre)");

	$stmt->bindParam(':fname', $name);
	$stmt->bindParam(':lname', $lName);
	$stmt->bindParam(':genre', $genre);

	$name = 'Maria Fernanda';
	$lName = 'Cordeiro Lopes';
	$genre = 'f';
	$stmt->execute();

	var_dump($stmt);
	
} catch (PDOException $e) {
	
	echo 'Failed: ' . $e->getMessage();

}




