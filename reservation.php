<?php
  // bookaroom.php

  session_start();

  // Assuming the check-in and check-out dates are passed from the previous page
  $checkIn = isset($_SESSION['check-in']) ? $_SESSION['check-in'] : null;
  $checkOut = isset($_SESSION['check-out']) ? $_SESSION['check-out'] : null;

  // Fetch available rooms based on the selected dates (this is an example)
  // $rooms = fetchAvailableRooms($checkIn, $checkOut);
  // For the sake of this example, we'll use a static array to simulate the data.

  $rooms = [
    [
      'name' => 'Ocean View Suite',
      'image' => 'room1.jpg',
      'rate' => 250,
      'details' => 'A beautiful suite with ocean views, king-sized bed, and luxurious amenities.',
      'availability' => true
    ],
    [
      'name' => 'Mountain View Room',
      'image' => 'room2.jpg',
      'rate' => 180,
      'details' => 'A cozy room with mountain views, perfect for a relaxing stay.',
      'availability' => true
    ],
    [
      'name' => 'Garden View Deluxe',
      'image' => 'room3.jpg',
      'rate' => 220,
      'details' => 'Spacious room with a view of the resort gardens and a private balcony.',
      'availability' => true
    ]
  ];
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

        /* Room Cards */
        .room-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            width: 30%;
            margin: 20px;
        }
        .room-card img {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
        }
        .room-card h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #222;
        }
        .room-card p {
            color: #555;
            font-size: 14px;
            margin-bottom: 15px;
        }
        .room-card .rate {
            font-size: 20px;
            font-weight: bold;
            color: #d4af37;
        }
        .room-card .reserve-btn {
            background-color: #d4af37;
            color: #222;
            padding: 10px 20px;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .room-card .reserve-btn:hover {
            background-color: #b58d2b;
        }

        .rooms-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
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

    <!-- Book a Room Section -->
    <div class="book-room-section">
        <h1>AVAILABLE ROOMS</h1>
        <p>Choose from a variety of rooms available during your stay.</p>

        <!-- Available Rooms Display -->
        <div class="rooms-grid">
            <?php foreach ($rooms as $room): ?>
                <?php if ($room['availability']): ?>
                    <div class="room-card">
                        <img src="images/<?= $room['image'] ?>" alt="<?= $room['name'] ?>">
                        <h3><?= $room['name'] ?></h3>
                        <p><?= $room['details'] ?></p>
                        <p class="rate">$<?= number_format($room['rate'], 2) ?> per night</p>
                        <a href="guestinformation.php?room=<?= urlencode($room['name']) ?>" class="reserve-btn">Reserve Now</a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
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
