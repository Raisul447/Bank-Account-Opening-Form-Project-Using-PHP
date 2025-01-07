<?php
$servername = "localhost";
$username = "user";
$password = "123456";
$dbname = "bank_accounts";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
