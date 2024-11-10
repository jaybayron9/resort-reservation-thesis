<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beatrizrafaelaresort";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $checkOutID = $_GET['id'];


$sql = "SELECT * FROM `check-out` WHERE CheckOutID='$checkOutID'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $checkInID = $row['CheckInID'];
    $checkOutBill = $row['CheckOutBill'];
    $checkOutPayment = $row['CheckOutPayment'];
} else {
    echo "Record not found";
    exit();
}
} else {
    echo "ID not specified";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $checkInID = mysqli_real_escape_string($conn, $_POST['checkin_id']);
    $checkOutBill = mysqli_real_escape_string($conn, $_POST['checkout_bill']);
    $checkOutPayment = mysqli_real_escape_string($conn, $_POST['checkout_payment']);

  
    $sql = "UPDATE `check-out` SET CheckInID='$checkInID', CheckOutBill='$checkOutBill', CheckOutPayment='$checkOutPayment' WHERE CheckOutID='$checkOutID'";

    if ($conn->query($sql) === TRUE) {

        $conn->close();

        header("Location: check-out_list.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
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
    <h1>Edit Check-out</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . $checkOutID;?>">
        <label for="checkin_id">CheckIn ID:</label><br>
        <input type="text" id="checkin_id" name="checkin_id" value="<?php echo $checkInID; ?>" required><br><br>
        <label for="checkout_bill">CheckOut Bill:</label><br>
        <input type="text" id="checkout_bill" name="checkout_bill" value="<?php echo $checkOutBill; ?>" required><br><br>
        <label for="checkout_payment">CheckOut Payment:</label><br>
        <input type="text" id="checkout_payment" name="checkout_payment" value="<?php echo $checkOutPayment; ?>" required><br><br>
        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>
