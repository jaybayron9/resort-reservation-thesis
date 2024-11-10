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
            width: 100%;
            max-width: 930px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
            background-color: #f2f2f2;
            border-radius: 10px;
			overflow: auto;
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
    <h2>Payments List</h2>

    <?php
    // Include database connection
    include_once('databaseConnection.php');

    // Check if connection was successful
    if (!$conn) {
        echo "Database connection failed!";
        exit();
    }

    // Fetch data from the payments table
    $sql = "SELECT * FROM payments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data for each row
        echo '<table>';
        echo '<tr>
                <th>Payment ID</th>
                <th>Reservation ID</th>
                <th>Guest ID</th>
                <th>Room ID</th>
                <th>Payment Amount</th>
                <th>Payment Method</th>
                <th>Payment Date</th>
                <th>Username</th>
                <th>Account Name</th>
                <th>Payment Status</th>
                <th>Actions</th>
              </tr>';

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['PaymentID']}</td>
                    <td>{$row['ReservationID']}</td>
                    <td>{$row['GuestID']}</td>
                    <td>{$row['RoomID']}</td>
                    <td>{$row['PaymentAmount']}</td>
                    <td>{$row['PaymentMethod']}</td>
                    <td>{$row['PaymentDate']}</td>
                    <td>{$row['Username']}</td>
                    <td>{$row['AccountName']}</td>
                    <td>{$row['PaymentStatus']}</td>
                    <td>
                        <a href='edit_payment.php?id={$row['PaymentID']}'>Edit</a>
                        <a href='delete_payment.php?id={$row['PaymentID']}' onclick='return confirm(\"Are you sure you want to delete this payment?\");'>Delete</a>
                    </td>
                </tr>";
        }

        echo '</table>';
    } else {
        echo "<p>No payments found.</p>";
    }

    // Close database connection
    $conn->close();
    ?>

</div>

<!-- Add Button -->
<a href="add_payment.php" class="fixed-button">Add Payment</a>

</body>
</html>
