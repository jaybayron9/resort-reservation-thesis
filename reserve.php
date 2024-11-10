<?php
include('db_connection.php');
session_start();


if (!isset($_SESSION['username'])) {

    header('Location: login.php');
    exit();
}


$username = $_SESSION['username'];

if (isset($_POST['make_reservation'])) {
    $guest_id = $_POST['guest_id'];
    $room_id = $_POST['room_id'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
    $adults = $_POST['number_of_adults'];
    $kids = $_POST['number_of_kids'];
    $total_amount = $_POST['total_amount'];

    $query = "INSERT INTO reservation (GuestID, RoomID, CheckInDate, CheckOutDate, NumberOfAdults, NumberOfKids, TotalAmount, ReservationStatus, ReservationDate)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$guest_id, $room_id, $check_in_date, $check_out_date, $adults, $kids, $total_amount, 'Pending', date('Y-m-d')]);

    echo "Reservation made successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reservation Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        header, nav, .dashboard, .contact-info {
            text-align: center;
        }
        header h1 {
            font-size: 2em;
            margin: 0;
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
        .dashboard {
            margin-top: 30px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
        }
        .dashboard .section {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        .dashboard .section:last-child {
            border-bottom: none;
        }
        .btn {
            background-color: #A47C2D;
            color: white;
            padding: 10px;
            margin-top: 10px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
        }
        .btn:hover {
            background-color: #874E18;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #A47C2D;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.7); 
        }
        input[type="text"], input[type="number"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"], .next-button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
            background-color: #A47C2D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .next-button:hover {
            background-color: #874E18;
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

<div class="container">
    <h2>Reservation Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="GuestFirstName">Guest First Name:</label><br>
        <input type="text" id="GuestFirstName" name="GuestFirstName" required><br>

        <label for="GuestLastName">Guest Last Name:</label><br>
        <input type="text" id="GuestLastName" name="GuestLastName" required><br>

        <label for="GuestContactNumber">Contact Number:</label><br>
        <input type="text" id="GuestContactNumber" name="GuestContactNumber" required><br>

        <label for="RoomType">Room Type:</label><br>
        <select id="RoomType" name="RoomType" required>
            <option value="STANDARD ROOM with loft">STANDARD ROOM with loft</option>
            <option value="FAMILY ROOM corner with loft">FAMILY ROOM corner with loft</option>
            <option value="FAMILY ROOM">FAMILY ROOM</option>
        </select><br>

        <label for="RoomSize">Room Size:</label><br>
        <input type="number" id="RoomSize" name="RoomSize" required><br>

        <label for="GuestEmail">Guest Email:</label><br>
        <input type="text" id="GuestEmail" name="GuestEmail" required><br>

        <label for="NumberOfAdult">Number of Adults:</label><br>
        <input type="number" id="NumberOfAdult" name="NumberOfAdult" required><br>

        <label for="NumberOfKids">Number of Kids:</label><br>
        <input type="number" id="NumberOfKids" name="NumberOfKids" required><br>

        <label for="ReservationDate">Reservation Date:</label><br>
        <input type="date" id="ReservationDate" name="ReservationDate" required><br>

        <input type="submit" class="next-button" value="Next">
    </form>
</div>

</body>
</html>
