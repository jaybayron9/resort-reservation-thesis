<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $admin_id = intval($_GET['id']);
    
    $sql = "DELETE FROM admin WHERE id = :admin_id";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute(['admin_id' => $admin_id])) {
        header("Location: guest_list.php?message=Admin deleted successfully!");
    } else {
        echo "Error deleting record.";
    }
} else {
    header("Location: guest_list.php?message=Invalid admin ID.");
}
?>
