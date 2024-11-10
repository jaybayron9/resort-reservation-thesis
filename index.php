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
    <title>Beatriz Rafaela Resort - Homepage</title>
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

        /* Hero Section (Carousel) */
        .hero {
            position: relative;
            height: 100vh;
            overflow: hidden;
            color: #ffffff;
            text-align: center;
        }

        .carousel-container {
            display: flex;
            height: 100%;
            width: 100%;
            position: relative;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: opacity 1s ease-in-out, visibility 1s ease-in-out;
        }

        .carousel-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 1;
        }

        .carousel-slide .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .carousel-content {
            position: relative;
            z-index: 1;
            max-width: 600px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid #d4af37;
        }

        .carousel-content .subtitle {
            font-size: 16px;
            color: #d4af37;
            font-style: italic;
            margin-bottom: 10px;
        }

        .carousel-content h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .carousel-content p {
            font-size: 14px;
            margin-bottom: 20px;
        }

        .carousel-content .cta {
            font-size: 14px;
            color: #d4af37;
            font-weight: bold;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid #d4af37;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
        }

        .carousel-content .cta:hover {
            background-color: #d4af37;
            color: #222;
        }

        /* Navigation Arrows */
        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: #d4af37;
            padding: 10px;
            font-size: 24px;
            cursor: pointer;
            z-index: 10;
            transition: background-color 0.3s ease;
        }

        .arrow-left {
            left: 20px;
        }

        .arrow-right {
            right: 20px;
        }

        .arrow:hover {
            background-color: rgba(0, 0, 0, 0.7);
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
            .carousel-content {
                max-width: 90%;
            }

            .carousel-content h1 {
                font-size: 24px;
            }

            .carousel-content .subtitle {
                font-size: 14px;
            }

            .navbar .nav-links {
                font-size: 12px;
            }

            .footer .footer-links {
                flex-direction: column;
                align-items: center;
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

    <!-- Hero Section with Carousel -->
    <div class="hero">
        <div class="carousel-container">
            <!-- Slide 1 -->
            <div class="carousel-slide active" style="background-image: url('PNGS/Homepage.jpg');">
                <div class="overlay"></div>
                <div class="carousel-content">
                    <div class="subtitle">An Oasis by the Shoreline</div>
                    <h1>YOUR LUXURIOUS GETAWAY AWAITS</h1>
                    <p>Escape to Beatriz Rafaela Resort, where elegance meets tranquility. Let the pristine sands and serene ocean views soothe your senses.</p>
                    <a href="roomandsuites.php" class="cta">Discover Our Rooms</a>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-slide" style="background-image: url('PNGS/Homepage3.jpg');">
                <div class="overlay"></div>
                <div class="carousel-content">
                    <div class="subtitle">Dive Into Fun and Relaxation</div>
                    <h1>A SPLASH OF ADVENTURE AND SERENITY</h1>
                    <p>Unwind by our stunning pool or dive into exciting water activities. Whether you're seeking relaxation or adventure, we've got it all.</p>
                    <a href="bookaroom.php" class="cta">Book Now</a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-slide" style="background-image: url('PNGS/Homepage2.jpg');">
                <div class="overlay"></div>
                <div class="carousel-content">
                    <div class="subtitle">Savor the Flavors of Paradise</div>
                    <h1>GASTRONOMY REDEFINED</h1>
                    <p>Indulge in exquisite dishes and refreshing cocktails at our world-class restaurant and poolside bar. A culinary journey awaits you.</p>
                    <a href="overview.php" class="cta">Explore Now</a>
                </div>
            </div>
        </div>

        <!-- Navigation Arrows -->
        <div class="arrow arrow-left" onclick="prevSlide()">&#10094;</div>
        <div class="arrow arrow-right" onclick="nextSlide()">&#10095;</div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-links">
            <a href="overview.php">Resort Overview</a>
            <a href="room.php">Rooms & Suites</a>
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

    <!-- JavaScript for Carousel Functionality -->
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-slide');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 5000); // Slide changes every 5 seconds
    </script>
</body>
</html>
