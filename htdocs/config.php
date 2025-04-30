<?php
$servername = "localhost";
$username = "root";
$password = "Aghayeamin1212";
$database = "ecommerce";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
