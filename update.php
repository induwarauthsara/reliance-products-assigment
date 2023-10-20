<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $c_id = $_POST["c_id"];
    $c_name = $_POST["c_name"];
    $c_phone = $_POST["c_phone"];

    // SQL query to update customer data
    $sql = "UPDATE customers SET c_name='$c_name', c_phone='$c_phone' WHERE c_id='$c_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Customer data updated successfully!";
    } else {
        echo "Error updating customer data: " . $conn->error;
    }
}

if (isset($_GET['id'])) {    // Get data from the link
    $c_id = $_GET["id"];
    // SQL query to SELECT customer data
    $sql = "SELECT * FROM customers WHERE c_id ='$c_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $c_name = $row["c_name"];
            $c_phone = $row["c_phone"];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Customer Data</title>
</head>

<body>
    <div class="container">
        <h2>Update Customer Data</h2>
        <form action="update.php" method="POST">
            <label for="customer_name">Customer Name:</label>
            <input type="text" id="customer_name" name="c_name" required value="<?php if (isset($c_name)) {
                                                                                    echo $c_name;
                                                                                } ?>"> <br> <br>

            <label for="c_tel">Customer Telephone number:</label>
            <input type="number" id="c_tel" name="c_phone" maxlength="10" value="<?php if (isset($c_phone)) {
                                                                                        echo $c_phone;
                                                                                    } ?>" required>
            <br> <br>
            <input name="c_id" value="<?php if (isset($c_id)) {
                                            echo $c_id;
                                        } ?>" hidden>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>