<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // Get the customer ID from the URL
    $c_id = $_GET["id"];

    // SQL query to delete the customer record
    $sql = "DELETE FROM customers WHERE c_id='$c_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Customer deleted successfully!";
    } else {
        echo "Error deleting customer: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
