<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "tektn";
$cnx = null;

try {
    $cnx = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}