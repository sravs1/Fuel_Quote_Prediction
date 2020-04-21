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
$sql = "CREATE TABLE quote_details (
gallons int NOT NULL,
delivery_address VARCHAR(200) NOT NULL,
delivery_date VARCHAR(100) NOT NULL,
suggested_price int NOT NULL,
total_amount int NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table quote_details created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
