<?php
session_start();
include 'db_connection.php';
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
$query = "SELECT userid FROM user WHERE username = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user) {
    echo 'User not found.';
    exit();
}

$userID = $user['userid'];

$notificationQuery = "SELECT NotificationID, Status, DateCreated, DateRead FROM notification WHERE UserID = ? ORDER BY DateCreated DESC";
try {
    $notificationStmt = $pdo->prepare($notificationQuery);
    $notificationStmt->execute([$userID]);
    $notifications = $notificationStmt->fetchAll();
} catch (PDOException $e) {
    echo "Error fetching notifications: " . $e->getMessage();
    exit();
}


if (!empty($notifications)) {
    $updateQuery = "UPDATE notification SET Status = 'read', DateRead = NOW() WHERE UserID = ?";
    $pdo->prepare($updateQuery)->execute([$userID]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Notifications</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #A47C2D;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            font-size: 2.5em;
            margin: 0;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .navbar li {
            display: inline;
            margin: 0 15px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
        }

        .navbar a:hover {
            background-color: #A47C2D;
            border-radius: 5px;
        }


        .notifications-container {
            width: 80%;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .notifications-container h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #A47C2D;
            text-align: center;
        }

 
        .notification-item {
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .notification-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .notification-status {
            font-weight: bold;
            color: #A47C2D;
        }

        .notification-status.unread {
            color: #e74c3c;
        }

        .notification-type {
            font-size: 1.1em;
            color: #3498db;
            font-weight: bold;
        }

        .notification-message {
            margin-top: 10px;
            font-size: 1em;
            color: #555;
            line-height: 1.5;
        }

        .notification-dates {
            margin-top: 10px;
            color: #888;
            font-size: 0.9em;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .notification-action {
            margin-top: 15px;
            font-size: 1em;
        }

        .notification-action a {
            color: #A47C2D;
            text-decoration: none;
            padding: 8px 16px;
            border: 2px solid #A47C2D;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .notification-action a:hover {
            background-color: #A47C2D;
            color: white;
            text-decoration: none;
        }


        .no-notifications {
            text-align: center;
            font-size: 1.5em;
            color: #888;
        }
    </style>
</head>
<body>

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Notifications</h1>
</header>

<nav>
    <ul class="navbar">
        <li><a href="user.php">Dashboard</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="user_reservation.php">Reservations</a></li>
        <li><a href="account_settings.php">Account Settings</a></li>

        <li><a href="logout.php">Log out</a></li>
    </ul>
</nav>

<div class="notifications-container">
    <h2>Your Notifications</h2>
    
    <?php if (empty($notifications)) : ?>
        <p class="no-notifications">No notifications available.</p>
    <?php else : ?>
        <?php foreach ($notifications as $notification) : ?>
            <div class="notification-item">
                <div class="notification-status <?php echo $notification['Status'] === 'unread' ? 'unread' : ''; ?>">
                    <?php echo ucfirst($notification['Status']); ?>
                </div>
                <div class="notification-message">

                    New notification message will go here.
                </div>
                <div class="notification-dates">
                    <span>Date Created: <?php echo $notification['DateCreated']; ?></span>
                    <?php if ($notification['DateRead']) : ?>
                        <span>Date Read: <?php echo $notification['DateRead']; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

</body>
</html>
