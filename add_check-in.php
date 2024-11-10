<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beatrizrafaelaresort";
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $reservation_id = mysqli_real_escape_string($conn, $_POST['reservation_id']);
    $guest_id = mysqli_real_escape_string($conn, $_POST['guest_id']);
    $room_id = mysqli_real_escape_string($conn, $_POST['room_id']);
    $check_in_date = mysqli_real_escape_string($conn, $_POST['check_in_date']);
    $check_out_date = mysqli_real_escape_string($conn, $_POST['check_out_date']);
    $number_of_adults = mysqli_real_escape_string($conn, $_POST['number_of_adults']);
    $number_of_kids = mysqli_real_escape_string($conn, $_POST['number_of_kids']);
    $check_in_total_amount = mysqli_real_escape_string($conn, $_POST['check_in_total_amount']);
    $check_in_payment = mysqli_real_escape_string($conn, $_POST['check_in_payment']);
    $check_in_credit = mysqli_real_escape_string($conn, $_POST['check_in_credit']);
    $check_in_status = mysqli_real_escape_string($conn, $_POST['check_in_status']);


    $sql = "INSERT INTO check-in (ReservationID, GuestID, RoomID, CheckInDate, CheckOutDate, NumberOfAdults, NumberOfKids, CheckInTotalAmount, CheckInPayment, CheckInCredit, CheckInStatus)
    VALUES ('$reservation_id', '$guest_id', '$room_id', '$check_in_date', '$check_out_date', '$number_of_adults', '$number_of_kids', '$check_in_total_amount', '$check_in_payment', '$check_in_credit', '$check_in_status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

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
	<h2>Add Check-In</h2>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="reservation_id">Reservation ID:</label><br>
		<input type="text" id="reservation_id" name="reservation_id"><br><br>
    
		<label for="guest_id">Guest ID:</label><br>
		<input type="text" id="guest_id" name="guest_id"><br><br>
    
		<label for="room_id">Room ID:</label><br>
		<input type="text" id="room_id" name="room_id"><br><br>
    
		<label for="check_in_date">Check-In Date:</label><br>
		<input type="date" id="check_in_date" name="check_in_date"><br><br>
    
		<label for="check_out_date">Check-Out Date:</label><br>
		<input type="date" id="check_out_date" name="check_out_date"><br><br>
    
		<label for="number_of_adults">Number of Adults:</label><br>
		<input type="number" id="number_of_adults" name="number_of_adults"><br><br>
    
		<label for="number_of_kids">Number of Kids:</label><br>
		<input type="number" id="number_of_kids" name="number_of_kids"><br><br>
    
		<label for="check_in_total_amount">Total Amount:</label><br>
		<input type="text" id="check_in_total_amount" name="check_in_total_amount"><br><br>
    
		<label for="check_in_payment">Payment Type:</label><br>
		<select id="check_in_payment" name="check_in_payment">
        <option value="Cash">Cash</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
    </select><br><br>
    
    <label for="check_in_credit">Credit:</label><br>
    <input type="text" id="check_in_credit" name="check_in_credit"><br><br>
    
    <label for="check_in_status">Status:</label><br>
    <select id="check_in_status" name="check_in_status">
        <option value="Checked In">Checked In</option>
        <option value="Checked Out">Checked Out</option>
        <option value="Cancelled">Cancelled</option>
    </select><br><br>
    
    <input type="submit" value="Submit">
</form>
</div>

</body>
</html>
