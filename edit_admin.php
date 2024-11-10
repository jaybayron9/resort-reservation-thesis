<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];
    $sql = "SELECT * FROM admin WHERE id = :admin_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['admin_id' => $admin_id]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    $admin_firstname = $_POST['admin_firstname'];
    $admin_lastname = $_POST['admin_lastname']; 
    $admin_address = $_POST['admin_address'];
    $admin_contact = $_POST['admin_contact'];

    $sql = "UPDATE admin SET 
                admin_username = :admin_username, 
                admin_password = :admin_password, 
                adminfirstname = :admin_firstname, 
                adminlastname = :admin_lastname, 
                adminaddress = :admin_address, 
                admincontactnumber = :admin_contact 
            WHERE id = :admin_id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'admin_username' => $admin_username,
        'admin_password' => $admin_password,
        'admin_firstname' => $admin_firstname,
        'admin_lastname' => $admin_lastname,  
        'admin_address' => $admin_address,
        'admin_contact' => $admin_contact,
        'admin_id' => $admin_id
    ]);

    header("Location: guest_list.php?message=Admin updated successfully!");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Admin</title>
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
    <a href="admin_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;">
    <h2>Edit Admin</h2>

    <form action="edit_admin.php?id=<?php echo $admin['id']; ?>" method="POST">
        <label for="admin_username">Username:</label>
        <input type="text" name="admin_username" value="<?php echo $admin['admin_username']; ?>" required><br><br>

        <label for="admin_password">Password:</label>
        <input type="password" name="admin_password" value="<?php echo $admin['admin_password']; ?>" required><br><br>

        <label for="admin_firstname">First Name:</label>
        <input type="text" name="admin_firstname" value="<?php echo $admin['adminfirstname']; ?>" required><br><br>

        <label for="admin_lastname">Last Name:</label>
        <input type="text" name="admin_lastname" value="<?php echo $admin['adminlastname']; ?>" required><br><br>

        <label for="admin_address">Address:</label>
        <input type="text" name="admin_address" value="<?php echo $admin['adminaddress']; ?>" required><br><br>

        <label for="admin_contact">Contact Number:</label>
        <input type="text" name="admin_contact" value="<?php echo $admin['admincontactnumber']; ?>" required><br><br>

        <input type="submit" value="Update Admin">
    </form>
</div>

</body>
</html>
