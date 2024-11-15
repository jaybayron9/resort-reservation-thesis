<?php include('../databaseConnection.php'); ?>
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
            background-image: url('../assets/js/bg.png');
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
    <a href="account_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;">
    <h2>Add New Admin Account</h2>
    <form action="add_admin.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="account_name">First Name:</label>
        <input type="text" name="account_name" required><br><br>

        <label for="account_lastname">Last Name:</label>
        <input type="text" name="account_lastname" required><br><br>

        <label for="account_address">Address:</label>
        <input type="text" name="account_address" required><br><br>

        <label for="account_contact">Contact Number:</label>
        <input type="text" name="account_contact" required><br><br>

        <input type="submit" value="Add Admin">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $account_name = $_POST['account_name'];
        $account_lastname = $_POST['account_lastname'];
        $account_address = $_POST['account_address'];
        $account_contact = $_POST['account_contact'];


        $hashedPassword = md5($password);


        $sql = "INSERT INTO admins (username, password, first_name, last_name, email_address, contact_no)
                VALUES ('$username', '$hashedPassword', '$account_name', '$account_lastname', '$account_address', '$account_contact')";

        if ($conn->query($sql)) {
            header("Location: account_list.php?message=Admin account added successfully!");
            exit();
        } else {
            echo "Error: Could not add admin account. Please try again.";
        }
    }
    ?>
</div>
</body>
</html>
