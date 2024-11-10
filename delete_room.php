<?php
include('db_connection.php');
if (isset($_GET['id'])) {
    $roomID = intval($_GET['id']); 
    if ($pdo) {
        $pdo->beginTransaction();

        try {
            $deletePaymentsSql = "DELETE FROM payments WHERE RoomID = :roomID";
            $stmt = $pdo->prepare($deletePaymentsSql);
            $stmt->bindParam(':roomID', $roomID, PDO::PARAM_INT);
            $stmt->execute();

            $deleteRoomSql = "DELETE FROM room WHERE RoomID = :roomID";
            $stmt = $pdo->prepare($deleteRoomSql);
            $stmt->bindParam(':roomID', $roomID, PDO::PARAM_INT);
            $stmt->execute();
            $pdo->commit();
            header("Location: room_list.php?message=Room deleted successfully");
            exit(); 

        } catch (Exception $e) {
           
            $pdo->rollBack();
            echo "Error deleting room: " . $e->getMessage();
        }
    } else {
        echo "Database connection failed.";
    }
} else {
    echo "Room ID is not provided.";
}
?>
