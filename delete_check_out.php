<?php
// Include database connection (using PDO)
include('db_connection.php');

if (isset($_GET['id'])) {
    $checkInID = $_GET['id'];

    try {
        // Start a transaction
        $pdo->beginTransaction();

        // First, delete from the check_out table (if any related rows exist)
        $sqlDeleteCheckout = "DELETE FROM `check_out` WHERE CheckInID = ?";
        $stmt = $pdo->prepare($sqlDeleteCheckout);
        $stmt->bindParam(1, $checkInID, PDO::PARAM_INT);
        $stmt->execute();

        // Now, delete from the check_in table
        $sqlDeleteCheckIn = "DELETE FROM `check_in` WHERE id = ?";
        $stmt = $pdo->prepare($sqlDeleteCheckIn);
        $stmt->bindParam(1, $checkInID, PDO::PARAM_INT);
        $stmt->execute();

        // Commit the transaction
        $pdo->commit();

        header("Location: check-in_list.php?message=Check-in deleted successfully.");
        exit;
    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No Check-in ID provided.";
}
?>
