<?php include('../databaseConnection.php'); ?>
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


        table {
            width: 100%;
            margin-left: 0; 
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

<?php include('adminComponents/navigations.php') ?>

<div class="container" style="padding: 20px;">
    <h2>Check-ins List</h2>
    
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Check In ID</th>
            <th>Reservation ID</th>
            <th>Guest ID</th>
            <th>Room ID</th>
            <th>Check In Date</th>
            <th>Check Out Date</th>
            <th>Number of Adults</th>
            <th>Number of Kids</th>
            <th>Total Amount</th>
            <th>Payment</th>
            <th>Credit</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php

        $sql = "SELECT * FROM check_in";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            foreach ($result->fetch_all(MYSQLI_ASSOC) as $row) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['ReservationID']}</td>
                    <td>{$row['GuestID']}</td>
                    <td>{$row['RoomID']}</td>
                    <td>{$row['CheckInDate']}</td>
                    <td>{$row['CheckOutDate']}</td>
                    <td>{$row['NumberOfAdults']}</td>
                    <td>{$row['NumberOfKids']}</td>
                    <td>{$row['CheckInTotalAmount']}</td>
                    <td>{$row['CheckInPayment']}</td>
                    <td>{$row['CheckInCredit']}</td>
                    <td>{$row['CheckInStatus']}</td>
                    <td>
                        <a href='edit_check_in.php?id={$row['id']}'>Edit</a>
                        <a href='delete_check_in.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this check-in?\");'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='13'>No check-ins found.</td></tr>";
        }

        $pdo = null;
        ?>
    </table>
</div>

<a href="add_check_in.php" class="fixed-button">Add Check-in</a>

</body>
</html>
