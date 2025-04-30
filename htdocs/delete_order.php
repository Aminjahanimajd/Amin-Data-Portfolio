<?php
include 'config.php';

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $sql = "DELETE FROM Orders WHERE OrderID = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $delete_id);
        
        if ($stmt->execute()) {
            echo "Order deleted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    
    // Redirect to the view orders page
    header("Location: view_orders.php");
    exit();
}
?>

