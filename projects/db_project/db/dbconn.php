<?php
// $servername = "localhost";
// $username = "root";
// $password = "HemData531";
// $database = "dbintro";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $database);
// mysqli_set_charset($conn,"utf8");
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

$servername = "localhost";
$username = "root";
$password = "HemData531";
$database = "dbintro";

try {
    $conn = new PDO("mysql:host={$servername};dbname={$database}", $username, $password);
    // Set exception on error and connection charset    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8mb4");
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
}