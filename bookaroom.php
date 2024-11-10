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

        /* Book a Room Section */
        .book-room-section {
            padding: 40px 20px;
            text-align: center;
        }

        .book-room-section h1 {
            font-size: 36px;
            color: #222;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .book-room-section p {
            font-size: 17px;
            color: #555;
            margin-bottom: 20px;
        }

        .booking-form {
            background-color: #fff8e5; /* Container color */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .booking-form label {
            font-size: 16px;
            color: #555;
            display: block;
            margin-bottom: 5px;
			font-weight: bold;
        }

        .booking-form input[type="date"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        /* Guests Section */
        .guests-section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .guests-section > div {
            text-align: center;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .guests-section > div: nth-child(4) {
            border-bottom: none; /* Remove border from last guest type */
        }

        /* Bold labels for Adults, Kids , Infants, Pets */
        .guests-section > div > p:first-child {
            font-weight: bold; /* This applies bold only to the main labels */
            font-size: 16px;
            color: #555;
        }

        .guests-section p.guest-type {
            font-size: 14px;
            color: #888; /* Smaller font size for the age groups */
        }

        .guests-control {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .guests-control button {
            font-size: 18px;
            background-color: #d4af37;
            color: #222;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }

        .guests-control span {
            font-size: 16px;
            color: #555;
        }

        /* Search Button */
        .search-btn {
            background-color: #d4af37;
            color: #222;
            font-size: 16px;
            padding: 12px 24px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            transition: background-color 0.3s;
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

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar .nav-links {
                flex-direction: column;
                align-items: center;
                font-size: 12px;
            }

            .book-room-section {
                padding: 30px 10px;
            }

            .book-room-section h1 {
                font-size: 28px;
            }

            .book-room-section p {
                font-size: 16px;
            }

            .booking-form {
                width: 100%;
                padding: 20px;
            }
        }
    </style>

    <!-- JavaScript -->
    <script>
        function adjustCount(guestType, change) {
            const guestElement = document.getElementById(guestType);
            let currentCount = parseInt(guestElement.innerText);
            
            currentCount += change;
            
            // Prevent the count from going below 0
            if (currentCount < 0) currentCount = 0;
            
            // Update the displayed count
            guestElement.innerText = currentCount;
        }
    </script>
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

    <!-- Book a Room Section -->
    <div class="book-room-section">
        <h1>BOOK A ROOM</h1>
        <p>Start planning your perfect getaway at Beatriz Rafaela Resort! Choose your check-in and check-out dates, tell us how many guests are coming, and we'll find the perfect room for you.</p>
	
        <!-- Booking Form -->
        <form class="booking-form">
            <!-- Dates Section -->
            <label for="check-in">Check-in Date</label>
            <input type="date" id="check-in" name="check-in">

            <label for="check-out">Check-out Date</label>
            <input type="date" id="check-out" name="check-out">

            <!-- Guests Section -->
            <div class="guests-section">
                <div>
                    <p>Adults</p>
                    <p class="guest-type">Ages 13 and above</p>
                    <div class="guests-control">
                        <button type="button" onclick="adjustCount('adults', -1)">-</button>
                        <span id="adults">0</span>
                        <button type="button" onclick="adjustCount('adults', 1)">+</button>
                    </div>
                </div>

                <div>
                    <p>Kids</p>
                    <p class="guest-type">Ages 2-10</p>
                    <div class="guests-control">
                        <button type="button" onclick="adjustCount('kids', -1)">-</button>
                        <span id="kids">0</span>
                        <button type="button" onclick="adjustCount('kids', 1)">+</button>
                    </div>
                </div>

                <div>
                    <p>Infants</p>
                    <p class="guest-type">Under 2</p>
                    <div class="guests-control">
                        <button type="button" onclick="adjustCount('infants', -1)">-</button>
                        <span id="infants">0</span>
                        <button type="button" onclick="adjustCount('infants', 1)">+</button>
                    </div>
                </div>

                <div>
                    <p>Pets</p>
                    <p class="guest-type">Bringing a service animal?</p>
                    <div class="guests-control">
                        <button type="button" onclick="adjustCount('pets', -1)">-</button>
                        <span id="pets">0</span>
                        <button type="button" onclick="adjustCount('pets', 1)">+</button>
                    </div>
                </div>
            </div>

            <!-- Search Button -->
            <a href="reservation.php" class="search-btn">Search Availability</a>
        </form>
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
