<?php

$servername = "localhost";
$db_username = "root";  
$db_password = "";      
$dbname = "beatrizrafaelaresort";

try {

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    die("Connection failed: " . $e->getMessage());
}
?>