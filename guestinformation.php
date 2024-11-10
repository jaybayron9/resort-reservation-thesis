<?php
  // index.php

  // Starting the session for any dynamic content
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatriz Rafaela Resort - Book a Room</title>
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
		.navbar .reserve-btn:hover {
			background-color: #b58d2b;
		}

        /* Booking Form Section */
        .booking-section {
            max-width: 1000px;
            margin: 50px auto;
            display: flex;
            gap: 20px;
            padding: 0 20px;
			font-family: 'Arial', sans-serif;
        }

        .booking-summary, .guest-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            color: #222;
            font-size: 14px;
			
        }

        .booking-summary {
            width: 35%;
        }

        .booking-summary h3 {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .booking-summary p {
            margin-bottom: 10px;
        }

        .total-amount {
            font-weight: bold;
            font-size: 18px;
            color: #d4af37;
            margin-top: 15px;
        }

        .guest-info {
            width: 65%;
        }

        .guest-info h3 {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .guest-info label {
            font-size: 14px;
            display: block;
            margin-bottom: 5px;
            color: #222;
        }

        .guest-info input, .guest-info select, .guest-info textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .note {
            font-size: 12px;
            color: #888;
            margin-top: -10px;
            margin-bottom: 15px;
        }

        .additional-info textarea {
		width: 100%;
		max-width: 500px;
		}
		
        /* Search Button */
        .search-btn {
            background-color: #d4af37;
            color: #222;
            font-size: 14px;
            padding: 12px 24px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            transition: background-color 0.3s;
			padding: 8px 16px;
        }

        .search-btn:hover {
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

        <a href="bookaroom.php">
		<button class="reserve-btn">RESERVE NOW</button>
		</a>
    </div>

    <!-- Booking Form Section -->
    <div class="booking-section">
        <!-- Your Stay Summary -->
        <div class="booking-summary">
            <h3>Your Stay</h3>
            <p><strong>Check-in Date</strong> 08 Nov 2024</p>
			<p><strong>Check-out Date</strong> 12 Nov 2024</p>
            <p><strong>Nights:</strong> 1</p>
            <p><strong>Rooms:</strong> 1</p>
            <p><strong>Adults:</strong> 1</p>
            <p><strong>Room Type:</strong> Deluxe Room</p>
            <p><strong>Rate per Night:</strong> PHP 5,110</p>
            <div class="total-amount">Total Amount: PHP 5,110</div>
        </div>

        <!-- Guest Information Form -->
        <div class="guest-info">
            <h3>Guest Information</h3>
            <form>
                <label>Title</label>
                <select>
                    <option>Mr.</option>
                    <option>Ms.</option>
                    <option>Mrs.</option>
                </select>

                <label>Full Name</label>
                <input type="text" name="fullname" required placeholder="Full Name">

                <label>Phone Number</label>
                <input type="text" name="phone" required placeholder="Phone Number">

                <label>Email Address</label>
                <input type="email" name="email" required placeholder="Email Address">

                <label>Additional Information</label>
                <textarea name="additional_info" placeholder="Any additional requests or info"></textarea>

				            <a href="reservation.php" class="search-btn">Submit Reservation</a>
        </form>
    </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-links">
            <a href="overview.php">Resort Overview</a>
            <a href="roomandsuites.php">Rooms & Suites</a>
            <a href="bookaroom.php">Book a Room</a>
            <a href="contactus.php">Contact Us</a>
        </div>
        <div class="contact-info">
            <p>Phone: +63 123 456 789</p>
            <p>Email: beatrizrafaelaresort@gmail.com</p>
        </div>
        <p>&copy; 2024 Beatriz Rafaela Resort | All Rights Reserved</p>
    </div>

</body>
</html>
s