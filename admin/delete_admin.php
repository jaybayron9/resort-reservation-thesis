<?php
include('../databaseConnection.php');

if (isset($_GET['id'])) {
    $admin_id = intval($_GET['id']);
    
    $sql = "DELETE FROM admins WHERE id = $admin_id";
    $stmt = $conn->query($sql);
    
    if ($stmt) {
        header("Location: guest_list.php?message=Admin deleted successfully!");
    } else {
        echo "Error deleting record.";
    }
} else {
    header("Location: guest_list.php?message=Invalid admin ID.");
}
?>
