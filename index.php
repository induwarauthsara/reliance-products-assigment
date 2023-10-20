<?php
include 'config.php';

// SQL query to select data from the "CustomerTable"
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Customer List</title>
</head>

<body>
    <div class="container">
        <h2>Customer List (Reliance Products)</h2>
        <table>
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["c_id"] . "</td>";
                    echo "<td>" . $row["c_name"] . "</td>";
                    echo "<td>" . $row["c_phone"] . "</td>";
                    echo "<td>";
                    echo "<a href='update.php?id=" . $row["c_id"] . "'>Edit</a> | ";
                    echo "<a href='delete.php?id=" . $row["c_id"] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No customers found for Reliance Products.</td></tr>";
            }
            ?>
        </table>
        <a href="insert.html">Add New Customer</a>
    </div>
</body>

</html>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }

    .container {
        background-color: #fff;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    h2 {
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }
</style>