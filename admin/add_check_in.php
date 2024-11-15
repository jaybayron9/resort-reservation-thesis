<?php
include('../databaseConnection.php');

$reservationID = $guestID = $roomID = $checkInDate = $checkOutDate = $numberOfAdults = $numberOfKids = $checkInTotalAmount = $checkInPayment = $checkInCredit = $checkInStatus = "";
$insert_successful = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $reservationID = $_POST['reservationID'];
    $guestID = $_POST['guestID'];
    $roomID = $_POST['roomID'];
    $checkInDate = $_POST['checkInDate'];
    $checkOutDate = $_POST['checkOutDate'];
    $numberOfAdults = $_POST['numberOfAdults'];
    $numberOfKids = $_POST['numberOfKids'];
    $checkInTotalAmount = $_POST['checkInTotalAmount'];
    $checkInPayment = $_POST['checkInPayment'];
    $checkInCredit = $_POST['checkInCredit'];
    $checkInStatus = $_POST['checkInStatus'];

    $sql = "INSERT INTO check_in (ReservationID, GuestID, RoomID, CheckInDate, CheckOutDate, NumberOfAdults, NumberOfKids, CheckInTotalAmount, CheckInPayment, CheckInCredit, CheckInStatus) 
            VALUES ('$reservationID', '$guestID', '$roomID', '$checkInDate', '$checkOutDate', '$numberOfAdults', '$numberOfKids', '$checkInTotalAmount', '$checkInPayment', '$checkInCredit', '$checkInStatus')";


    $stmt = $conn->query($sql);
    if ($stmt) {
        $insert_successful = true;
    }

    if ($insert_successful) {
        header("Location: check-in_list.php?message=Check-in added successfully.");
        exit;
    }
}
$pdo = null; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Beatriz Rafaela Resort</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/myscripts.js" defer></script>
    <script src="../assets/js/scriptimport.js" crossorigin="anonymous"></script>
    <style>

        body {
            background-image: url('../assets/imgs/bg.png');
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
    </style>
</head>
<body>

<header>
    <img src="../assets/imgs/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>

<nav class="navbar">
    <a href="check-in_list.php">Back</a>
</nav>
	
<div class="container" style="padding: 20px;">
    <h2>Add Check-in</h2>
    <form method="POST" action="">
        <label for="reservationID">Reservation ID:</label>
        <input type="number" id="reservationID" name="reservationID" required><br>

        <label for="guestID">Guest ID:</label>
        <input type="number" id="guestID" name="guestID" required><br>

        <label for="roomID">Room ID:</label>
        <input type="number" id="roomID" name="roomID" required><br>

        <label for="checkInDate">Check-in Date:</label>
        <input type="date" id="checkInDate" name="checkInDate" required><br>

        <label for="checkOutDate">Check-out Date:</label>
        <input type="date" id="checkOutDate" name="checkOutDate" required><br>

        <label for="numberOfAdults">Number of Adults:</label>
        <input type="number" id="numberOfAdults" name="numberOfAdults" required><br>

        <label for="numberOfKids">Number of Kids:</label>
        <input type="number" id="numberOfKids" name="numberOfKids" required><br>

        <label for="checkInTotalAmount">Total Amount:</label>
        <input type="number" id="checkInTotalAmount" name="checkInTotalAmount" required><br>

        <label for="checkInPayment">Payment Method:</label>
        <input type="text" id="checkInPayment" name="checkInPayment" required><br>

        <label for="checkInCredit">Credit:</label>
        <input type="number" id="checkInCredit" name="checkInCredit" required><br>

        <label for="checkInStatus">Check-in Status:</label>
        <input type="text" id="checkInStatus" name="checkInStatus" required><br>

        <input type="submit" value="Add Check-in">
    </form>
</div>
</body>
</html>
        