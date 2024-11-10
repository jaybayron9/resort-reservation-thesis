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
    <a href="account_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;">
    <h2>Add New Account</h2>
    <form action="add_account.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <label for="account_name">Account First Name:</label>
        <input type="text" name="account_name" required><br><br>

        <label for="account_lastname">Account Last Name:</label>
        <input type="text" name="account_lastname" required><br><br>

        <label for="account_address">Account Address:</label>
        <input type="text" name="account_address" required><br><br>

        <label for="account_contact">Account Contact Number:</label>
        <input type="text" name="account_contact" required><br><br>

        <label for="account_type">Account Type:</label>
        <input type="text" name="account_type" required><br><br>

        <label for="account_status">Account Status:</label>
        <input type="text" name="account_status" required><br><br>

        <input type="submit" value="Add Account">
    </form>

    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('db_connection.php');

    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_name = $_POST['account_name'];
    $account_lastname = $_POST['account_lastname']; // New last name field
    $account_address = $_POST['account_address'];
    $account_contact = $_POST['account_contact'];
    $account_type = $_POST['account_type'];
    $account_status = $_POST['account_status'];

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Determine the table to insert into based on account_type
    if (strtolower($account_type) == 'admin') {
        // Insert into admin table
        $sql = "INSERT INTO admin (admin_username, admin_password, adminfirstname, adminlastname, adminaddress, admincontactnumber)
                VALUES (:username, :password, :account_name, :account_lastname, :account_address, :account_contact)";
    } else if (strtolower($account_type) == 'user') {
        // Insert into user table
        $sql = "INSERT INTO user (username, user_password, userfirstname, userlastname, useraddress, usercontactnumber, account_status)
                VALUES (:username, :password, :account_name, :account_lastname, :account_address, :account_contact, :account_status)";
    } else {
        echo "Error: Invalid account type. Please choose 'admin' or 'user'.";
        exit();
    }

    // Prepare the SQL statement using PDO
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);  // Store hashed password
    $stmt->bindParam(':account_name', $account_name);
    $stmt->bindParam(':account_lastname', $account_lastname); // Bind last name
    $stmt->bindParam(':account_address', $account_address);
    $stmt->bindParam(':account_contact', $account_contact);

    if (strtolower($account_type) == 'user') {
        // Bind the account_status parameter only if it's a user
        $stmt->bindParam(':account_status', $account_status);
    }

    // Execute the query
    if ($stmt->execute()) {
        header("Location: account_list.php?message=Account added successfully!");
        exit();
    } else {
        echo "Error: Could not add account. Please try again.";
    }
}
?>
</div>
</body>
</html>
