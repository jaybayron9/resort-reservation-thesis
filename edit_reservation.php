<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reservationID = $_POST['ReservationID'];
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

    $sql = "UPDATE reservation SET GuestID = ?, RoomID = ?, Title = ?, FullName = ?, PhoneNumber = ?, EmailAddress = ?, AdditionalInformation = ?, CheckInDate = ?, CheckOutDate = ?, NumberOfAdults = ?, NumberOfKids = ?, NumberOfInfants = ?, NumberOfPets = ?, TotalAmount = ?, ReservationStatus = ? WHERE ReservationID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$guestID, $roomID, $title, $fullName, $phoneNumber, $emailAddress, $additionalInformation, $checkInDate, $checkOutDate, $numberOfAdults, $numberOfKids, $numberOfInfants, $numberOfPets, $totalAmount, $reservationStatus, $reservationID]);

    header("Location: reservation_list.php?message=Reservation+updated+successfully");
    exit;
} else {
    $reservationID = $_GET['id'];
    $sql = "SELECT * FROM reservation WHERE ReservationID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$reservationID]);
    $reservation = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Reservation - Beatriz Rafaela Resort</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
	<style>
        body {
            background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        header {
            padding: 10px;
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
        }

        .navbar {
            display: flex;
            justify-content: center;
            background-color: #A47C2D;
            padding: 10px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }

        .navbar a:hover {
            background-color: #874E18;
        }

        .main-content {
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .content-header {
            margin-bottom: 20px;
        }

        .content-header h2 {
            margin: 0;
        }

        .card {
            border: 1px solid #A47C2D;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #A47C2D;
        }

        table th {
            background-color: #A47C2D;
            color: white;
        }

        .fixed-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #A47C2D;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s;
        }

        .fixed-button:hover {
            background-color: #874E18;
        }

        .container {
            position: center;
            width: 90%;
            max-width: 930px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
            background-color: #f2f2f2;
            border-radius: 10px;
			overflow-y: auto;
			overflow-x: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Reservation</h2>
    <form action="edit_reservation.php" method="POST">
        <input type="hidden" name="ReservationID" value="<?php echo $reservation['ReservationID']; ?>">
        <div class="form-group">
            <label for="GuestID">Guest ID:</label>
            <input type="text" class="form-control" id="GuestID" name="GuestID" value="<?php echo $reservation['GuestID']; ?>" required>
        </div>
        <div class="form-group">
            <label for="RoomID">Room ID:</label>
            <input type="text" class="form-control" id="RoomID" name="RoomID" value="<?php echo $reservation['RoomID']; ?>" required>
        </div>
        <div class="form-group">
            <label for="Title">Title:</label>
            <select class="form-control" id="Title" name="Title" required>
                <option value="Mr." <?php echo ($reservation['Title'] == 'Mr.') ? 'selected' : ''; ?>>Mr.</option>
                <option value="Ms." <?php echo ($reservation['Title'] == 'Ms.') ? 'selected' : ''; ?>>Ms.</option>
                <option value="Mrs." <?php echo ($reservation['Title'] == 'Mrs.') ? 'selected' : ''; ?>>Mrs.</option>
            </select>
        </div>
        <div class="form-group">
            <label for="FullName">Full Name:</label>
            <input type="text" class="form-control" id="FullName" name="FullName" value="<?php echo $reservation['FullName']; ?>" required>
        </div>
        <div class="form-group">
            <label for="PhoneNumber">Phone Number:</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="<?php echo $reservation['PhoneNumber']; ?>" required>
        </div>
        <div class="form-group">
            <label for="EmailAddress">Email Address:</label>
            <input type="email" class="form-control" id="EmailAddress" name="EmailAddress" value="<?php echo $reservation['EmailAddress']; ?>" required>
        </div>
        <div class="form-group">
            <label for="AdditionalInformation">Additional Information:</label>
            <textarea class="form-control" id="AdditionalInformation" name="AdditionalInformation" required><?php echo $reservation['AdditionalInformation']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="CheckInDate">Check In Date:</label>
            <input type="date" class="form-control" id="CheckInDate" name="CheckInDate" value="<?php echo $reservation['CheckInDate']; ?>" required>
        </div>
        <div class="form-group">
            <label for="CheckOutDate">Check Out Date:</label>
            <input type="date" class="form-control" id="CheckOutDate" name="CheckOutDate" value="<?php echo $reservation['CheckOutDate']; ?>" required>
        </div>
        <div class="form-group">
            <label for="NumberOfAdults">Number Of Adults:</label>
            <input type="text" class="form-control" id="NumberOfAdults" name="NumberOfAdults" value="<?php echo $reservation['NumberOfAdults']; ?>" required>
        </div>
        <div class="form-group">
            <label for="NumberOfKids">Number Of Kids:</label>
            <input type="text" class="form-control" id="NumberOfKids" name="NumberOfKids" value="<?php echo $reservation['NumberOfKids']; ?>" required>
        </div>
        <div class="form-group">
            <label for="NumberOfInfants">Number Of Infants:</label>
            <input type="text" class="form-control" id="NumberOfInfants" name="NumberOfInfants" value="<?php echo $reservation['NumberOfInfants']; ?>" required>
        </div>
        <div class="form-group">
            <label for="NumberOfPets">Number Of Pets:</label>
            <input type="text" class="form-control" id="NumberOfPets" name="NumberOfPets" value="<?php echo $reservation['NumberOfPets']; ?>" required>
        </div>
        <div class="form-group">
            <label for="TotalAmount">Total Amount:</label>
            <input type="text" class="form-control" id="TotalAmount" name="TotalAmount" value="<?php echo $reservation['TotalAmount']; ?>" required>
        </div>
        <div class="form-group">
            <label for="ReservationStatus">Reservation Status:</label>
            <input type="text" class="form-control" id="ReservationStatus" name="ReservationStatus" value="<?php echo $reservation['ReservationStatus']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>
</body>
</html>
