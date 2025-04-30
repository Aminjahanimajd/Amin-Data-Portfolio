<?php
include 'config.php'; // Include the database connection

// Check if a customer should be deleted
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id']; // Get the CustomerID from the URL

    // SQL query to delete the customer with the given ID
    $delete_sql = "DELETE FROM Customers WHERE CustomerID = ?";
    
    // Prepare and bind the statement to prevent SQL injection
    if ($stmt = $conn->prepare($delete_sql)) {
        $stmt->bind_param("i", $delete_id);
        
        if ($stmt->execute()) {
            echo "<p>Customer deleted successfully.</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }
        
        $stmt->close();
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

// Fetch all customers from the database (ordered by CustomerID descending)
$sql = "SELECT CustomerID, Name, Email, Phone, Address FROM Customers ORDER BY CustomerID DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers - E-commerce</title>
</head>
<body>

<h2>View Customers</h2>

<?php
// Check if there are customers to display
if ($result->num_rows > 0) {
    // Loop through each customer and display their information
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border: 1px solid #ddd; padding: 10px; margin-bottom: 15px;'>";
        echo "<p><strong>Customer ID:</strong> " . $row["CustomerID"] . "</p>";
        echo "<p><strong>Name:</strong> " . $row["Name"] . "</p>";
        echo "<p><strong>Email:</strong> " . $row["Email"] . "</p>";
        echo "<p><strong>Phone:</strong> " . $row["Phone"] . "</p>";
        echo "<p><strong>Address:</strong> " . $row["Address"] . "</p>";
        
        // Delete Button: Use a link that passes the CustomerID as a GET parameter
        echo "<a href='view_customers.php?delete_id=" . $row["CustomerID"] . "' onclick='return confirm(\"Are you sure you want to delete this customer?\");'>Delete</a>";
        
        echo "</div>";
    }
} else {
    echo "<p>No customers found.</p>";
}

$conn->close();
?>

</body>
</html>
