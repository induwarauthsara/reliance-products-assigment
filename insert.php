<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $c_name = $_POST["c_name"];
    $c_phone = $_POST["c_phone"];

    // SQL query to insert data into the "Customers" table
    $sql = "INSERT INTO customers (c_name, c_phone) VALUES ('$c_name', $c_phone)";

    if ($conn->query($sql) === TRUE) {
        echo "Customer data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
