<?php
include('db_connection.php');

$roomName = "";
$bedFrame = "";
$goodFor = "";
$view = "";
$roomStatus = "";
$roomRates = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $roomName = $_POST['roomName'];
    $bedFrame = $_POST['bedFrame'];
    $goodFor = $_POST['goodFor'];
    $view = $_POST['view'];
    $roomStatus = $_POST['roomStatus'];
    $roomRates = floatval($_POST['roomRates']);

    // Insert query
    $sql = "INSERT INTO room (RoomName, BedFrame, GoodFor, View, RoomStatus, RoomRates) VALUES (:roomName, :bedFrame, :goodFor, :view, :roomStatus, :roomRates)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':roomName', $roomName);
    $stmt->bindParam(':bedFrame', $bedFrame);
    $stmt->bindParam(':goodFor', $goodFor);
    $stmt->bindParam(':view', $view);
    $stmt->bindParam(':roomStatus', $roomStatus);
    $stmt->bindParam(':roomRates', $roomRates);

    // Execute query and handle success or failure
    if ($stmt->execute()) {
        header("Location: room_list.php?message=Room added successfully");
        exit();
    } else {
        echo "Error adding room: " . $stmt->errorInfo()[2];
    }
}

$conn = null;
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
    <a href="room_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;">
    <h2>Add Room</h2>
    <form method="post" action="">
        <label for="roomName">Room Name:</label>
        <input type="text" name="roomName" id="roomName" required>
        <br>

        <label for="bedFrame">Bed Frame:</label>
        <input type="text" name="bedFrame" id="bedFrame" required>
        <br>

        <label for="goodFor">Good For:</label>
        <input type="text" name="goodFor" id="goodFor" required>
        <br>

        <label for="view">View:</label>
        <input type="text" name="view" id="view" required>
        <br>

        <label for="roomRates">Room Rates:</label>
        <input type="number" step="0.01" name="roomRates" id="roomRates" required>
        <br>

        <label for="roomStatus">Room Status:</label>
        <select name="roomStatus" id="roomStatus" required>
            <option value="Available">Available</option>
            <option value="Booked">Booked</option>
            <option value="Under Maintenance">Under Maintenance</option>
        </select>
        <br>

        <input type="submit" value="Add Room">
    </form>
</div>

</body>
</html>