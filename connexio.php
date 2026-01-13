<?php
$host = "localhost";
$user = "admin";
$password = "12345";
$database = "db_empleats";

$conn = new mysqli($host, $user, $password, $database);

// Comprovar connexió
if ($conn->connect_error) {
    die("Error de connexió: " . $conn->connect_error);
}

?>
