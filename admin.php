<?php
session_start();
include 'db_connection.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php');
    exit();
}

$admin_username = $_SESSION['admin_username'];

$query = "SELECT * FROM admin WHERE username = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$admin_username]);
$admin = $stmt->fetch();

if (!$admin) {
    echo 'Admin not found';
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Beatriz Rafaela Resort</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
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
    </style>
</head>
<body>
<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="admin.php">Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="reservation_list.php">Manage Reservations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="account_list.php">Manage Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="record_list.php">Manage Records</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="check-in_list.php">Manage Check-ins</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="check-out_list.php">Manage Check-outs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="guest_list.php">Manage Admin Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="room_list.php">Manage Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services_list.php">Manage Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<div class="main-content">
    <div class="content-header">
        <h2>Admin Dashboard</h2>
        <p>Welcome, <?= htmlspecialchars($admin['account_name']) . " " . htmlspecialchars($admin['account_lastname']); ?>! Manage your resort operations from here.</p>
    </div>
    <div class="card">
        <h3>Latest Reservations</h3>
        <p>View and manage the most recent reservations made.</p>
        <a href="reservation_list.php" class="book-now-button">View Reservations</a>
    </div>
    <div class="card">
        <h3>Payments Management</h3>
        <p>Manage payment details most recent payment made.</p>
        <a href="payments_list.php" class="book-now-button">View Payments</a>
    </div>
    <div class="card">
        <h3>Logs Management</h3>
        <p>Check and monitor daily logs.</p>
        <a href="logs_list.php" class="book-now-button">View Logs</a>
    </div>
    <div class="card">
        <h3>Contact Information</h3>
        <p>Contact us: beatrizrafaelaresort@gmail.com | Phone: 0950 682 8971</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
