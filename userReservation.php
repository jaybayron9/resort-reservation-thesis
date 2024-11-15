<?php include('databaseConnection.php') ?>
<?php include('guestComponents/headers.php') ?>
<?php include('guestComponents/navigations.php') ?>

<?php 

$showRooms = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchAvailable'])) {
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    $infants = $_POST['infants'];
    $pets = $_POST['pets'];

    $totalPerson = $adults+$kids+$infants;

    $rooms = $conn->query("
        SELECT * FROM rooms
        WHERE 
            status = 'available' AND
            capacity >= $totalPerson
    ");

    // echo '<pre>';
    // print_r($rooms->fetch_all(MYSQLI_ASSOC));
    // echo '</pre>';

    $showRooms = true;
}

if ($showRooms):
?>

<div class="book-room-section">
        <h1>AVAILABLE ROOMS</h1>
        <p>Choose from a variety of rooms available during your stay.</p>

        <!-- Available Rooms Display -->
        <div class="flex flex-wrap justify-center gap-10">
            <?php foreach ($rooms->fetch_all(MYSQLI_ASSOC) as $room): ?>
                <form action="/reservationForm.php" method="get" class="bg-white p-7 flex flex-col justify-center shadow-md">
                    <input type="hidden" name="roomId" value="<?= $room['id'] ?>">
                    <input type="hidden" name="checkIn" value="<?= $_POST['checkIn'] ?>">
                    <input type="hidden" name="checkOut" value="<?= $_POST['checkOut'] ?>">
                    <input type="hidden" name="adults" value="<?= $_POST['adults'] ?>">
                    <input type="hidden" name="kids" value="<?= $_POST['kids'] ?>">
                    <input type="hidden" name="infants" value="<?= $_POST['infants'] ?>">
                    <input type="hidden" name="pets" value="<?= $_POST['pets'] ?>">
                    <input type="hidden" name="rate" value="<?= $room['rate'] ?>">
                    <input type="hidden" name="name" value="<?= $room['name'] ?>">
                    <img src="/uploads/<?= $room['photo'] ?>" alt="<?= $room['name'] ?>" class="w-60 h-56">
                    <h3 class="font-bold mt-4"><?= $room['name'] ?></h3>
                    <div class="text-yellow-600 font-bold ">$<?= number_format($room['rate'], 2) ?> per night</div>
                    <div class="flex justify-center">
                        <ul class="list-disc w-2xl mb-5 text-left mt-4">
                            <li><?= $room['bed_frame'] ?></li>
                            <li>Capacity <?= $room['capacity'] ?></li>
                            <li><?= $room['view'] ?></li>
                        </ul>
                    </div>
                    <button type="submit" class="px-6 py-3 font-bold bg-yellow-600 text-white">Reserve Now</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>
<div class="book-room-section">
    <h1>BOOK A ROOM</h1>
    <p>Start planning your perfect getaway at Beatriz Rafaela Resort! Choose your check-in and check-out dates, tell us how many guests are coming, and we'll find the perfect room for you.</p>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" class="booking-form w-2x6">
        <div class="flex gap-4">
            <div class="w-full">
                <label for="check-in">Check-in</label>
                <input type="date" id="check-in" name="checkIn" value="<?= $_POST['checkIn'] ?? '' ?>" required class="w-full">
            </div>
            <div class="w-full">
                <label for="check-out">Check-out</label>
                <input type="date" id="check-out" name="checkOut" value="<?= $_POST['checkOut'] ?? '' ?>" required>
            </div>
        </div>

        <!-- Guests Section -->
        <div class="guests-section">
            <div>
                <p>Adults</p>
                <p class="guest-type">Ages 13 and above</p>
                <div class="guests-control">
                    <button type="button" onclick="adjustCount('adults', -1)">-</button>
                    <input type="text" name="adults" id="adults" value="0" class="text-center">
                    <button type="button" onclick="adjustCount('adults', 1)">+</button>
                </div>
            </div>

            <div>
                <p>Kids</p>
                <p class="guest-type">Ages 2-10</p>
                <div class="guests-control">
                    <button type="button" onclick="adjustCount('kids', -1)">-</button>
                    <input type="text" name="kids" id="kids" value="0" class="text-center">
                    <button type="button" onclick="adjustCount('kids', 1)">+</button>
                </div>
            </div>

            <div>
                <p>Infants</p>
                <p class="guest-type">Under 2</p>
                <div class="guests-control">
                    <button type="button" onclick="adjustCount('infants', -1)">-</button>
                    <input type="text" name="infants" id="infants" value="0" class="text-center">
                    <button type="button" onclick="adjustCount('infants', 1)">+</button>
                </div>
            </div>

            <div>
                <p>Pets</p>
                <p class="guest-type">Bringing a service animal?</p>
                <div class="guests-control">
                    <button type="button" onclick="adjustCount('pets', -1)">-</button>
                    <input type="text" name="pets" id="pets" value="0" class="text-center">
                    <button type="button" onclick="adjustCount('pets', 1)">+</button>
                </div>
            </div>
        </div>

        <button type="submit" name="searchAvailable" class="search-btn">Search Availability</button>
    </form>
</div>

<script src="/assets/js/userReservation.js"></script>
<?php include('guestComponents/footer.php') ?>