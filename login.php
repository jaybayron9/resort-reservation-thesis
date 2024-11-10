<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beatrizrafaelaresort";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $_POST["password"];

    // Check if the user exists in the 'user' table
    $sqlUser = "SELECT * FROM user WHERE username='$username'";
    $resultUser = $conn->query($sqlUser);

    if ($resultUser && $resultUser->num_rows > 0) {
        $rowUser = $resultUser->fetch_assoc();
        if (password_verify($password, $rowUser['user_password'])) {
            // Set session and redirect to user page
            $_SESSION['username'] = $username;
            header("Location: user.php");
            exit();
        }
    }

    // If no user is found or password is incorrect
    echo "Invalid username or password.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
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
        input[type="text"], input[type="password"], input[type="submit"], input[type="button"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            box-sizing: border-box;
        }
        input[type="submit"], input[type="button"] {
            background-color: #A47C2D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
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
    
    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
    <a class="forgot-password" href="forgot_password.php">Forgot Password?</a>
    <br>
    <form method="get" action="new.php">
        <input type="button" value="Create Account" onclick="window.location.href='new.php'">
    </form>
</div>

</body>
</html>
