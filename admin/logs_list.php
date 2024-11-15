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
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            margin-top: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .content-header h2 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #A47C2D;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
        }
        .alert-success {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>

<?php include('adminComponents/navigations.php') ?>

<div class="container">
    <h2>Logs List</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Log ID</th>
            <th>User ID</th>
            <th>Role</th>
            <th>Action</th>
            <th>IP Address</th>
            <th>User Agent</th>
        </tr>
        <?php
        // Fetch data from the logs table using PDO
        try {
            $stmt = $conn->query("SELECT * FROM users_logs");
            $logs = $stmt->fetch_all(MYSQLI_ASSOC);

            if (count($logs) > 0) {
                foreach ($logs as $row) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['role']}</td>
                        <td>{$row['action']}</td>
                        <td>{$row['ip_address']}</td>
                        <td>{$row['user_agent']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No logs found.</td></tr>";
            }
        } catch (PDOException $e) {
            echo "Error fetching logs: " . $e->getMessage();
        }
        ?>
    </table>
</div>

</body>
</html>
