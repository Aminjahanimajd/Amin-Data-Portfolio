<?php
include 'config.php'; // Make sure to include the database connection

// Check if form data is set
if (isset($_POST['customer_id'], $_POST['total_amount'], $_POST['status'])) {
    $customer_id = $_POST['customer_id'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];

    // Insert the order into the database
    $sql = "INSERT INTO Orders (CustomerID, TotalAmount, Status) VALUES (?, ?, ?)";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ids", $customer_id, $total_amount, $status);
        
        if ($stmt->execute()) {
            echo "Order placed successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

} else {
    echo "All fields are required!";
}

$conn->close();

// Redirect to the order page or view orders page after the order is placed
header('Location: place_order.php');
exit();
?>
