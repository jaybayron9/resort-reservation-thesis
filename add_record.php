<?php
ob_start();

include('db_connection.php');
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
    <a href="record_list.php">Back</a>
</nav>

    <div class="container" style="padding: 20px;">
        <h2>Add New Record</h2>
        <form action="add_record.php" method="POST">
            <label for="account_id">Account ID:</label>
            <input type="number" name="account_id" required><br><br>

            <label for="services_id">Services ID:</label>
            <input type="number" name="services_id" required><br><br>

            <label for="guest_first_name">Guest First Name:</label>
            <input type="text" name="guest_first_name" required><br><br>

            <label for="guest_last_name">Guest Last Name:</label>
            <input type="text" name="guest_last_name" required><br><br>

            <label for="guest_contact">Guest Contact Number:</label>
            <input type="text" name="guest_contact" required><br><br>

            <label for="room_name">Room Name:</label>
            <input type="text" name="room_name" required><br><br>

            <label for="room_size">Room Size:</label>
            <input type="number" name="room_size" required><br><br>

            <label for="room_type">Room Type:</label>
            <input type="text" name="room_type" required><br><br>

            <label for="guest_email">Guest Email:</label>
            <input type="email" name="guest_email" required><br><br>

            <label for="number_of_adult">Number of Adults:</label>
            <input type="number" name="number_of_adult" required><br><br>

            <label for="number_of_kids">Number of Kids:</label>
            <input type="number" name="number_of_kids" required><br><br>

            <label for="reservation_date">Reservation Date:</label>
            <input type="date" name="reservation_date" required><br><br>

            <input type="submit" value="Add Record">
        </form>
        <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $account_id = $_POST['account_id'];
    $services_id = $_POST['services_id'];
    $guest_first_name = $_POST['guest_first_name'];
    $guest_last_name = $_POST['guest_last_name'];
    $guest_contact = $_POST['guest_contact'];
    $room_name = $_POST['room_name'];
    $room_size = $_POST['room_size'];
    $room_type = $_POST['room_type'];
    $guest_email = $_POST['guest_email'];
    $number_of_adult = $_POST['number_of_adult'];
    $number_of_kids = $_POST['number_of_kids'];
    $reservation_date = $_POST['reservation_date'];

    $sql = "INSERT INTO records (AccountID, ServicesID, GuestFirstName, GuestLastName, GuestContactNumber, RoomName, RoomSize, RoomType, GuestEmail, NumberOfAdult, NumberOfKids, ReservationDate)
            VALUES (:account_id, :services_id, :guest_first_name, :guest_last_name, :guest_contact, :room_name, :room_size, :room_type, :guest_email, :number_of_adult, :number_of_kids, :reservation_date)";
    
    try {
        $stmt = $pdo->prepare($sql);
    

        $stmt->bindParam(':account_id', $account_id, PDO::PARAM_INT);
        $stmt->bindParam(':services_id', $services_id, PDO::PARAM_INT);
        $stmt->bindParam(':guest_first_name', $guest_first_name, PDO::PARAM_STR);
        $stmt->bindParam(':guest_last_name', $guest_last_name, PDO::PARAM_STR);
        $stmt->bindParam(':guest_contact', $guest_contact, PDO::PARAM_STR);
        $stmt->bindParam(':room_name', $room_name, PDO::PARAM_STR);
        $stmt->bindParam(':room_size', $room_size, PDO::PARAM_INT);
        $stmt->bindParam(':room_type', $room_type, PDO::PARAM_STR);
        $stmt->bindParam(':guest_email', $guest_email, PDO::PARAM_STR);
        $stmt->bindParam(':number_of_adult', $number_of_adult, PDO::PARAM_INT);
        $stmt->bindParam(':number_of_kids', $number_of_kids, PDO::PARAM_INT);
        $stmt->bindParam(':reservation_date', $reservation_date, PDO::PARAM_STR);
    

        if ($stmt->execute()) {

            header("Location: record_list.php?message=Record added successfully!");
            exit(); 
        } else {
            echo "Error: Could not execute query.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

ob_end_flush();
?>
    </div>
</body>
</html>
