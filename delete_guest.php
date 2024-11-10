<?php
// Include database connection
include('db_connection.php');

// Check if an ID is provided
if (isset($_GET['id'])) {
    $guestID = intval($_GET['id']);

    // Prepare and execute the SQL statement
    $sql = "DELETE FROM guest WHERE GuestID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $guestID);

    if ($stmt->execute()) {
        header("Location: guest_list.php?message=Guest deleted successfully");
        exit();
    } else {
        echo "Error deleting guest: " . $conn->error;
    }
}

$conn->close();
?>
