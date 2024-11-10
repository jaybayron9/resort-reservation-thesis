<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
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
        input[type="text"], input[type="password"], input[type="submit"], input[type="button"], select {
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
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);
    $account_name = $conn->real_escape_string($_POST["account_name"]);
    $account_address = $conn->real_escape_string($_POST["account_address"]);
    $account_contact_number = $conn->real_escape_string($_POST["account_contact_number"]);
    $account_type = $_POST["account_type"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($account_type == "User") {
        $sql = "INSERT INTO user (username, user_password, userfirstname, useraddress, usercontactnumber)
                VALUES ('$username', '$hashed_password', '$account_name', '$account_address', '$account_contact_number')";
    } else {
        $sql = "INSERT INTO admin (admin_username, admin_password, adminfirstname, adminaddress, admincontactnumber)
                VALUES ('$username', '$hashed_password', '$account_name', '$account_address', '$account_contact_number')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New account created successfully!'); window.location.href='login.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<div class="container">

    <button class="back-button" onclick="window.location.href='login.php'">Back</button>
    
    <h2>Create Account</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <label for="account_name">Account Name:</label><br>
        <input type="text" id="account_name" name="account_name" required><br>

        <label for="account_address">Account Address:</label><br>
        <input type="text" id="account_address" name="account_address" required><br>

        <label for="account_contact_number">Account Contact Number:</label><br>
        <input type="text" id="account_contact_number" name="account_contact_number" required><br>

        <label for="account_type">Account Type:</label><br>
        <select id="account_type" name="account_type" required>
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select><br>

        <input type="submit" value="Create Account">
    </form>
</div>

</body>
</html>
