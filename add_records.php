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
    <h2>Add Records</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="account_id">Account ID:</label><br>
        <input type="text" id="account_id" name="account_id"><br>
        
        <label for="services_id">Services ID:</label><br>
        <input type="text" id="services_id" name="services_id"><br>
        
        <label for="guest_first_name">Guest First Name:</label><br>
        <input type="text" id="guest_first_name" name="guest_first_name"><br>
        
        <label for="guest_last_name">Guest Last Name:</label><br>
        <input type="text" id="guest_last_name" name="guest_last_name"><br>
        
        <label for="guest_contact_number">Guest Contact Number:</label><br>
        <input type="text" id="guest_contact_number" name="guest_contact_number"><br>
        
        <label for="room_name">Room Name:</label><br>
        <input type="text" id="room_name" name="room_name"><br>
        
        <label for="room_size">Room Size:</label><br>
        <input type="text" id="room_size" name="room_size"><br>
        
        <label for="room_type">Room Type:</label><br>
        <input type="text" id="room_type" name="room_type"><br>
        
        <label for="guest_email">Guest Email:</label><br>
        <input type="text" id="guest_email" name="guest_email"><br>
        
        <label for="number_of_adult">Number of Adults:</label><br>
        <input type="text" id="number_of_adult" name="number_of_adult"><br>
        
        <label for="number_of_kids">Number of Kids:</label><br>
        <input type="text" id="number_of_kids" name="number_of_kids"><br>
        
        <label for="reservation_date">Reservation Date:</label><br>
        <input type="text" id="reservation_date" name="reservation_date"><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beatrizrafaelaresort";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $account_id = mysqli_real_escape_string($conn, $_POST['account_id']);
    $services_id = mysqli_real_escape_string($conn, $_POST['services_id']);
    $guest_first_name = mysqli_real_escape_string($conn, $_POST['guest_first_name']);
    $guest_last_name = mysqli_real_escape_string($conn, $_POST['guest_last_name']);
    $guest_contact_number = mysqli_real_escape_string($conn, $_POST['guest_contact_number']);
    $room_name = mysqli_real_escape_string($conn, $_POST['room_name']);
    $room_size = mysqli_real_escape_string($conn, $_POST['room_size']);
    $room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
    $guest_email = mysqli_real_escape_string($conn, $_POST['guest_email']);
    $number_of_adults = mysqli_real_escape_string($conn, $_POST['number_of_adults']);
    $number_of_kids = mysqli_real_escape_string($conn, $_POST['number_of_kids']);
    $reservation_date = mysqli_real_escape_string($conn, $_POST['reservation_date']);


    $sql = "INSERT INTO records (AccountID, ServicesID, GuestFirstName, GuestLastName, GuestContactNumber, RoomName, RoomSize, RoomType, GuestEmail, NumberOfAdult, NumberOfKids, ReservationDate)
    VALUES ('$account_id', '$services_id', '$guest_first_name', '$guest_last_name', '$guest_contact_number', '$room_name', '$room_size', '$room_type', '$guest_email', '$number_of_adults', '$number_of_kids', '$reservation_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
