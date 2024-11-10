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
    max-width: 1200px; 
    margin: 20px auto; 
    border: 2px solid #A47C2D;
    border-collapse: collapse; 
    text-align: center; 
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
    <a href="reservation_list.php">Manage Reservations</a>
    <a href="account_list.php">Manage Users</a>
    <a href="record_list.php">Manage Records</a>
    <a href="check-in_list.php">Manage Check-ins</a>
    <a href="check-out_list.php">Manage Check-outs</a>
    <a href="guest_list.php">Manage Admin Account</a>
    <a href="room_list.php">Manage Rooms</a>
    <a href="services_list.php">Manage Services</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="container" style="padding: 20px;">
    <h2>Records List</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Records ID</th>
            <th>Account ID</th>
            <th>Services ID</th>
            <th>Guest First Name</th>
            <th>Guest Last Name</th>
            <th>Guest Contact Number</th>
            <th>Room Name</th>
            <th>Room Size</th>
            <th>Room Type</th>
            <th>Guest Email</th>
            <th>Number of Adults</th>
            <th>Number of Kids</th>
            <th>Reservation Date</th>
            <th>Actions</th>
        </tr>
        <?php

include('db_connection.php');


if ($pdo) {

    $sql = "SELECT * FROM records";
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$row['RecordsID']}</td>
                <td>{$row['AccountID']}</td>
                <td>{$row['ServicesID']}</td>
                <td>{$row['GuestFirstName']}</td>
                <td>{$row['GuestLastName']}</td>
                <td>{$row['GuestContactNumber']}</td>
                <td>{$row['RoomName']}</td>
                <td>{$row['RoomSize']}</td>
                <td>{$row['RoomType']}</td>
                <td>{$row['GuestEmail']}</td>
                <td>{$row['NumberOfAdult']}</td>
                <td>{$row['NumberOfKids']}</td>
                <td>{$row['ReservationDate']}</td>
                <td>
                    <a href='edit_record.php?id={$row['RecordsID']}'>Edit</a>
                    <a href='delete_record.php?id={$row['RecordsID']}' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='14'>No records found.</td></tr>";
    }

    $pdo = null; 
} else {
    echo "<tr><td colspan='14'>Failed to connect to the database.</td></tr>";
}
?>

    </table>
</div>

<a href="add_record.php" class="fixed-button">Add Record</a>

</body>
</html>
