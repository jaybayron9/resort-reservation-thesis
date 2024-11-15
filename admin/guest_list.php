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


        table {
            width: 100%;
            margin: 20px auto; 
            border-collapse: collapse; 

        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #A47C2D;
        }
        table th {
            background-color: #A47C2D;
            color: white;
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

        .container{
            position: center;
            width: 90%;
    max-width: 930px;
    margin: 20px auto;
    padding: 20px;
    text-align: center;
    background-color: #f2f2f2;
    border-radius: 10px;            
        }
    </style>
</head>
<body>

<?php include('adminComponents/navigations.php') ?>

<div class="container" style="padding: 20px;">
    <h2>Admin List</h2>
    
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Admin ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Admin Address</th>
            <th>Admin Contact Number</th>
            <th>Actions</th>
        </tr>
        <?php

        try {
      
            $sql = "SELECT * FROM admins"; 
            $stmt = $conn->query($sql);

            if ($stmt) {
                foreach ($stmt->fetch_all(MYSQLI_ASSOC) as $row) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['last_name']}</td>
                        <td>{$row['email_address']}</td>
                        <td>{$row['contact_no']}</td>
                        <td>
                            <a href='edit_admin.php?id={$row['id']}'>Edit</a>
                            <a href='delete_admin.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this admin?\");'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No admins found.</td></tr>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        $pdo = null;
        ?>
    </table>
</div>

<a href="add_admin.php" class="fixed-button">Add Admin</a>

</body>
</html>
