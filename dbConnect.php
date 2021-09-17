<?php

/* CONNECTION */
$dsn = "mysql:host=localhost";
$username = 'root';
$password = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $error) {
    echo "Error: {$error->getMessage()}";
}

/* CREATE DATABASE AND USE IT */
$pdo->exec("CREATE DATABASE IF NOT EXISTS `phpcrud`");
$pdo->exec("use phpcrud");

/* CREATE TABLES */
$sql = "CREATE TABLE IF NOT EXISTS `users` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`phone` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`)
)";
$result = $pdo->prepare($sql);
$result->execute();
