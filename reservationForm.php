<?php include('databaseConnection.php') ?>
<?php include('guestComponents/headers.php') ?>
<?php include('guestComponents/navigations.php') ?>

<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $userId = $_SESSION['user_data']['id'];
    $checkIn = $_POST['checkIn'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $roomId = $_POST['roomId'];
    $userId = $_POST['userId'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];
    $infants = $_POST['infants'];
    $pets = $_POST['pets'];
    $additional_info = $_POST['additional_info'];
    $rate = $_POST['rate'];

    $checkInDate = new DateTime($checkIn);
    $checkOutDate = new DateTime($checkOut);

    $interval = $checkInDate->diff($checkOutDate);

    $nights = $interval->days;

    if ($nights > 0) {
        $nights--;
    }

    $totalAmmount = $rate * $nights;
    $result = $conn->query("
        INSERT INTO reservations (user_id, room_id, check_in, check_out, no_adults, no_kids, no_infants, no_pets, total_amount, status, additional_details)
        VALUES ('$userId', '$roomId', '$checkIn', '$checkOut', '$adults', '$kids', '$infants', '$pets', '$totalAmmount', 'reserved', '$additional_info')
    ");

    if ($result) {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jaybayron400@gmail.com';
            $mail->Password = 'fyhzihqtjhxrworh';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            
            $mail->setFrom('beatrizresort@gmail.com');
            $mail->addAddress($_SESSION['user_data']['email_address']);
            $mail->isHTML(true);
            $mail->Subject = 'Beatriz Rafaela Resort Reservation';
            $mail->Body = '
                <html>
                    <head>
                        <style>
                            body { font-family: Arial, sans-serif; color: #333; }
                            .invoice-container { width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
                            .header { text-align: center; margin-bottom: 20px; }
                            .header h2 { color: #007bff; }
                            .details, .total { margin-bottom: 20px; }
                            .details td, .total td { padding: 8px; border-bottom: 1px solid #ddd; }
                            .total { font-weight: bold; }
                            .footer { text-align: center; color: #777; font-size: 0.9em; margin-top: 20px; }
                        </style>
                    </head>
                    <body>
                        <div class="invoice-container">
                            <div class="header">
                                <h2>Beatriz Rafaela Resort Reservation</h2>
                                <p>Thank you for booking with us!</p>
                            </div>
                            <table class="details" width="100%">
                                <tr>
                                    <td><strong>Check-in Date:</strong></td>
                                    <td>[CHECKIN_DATE]</td>
                                </tr>
                                <tr>
                                    <td><strong>Check-out Date:</strong></td>
                                    <td>[CHECKOUT_DATE]</td>
                                </tr>
                            </table>
                            <table class="total" width="100%">
                                <tr>
                                    <td><strong>Total Amount:</strong></td>
                                    <td>[TOTAL_AMOUNT]</td>
                                </tr>
                            </table>
                            <div class="footer">
                                <p>We look forward to your stay! For any inquiries, please contact us at beatrizresort@example.com.</p>
                            </div>
                        </div>
                    </body>
                </html>
            ';
            
            // Replace placeholders with actual data
            $mail->Body = str_replace('[CHECKIN_DATE]', date('F j, Y', strtotime($checkIn)), $mail->Body);
            $mail->Body = str_replace('[CHECKOUT_DATE]', date('F j, Y', strtotime($checkOut)), $mail->Body);
            $mail->Body = str_replace('[TOTAL_AMOUNT]', '₱' . number_format($totalAmmount, 2), $mail->Body);
                        
            
            $result = $mail->send();
            echo json_encode([$result], JSON_PRETTY_PRINT);
        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()], JSON_PRETTY_PRINT);
        }

        header('location: /?booked=true');
    }
}

$checkIn = $_GET['checkIn']; 
$checkOut = $_GET['checkOut']; 

$checkInDate = new DateTime($checkIn);
$checkOutDate = new DateTime($checkOut);

$interval = $checkInDate->diff($checkOutDate);

$nights = $interval->days;

if ($nights > 0) {
    $nights--;
}
?>

<div class="flex gap-14 justify-center mt-16 mb-10">
    <div class="w-1/3 bg-white rounded-md border shadow-md p-7">
        <h3 class="mb-5 font-bold text-lg">Your Stay</h3>
        <p><strong>Check-in Date</strong> <?= date('F j, Y', strtotime($checkIn)) ?></p>
        <p><strong>Check-out Date</strong> <?= date('F j, Y', strtotime($checkOut)) ?></p>
        <p><strong>Nights:</strong> <?= $nights; ?></p>
        <p><strong>Rooms:</strong> 1</p>
        <p><strong>Adults:</strong> <?= $_GET['adults'] ?></p>
        <p><strong>Room:</strong> <?= $_GET['name'] ?></p>
        <p><strong>Rate per Night:</strong> PHP <?= number_format($_GET['rate'],2) ?></p>
        <div class="text-yellow-600 font-bold mt-5">Total Amount: PHP <?= number_format($_GET['rate'] * $nights,2) ?></div>
    </div>
    <!-- https://resort-reservation-thesis.test/reservationForm.php?roomId=3&checkIn=2024-11-28&checkOut=&adults=0&kids=0&infants=0&pets=0 -->
    <!-- Guest Information Form -->
    <div class="w-1/3 bg-white rounded-md border shadow-md p-7">
        <h3 class="mb-5 font-bold text-lg">Guest Information</h3>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="checkIn" value="<?= $checkIn ?>">
            <input type="hidden" name="checkOut" value="<?= $checkOut ?>">
            <input type="hidden" name="roomId" value="<?= $_GET['roomId'] ?>">
            <input type="hidden" name="userId" value="<?= $_SESSION['user_data']['id'] ?>">
            <input type="hidden" name="adults" value="<?= $_GET['adults'] ?>">
            <input type="hidden" name="kids" value="<?= $_GET['kids'] ?>">
            <input type="hidden" name="infants" value="<?= $_GET['infants'] ?>">
            <input type="hidden" name="pets" value="<?= $_GET['pets'] ?>">
            <input type="hidden" name="rate" value="<?= $_GET['rate'] ?>">
            <div class="mb-4">
                <label class="block">Name</label>
                <input type="text" name="fullname" value="<?= $_SESSION['user_data']['first_name'] . ' ' . $_SESSION['user_data']['last_name'] ?>" disabled placeholder="Full Name" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Phone Number</label>
                <input type="text" name="phone" required placeholder="Phone Number" value="<?= $_SESSION['user_data']['contact_no']?>" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label>Email Address</label>
                <input type="email" name="email" required placeholder="Email Address" value="<?= $_SESSION['user_data']['email_address']?>" class="p-2 border w-full">
            </div>
            <div class="mb-4">
                <label class="block">Additional Information</label>
                <textarea name="additional_info" placeholder="Any additional requests or info" class="p-2 border w-full"></textarea>
            </div>

            <button name="submit" type="submit" class="search-btn text-white">Submit Reservation</button>
        </form>
    </div>
</div>

<?php include('guestComponents/footer.php') ?>