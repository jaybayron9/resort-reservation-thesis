<?php
include('../databaseConnection.php');

$serviceID = $_GET['id'];

$sql = "SELECT * FROM services WHERE ServicesID = $serviceID";
$stmt = $conn->query($sql); 
$service = $stmt->fetch_object();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $serviceName = $_POST['serviceName'];
    $serviceType = $_POST['serviceType'];
    $servicePrice = $_POST['servicePrice'];
    $serviceDescription = $_POST['serviceDescription'];

    $sql = "UPDATE services SET ServicesName = '$serviceName', ServicesType = '$serviceType', ServicesPrice = '$servicePrice', ServicesDescription = '$serviceDescription' WHERE ServicesID = $serviceID";
    $stmt = $conn->query($sql);

    if ($stmt) {
        header("Location: services_list.php?message=Service updated successfully.");
        exit();
    }
}
$pdo = null;
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
    <img src="../assets/imgs/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
</header>

<nav class="navbar">
    <a href="services_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;">
    <h2>Edit Service</h2>
    <form method="POST" action="">
        <label for="serviceName">Service Name:</label>
        <input type="text" name="serviceName" value="<?php echo htmlspecialchars($service->ServicesName); ?>" required><br>

        <label for="serviceType">Service Type:</label>
        <input type="text" name="serviceType" value="<?php echo htmlspecialchars($service->ServicesType); ?>" required><br>

        <label for="servicePrice">Service Price:</label>
        <input type="number" name="servicePrice" value="<?php echo htmlspecialchars($service->ServicesPrice); ?>" required><br>

        <label for="serviceDescription">Service Description:</label>
        <input type="text" name="serviceDescription" value="<?php echo htmlspecialchars($service->ServicesDescription); ?>"><br>

        <input type="submit" value="Update Service">
    </form>
</div>
</body>
</html>
