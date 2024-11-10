<?php
  // wateractivities.php

  // Starting the session for any dynamic content
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatriz Rafaela Resort - Water Activities</title>
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

        /* Water Activities Section */
        .water-activities-section {
            padding: 50px 20px;
            text-align: center;
        }

        .water-activities-section h1 {
            font-size: 36px;
            color: #222;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .water-activities-section p {
            font-size: 17px;
            color: #555;
            line-height: 1.6;
            max-width: 1000px;
            margin: 0 auto 15px; /* Reduced margin-bottom */
        }

        /* Flexbox container for images */
        .image-gallery {
            display: flex;
            justify-content: space-around;
            gap: 20px;  /* Add space between the images */
            flex-wrap: wrap;  /* Ensure it wraps on smaller screens */
            margin-bottom: 20px;
        }

        /* Individual image styling */
        .water-activity-image {
            max-width: 30%;  /* Limit the image to 30% of the container's width */
            height: auto;    /* Keep the aspect ratio */
            border-radius: 8px;
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

            .water-activities-section {
                padding: 30px 10px;
            }

            .water-activities-section h1 {
                font-size: 28px;
            }

            .water-activities-section p {
                font-size: 16px;
            }

            .image-gallery {
                justify-content: center;
            }

            .water-activity-image {
                max-width: 100%;  /* On small screens, make images 100% wide */
                margin-bottom: 15px;  /* Space between images */
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
                        <a href="conventionhall.php">CONVENTION HALL</a>
                        <a href="swimmingpool.php">SWIMMING POOL</a>
                        <a href="wateractivities.php">WATER ACTIVITIES</a>
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

    <!-- Water Activities Section -->
    <div class="water-activities-section">
        <h1>WATER ACTIVITIES</h1>
        <p>Experience thrilling water activities right at our doorstep! Beatriz Rafaela Resort offers a wide variety of water sports and recreational activities to make your stay unforgettable. From exhilarating jet-ski rides and banana boat adventures to paddleboarding and snorkeling, there's something for everyone. Let our professional instructors guide you as you explore the crystal-clear waters and enjoy the beautiful coastal scenery.</p>

        <!-- Image Gallery with Water Activity Images -->
        <div class="image-gallery">
            <img src="PNGS/wateractivity1.jpg" alt="Jet Ski Adventure" class="water-activity-image">
            <img src="PNGS/wateractivity2.jpg" alt="Snorkeling Experience" class="water-activity-image">
            <img src="PNGS/wateractivity3.jpg" alt="Paddleboarding Fun" class="water-activity-image">
        </div>

        <a href="bookaroom.php" class="cta-btn">BOOK YOUR WATER ADVENTURE NOW!</a>
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
