<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $account_id = intval($_GET['id']);
    
    $sql = "DELETE FROM user WHERE userid = :account_id";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute(['account_id' => $account_id])) {
        header("Location: account_list.php?message=Account deleted successfully!");
    } else {
        echo "Error deleting record.";
    }
} else {
    header("Location: account_list.php?message=Invalid account ID.");
}
?>