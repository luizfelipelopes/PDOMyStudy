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


// try {
	
// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 	$db->beginTransaction();
// 	$db->exec("insert into users (first_name, last_name, genre) values ('Nilma Nayara', 'Neves', 'f')");
// 	$db->exec("insert into address (user_id, street, number) values (2, 'Rua Antônio Edílio Duarte', '77')");
// 	$db->commit();

// } catch (Exception $e) {
	
// 	$db->rollBack();
// 	echo 'Failed: ' . $e->getMessage();
// }

try {

	$stmt = $db->prepare("INSERT INTO users (first_name, last_name, genre) VALUES (:fname, :lname, :genre)");

	$stmt->bindParam(':fname', $name);
	$stmt->bindParam(':lname', $lName);
	$stmt->bindParam(':genre', $genre);

	$name = 'Maria Fernanda';
	$lname = 'Cordeiro Lopes';
	$genre = 'f';
	$stmt->execute();

	var_dump($stmt);
	
} catch (PDOException $e) {
	
	echo 'Failed: ' . $e->getMessage();

}

