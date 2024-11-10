<!DOCTYPE html>
<html>
<head>
    <title>Hotel Reservation Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="scripts/myscripts.js" defer></script>
    <script src="scripts/scriptimport.js" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: #f0f0f0;">

<header>
    <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
    <h1>Beatriz Rafaela Resort</h1>
    <a href="login.php" class="login-button">Login</a>
</header>

<nav>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="activities.php">Activities</a></li>
        <li><a href="contact.php">Contact Us</a></li>
        <li><a href="plans.php">Plans & Pricing</a></li>
        <li><a href="reservation.php">Make a Reservation</a></li>
    </ul>
</nav>
  
<div class="container">
    <h1>Contact Us</h1>
    <form id="contactForm" action="submit_contact.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {

        event.preventDefault();
        

        window.location.href = 'contact.php';
    });
</script>

</body>
</html>
