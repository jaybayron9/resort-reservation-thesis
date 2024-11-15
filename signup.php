<?php include('databaseConnection.php') ?>
<?php include('guestComponents/headers.php') ?>
<?php include('guestComponents/navigations.php') ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $contactNo = $_POST['contactNo'];
    $emailAddress = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("
        INSERT INTO users 
            (first_name, last_name, gender, contact_no, email_address, username, password)
        VALUES
            ('$firstName', '$lastName', '$gender', '$contactNo', '$emailAddress', '$username', '$password');
    ");

    if ($result) {
        $lastInsertedId = $conn->insert_id;
        $userResult = $conn->query("SELECT * FROM users WHERE id = $lastInsertedId");
        
        if ($userResult) {
            $newUser = $userResult->fetch_assoc();

            $_SESSION['user_data'] = [
                'id' => $newUser['id'],
                'first_name' => $newUser['first_name'],
                'last_name' => $newUser['last_name'],
                'gender' => $newUser['gender'],
                'contact_no' => $newUser['contact_no'],
                'email_address' => $newUser['email_address'],
                'username' => $newUser['username'],
            ];

            header('Location: index.php');
            exit();
        }
    }
}
?>

<div class="hero">
    <div class="carousel-container">
        <div class="carousel-slide active" style="background-image: url('assets/imgs/Homepage.jpg');">
            <div class="overlay"></div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="carousel-content text-gray-500 w-1/3">
                <p class="text-white">Register</p>
                <div class="mb-3">
                    <label for="firstName" class="block text-left text-white">First Name</label>
                    <input type="text" name="firstName" id="firstName" required class="block p-2 w-full">
                </div>
                <div class="mb-3">
                    <label for="lastName" class="block text-left text-white">Last Name</label>
                    <input type="text" name="lastName" id="lastName" required class="block p-2 w-full">
                </div>
                <div class="mb-3">
                    <label for="gender" class="block text-left text-white">Gender</label>
                    <select type="text" name="gender" id="gender" required class="block p-2 w-full">
                        <option value="" hidden selected></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="contactNo" class="block text-left text-white">Contact No.</label>
                    <input type="text" name="contactNo" id="contactNo" required class="block p-2 w-full">
                </div>
                <div class="mb-3">
                    <label for="email" class="block text-left text-white">Email Address</label>
                    <input type="email" name="email" id="email" required class="block p-2 w-full">
                </div>
                <div class="mb-3">
                    <label for="username" class="block text-left text-white">Username</label>
                    <input type="text" name="username" id="username" required class="block p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-left text-white">Password</label>
                    <input type="password" name="password" id="password" required class="block p-2 w-full">
                </div>
                <button type="submit" name="submit" class="cta">Sign Up</button>
            </form>
        </div> 
    </div>
</div>

<?php include('guestComponents/footer.php') ?>