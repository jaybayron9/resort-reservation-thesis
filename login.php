<?php include('databaseConnection.php') ?>
<?php include('guestComponents/headers.php') ?>
<?php include('guestComponents/navigations.php') ?>

<?php 
if (isset($_SESSION['user_data'])) {
    header('location: userReservation.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("
        SELECT * FROM users
        WHERE
            username = '$username' AND password = '$password';
    ");

    if ($result) {
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            include('ipAddress.php');

            $stmt = $conn->prepare("
                INSERT INTO users_logs (user_id, role, action, ip_address, user_agent)
                VALUES (?, ?, ?, ?, ?)
            ");
        
            $userId = $user['id'];
            $role = 'user';
            $action = 'login';
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            $userIp = getUserIpAddress();
            
            $stmt->bind_param("issss", $userId, $role, $action, $userIp, $userAgent);
            $stmt->execute();

            $_SESSION['user_data'] = [
                'id' => $user['id'],
                'first_name' => $user['first_name'],
                'last_name' => $user['last_name'],
                'contact_no' => $user['contact_no'],
                'email_address' => $user['email_address'],
                'username' => $user['username'],
            ];

            header('location: userReservation.php');
        }
    }
}
?>

<div class="hero">
    <div class="carousel-container">
        <!-- Slide 1 -->
        <div class="carousel-slide active" style="background-image: url('assets/imgs/Homepage.jpg');">
            <div class="overlay"></div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="carousel-content w-2/6 text-gray-800 py-10">
                <h1 class="text-white font-bold text-lg">Login</h1>
                <div class="mb-5">
                    <label for="username" class="block text-left text-white mb-2">Username</label>
                    <input type="text" name="username" id="username" required class="block p-2 w-full">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-left text-white mb-2">Password</label>
                    <input type="password" name="password" id="password" required class="block p-2 w-full">
                </div>
                <button type="submit" name="submit" class="cta">Login</button>
            </form>
        </div> 
    </div>
</div>

<?php include('guestComponents/footer.php') ?>