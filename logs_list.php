<?php
// Include the PDO database connection
include('db_connection.php');  // Make sure this is the correct path to your db_connection.php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Beatriz Rafaela Resort</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/myscripts.js" defer></script>
    <script src="scripts/scriptimport.js" crossorigin="anonymous"></script>
    <style>
        /* Additional styles for the admin dashboard */
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
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .content-header h2 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #A47C2D;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
        }
        .alert-success {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>

<nav class="navbar">
    <a href="ADMIN.php">Admin</a>
    <a href="Reservation_list.php">Manage Reservations</a>
    <a href="account_list.php">Manage Accounts</a>
    <a href="record_list.php">Manage Records</a>
    <a href="check-in_list.php">Manage Check-ins</a>
    <a href="check-out_list.php">Manage Check-outs</a>
    <a href="guest_list.php">Manage Guests</a>
    <a href="room_list.php">Manage Rooms</a>
	<a href="services_list.php">Manage Services</a>
    <a href="index.php">Logout</a>
</nav>

<div class="container">
    <h2>Logs List</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Log ID</th>
            <th>Account ID</th>
            <th>Username</th>
            <th>Account Name</th>
            <th>Account Type</th>
            <th>Log Date</th>
        </tr>
        <?php
        // Fetch data from the logs table using PDO
        try {
            $stmt = $pdo->prepare("SELECT * FROM logs");
            $stmt->execute();
            $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($logs) > 0) {
                foreach ($logs as $row) {
                    echo "<tr>
                        <td>{$row['LogID']}</td>
                        <td>{$row['AccountID']}</td>
                        <td>{$row['Username']}</td>
                        <td>{$row['AccountName']}</td>
                        <td>{$row['AccountType']}</td>
                        <td>{$row['LogDate']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No logs found.</td></tr>";
            }
        } catch (PDOException $e) {
            echo "Error fetching logs: " . $e->getMessage();
        }
        ?>
    </table>
</div>

</body>
</html>
