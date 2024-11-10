<?php
  // paymentmethods.php

  // Starting the session for any dynamic content
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatriz Rafaela Resort - Payment Methods</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Body */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
        }

        /* Navbar */
        .navbar {
            background-color: #222;
            color: #d4af37;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar .logo img {
            height: 40px;
            margin-right: 10px;
        }

        .navbar .nav-container {
            flex: 1;
            display: flex;
            justify-content: center;
        }

        .navbar .nav-links {
            display: flex;
            gap: 30px;
            font-size: 14px;
            position: relative;
        }

        .navbar .nav-links a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar .nav-links a:hover {
            color: #d4af37;
        }

        /* Dropdown Styling */
        .dropdown-container {
            position: relative;
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            width: 200px;
            background-color: #222;
            border-radius: 4px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s;
            z-index: 2000;
        }

        .dropdown a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        .dropdown a:hover {
            color: #d4af37;
        }

        .dropdown-container:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* Navbar .reserve-btn */
        .navbar .reserve-btn {
            font-size: 14px;
            background-color: #d4af37;
            color: #222;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        /* Payment Methods Section */
        .payment-methods-section {
            padding: 50px 20px;
            text-align: center;
        }

        .payment-methods-section h1 {
            font-size: 36px;
            color: #222;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .payment-methods-section p {
            font-size: 17px;
            color: #555;
            line-height: 1.6;
            max-width: 1000px;
            margin: 0 auto 30px; /* Increased margin-bottom */
        }

        /* Payment Options List */
        .payment-methods-list {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .payment-method {
            text-align: center;
            max-width: 200px;
            margin-bottom: 20px;
        }

        .payment-method img {
            width: 100px;
            margin-bottom: 15px;
        }

        .cta-btn {
            background-color: #d4af37;
            color: #222;
            font-size: 16px;
            padding: 12px 24px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .cta-btn:hover {
            background-color: #b58d2b;
        }

        /* Footer Styling */
        .footer {
            background-color: #222;
            color: #d4af37;
            padding: 30px 20px;
            text-align: center;
        }

        .footer .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .footer .footer-links a {
            color: #d4af37;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .footer .footer-links a:hover {
            color: #ffffff;
        }

        .footer .contact-info p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar .nav-links {
                flex-direction: column;
                align-items: center;
                font-size: 12px;
            }

            .payment-methods-section {
                padding: 30px 10px;
            }

            .payment-methods-section h1 {
                font-size: 28px;
            }

            .payment-methods-section p {
                font-size: 16px;
            }

            .payment-methods-list {
                justify-content: center;
            }

            .payment-method img {
                width: 80px;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="index.php" class="logo">
            <img src="PNGS/logo.png" alt="Beatriz Rafaela Resort Logo">
            <span>BEATRIZ RAFAELA RESORT</span>
        </a>
        <div class="nav-container">
            <div class="nav-links">
                <div class="dropdown-container">
                    <a href="#">EXPLORE</a>
                    <div class="dropdown">
                        <a href="overview.php">RESORT OVERVIEW</a>
                        <a href="resortmap.php">RESORT MAP</a>
                    </div>
                </div>

                <div class="dropdown-container">
                    <a href="#">STAY</a>
                    <div class="dropdown">
                        <a href="roomandsuites.php">ROOM AND SUITES</a>
                        <a href="bookaroom.php">BOOK A ROOM</a>
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
                        <a href="#">CONVENTION HALL</a>
                        <a href="#">SWIMMING POOL</a>
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

        <button class="reserve-btn">RESERVE NOW</button>
    </div>

    <!-- Payment Methods Section -->
    <div class="payment-methods-section">
        <h1>PAYMENT METHODS</h1>
        <p>At Beatriz Rafaela Resort, we offer a variety of payment options to ensure a seamless booking experience. You can choose the method that is most convenient for you when making a reservation or settling your bill. Whether you prefer online payments or traditional methods, we’ve got you covered.</p>

        <!-- Payment Options List -->
        <div class="payment-methods-list">
            <div class="payment-method">
                <img src="PNGS/credit-card.png" alt="Credit Card">
                <p><strong>Credit Cards</strong><br>Visa, MasterCard, and American Express</p>
            </div>
            <div class="payment-method">
                <img src="PNGS/paypal.png" alt="PayPal">
                <p><strong>PayPal</strong><br>Fast and secure online payments</p>
            </div>
            <div class="payment-method">
                <img src="PNGS/cash.png" alt="Cash">
                <p><strong>Cash Payment</strong><br>Available at check-in or check-out</p>
            </div>
            <div class="payment-method">
                <img src="PNGS/bank-transfer.png" alt="Bank Transfer">
                <p><strong>Bank Transfer</strong><br>Direct payment via bank account</p>
            </div>
        </div>

        <a href="bookaroom.php" class="cta-btn">BOOK NOW AND PAY</a>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-links">
            <a href="overview.php">Resort Overview</a>
            <a href="rooms.php">Rooms & Suites</a>
            <a href="savor.php">Restaurant & Bar</a>
            <a href="experience.php">Water Activities</a>
            <a href="contact.php">Contact Us</a>
        </div>
        <div class="contact-info">
            <p><strong>Beatriz Rafaela Resort</strong></p>
            <p>Balud, Masbate, Philippines</p>
            <p>Phone: +639506828971</p>
            <p>Email: beatrizrafaelaresort@gmail.com</p>
        </div>
        <p>&copy; 2024 Beatriz Rafaela Resort. All Rights Reserved.</p>
    </div>

</body>
</html>
