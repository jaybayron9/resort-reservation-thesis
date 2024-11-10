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

    $services_name = mysqli_real_escape_string($conn, $_POST['services_name']);
    $services_type = mysqli_real_escape_string($conn, $_POST['services_type']);
    $services_price = mysqli_real_escape_string($conn, $_POST['services_price']);
    $services_description = mysqli_real_escape_string($conn, $_POST['services_description']);


    $sql = "INSERT INTO services (ServicesName, ServicesType, ServicesPrice, ServicesDescription)
    VALUES ('$services_name', '$services_type', '$services_price', '$services_description')";

    if ($conn->query($sql) === TRUE) {

        $conn->close();

        header("Location: services_list.php");
        exit();
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
    <h1>Add Services</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="services_name">Services Name:</label><br>
        <input type="text" id="services_name" name="services_name" required><br><br>
        <label for="services_type">Services Type:</label><br>
        <input type="text" id="services_type" name="services_type" required><br><br>
        <label for="services_price">Services Price:</label><br>
        <input type="number" id="services_price" name="services_price" required><br><br>
        <label for="services_description">Services Description:</label><br>
        <textarea id="services_description" name="services_description" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
