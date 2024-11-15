<?php include('../databaseConnection.php') ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login</title>
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
                text-decoration-line: none;
            }
            .back-button:hover {
                background-color: #874E18;
            }
        </style>
        
        <!-- <script src="https://cdn.tailwindcss.com"></script> -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("
        SELECT * FROM admins
        WHERE username = '$username'
    ");

    if ($result) {
        if ($result->num_rows > 0) {
            $users = $result->fetch_all(MYSQLI_ASSOC);

            // echo '<pre>';
            // var_dump($users[0]);
            // echo '</pre>';
            // exit;

            foreach ($users as $v) {
                if ($v['password'] == md5($password)) {
                    $_SESSION['admin_data'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'email_address' => $user['email_address'],
                        'contact_no' => $user['contact_no']
                    ];

                    header('location: /admin/dashboard.php');
                    exit;
                }
            }
        }
        $error = 'Incorrect username or password';
    }
}
?>

<iframe src="/admin/adminComponents/frame.php" class="background-iframe"></iframe>
<div class="container">
    <a href="/" class="back-button">Client</a>
    <h2>Admin Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p class="text-red-600"><?= isset($error) ? $error : '' ?></p>    

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>

        <input type="submit" name="submit" value="Login">
    </form>
</div>

</body>
</html>
