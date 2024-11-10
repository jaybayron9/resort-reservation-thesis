<?php

include('db_connection.php');


if (isset($_GET['id'])) {
    $checkOutID = intval($_GET['id']);
    try {
        $sql = "SELECT * FROM `check_out` WHERE CheckOutID = :checkOutID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':checkOutID', $checkOutID, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            $checkOut = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            echo "Error fetching record.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $checkInID = $_POST['CheckInID'];
    $checkOutBill = $_POST['CheckOutBill'];
    $checkOutPayment = $_POST['CheckOutPayment'];


    try {
        $updateSql = "UPDATE `check_out` SET CheckInID = :checkInID, CheckOutBill = :checkOutBill, CheckOutPayment = :checkOutPayment WHERE CheckOutID = :checkOutID";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->bindParam(':checkInID', $checkInID, PDO::PARAM_INT);
        $updateStmt->bindParam(':checkOutBill', $checkOutBill, PDO::PARAM_INT);
        $updateStmt->bindParam(':checkOutPayment', $checkOutPayment, PDO::PARAM_STR);
        $updateStmt->bindParam(':checkOutID', $checkOutID, PDO::PARAM_INT);
        if ($updateStmt->execute()) {
            header("Location: check-out_list.php?message=Record updated successfully");
            exit();
        } else {
            echo "Error updating record.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

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
    <a href="check-out_list.php">Back</a>
</nav>

<div class="container" style="padding: 20px;">
<h2>Edit Check-out</h2>

<form method="POST">
    <label for="CheckInID">Check In ID:</label>
    <input type="number" name="CheckInID" value="<?php echo htmlspecialchars($checkOut['CheckInID']); ?>" required>
    <br>

    <label for="CheckOutBill">Check Out Bill:</label>
    <input type="number" name="CheckOutBill" value="<?php echo htmlspecialchars($checkOut['CheckOutBill']); ?>" required>
    <br>

    <label for="CheckOutPayment">Check Out Payment:</label>
    <input type="text" name="CheckOutPayment" value="<?php echo htmlspecialchars($checkOut['CheckOutPayment']); ?>" required>
    <br>

    <input type="submit" value="Update">
	</form>
	</div>
</body>
</html>
