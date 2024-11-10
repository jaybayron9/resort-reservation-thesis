<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-image: url('bg.png'); background-size: cover; background-attachment: fixed;">
    <header>
        <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
        <h1>Beatriz Rafaela Resort - Account Settings</h1>
        <a href="login.php" class="logout-button">Logout</a>
    </header>

    <nav>
        <ul class="navbar">
            <li><a href="user.php">Dashboard</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="user_reservation.php">Reservations</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Change Password</h2>
        <form action="update_password.php" method="POST">
            <label for="current-password">Current Password:</label>
            <input type="password" id="current-password" name="current_password" required>

            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="new_password" required>

            <label for="confirm-password">Confirm New Password:</label>
            <input type="password" id="confirm-password" name="confirm_password" required>

            <button type="submit" class="update-button">Change Password</button>
        </form>

        <h2>Update Security Settings</h2>
        <form action="update_security.php" method="POST">
            <label for="security-email">Security Email:</label>
            <input type="email" id="security-email" name="security_email" required>

            <label for="security-question">Security Question:</label>
            <input type="text" id="security-question" name="security_question" required>

            <label for="security-answer">Answer:</label>
            <input type="text" id="security-answer" name="security_answer" required>

            <button type="submit" class="update-button">Update Security Settings</button>
        </form>
    </div>
</body>
</html>
