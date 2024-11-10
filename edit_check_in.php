<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $checkInID = $_GET['id'];
    // Update the query to use 'id' instead of 'CheckInID'
    $sql = "SELECT * FROM `check_in` WHERE id = ?";
    $stmt = $pdo->prepare($sql); 
    $stmt->bindParam(1, $checkInID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $row = $result;
    } else {
        echo "No record found.";
        exit;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ReservationID = $_POST['ReservationID'];
    $GuestID = $_POST['GuestID'];
    $RoomID = $_POST['RoomID'];
    $CheckInDate = $_POST['CheckInDate'];
    $CheckOutDate = $_POST['CheckOutDate'];
    $NumberOfAdults = $_POST['NumberOfAdults'];
    $NumberOfKids = $_POST['NumberOfKids'];
    $CheckInTotalAmount = $_POST['CheckInTotalAmount'];
    $CheckInPayment = $_POST['CheckInPayment'];
    $CheckInCredit = $_POST['CheckInCredit'];
    $CheckInStatus = $_POST['CheckInStatus'];

    // Update the query to use 'id' instead of 'CheckInID'
    $updateSql = "UPDATE `check_in` SET ReservationID=?, GuestID=?, RoomID=?, CheckInDate=?, CheckOutDate=?, NumberOfAdults=?, NumberOfKids=?, CheckInTotalAmount=?, CheckInPayment=?, CheckInCredit=?, CheckInStatus=? WHERE id=?";
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->bindParam(1, $ReservationID, PDO::PARAM_INT);
    $updateStmt->bindParam(2, $GuestID, PDO::PARAM_INT);
    $updateStmt->bindParam(3, $RoomID, PDO::PARAM_INT);
    $updateStmt->bindParam(4, $CheckInDate);
    $updateStmt->bindParam(5, $CheckOutDate);
    $updateStmt->bindParam(6, $NumberOfAdults, PDO::PARAM_INT);
    $updateStmt->bindParam(7, $NumberOfKids, PDO::PARAM_INT);
    $updateStmt->bindParam(8, $CheckInTotalAmount, PDO::PARAM_INT);
    $updateStmt->bindParam(9, $CheckInPayment);
    $updateStmt->bindParam(10, $CheckInCredit, PDO::PARAM_INT);
    $updateStmt->bindParam(11, $CheckInStatus);
    $updateStmt->bindParam(12, $checkInID, PDO::PARAM_INT);

    if ($updateStmt->execute()) {
        header("Location: check-in_list.php?message=Check-in updated successfully.");
        exit;
    } else {
        echo "Error updating record: " . $pdo->errorInfo();
    }
}
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
    <a href="check-in_list.php">Back</a>
</nav>
	
<div class="container" style="padding: 20px;">
    <h2>Edit Check-in</h2>
    <form method="post" action="">
        <label for="ReservationID">Reservation ID:</label>
        <input type="text" name="ReservationID" value="<?php echo $row['ReservationID']; ?>" required><br>

        <label for="GuestID">Guest ID:</label>
        <input type="text" name="GuestID" value="<?php echo $row['GuestID']; ?>" required><br>

        <label for="RoomID">Room ID:</label>
        <input type="text" name="RoomID" value="<?php echo $row['RoomID']; ?>" required><br>

        <label for="CheckInDate">Check In Date:</label>
        <input type="date" name="CheckInDate" value="<?php echo $row['CheckInDate']; ?>" required><br>

        <label for="CheckOutDate">Check Out Date:</label>
        <input type="date" name="CheckOutDate" value="<?php echo $row['CheckOutDate']; ?>" required><br>

        <label for="NumberOfAdults">Number of Adults:</label>
        <input type="number" name="NumberOfAdults" value="<?php echo $row['NumberOfAdults']; ?>" required><br>

        <label for="NumberOfKids">Number of Kids:</label>
        <input type="number" name="NumberOfKids" value="<?php echo $row['NumberOfKids']; ?>" required><br>

        <label for="CheckInTotalAmount">Total Amount:</label>
        <input type="number" name="CheckInTotalAmount" value="<?php echo $row['CheckInTotalAmount']; ?>" required><br>

        <label for="CheckInPayment">Payment Method:</label>
        <input type="text" name="CheckInPayment" value="<?php echo $row['CheckInPayment']; ?>" required><br>

        <label for="CheckInCredit">Credit:</label>
        <input type="number" name="CheckInCredit" value="<?php echo $row['CheckInCredit']; ?>" required><br>

        <label for="CheckInStatus">Status:</label>
        <input type="text" name="CheckInStatus" value="<?php echo $row['CheckInStatus']; ?>" required><br>

        <button type="submit">Save Changes</button>
    </form>
</div>

<a href="check-in_list.php" class="fixed-button">Back to Check-in List</a>

</body>
</html>
