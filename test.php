<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE users_data (
email VARCHAR(50) PRIMARY KEY,
password VARCHAR(20) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table users_data created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
