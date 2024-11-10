<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $paymentID = $_GET['id'];

    // Delete payment from database
    $sql = "DELETE FROM payments WHERE PaymentID = $paymentID";

    if ($conn->query($sql) === TRUE) {
        header("Location: payments_list.php?message=Payment deleted successfully");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
