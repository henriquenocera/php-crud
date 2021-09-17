<?php

include "dbConnect.php";

$id = $_GET['id'];
$sql = ("DELETE FROM users WHERE id = '$id'");
$del = $pdo->prepare($sql);
$del->execute();
header('Location: index.php');
