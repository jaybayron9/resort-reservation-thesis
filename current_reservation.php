<?php
include('db_connection.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$sql_guest = "SELECT userid FROM User WHERE username = :username";
$stmt_guest = $pdo->prepare($sql_guest);
$stmt_guest->bindParam(':username', $username, PDO::PARAM_STR);
$stmt_guest->execute();
$guest = $stmt_guest->fetch(PDO::FETCH_ASSOC);

if ($guest) {
    $guestID = $guest['userid'];

    $sql_reservations = "SELECT r.ReservationID, r.RoomID, r.CheckInDate, r.CheckOutDate, 
                                r.NumberOfAdults, r.NumberOfKids, r.TotalAmount, r.ReservationStatus, r.ReservationDate
                         FROM Reservation AS r
                         WHERE r.GuestID = :guestID AND r.CheckInDate >= CURDATE()
                         ORDER BY r.CheckInDate ASC";
    $stmt_reservations = $pdo->prepare($sql_reservations);
    $stmt_reservations->bindParam(':guestID', $guestID, PDO::PARAM_INT);
    $stmt_reservations->execute();


    $reservations = $stmt_reservations->fetchAll(PDO::FETCH_ASSOC);
} else {
    $reservations = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Reservations</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
            font-family: Arial, sans-serif;
        }
        header, .reservations, .contact-info {
            text-align: center;
        }
        header h1 {
            font-size: 2em;
            margin: 0;
        }
        .reservations {
            margin-top: 30px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
        }
        .reservations table {
            width: 100%;
            border-collapse: collapse;
        }
        .reservations table, th, td {
            border: 1px solid #ddd;
        }
        .reservations th, td {
            padding: 10px;
            text-align: left;
        }
        .reservations th {
            background-color: #A47C2D;
            color: white;
        }
        .reservations tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .reservations tr:hover {
            background-color: #f1f1f1;
        }
        .navbar {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid #ddd;
        }
        .navbar li {
            list-style: none;
            display: inline;
        }
        .navbar a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .navbar a:hover {
            background-color: #A47C2D;
            color: #fff;
        }
        .navbar .dropdown {
            position: relative;
            display: inline-block;
        }

        .navbar .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .navbar .dropdown:hover .dropdown-content {
            display: block;
        }

        .navbar .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .navbar .dropdown-content a:hover {
            background-color: #A47C2D;
            color: white;
        }
    </style>
</head>
<body>

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Welcome, <?php echo $username; ?>!</h1> 
</header>

<nav>
    <ul class="navbar">
        <li><a href="user.php">Dashboard</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="reserve.php">Make a Reservation</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Account Settings</a>
            <div class="dropdown-content">
                <a href="edit_profile.php">Edit Profile</a> 
                <a href="current_reservation.php">Current Reservations</a>
                <a href="past_reservation.php">Past Reservations</a>
                <a href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div class="reservations">
    <?php if ($reservations): ?>
        <table>
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Room ID</th>
                    <th>Check-In Date</th>
                    <th>Check-Out Date</th>
                    <th>Adults</th>
                    <th>Kids</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Reservation Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($reservation['ReservationID']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['RoomID']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['CheckInDate']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['CheckOutDate']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['NumberOfAdults']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['NumberOfKids']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['TotalAmount']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['ReservationStatus']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['ReservationDate']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No current reservations found.</p>
    <?php endif; ?>
</div>

<div class="contact-info">
    <p>Contact us: beatrizrafaelaresort@gmail.com | Phone: 0950 682 8971</p>
</div>

</body>
</html>
