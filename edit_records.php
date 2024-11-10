<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beatrizrafaelaresort";

try {
    // Create PDO connection using $conn instead of $pdo
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch record for editing
    if (isset($_GET['id'])) {
        $records_id = $_GET['id'];

        // Prepare the query to fetch the record
        $stmt = $conn->prepare("SELECT * FROM records WHERE RecordsID = :records_id");
        $stmt->bindParam(':records_id', $records_id, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            ?>
            <!-- Form to edit the record -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="records_id" value="<?php echo $row['RecordsID']; ?>">

                <label for="account_id">Account ID:</label><br>
                <input type="text" id="account_id" name="account_id" value="<?php echo $row['AccountID']; ?>"><br>

                <label for="services_id">Services ID:</label><br>
                <input type="text" id="services_id" name="services_id" value="<?php echo $row['ServicesID']; ?>"><br>

                <label for="guest_first_name">Guest First Name:</label><br>
                <input type="text" id="guest_first_name" name="guest_first_name" value="<?php echo $row['GuestFirstName']; ?>"><br>

                <label for="guest_last_name">Guest Last Name:</label><br>
                <input type="text" id="guest_last_name" name="guest_last_name" value="<?php echo $row['GuestLastName']; ?>"><br>

                <label for="guest_contact_number">Guest Contact Number:</label><br>
                <input type="text" id="guest_contact_number" name="guest_contact_number" value="<?php echo $row['GuestContactNumber']; ?>"><br>

                <label for="room_name">Room Name:</label><br>
                <input type="text" id="room_name" name="room_name" value="<?php echo $row['RoomName']; ?>"><br>

                <label for="room_size">Room Size:</label><br>
                <input type="text" id="room_size" name="room_size" value="<?php echo $row['RoomSize']; ?>"><br>

                <label for="room_type">Room Type:</label><br>
                <input type="text" id="room_type" name="room_type" value="<?php echo $row['RoomType']; ?>"><br>

                <label for="guest_email">Guest Email:</label><br>
                <input type="text" id="guest_email" name="guest_email" value="<?php echo $row['GuestEmail']; ?>"><br>

                <label for="number_of_adult">Number of Adults:</label><br>
                <input type="text" id="number_of_adult" name="number_of_adult" value="<?php echo $row['NumberOfAdult']; ?>"><br>

                <label for="number_of_kids">Number of Kids:</label><br>
                <input type="text" id="number_of_kids" name="number_of_kids" value="<?php echo $row['NumberOfKids']; ?>"><br>

                <label for="reservation_date">Reservation Date:</label><br>
                <input type="text" id="reservation_date" name="reservation_date" value="<?php echo $row['ReservationDate']; ?>"><br>

                <input type="submit" value="Update">
            </form>
            <?php
        } else {
            echo "Record not found.";
        }
    } else {
        echo "Record ID not provided.";
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<?php
// Update the record in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Capture the posted data
        $records_id = $_POST['records_id'];
        $account_id = $_POST['account_id'];
        $services_id = $_POST['services_id'];
        $guest_first_name = $_POST['guest_first_name'];
        $guest_last_name = $_POST['guest_last_name'];
        $guest_contact_number = $_POST['guest_contact_number'];
        $room_name = $_POST['room_name'];
        $room_size = $_POST['room_size'];
        $room_type = $_POST['room_type'];
        $guest_email = $_POST['guest_email'];
        $number_of_adult = $_POST['number_of_adult'];
        $number_of_kids = $_POST['number_of_kids'];
        $reservation_date = $_POST['reservation_date'];

        // Prepare the update query using $conn instead of $pdo
        $stmt = $conn->prepare("UPDATE records 
            SET AccountID = :account_id, 
                ServicesID = :services_id, 
                GuestFirstName = :guest_first_name, 
                GuestLastName = :guest_last_name, 
                GuestContactNumber = :guest_contact_number, 
                RoomName = :room_name, 
                RoomSize = :room_size, 
                RoomType = :room_type, 
                GuestEmail = :guest_email, 
                NumberOfAdult = :number_of_adult, 
                NumberOfKids = :number_of_kids, 
                ReservationDate = :reservation_date 
            WHERE RecordsID = :records_id");

        // Bind parameters
        $stmt->bindParam(':account_id', $account_id);
        $stmt->bindParam(':services_id', $services_id);
        $stmt->bindParam(':guest_first_name', $guest_first_name);
        $stmt->bindParam(':guest_last_name', $guest_last_name);
        $stmt->bindParam(':guest_contact_number', $guest_contact_number);
        $stmt->bindParam(':room_name', $room_name);
        $stmt->bindParam(':room_size', $room_size);
        $stmt->bindParam(':room_type', $room_type);
        $stmt->bindParam(':guest_email', $guest_email);
        $stmt->bindParam(':number_of_adult', $number_of_adult);
        $stmt->bindParam(':number_of_kids', $number_of_kids);
        $stmt->bindParam(':reservation_date', $reservation_date);
        $stmt->bindParam(':records_id', $records_id);

        // Execute the query
        $stmt->execute();

        echo "Record updated successfully!";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
