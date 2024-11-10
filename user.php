<?php
include('db_connection.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Your Dashboard</title>
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

<div class="dashboard">
    <div class="section">
        <h2>Dashboard Overview</h2>
        <p>Check out your latest reservations and account status here.</p>
        <a href="user_reservation.php" class="btn">View Reservations</a>
    </div>
    <div class="section">
        <h2>Update Profile</h2>
        <p>Ensure your contact information is up-to-date.</p>
        <a href="profile.php" class="btn">Edit Profile</a> 
    </div>
    <div class="section">
        <h2>Account Settings</h2>
        <p>Change your password and manage security settings.</p>
        <a href="account_settings.php" class="btn">Account Settings</a>
    </div>
</div>

<div class="contact-info">
    <p>Contact us: beatrizrafaelaresort@gmail.com | Phone: 0950 682 8971</p>
</div>

</body>
</html>
