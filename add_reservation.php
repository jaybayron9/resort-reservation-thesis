<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guestID = $_POST['GuestID'];
    $roomID = $_POST['RoomID'];
    $title = $_POST['Title'];
    $fullName = $_POST['FullName'];
    $phoneNumber = $_POST['PhoneNumber'];
    $emailAddress = $_POST['EmailAddress'];
    $additionalInformation = $_POST['AdditionalInformation'];
    $checkInDate = $_POST['CheckInDate'];
    $checkOutDate = $_POST['CheckOutDate'];
    $numberOfAdults = $_POST['NumberOfAdults'];
    $numberOfKids = $_POST['NumberOfKids'];
    $numberOfInfants = $_POST['NumberOfInfants'];
    $numberOfPets = $_POST['NumberOfPets'];
    $totalAmount = $_POST['TotalAmount'];
    $reservationStatus = $_POST['ReservationStatus'];

    $sql = "INSERT INTO reservation (GuestID, RoomID, Title, FullName, PhoneNumber, EmailAddress, AdditionalInformation, CheckInDate, CheckOutDate, NumberOfAdults, NumberOfKids, NumberOfInfants, NumberOfPets, TotalAmount, ReservationStatus)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$guestID, $roomID, $title, $fullName, $phoneNumber, $emailAddress, $additionalInformation, $checkInDate, $checkOutDate, $numberOfAdults, $numberOfKids, $numberOfInfants, $numberOfPets, $totalAmount, $reservationStatus]);

    header("Location: reservation_list.php?message=Reservation+added+successfully");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Reservation - Beatriz Rafaela Resort</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Add Reservation</h2>
    <form action="add_reservation.php" method="POST">
        <div class="form-group">
            <label for="GuestID">Guest ID:</label>
            <input type="text" class="form-control" id="GuestID" name="GuestID" required>
        </div>
        <div class="form-group">
            <label for="RoomID">Room ID:</label>
            <input type="text" class="form-control" id="RoomID" name="RoomID" required>
        </div>
        <div class="form-group">
            <label for="Title">Title:</label>
            <select class="form-control" id="Title" name="Title" required>
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
            </select>
        </div>
        <div class="form-group">
            <label for="FullName">Full Name:</label>
            <input type="text" class="form-control" id="FullName" name="FullName" required>
        </div>
        <div class="form-group">
            <label for="PhoneNumber">Phone Number:</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" required>
        </div>
        <div class="form-group">
            <label for="EmailAddress">Email Address:</label>
            <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" required>
        </div>
        <div class="form-group">
            <label for="AdditionalInformation">Additional Information:</label>
            <textarea class="form-control" id="AdditionalInformation" name="AdditionalInformation" required></textarea>
        </div>
        <div class="form-group">
            <label for="CheckInDate">Check In Date:</label>
            <input type="date" class="form-control" id="CheckInDate" name="CheckInDate" required>
        </div>
        <div class="form-group">
            <label for="CheckOutDate">Check Out Date:</label>
            <input type="date" class="form-control" id="CheckOutDate" name="CheckOutDate" required>
        </div>
        <div class="form-group">
            <label for="NumberOfAdults">Number Of Adults:</label>
            <input type="text" class="form-control" id="NumberOfAdults" name="NumberOfAdults" required>
        </div>
        <div class="form-group">
            <label for="NumberOfKids">Number Of Kids:</label>
            <input type="text" class="form-control" id="NumberOfKids" name="NumberOfKids" required>
        </div>
        <div class="form-group">
            <label for="NumberOfInfants">Number Of Infants:</label>
            <input type="text" class="form-control" id="NumberOfInfants" name="NumberOfInfants" required>
        </div>
        <div class="form-group">
            <label for="NumberOfPets">Number Of Pets:</label>
            <input type="text" class="form-control" id="NumberOfPets" name="NumberOfPets" required>
        </div>
        <div class="form-group">
            <label for="TotalAmount">Total Amount:</label>
            <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" required>
        </div>
        <div class="form-group">
            <label for="ReservationStatus">Reservation Status:</label>
            <input type="text" class="form-control" id="ReservationStatus" name="ReservationStatus" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Reservation</button>
    </form>
</div>
</body>
</html>
