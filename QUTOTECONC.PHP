<?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "test";

// checking connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql code to create table
$sql = "CREATE TABLE quote(
        GALLONS VARCHAR(50) NOT NULL,
		ADDRESS VARCHAR(20) ,
		DATE  DATE,
		PRICE VARCHAR(10),
		AMOUNT VARCHAR(20)
		
        )";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>