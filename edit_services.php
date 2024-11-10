<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beatrizrafaelaresort";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $services_id = mysqli_real_escape_string($conn, $_POST['services_id']);
    $services_name = mysqli_real_escape_string($conn, $_POST['services_name']);
    $services_type = mysqli_real_escape_string($conn, $_POST['services_type']);
    $services_price = mysqli_real_escape_string($conn, $_POST['services_price']);
    $services_description = mysqli_real_escape_string($conn, $_POST['services_description']);


    $sql = "UPDATE services SET ServicesName='$services_name', ServicesType='$services_type',
    ServicesPrice='$services_price', ServicesDescription='$services_description' WHERE ServicesID='$services_id'";

    if ($conn->query($sql) === TRUE) {

        $conn->close();

        header("Location: services_list.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


if (isset($_GET['id'])) {
    $services_id = $_GET['id'];


    $sql = "SELECT * FROM services WHERE ServicesID='$services_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $services_name = $row['ServicesName'];
        $services_type = $row['ServicesType'];
        $services_price = $row['ServicesPrice'];
        $services_description = $row['ServicesDescription'];
    } else {
        echo "Services not found";
        $conn->close();
        exit();
    }
} else {
    echo "ID not provided";
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Services</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/myscripts.js" defer></script>
    <script src="scripts/scriptimport.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: #f0f0f0;">

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
	<a href="login.php" class="login-button">Login</a>
</header>

<nav>
    <ul class="navbar">
        <li><a href="services_list.php">Back to Services List</a></li>
    </ul>
</nav>

<div class="container">
    <h1>Edit Services</h1>
    <form method="post" action="">
        <input type="hidden" name="services_id" value="<?php echo $services_id; ?>">
        <label for="services_name">Services Name:</label>
        <input type="text" id="services_name" name="services_name" value="<?php echo $services_name; ?>" required><br><br>
        <label for="services_type">Services Type:</label>
        <input type="text" id="services_type" name="services_type" value="<?php echo $services_type; ?>" required><br><br>
        <label for="services_price">Services Price:</label>
        <input type="text" id="services_price" name="services_price" value="<?php echo $services_price; ?>" required><br><br>
        <label for="services_description">Services Description:</label><br>
        <textarea id="services_description" name="services_description" required><?php echo $services_description; ?></textarea><br><br>
        <input type="submit" value="Update">
    </form>
</div>
</body>
</html>
