<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reservations</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background-image: url('bg.png'); background-size: cover; background-attachment: fixed;">
    <header>
        <img src="PNGS/logo.png" alt="Hotel Logo" class="logo">
        <h1>Beatriz Rafaela Resort - Your Reservations</h1>
        <a href="login.php" class="logout-button">Logout</a>
    </header>

    <nav>
        <ul class="navbar">
            <li><a href="user.php">Dashboard</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="account_settings.php">Account Settings</a></li>
        </ul>
    </nav>

    <div class="container">
        <?php
        // Start session
        session_start();

        // Check if the user is logged in by verifying 'user_id' is set in session
        if (!isset($_SESSION['user_id'])) {
            echo "<p class='error-message'>You need to log in to view your reservations.</p>";
        } else {
            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'beatrizrafaelaresort');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Assuming you have the user's ID stored in a session variable
            $guestId = $_SESSION['user_id'];
        ?>

        <h2>Current Reservations</h2>
        <table class="reservations-table">
            <tr>
                <th>Reservation ID</th>
                <th>Room</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Actions</th>
            </tr>
            <?php
            // Fetch active reservations
            $sql = "SELECT * FROM reservation WHERE GuestID = '$guestId' AND ReservationStatus = 'Active'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ReservationID"] . "</td>";
                    echo "<td>" . $row["RoomID"] . "</td>"; // Join with the room table if necessary
                    echo "<td>" . $row["CheckInDate"] . "</td>";
                    echo "<td>" . $row["CheckOutDate"] . "</td>";
                    echo "<td>";
                    echo "<a href='modify_reservation.php?id=" . $row["ReservationID"] . "' class='modify-button'>Modify</a> ";
                    echo "<a href='cancel_reservation.php?id=" . $row["ReservationID"] . "' class='cancel-button'>Cancel</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No reservations found.</td></tr>";
            }
            ?>
        </table>

        <h2>Past Reservations</h2>
        <table class="reservations-table">
            <tr>
                <th>Reservation ID</th>
                <th>Room</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
            </tr>
            <?php
            // Fetch past reservations
            $sql = "SELECT * FROM reservation WHERE GuestID = '$guestId' AND ReservationStatus = 'Completed'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ReservationID"] . "</td>";
                    echo "<td>" . $row["RoomID"] . "</td>"; // Join with the room table if necessary
                    echo "<td>" . $row["CheckInDate"] . "</td>";
                    echo "<td>" . $row["CheckOutDate"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No past reservations found.</td></tr>";
            }

            // Close the database connection
            $conn->close();
        }
        ?>
        </table>
    </div>
</body>
</html>
