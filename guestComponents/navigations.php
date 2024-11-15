<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) {
    if (isset($_SESSION['user_data'])) {
        session_unset();
        session_destroy();
        header('location: /');
        exit;
    }
}
?>

<div class="navbar">
    <a href="index.php" class="logo">
        <img src="/assets/imgs/logo.png" alt="Beatriz Rafaela Resort Logo">
        <span>BEATRIZ RAFAELA RESORT</span>
    </a>
    <div class="nav-container">
        <div class="nav-links">
            <div class="dropdown-container">
                <a href="#">EXPLORE</a>
                <div class="dropdown">
                    <a href="overview.php">RESORT OVERVIEW</a>
                    <a href="resortMap.php">RESORT MAP</a>
                </div>
            </div>

            <div class="dropdown-container">
                <a href="#">STAY</a>
                <div class="dropdown">
                    <a href="roomsSuites.php">ROOM AND SUITES</a>
                    <a href="userReservation.php">BOOK A ROOM</a>
                </div>
            </div>

            <div class="dropdown-container">
                <a href="#">SAVOR</a>
                <div class="dropdown">
                    <a href="restaurant.php">RESTAURANT</a>
                    <a href="poolbar.php">POOL BAR</a>
                </div>
            </div>

            <div class="dropdown-container">
                <a href="#">EXPERIENCE</a>
                <div class="dropdown">
                    <a href="conventionhall.php">CONVENTION HALL</a>
                    <a href="swimmingpool.php">SWIMMING POOL</a>
                    <a href="#">WATER ACTIVITIES</a>
                </div>
            </div>

            <div class="dropdown-container">
                <a href="#">INQUIRE</a>
                <div class="dropdown">
                    <a href="#">PAYMENT METHODS</a>
                    <a href="#">CONTACT US</a>
                </div>
            </div>
        </div>
    </div>

    <a href="bookaroom.php">
        <a href="login.php" class="reserve-btn">RESERVE NOW</a>

        <?php if (isset($_SESSION['user_data'])): ?>
            <div class="ml-2 "><?= $_SESSION['user_data']['username'] ?></div>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <button type="submit" name="logout" class="ml-3">Logout</button>
            </form>
        <?php else: ?>
            <a href="signup.php" class="reserve-btn">Sign Up</a>
        <?php endif; ?>
    </a>
</div>