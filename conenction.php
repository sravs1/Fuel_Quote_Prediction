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


$sql = "INSERT INTO  clientprofile(FULLNAME,ADDRESS1,ADDRESS2,CITY,STATE,ZIPCODE) VALUES('sravs13324','sravs1232','245','host','TX','2354')";



if ($conn->query($sql) === TRUE) {
    echo "inserteed	 CLIENTPROFILE created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>