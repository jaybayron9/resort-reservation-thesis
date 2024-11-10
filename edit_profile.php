<?php
session_start();
require_once 'db_connection.php'; // Ensure the database connection is included

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$userid = $_SESSION['userid']; // Get the logged-in user's ID from the session

// Fetch the user's current information from the database
$stmt = $pdo->prepare("SELECT * FROM tblusers WHERE id = :id");
$stmt->bindParam(':id', $userid, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle the form submission to update the user's information
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the posted form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Validate and update the user's information in the database
    $updateStmt = $pdo->prepare(
        "UPDATE tblusers SET name = :name, email = :email, contact = :contact, address = :address WHERE id = :id"
    );
    $updateStmt->bindParam(':name', $name);
    $updateStmt->bindParam(':email', $email);
    $updateStmt->bindParam(':contact', $contact);
    $updateStmt->bindParam(':address', $address);
    $updateStmt->bindParam(':id', $userid);
    
    if ($updateStmt->execute()) {
        // Update successful
        echo "<script>alert('Profile updated successfully');</script>";
        header("Location: edit_profile.php"); // Redirect to the same page to refresh the form
        exit();
    } else {
        // Error updating profile
        echo "<script>alert('Error updating profile');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="path/to/your/styles.css"> <!-- Add your CSS here -->
</head>
<body>
    <div class="profile-edit-container">
        <h1>Edit Profile</h1>
        <form action="edit_profile.php" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>

            <label for="contact">Contact Number:</label>
            <input type="text" id="contact" name="contact" value="<?php echo htmlspecialchars($user['contact']); ?>" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required><?php echo htmlspecialchars($user['address']); ?></textarea>

            <button type="submit">Update Profile</button>
        </form>
    </div>
</body>
</html>
