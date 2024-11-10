<?php
if (isset($_POST['make_payment'])) {
    $reservation_id = $_POST['reservation_id'];
    $guest_id = $_POST['guest_id'];
    $room_id = $_POST['room_id'];
    $payment_amount = $_POST['payment_amount'];
    $payment_method = $_POST['payment_method'];

    // Insert into payments table
    $query = "INSERT INTO payments (ReservationID, GuestID, RoomID, PaymentAmount, PaymentMethod, PaymentDate, Username, AccountName, PaymentStatus)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$reservation_id, $guest_id, $room_id, $payment_amount, $payment_method, date('Y-m-d'), $username, 'Guest', 'Paid']);

    echo "Payment successful!";
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
    <style>
        body {
            background-image: url('bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            color: #A47C2D;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #A47C2D;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.7); /* 70% opacity white */
        }
        input[type="text"], input[type="number"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            box-sizing: border-box;
            background-color: #A47C2D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #874E18;
        }
        header {
            background-color: beige;
            color: black;
            padding: 10px;
            text-align: center;
            align-items: center; 
        }
        .logo {
            width: 50px; 
            height: auto;
            margin-right: 10px; 
        }
        nav {
            background-color: whitesmoke;
            padding: 10px;
        }
        .navbar {
            list-style-type: none;
            margin: 0 auto; 
            padding: 0;
            text-align: center; 
        }
        .navbar li {
            display: inline-block; 
            margin-right: 10px;
        }
        .navbar li a {
            color: black;
            text-decoration: none;
        }
        .navbar li a:hover {
            color: gray;
        }
    </style>
</head>
<body>

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>

<nav>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="activities.php">Activities</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="plans.php">Plans & Pricing</a></li>
        <li><a href="reservation.php">Make a Reservation</a></li>
    </ul>
</nav>

<div class="container">
    <a href="reservation.php" style="padding: 10px; display: inline-block; text-decoration: none; background-color: #A47C2D; color: white; border-radius: 5px;">Back</a>
    <h2>Payment Form</h2>
    <form method="post" action="process_payment.php">
        <label for="PaymentAmount">Payment Amount:</label><br>
        <input type="number" id="PaymentAmount" name="PaymentAmount" required><br>

        <label for="PaymentMethod">Payment Method:</label><br>
        <select id="PaymentMethod" name="PaymentMethod" required>
            <option value="GCASH">GCASH</option>
            <option value="CASH">CASH</option>
        </select><br>

        <label for="PaymentDate">Payment Date:</label><br>
        <input type="date" id="PaymentDate" name="PaymentDate" required><br>

        <label for="Username">Username:</label><br>
        <input type="text" id="Username" name="Username" required><br>

        <label for="AccountName">Account Name:</label><br>
        <input type="text" id="AccountName" name="AccountName" required><br>

        <input type="submit" value="Next">
    </form>
</div>

</body>
</html>
