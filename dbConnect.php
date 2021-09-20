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




/* UPDATE DATA */
/* $sql = "UPDATE users set name = 'Gustavo' where id = :id";
$result = $pdo->prepare($sql);
$result->bindValue(":id", "2");
$result->execute(); */

/* DELETE DATA */
/* $sql = "DELETE from users where id > 5";
$result = $pdo->prepare($sql);
$result->execute(); */

/* INSERT DATA */
/* $sql = 'INSERT INTO users
        (name, email, phone)
        VALUES (:name, :email, :phone)';

$result = $pdo->prepare($sql);
$result->bindValue(':name', 'Fernando');
$result->bindValue(':email', 'Fernando@email.com');
$result->bindValue(':phone', '999');
$result->execute(); */

/* READ DATA */
/* $sql = 'SELECT * from users';
$result = $pdo->prepare($sql);
$result->execute();
var_dump($result->fetchAll(PDO::FETCH_OBJ)); */