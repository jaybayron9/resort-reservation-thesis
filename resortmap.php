<?php
  // resort-map.php

  // Starting the session for any dynamic content
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatriz Rafaela Resort - Resort Map</title>
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

        /* Resort Map Section */
        .map-section {
            padding: 50px 20px;
            text-align: center;
        }

        .map-section h1 {
            font-size: 36px;
            color: #222;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .map-container {
            width: 100%;
            height: 500px;
            margin: 30px auto;
            border-radius: 8px;
            overflow: hidden;
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

            .map-section {
                padding: 30px 10px;
            }

            .map-section h1 {
                font-size: 28px;
            }

            .map-container {
                height: 300px;
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

        <a href="bookaroom.php">
		<button class="reserve-btn">RESERVE NOW</button>
		</a>
    </div>

    <!-- Resort Map Section -->
    <div class="map-section">
        <h1>RESORT MAP</h1>
        <p>Beatriz Rafaela Resort sits along the scenic coastline of Panubigan, Balud, Masbate. A coastal area known for stretches of white sand and views of the ocean.</p>
        <div class="map-container">
    <!-- Embedding Google Map with Coordinates for Beatriz Rafaela Resort -->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3084.403127053093!2d123.5123456!3d13.456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f7eea7b7439b5c3%3A0x5575e7bc50ca2154!2sBeatriz%20Rafaela%20Resort!5e0!3m2!1sen!2sph!4v1692876471000"
        width="100%"
        height="100%"
        style="border:0;"
        allowfullscreen=""
        loading="lazy">
    </iframe>
</div>
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
