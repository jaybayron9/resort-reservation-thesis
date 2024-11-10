<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/myscripts.js" defer></script>
    <script src="scripts/scriptimport.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: #f0f0f0;">

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
    <a href="login.php" class="login-button">Login</a>
</header>

<nav>
    <ul class="navbar">
        <li class="dropdown">
            <button class="menu-button">☰</button>
            <div class="dropdown-content">
                <a href="reservation_list.php">DB Table Reservation</a>
                <a href="account_list.php">DB Table Account</a>
                <a href="record_list.php">DB Table Records</a>
                <a href="check-in_list.php">DB Table Check-in</a>
                <a href="check-out_list.php">DB Table Check-out</a>
                <a href="guest_list.php">DB Table Guest</a>
                <a href="room_list.php">DB Table Room</a>
                <a href="services_list.php">DB Table Services</a>
            </div>
        </li>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="activities.php">Activities</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="plans.php">Plans & Pricing</a></li>
        <li><a href="reservation.php">Make a Reservation</a></li>
    </ul>
</nav>

<div class="container">
    <h1>Edit Check-In</h1>
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beatrizrafaelaresort";
    $conn = new mysqli($servername, $username, $password, $dbname);

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

 
    if(isset($_GET['id'])) {
        $checkin_id = $_GET['id'];

     
        $sql = "SELECT * FROM `check-in` WHERE CheckInID='$checkin_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
       
            $row = $result->fetch_assoc();
            ?>
            <form action="edit_check-in.php" method="post">
                <input type="hidden" name="checkin_id" value="<?php echo $checkin_id; ?>">
                <label for="reservation_id">Reservation ID:</label>
                <input type="text" id="reservation_id" name="reservation_id" value="<?php echo $row['ReservationID']; ?>"><br><br>
                <label for="guest_id">Guest ID:</label>
                <input type="text" id="guest_id" name="guest_id" value="<?php echo $row['GuestID']; ?>"><br><br>
                <label for="room_id">Room ID:</label>
                <input type="text" id="room_id" name="room_id" value="<?php echo $row['RoomID']; ?>"><br><br>
                <label for="checkin_date">Check-In Date:</label>
                <input type="date" id="checkin_date" name="checkin_date" value="<?php echo $row['CheckInDate']; ?>"><br><br>
                <label for="checkout_date">Check-Out Date:</label>
                <input type="date" id="checkout_date" name="checkout_date" value="<?php echo $row['CheckOutDate']; ?>"><br><br>
                <label for="num_adults">Number of Adults:</label>
                <input type="number" id="num_adults" name="num_adults" value="<?php echo $row['NumberOfAdults']; ?>"><br><br>
                <label for="num_kids">Number of Kids:</label>
                <input type="number" id="num_kids" name="num_kids" value="<?php echo $row['NumberOfKids']; ?>"><br><br>
                <label for="checkin_total_amount">Check-In Total Amount:</label>
                <input type="text" id="checkin_total_amount" name="checkin_total_amount" value="<?php echo $row['CheckInTotalAmount']; ?>"><br><br>
                <label for="checkin_payment">Check-In Payment:</label>
                <input type="text" id="checkin_payment" name="checkin_payment" value="<?php echo $row['CheckInPayment']; ?>"><br><br>
                <label for="checkin_credit">Check-In Credit:</label>
                <input type="text" id="checkin_credit" name="checkin_credit" value="<?php echo $row['CheckInCredit']; ?>"><br><br>
                <label for="checkin_status">Check-In Status:</label>
                <input type="text" id="checkin_status" name="checkin_status" value="<?php echo $row['CheckInStatus']; ?>"><br><br>
                <input type="submit" value="Update Table">
            </form>
            <?php
        } else {
            echo "Check-in not found";
        }
    }

    $conn->close();
    ?>
</div>
</body>
</html>

<?php

if(isset($_POST['checkin_id'])) {

    $conn = new mysqli($servername, $username, $password, $dbname);

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $checkin_id = $_POST['checkin_id'];
    $checkin_date = mysqli_real_escape_string($conn, $_POST['checkin_date']);
    $checkout_date = mysqli_real_escape_string($conn, $_POST['checkout_date']);
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    $guest_id = mysqli_real_escape_string($conn, $_POST['guest_id']);
    $reservation_id = mysqli_real_escape_string($conn, $_POST['reservation_id']);
    $num_adults = mysqli_real_escape_string($conn, $_POST['num_adults']);
    $num_kids = mysqli_real_escape_string($conn, $_POST['num_kids']);
    $checkin_total_amount = mysqli_real_escape_string($conn, $_POST['checkin_total_amount']);
    $checkin_payment = mysqli_real_escape_string($conn, $_POST['checkin_payment']);
    $checkin_credit = mysqli_real_escape_string($conn, $_POST['checkin_credit']);
    $checkin_status = mysqli_real_escape_string($conn, $_POST['checkin_status']);


    $sql = "UPDATE `check-in` SET CheckInDate='$checkin_date', CheckOutDate='$checkout_date', RoomID='$room_id', GuestID='$guest_id', ReservationID='$reservation_id', NumberOfAdults='$num_adults', NumberOfKids='$num_kids', CheckInTotalAmount='$checkin_total_amount', CheckInPayment='$checkin_payment', CheckInCredit='$checkin_credit', CheckInStatus='$checkin_status' WHERE CheckInID='$checkin_id'";
    
    if ($conn->query($sql) === TRUE) {
    
        echo "<script>alert('Check-in updated successfully'); window.location.href = 'check-in_list.php';</script>";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
