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


        table {
            width: 100%;
            margin: 20px auto; 
            border-collapse: collapse; 

        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #A47C2D; /* Border color */
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

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>

<nav class="navbar">
    <a href="ADMIN.php">Admin</a>
    <a href="reservation_list.php">Manage Reservations</a>
    <a href="account_list.php">Manage Users</a>
    <a href="record_list.php">Manage Records</a>
    <a href="check-in_list.php">Manage Check-ins</a>
    <a href="check-out_list.php">Manage Check-outs</a>
    <a href="guest_list.php">Manage Admin Account</a>
    <a href="room_list.php">Manage Rooms</a>
    <a href="services_list.php">Manage Services</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="container" style="padding: 20px;">
    <h2>Services List</h2>
    
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Service ID</th>
            <th>Service Name</th>
            <th>Service Type</th>
            <th>Service Price</th>
            <th>Service Description</th>
            <th>Actions</th>
        </tr>
        <?php
    
        include('db_connection.php');  

        $sql = "SELECT * FROM services";
        $stmt = $pdo->prepare($sql);  
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
       
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              
                $serviceID = isset($row['ServicesID']) ? $row['ServicesID'] : 'N/A';
                $serviceName = isset($row['ServicesName']) ? $row['ServicesName'] : 'N/A';
                $serviceType = isset($row['ServicesType']) ? $row['ServicesType'] : 'N/A';
                $servicePrice = isset($row['ServicesPrice']) ? $row['ServicesPrice'] : 'N/A';
                $serviceDescription = isset($row['ServicesDescription']) ? $row['ServicesDescription'] : 'N/A';

                echo "<tr>
                    <td>{$serviceID}</td>
                    <td>{$serviceName}</td>
                    <td>{$serviceType}</td>
                    <td>{$servicePrice}</td>
                    <td>{$serviceDescription}</td>
                    <td>
                        <a href='edit_service.php?id={$serviceID}'>Edit</a>
                        <a href='delete_service.php?id={$serviceID}' onclick='return confirm(\"Are you sure you want to delete this service?\");'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No services found.</td></tr>";
        }

        ?>
    </table>
</div>


<a href="add_service.php" class="fixed-button">Add Service</a>

</body>
</html>
