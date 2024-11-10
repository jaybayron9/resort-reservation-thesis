<?php
ob_start(); // Start output buffering
include('db_connection.php');

if (isset($_GET['id'])) {
    $paymentID = $_GET['id'];

    $sql = "SELECT * FROM payments WHERE PaymentID = $paymentID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No payment found with ID: $paymentID";
    }
} else {
    echo "Invalid request.";
}

// Update payment in database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservationID = $_POST['ReservationID'];
    $guestID = $_POST['GuestID'];
    $roomID = $_POST['RoomID'];
    $paymentAmount = $_POST['PaymentAmount'];
    $paymentMethod = $_POST['PaymentMethod'];
    $paymentDate = $_POST['PaymentDate'];
    $username = $_POST['Username'];
    $accountName = $_POST['AccountName'];
    $paymentStatus = $_POST['PaymentStatus'];

    $sql = "UPDATE payments 
            SET ReservationID='$reservationID', GuestID='$guestID', RoomID='$roomID', PaymentAmount='$paymentAmount', 
                PaymentMethod='$paymentMethod', PaymentDate='$paymentDate', Username='$username', 
                AccountName='$accountName', PaymentStatus='$paymentStatus'
            WHERE PaymentID='$paymentID'";

    if ($conn->query($sql) === TRUE) {
        header("Location: payments_list.php?message=Payment updated successfully");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
ob_end_flush(); // End output buffering and flush output
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
        .main-content {
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow-y: auto; /* Allow scrolling */
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
        /* Fixed button styles */
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
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>

<nav class="navbar">
    <a href="payments_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;">

    <?php if (isset($row)): ?>
    <form action="edit_payment.php?id=<?php echo $paymentID; ?>" method="post">
        <label for="ReservationID">Reservation ID:</label>
        <input type="number" id="ReservationID" name="ReservationID" value="<?php echo $row['ReservationID']; ?>" required><br>

        <label for="GuestID">Guest ID:</label>
        <input type="number" id="GuestID" name="GuestID" value="<?php echo $row['GuestID']; ?>" required><br>

        <label for="RoomID">Room ID:</label>
        <input type="number" id="RoomID" name="RoomID" value="<?php echo $row['RoomID']; ?>" required><br>

        <label for="PaymentAmount">Payment Amount:</label>
        <input type="number" id="PaymentAmount" name="PaymentAmount" value="<?php echo $row['PaymentAmount']; ?>" required><br>

        <label for="PaymentMethod">Payment Method:</label>
        <input type="text" id="PaymentMethod" name="PaymentMethod" value="<?php echo $row['PaymentMethod']; ?>" required><br>

        <label for="PaymentDate">Payment Date:</label>
        <input type="date" id="PaymentDate" name="PaymentDate" value="<?php echo $row['PaymentDate']; ?>" required><br>

        <label for="Username">Username:</label>
        <input type="text" id="Username" name="Username" value="<?php echo $row['Username']; ?>" required><br>

        <label for="AccountName">Account Name:</label>
        <input type="text" id="AccountName" name="AccountName" value="<?php echo $row['AccountName']; ?>" required><br>

        <label for="PaymentStatus">Payment Status:</label>
        <input type="text" id="PaymentStatus" name="PaymentStatus" value="<?php echo $row['PaymentStatus']; ?>" required><br>

        <input type="submit" value="Update Payment">
    </form>
    <?php endif; ?>
	</div>
</body>
</html>
