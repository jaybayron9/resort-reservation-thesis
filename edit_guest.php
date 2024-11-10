<?php
// Include database connection
include('db_connection.php');

// Initialize variables for form data
$guestID = "";
$firstName = "";
$lastName = "";
$address = "";
$contactNumber = "";

// Check if an ID is provided
if (isset($_GET['id'])) {
    $guestID = intval($_GET['id']);

    // Fetch the current guest data
    $sql = "SELECT * FROM guest WHERE GuestID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $guestID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $firstName = $row['GuestFirstName'];
        $lastName = $row['GuestLastName'];
        $address = $row['GuestAddress'];
        $contactNumber = $row['GuestContactNumber'];
    } else {
        echo "Guest not found.";
        exit();
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $contactNumber = intval($_POST['contactNumber']);

    // Prepare and execute the SQL statement
    $sql = "UPDATE guest SET GuestFirstName = ?, GuestLastName = ?, GuestAddress = ?, GuestContactNumber = ? WHERE GuestID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $firstName, $lastName, $address, $contactNumber, $guestID);

    if ($stmt->execute()) {
        header("Location: guest_list.php?message=Guest updated successfully");
        exit();
    } else {
        echo "Error updating guest: " . $conn->error;
    }
}

$conn->close();
?>

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
    <a href="guest_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;">
    <h2>Edit Guest</h2>
    <form method="post" action="">
        <label for="firstName">First Name:</label>
        <input type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($firstName); ?>" required>
        <br>

        <label for="lastName">Last Name:</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($lastName); ?>" required>
        <br>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($address); ?>" required>
        <br>

        <label for="contactNumber">Contact Number:</label>
        <input type="number" name="contactNumber" id="contactNumber" value="<?php echo htmlspecialchars($contactNumber); ?>" required>
        <br>

        <input type="submit" value="Update Guest">
    </form>
	</div>
</body>
</html>
