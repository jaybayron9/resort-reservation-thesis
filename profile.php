<?php
include('db_connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

$stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .navbar {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 10px;
            background: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid #ddd;
        }
        .navbar li {
            list-style: none;
            display: inline;
        }
        .navbar a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .navbar a:hover {
            background-color: #A47C2D;
            color: #fff;
        }
        .navbar .dropdown {
            position: relative;
            display: inline-block;
        }
        .navbar .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .navbar .dropdown:hover .dropdown-content {
            display: block;
        }
        .navbar .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .navbar .dropdown-content a:hover {
            background-color: #A47C2D;
            color: white;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container form {
            display: flex;
            flex-direction: column;
        }
        .container label {
            margin: 5px 0;
        }
        .container input {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .container .update-button {
            background-color: #A47C2D;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .container .update-button:hover {
            background-color: #8a5f2e;
        }
    </style>
</head>
<body style="background-image: url('bg.png'); background-size: cover; background-attachment: fixed;">

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
</header>

<nav>
    <ul class="navbar">
        <li><a href="user.php">Dashboard</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="reserve.php">Make a Reservation</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Account Settings</a>
            <div class="dropdown-content">
                <a href="edit_profile.php">Edit Profile</a>
                <a href="current_reservation.php">Current Reservations</a>
                <a href="past_reservation.php">Past Reservations</a>
                <a href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>

<div class="container">
    <h2>Edit Profile</h2>
    <form action="update_profile.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>

        <label for="userfirstname">First Name:</label>
        <input type="text" id="userfirstname" name="userfirstname" value="<?php echo htmlspecialchars($user['userfirstname']); ?>" required>

        <label for="userlastname">Last Name:</label>
        <input type="text" id="userlastname" name="userlastname" value="<?php echo htmlspecialchars($user['userlastname']); ?>" required>

        <label for="userpassword">Password:</label>
        <input type="password" id="userpassword" name="userpassword" value="<?php echo htmlspecialchars($user['user_password']); ?>" required>

        <label for="useraddress">Address:</label>
        <input type="text" id="useraddress" name="useraddress" value="<?php echo htmlspecialchars($user['useraddress']); ?>" required>

        <label for="usercontactnumber">Contact Number:</label>
        <input type="text" id="usercontactnumber" name="usercontactnumber" value="<?php echo htmlspecialchars($user['usercontactnumber']); ?>" required>

        <button type="submit" class="update-button">Update Profile</button>
    </form>
</div>

</body>
</html>
