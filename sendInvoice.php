<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include 'databaseConnection.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jaybayron400@gmail.com';
    $mail->Password = 'fyhzihqtjhxrworh';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('beatrizresort@gmail.com', 'Beatriz Rafaela Resort');
    $mail->isHTML(true);
    $mail->Subject = 'Reminder: Your Reservation is Approaching!';

    $reminderDate = date('Y-m-d', strtotime('+2 days')); 
    $reservations = $conn->query("
        SELECT r.check_in, r.check_out, r.total_amount, u.email_address 
        FROM reservations r
        LEFT JOIN users u ON r.user_id = u.id
        WHERE DATE(r.check_in) = '$reminderDate' AND u.email_address != ''
    ");

    foreach ($reservations->fetch_all(MYSQLI_ASSOC) as $row) {
        $checkIn = $row['check_in'];
        $checkOut = $row['check_out'];
        $totalAmount = $row['total_amount'];
        $email = $row['email_address'];

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
                            <p>This is a reminder for your upcoming stay!</p>
                        </div>
                        <table class="details" width="100%">
                            <tr>
                                <td><strong>Check-in Date:</strong></td>
                                <td>' . date('F j, Y', strtotime($checkIn)) . '</td>
                            </tr>
                            <tr>
                                <td><strong>Check-out Date:</strong></td>
                                <td>' . date('F j, Y', strtotime($checkOut)) . '</td>
                            </tr>
                        </table>
                        <table class="total" width="100%">
                            <tr>
                                <td><strong>Total Amount:</strong></td>
                                <td>₱' . number_format($totalAmount, 2) . '</td>
                            </tr>
                        </table>
                        <div class="footer">
                            <p>We look forward to your stay! For any inquiries, please contact us at beatrizresort@example.com.</p>
                        </div>
                    </div>
                </body>
            </html>
        ';

        $mail->addAddress($email);
        if ($mail->send()) {
            echo "Email sent to $email\n";
        } else {
            echo "Failed to send email to $email\n";
        }

        $mail->clearAddresses();
    }
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>
