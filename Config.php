<?php

define('INFO_BD', [
	'driver' => 'mysql',
	'dbname' => 'test',
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '',
	'attributes' => [
		PDO::ATTR_PERSISTENT => true,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
	],
]);