<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $reservationID = $_GET['id'];

    $sql = "DELETE FROM reservation WHERE ReservationID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$reservationID]);

    header("Location: reservation_list.php?message=Reservation+deleted+successfully");
    exit;
}
?>
