<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beatrizrafaelaresort";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$token = $_GET['token'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = password_hash($_POST["new_password"], PASSWORD_DEFAULT);

    // Check if the token is valid and not expired
    $sqlToken = "SELECT * FROM user WHERE reset_token='$token' AND token_expiration > NOW()";
    $resultToken = $conn->query($sqlToken);

    if ($resultToken && $resultToken->num_rows > 0) {
        // Update the user's password
        $sqlUpdate = "UPDATE user SET user_password='$new_password', reset_token=NULL, token_expiration=NULL WHERE reset_token='$token'";
        $conn->query($sqlUpdate);
        
        echo "Your password has been reset. You can now <a href='login.php'>login</a>.";
    } else {
        echo "Invalid or expired token.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
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
        input[type="password"], input[type="submit"] {
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
    
    <h2>Reset Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?token=" . htmlspecialchars($token); ?>">
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>

        <input type="submit" value="Reset Password">
    </form>
</div>

</body>
</html>
