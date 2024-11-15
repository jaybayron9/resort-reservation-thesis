<?php
include('../databaseConnection.php');


if (isset($_GET['id'])) {
    $account_id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $account_id";
    $stmt = $conn->query($sql);
    $account = $stmt->fetch_object();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $account_name = $_POST['account_name'];
    $account_lastname = $_POST['account_lastname'];
    $account_address = $_POST['account_address'];
    $account_contact = $_POST['account_contact'];

    $sql = "UPDATE users SET 
                username = '$username', 
                password = '$password', 
                first_name = '$account_name', 
                last_name = '$account_lastname', 
                email_address = '$account_address' , 
                contact_no =  '$account_contact'
            WHERE id = {$_GET['id']}";

    $stmt = $conn->query($sql);

    header("Location: usersManagement.php?message=Account updated successfully!");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="../assets/js/myscripts.js" defer></script>
    <script src="../assets/js/scriptimport.js" crossorigin="anonymous"></script>
    <style>
        /* Additional styles for the admin dashboard */
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
    <img src="../assets/imgs/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>

<nav class="navbar">
    <a href="account_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;" clas>
    <h2>Edit Account</h2>

    <form action="edit_account.php?id=<?php echo $account->id; ?>" method="POST" class="">
        <div>
            <label for="username" class="block">Username:</label>
            <input type="text" name="username" value="<?php echo $account->username; ?>" required><br><br>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password"><br><br>
        </div>
        <div>
            <label for="account_name">Firt Name:</label>
            <input type="text" name="account_name" value="<?php echo $account->first_name; ?>" required><br><br>
        </div>
        <div>
            <label for="account_lastname">Last Name:</label>
            <input type="text" name="account_lastname" value="<?php echo $account->last_name ?>" required><br><br>
        </div>
        <div>
            <label for="account_address">Email Address:</label>
            <input type="text" name="account_address" value="<?php echo $account->email_address; ?>" required><br><br>
        </div>
        <div>
            <label for="account_contact">Contact Number:</label>
            <input type="text" name="account_contact" value="<?php echo $account->contact_no; ?>" required><br><br>
        </div>

        <input type="submit" value="Update Account">
    </form>
</div>

</body>
</html>
