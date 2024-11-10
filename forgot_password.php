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
    $email = $conn->real_escape_string($_POST["email"]);

    // Check if the email exists in the 'user' table
    $sqlUser = "SELECT * FROM user WHERE email='$email'";
    $resultUser = $conn->query($sqlUser);

    if ($resultUser && $resultUser->num_rows > 0) {
        $rowUser = $resultUser->fetch_assoc();
        $token = bin2hex(random_bytes(50));
        
        // Store the token in the database with an expiration time
        $sqlToken = "UPDATE user SET reset_token='$token', token_expiration=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email='$email'";
        $conn->query($sqlToken);
        
        // Send the email
        $resetLink = "http://yourdomain.com/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click on the link to reset your password: $resetLink";
        $headers = "From: no-reply@yourdomain.com";

        mail($email, $subject, $message, $headers);

        echo "A password reset link has been sent to your email.";
    } else {
        echo "Email not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        .background-iframe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            z-index: -1;
        }

        body {
            color: #A47C2D;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 50%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #A47C2D;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 1;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #A47C2D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #874E18;
        }
        .back-button {
            margin-bottom: 15px;
            background-color: #A47C2D;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
            display: inline-block;
        }
        .back-button:hover {
            background-color: #874E18;
        }
    </style>
</head>
<body>

<iframe src="index.php" class="background-iframe"></iframe>

<div class="container">
    <button class="back-button" onclick="window.location.href='index.php'">Back</button>
    
    <h2>Forgot Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" required><br>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
