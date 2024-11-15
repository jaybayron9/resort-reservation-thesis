<?php
include('../databaseConnection.php');

if (isset($_GET['id'])) {
    $account_id = intval($_GET['id']);
    
    $sql = "DELETE FROM users WHERE id = {$_GET['id']}";
    $stmt = $conn->query($sql);
    
    if ($stmt) {
        header("Location: usersManagement.php?message=Account deleted successfully!");
    } else {
        echo "Error deleting record.";
    }
} else {
    header("Location: account_list.php?message=Invalid account ID.");
}
?>