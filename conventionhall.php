<?php
  // conventionhall.php

  // Starting the session for any dynamic content
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatriz Rafaela Resort - Convention Hall</title>
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

        /* Convention Hall Section */
        .conventionhall-section {
            padding: 50px 20px;
            text-align: center;
        }

        .conventionhall-section h1 {
            font-size: 36px;
            color: #222;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .conventionhall-section p {
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
        .hall-image {
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

            .conventionhall-section {
                padding: 30px 10px;
            }

            .conventionhall-section h1 {
                font-size: 28px;
            }

            .conventionhall-section p {
                font-size: 16px;
            }

            .image-gallery {
                justify-content: center;
            }

            .hall-image {
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

    <!-- Convention Hall Section -->
    <div class="conventionhall-section">
        <h1>CONVENTION HALL</h1>
        <p>Our Convention Hall is the ideal venue for meetings, conferences, and social events. With a capacity to host up to 200 guests, it offers a sophisticated and flexible space for any occasion. Equipped with modern amenities and flexible seating arrangements, our hall is perfect for both intimate gatherings and large-scale events. Whether you're planning a corporate seminar, wedding reception, or a banquet, our team will ensure that your event is a resounding success.</p>

        <!-- Image Gallery with Convention Hall Images -->
        <div class="image-gallery">
            <img src="PNGS/conventionhall1.jpg" alt="Convention Hall Interior" class="hall-image">
            <img src="PNGS/conventionhall2.jpg" alt="Convention Hall Setup" class="hall-image">
            <img src="PNGS/conventionhall3.jpg" alt="Event in the Convention Hall" class="hall-image">
        </div>

        <!-- Call-to-Action Button -->
        <a href="bookaroom.php" class="cta-btn">BOOK THE CONVENTION HALL</a>
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
