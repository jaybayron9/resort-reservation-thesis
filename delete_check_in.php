<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $checkInID = $_GET['id'];

    try {
        $pdo->beginTransaction();
        $sqlDeleteCheckout = "DELETE FROM `check_out` WHERE CheckOutID= ?";
        $stmt = $pdo->prepare($sqlDeleteCheckout);
        $stmt->bindParam(1, $checkInID, PDO::PARAM_INT);
        $stmt->execute();
        $sqlDeleteCheckIn = "DELETE FROM `check_in` WHERE id = ?";
        $stmt = $pdo->prepare($sqlDeleteCheckIn);
        $stmt->bindParam(1, $checkInID, PDO::PARAM_INT);
        $stmt->execute();
        $pdo->commit();
        header("Location: check-in_list.php?message=Check-in deleted successfully.");
        exit;
    } catch (PDOException $e) {

        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No Check-in ID provided.";
}
?>