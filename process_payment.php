<!DOCTYPE html>
<html>
<head>
    <title>Process Payment</title>
    <style>
        body {
            background-image: url('bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            color: #A47C2D;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #A47C2D;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.7); /* 70% opacity white */
        }
    </style>
</head>
<body>

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
    $PaymentAmount = $_POST["PaymentAmount"];
    $PaymentMethod = $_POST["PaymentMethod"];
    $PaymentDate = $_POST["PaymentDate"];
    $Username = $_POST["Username"];
    $AccountName = $_POST["AccountName"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO payments (PaymentAmount, PaymentMethod, PaymentDate, Username, AccountName) VALUES (?, ?, ?, ?, ?)");
    
    // Check if preparation was successful
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("issss", $PaymentAmount, $PaymentMethod, $PaymentDate, $Username, $AccountName);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<div class='container'><h2>Payment Processed</h2><p>Your payment has been recorded successfully.</p></div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

$conn->close();
?>
<div class="container">
    <a href="payment.php" style="padding: 10px; display: inline-block; text-decoration: none; background-color: #A47C2D; color: white; border-radius: 5px;">Back</a>
</div>

</body>
</html>
