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
    <title>Beatriz Rafaela Resort - Resort Overview</title>
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

        /* Resort Overview Section */
        .overview-section {
            padding: 50px 20px;
            text-align: center;
        }

        .overview-section h1 {
            font-size: 36px;
            color: #222;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .overview-section p {
            font-size: 17px;
            color: #555;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto 15px; /* Reduced margin-bottom */
        }

        .overview-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px; /* Reduced margin-bottom */
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

        /* New Features Section */
        .features-section {
            background: linear-gradient(135deg, #fff8e5, #fff8e5);
            padding: 30px 20px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin: -10px auto 30px; /* Reduced margin-top and increased margin-bottom */
            max-width: 900px;
            color: #555;
        }

        .features-section h2 {
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .features-section ul {
            list-style-type: none;
            font-size: 16px;
            padding: 0;
            margin: 0;
        }

        .features-section li {
            margin-bottom: 12px;
            position: relative;
            padding-left: 30px;
        }

        .features-section li:before {
            content: '✔';
            position: absolute;
            left: 0;
            top: 0;
            color: #d4af37;
            font-size: 18px;
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

            .overview-section {
                padding: 30px 10px;
            }

            .overview-section h1 {
                font-size: 28px;
            }

            .overview-section p {
                font-size: 16px;
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

    <!-- Resort Overview Section -->
    <div class="overview-section">
        <h1>RESORT OVERVIEW</h1>
        <p>Welcome to Beatriz Rafaela Resort, a luxurious sanctuary nestled by the serene coastline. Our resort offers a blend of tranquility and adventure, where you can unwind in exquisite villas or indulge in thrilling water activities. Whether you're here to relax by the pool, explore vibrant coral reefs, or savor delectable dishes at our on-site restaurant, we guarantee an unforgettable stay.</p>
        <img src="PNGS/Homepage4.jpg" alt="Resort Overview" class="overview-image">
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <h2>Resort Features and Facilities</h2>
        <ul>
            <li>Various air-conditioned villas with flat-screen TVs, including options with garden views or beachfront access.</li>
            <li>Free Wi-Fi, parking, and access to the pool.</li>
            <li>Complimentary use of paddle crafts and snorkeling gear.</li>
            <li>On-site restaurant (outside food is not allowed).</li>
            <li>Pet-friendly accommodations in specific villas for an additional fee.</li>
            <li>Hot and cold showers, with free breakfast provided in select villas.</li>
            <li>Transportation services (charges apply).</li>
        </ul>
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
