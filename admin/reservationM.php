<?php include('../databaseConnection.php') ?>
<?php include('adminComponents/headers.php') ?>
<?php include('adminComponents/navigations.php') ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $roomId = $_POST['roomId'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    $infants = $_POST['infants'];
    $pets = $_POST['pets'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $total = $_POST['total'];
    $additional_info = $_POST['additional_info'];

    $query = $conn->query("
        INSERT INTO users (first_name, contact_no, email_address)
        VALUES ('$fullname', '$phone', '$email')
    ");
    if ($query) {
        $last_id = $conn->insert_id;
        $query = $conn->query("
            INSERT INTO reservations (user_id, room_id, check_in, check_out, no_adults, no_kids, no_infants, no_pets, status, additional_details, total_amount)
            VALUES ('$last_id', '$roomId', '$checkIn', '$checkOut', '$adults', '$kids', '$infants', '$pets', 'reserved', '$additional_info', '$total')
        ");
    } else {
        echo "Error: " . $conn->error;
    }

   

    if ($query) {
        echo '<script>alert("Reservation created")</script>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<?php if (isset($_GET['action']) && $_GET['action'] == 'create'): ?>
    <div class="flex justify-center">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="mt-14 border shadow-md p-20 w-3/6">
            <div class="mb-4">
                <label class="block">check In</label>
                <input type="date" name="checkIn" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">check Out</label>
                <input type="date" name="checkOut" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Room Id</label>
                <select type="number" name="roomId" value="" class="p-2 border w-full">
                    <option value="" selected hidden>---- Select room ----</option>
                    <?php
                        $rooms = $conn->query("SELECT * FROM rooms where status = 'available'");
                        foreach ($rooms->fetch_all(MYSQLI_ASSOC) as $room):
                    ?>
                    <option value="<?= $room['id'] ?>"><?= $room['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
                <input type="hidden" name="userId" value="<?= rand(1, 100) ?>" class="p-2 border w-full">
            <div class="mb-4">
                <label class="block">Adults No.</label>
                <input type="number" name="adults" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Kids No.</label>
                <input type="number" name="kids" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Infants No.</label>
                <input type="number" name="infants" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Pets No.</label>
                <input type="number" name="pets" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Name</label>
                <input type="text" name="fullname" value="" placeholder="Full Name" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Phone Number</label>
                <input type="text" name="phone" required placeholder="Phone Number" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="Email Address" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label>Total Amount</label>
                <input type="number" name="total" value="" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Additional Information</label>
                <textarea name="additional_info" placeholder="Any additional requests or info" class="p-2 border w-full"></textarea>
            </div>
            <button name="submit" type="submit" class="search-btn text-white bg-blue-500 rounded w-full py-2">Submit Reservation</button>
        </form>
    </div>
<?php else: ?>
    <div class="container" style="padding: 20px;">
    <h2>Room List</h2>

    <table>
        <tr>
            <th>id</th>
            <th>Guest ID</th>
            <th>Room ID</th>
            <th>User</th>
            <th>Phone No.</th>
            <th>Email</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>No. Adults</th>
            <th>No. Kids</th>
            <th>No. Infants</th>
            <th>No. Pets</th>
            <th>Total</th>
            <th>Status</th>
            <th>Addtional Details</th>
        </tr>
        <?php
        $reservations = $conn->query( "
            SELECT 
                r.id as reservation_id, 
                u.id as user_id, 
                rm.id as room_id, 
                u.last_name, u.first_name,
                u.contact_no,
                u.email_address,
                r.check_in, r.check_out, r.no_adults, r.no_kids, r.no_infants, r.no_pets, r.total_amount, r.status, r.additional_details
            FROM reservations r
            LEFT JOIN users u ON u.id = r.user_id
            LEFT JOIN rooms rm ON rm.id = r.room_id
        ");

        if ($reservations->num_rows > 0) {
            foreach ($reservations->fetch_all(MYSQLI_ASSOC) as $row) {
                echo "<tr>
                    <td>{$row['reservation_id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['room_id']}</td>
                    <td>{$row['first_name']} {$row['last_name']}</td>
                    <td>{$row['contact_no']}</td>
                    <td>{$row['email_address']}</td>
                    <td>{$row['check_in']}</td>
                    <td>{$row['check_out']}</td>
                    <td>{$row['no_adults']}</td>
                    <td>{$row['no_kids']}</td>
                    <td>{$row['no_infants']}</td>
                    <td>{$row['no_pets']}</td>
                    <td>{$row['total_amount']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['additional_details']}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No rooms found.</td></tr>";
        }
        ?>
    </table>
</div>

<a href="/admin/reservationM.php?action=create" class="fixed-button">Create Reservation</a>
<?php endif; ?>

<?php include('adminComponents/footer.php') ?>