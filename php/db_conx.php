<?php
$db = "airport";
$host = "localhost";
$user = "root";
$pass = "";

$dsn = 'mysql:host='. $host . ';dbname='. $db;
$pdo = new PDO($dsn, $user, $pass);


?>