<?php
include 'config.php';

// Fetch all customers to show in the order form
$customer_result = $conn->query("SELECT CustomerID, Name FROM Customers");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
</head>
<body>

    <h2>Place a New Order</h2>

    <form action="process_order.php" method="POST">
        <label for="customer_id">Select Customer:</label>
        <select name="customer_id" id="customer_id" required>
            <?php
            while ($row = $customer_result->fetch_assoc()) {
                echo "<option value='" . $row['CustomerID'] . "'>" . $row['Name'] . "</option>";
            }
            ?>
        </select><br><br>

        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount" required><br><br>

        <label for="status">Order Status:</label>
        <select name="status" id="status" required>
            <option value="Pending">Pending</option>
            <option value="Shipped">Shipped</option>
            <option value="Delivered">Delivered</option>
            <option value="Cancelled">Cancelled</option>
        </select><br><br>

        <button type="submit">Place Order</button>
    </form>

</body>
</html>
