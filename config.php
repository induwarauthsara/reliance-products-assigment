<?php
// Database credentials
$servername = "localhost";
$username = "reliance_user";
$password = "password123";
$dbname = "reliance products";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected to the database successfully!";
}
