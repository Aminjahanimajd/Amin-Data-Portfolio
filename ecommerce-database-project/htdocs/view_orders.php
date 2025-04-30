<?php
include 'config.php'; // Make sure to include the database connection

// Fetch all orders from the database
$sql = "SELECT o.OrderID, c.Name AS CustomerName, o.OrderDate, o.TotalAmount, o.Status 
        FROM Orders o 
        JOIN Customers c ON o.CustomerID = c.CustomerID 
        ORDER BY o.OrderDate DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
</head>
<body>

    <h2>Orders List</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Displaying each order's details
            echo "<p><strong>Order ID:</strong> " . $row["OrderID"] . "</p>";
            echo "<p><strong>Customer Name:</strong> " . $row["CustomerName"] . "</p>";
            echo "<p><strong>Order Date:</strong> " . $row["OrderDate"] . "</p>";
            echo "<p><strong>Total Amount:</strong> " . $row["TotalAmount"] . "</p>";
            echo "<p><strong>Status:</strong> " . $row["Status"] . "</p>";

            // Add the delete link for each order
            echo "<a href='delete_order.php?delete_id=" . $row["OrderID"] . "' onclick='return confirm(\"Are you sure you want to delete this order?\");'>Delete</a>";

            echo "<hr>"; // Add a horizontal line between each order
        }
    } else {
        echo "No orders found.";
    }

    $conn->close();
    ?>

</body>
</html>
