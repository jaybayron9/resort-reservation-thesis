<?php include('../databaseConnection.php'); ?>
<?php

if (isset($_GET['id'])) {
    $record_id = $_GET['id'];
    $sql = "SELECT * FROM records WHERE RecordsID = '$record_id'";
    $stmt = $conn->query($sql);
    $record = $stmt->fetch_object();
}

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

    $sql = "UPDATE records SET 
            AccountID = '$account_id', 
            ServicesID = '$services_id', 
            GuestFirstName = '$guest_first_name', 
            GuestLastName = '$guest_last_name', 
            GuestContactNumber = '$guest_contact', 
            RoomName = '$room_name', 
            RoomSize = $room_size, 
            RoomType = '$room_type', 
            GuestEmail = '$guest_email', 
            NumberOfAdult = '$number_of_adult', 
            NumberOfKids = '$number_of_kids', 
            ReservationDate = '$reservation_date'
            WHERE RecordsID = $record_id";

    $query = $conn->query($sql);

    if ($query) {
        header("Location: record_list.php?message=Record updated successfully!");
        exit();
    } else {
        echo "Error updating record.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Beatriz Rafaela Resort</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/myscripts.js" defer></script>
    <script src="../assets/js/scriptimport.js" crossorigin="anonymous"></script>
    <style>

        body {
            background-image: url('../assets/imgs/bg.png');
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
    <img src="../assets/imgs/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>

<nav class="navbar">
    <a href="record_list.php">Back</a>
</nav>

    <div class="container" style="padding: 20px;">
        <h2>Edit Record</h2>
        
        <form action="edit_record.php?id=<?php echo $record->RecordsID; ?>" method="POST">
            <label for="account_id">Account ID:</label>
            <input type="number" name="account_id" value="<?php echo $record->AccountID; ?>" required><br><br>

            <label for="services_id">Services ID:</label>
            <input type="number" name="services_id" value="<?php echo $record->ServicesID; ?>" required><br><br>

            <label for="guest_first_name">Guest First Name:</label>
            <input type="text" name="guest_first_name" value="<?php echo $record->GuestFirstName; ?>" required><br><br>

            <label for="guest_last_name">Guest Last Name:</label>
            <input type="text" name="guest_last_name" value="<?php echo $record->GuestLastName; ?>" required><br><br>

            <label for="guest_contact">Guest Contact Number:</label>
            <input type="text" name="guest_contact" value="<?php echo $record->GuestContactNumber; ?>" required><br><br>

            <label for="room_name">Room Name:</label>
            <input type="text" name="room_name" value="<?php echo $record->RoomName; ?>" required><br><br>

            <label for="room_size">Room Size:</label>
            <input type="number" name="room_size" value="<?php echo $record->RoomSize; ?>" required><br><br>

            <label for="room_type">Room Type:</label>
            <input type="text" name="room_type" value="<?php echo $record->RoomType; ?>" required><br><br>

            <label for="guest_email">Guest Email:</label>
            <input type="email" name="guest_email" value="<?php echo $record->GuestEmail; ?>" required><br><br>

            <label for="number_of_adult">Number of Adults:</label>
            <input type="number" name="number_of_adult" value="<?php echo $record->NumberOfAdult; ?>" required><br><br>

            <label for="number_of_kids">Number of Kids:</label>
            <input type="number" name="number_of_kids" value="<?php echo $record->NumberOfKids; ?>" required><br><br>

            <label for="reservation_date">Reservation Date:</label>
            <input type="date" name="reservation_date" value="<?php echo $record->ReservationDate; ?>" required><br><br>

            <input type="submit" value="Update Record">
        </form>
    </div>
</body>
</html>
