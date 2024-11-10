<?php
include('db_connection.php');

// Fetch the user details
if (isset($_GET['id'])) {
    $account_id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE userid = :account_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['account_id' => $account_id]);
    $account = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_name = $_POST['account_name'];
    $account_lastname = $_POST['account_lastname']; // New last name field
    $account_address = $_POST['account_address'];
    $account_contact = $_POST['account_contact'];

    // Update SQL query to include last name
    $sql = "UPDATE user SET 
                username = :username, 
                user_password = :password, 
                userfirstname = :account_name, 
                userlastname = :account_lastname, 
                useraddress = :account_address, 
                usercontactnumber = :account_contact 
            WHERE userid = :account_id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'username' => $username,
        'password' => $password,
        'account_name' => $account_name,
        'account_lastname' => $account_lastname,  // Binding last name
        'account_address' => $account_address,
        'account_contact' => $account_contact,
        'account_id' => $account_id
    ]);

    header("Location: account_list.php?message=Account updated successfully!");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Account</title>
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
            overflow-y: auto; /* Allow scrolling */
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
    <h2>Edit Account</h2>

    <form action="edit_account.php?id=<?php echo $account['userid']; ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $account['username']; ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" value="<?php echo $account['user_password']; ?>" required><br><br>

        <label for="account_name">Account Name:</label>
        <input type="text" name="account_name" value="<?php echo $account['userfirstname']; ?>" required><br><br>

        <label for="account_lastname">Account Last Name:</label>
        <input type="text" name="account_lastname" value="<?php echo $account['userlastname']; ?>" required><br><br>

        <label for="account_address">Account Address:</label>
        <input type="text" name="account_address" value="<?php echo $account['useraddress']; ?>" required><br><br>

        <label for="account_contact">Account Contact Number:</label>
        <input type="text" name="account_contact" value="<?php echo $account['usercontactnumber']; ?>" required><br><br>

        <input type="submit" value="Update Account">
    </form>
</div>

</body>
</html>
