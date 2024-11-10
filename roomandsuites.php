<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beatriz Rafaela Resort - Rooms & Suites</title>
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
		
        /* Room List Section */
        .room-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 50px 20px;
        }

        .room-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            cursor: pointer;
            transition: transform 0.3s;
			overflow: hidden;
        }
        .room-card:hover {
            transform: scale(1.05);
        }
        .room-card img {
            width: 100%;
			height: 200px;  
            object-fit: cover;
        }
        .card-body {
            padding: 15px;
        }
        .price {
            font-size: 18px;
            font-weight: bold;
            color: #d4af37;
            margin-top: 10px;
        }
		.close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #222;
            cursor: pointer;
        }

        /* Modal (Popup) */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }

        .modal-content {
            display: flex;
            background-color: #fff;
            border-radius: 8px;
            max-width: 800px;
            width: 80%;
            max-height: 90%;
            overflow: auto;
        }

        .modal-content img {
            width: 300px;
			height: 200px;
			object-fit: contain;
            border-radius: 8px 0 0 8px;
			margin: auto;
        }

        .modal-text {
            padding: 20px;
            width: 50%;
            overflow-y: auto;
        }

        .modal-text h2 {
            color: #222;
        }

        .modal-text ul {
            list-style: none;
            padding: 0;
        }

        .modal-text ul li {
		margin-bottom: 10px;
		} /* added the closing bracket */

        .overview-section {
            text-align: center;
			margin-top: 40px;
        }

        .overview-section h1 {
            font-size: 36px;
            color: #222;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .overview-section p {
            font-size: 17px;
            line-height: 1.6;
            max-width: 1000px;
            margin: 0 auto 15px; /* Reduced margin-bottom */
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
	
    <div class="overview-section">
        <h1>ROOMS AND SUITES</h1>
        <p>Experience comfort and luxury in our stylish rooms and suites, each featuring modern amenities and stunning views. Whether for relaxation or adventure, our accommodations offer the perfect setting for your stay.</p>

    <!-- Room List Section -->
   <div class="book-room-section">
		
    <div class="room-list">
        <!-- Room 1 -->
        <div class="room-card" onclick="openModal('room1')">
            <img src="PNGS/room1.jpg" alt="Villa 1 with Garden View">
            <div class="card-body">
                <h2>Villa 1 with Garden View</h2>
                <div class="price">₱5,000 / Night</div>
            </div>
        </div>

        <!-- Room 2 -->
        <div class="room-card" onclick="openModal('room2')">
            <img src="PNGS/room2.jpg" alt="Villa 2 with Garden View">
            <div class="card-body">
                <h2>Villa 2 with Garden View</h2>
                <div class="price">₱5,000 / Night</div>
            </div>
        </div>

        <!-- Room 3 -->
        <div class="room-card" onclick="openModal('room3')">
            <img src="PNGS/room3.jpg" alt="Villa 3 with Garden View">
            <div class="card-body">
                <h2>Villa 3 with Garden View</h2>
                <div class="price">₱5,000 / Night</div>
            </div>
        </div>

        <!-- Room 4 -->
        <div class="room-card" onclick="openModal('room4')">
            <img src="PNGS/room4.jpg" alt="Villa 4 with Garden View">
            <div class="card-body">
                <h2>Villa 4 with Garden View</h2>
                <div class="price">₱5,000 / Night</div>
            </div>
        </div>

        <!-- Room 5 -->
        <div class="room-card" onclick="openModal('room5')">
            <img src="PNGS/room5.jpg" alt="Villa 5 with Garden View">
            <div class="card-body">
                <h2>Villa 5 with Garden View</h2>
                <div class="price">₱4,000 / Night</div>
            </div>
        </div>

        <!-- Room 6 -->
        <div class="room-card" onclick="openModal('room6')">
            <img src="PNGS/room6.jpg" alt="Villa 6 - Beach Front">
            <div class="card-body">
                <h2>Villa 6 - Beach Front</h2>
                <div class="price">₱6,500 / Night</div>
            </div>
        </div>

        <!-- Room 7 -->
        <div class="room-card" onclick="openModal('room7')">
            <img src="PNGS/room7.jpg" alt="Villa 7 - Standard">
            <div class="card-body">
                <h2>Villa 7 - Standard</h2>
                <div class="price">₱3,000 / Night</div>
            </div>
        </div>

        <!-- Room 8 -->
        <div class="room-card" onclick="openModal('room8')">
            <img src="PNGS/room8.jpg" alt="Villa 8 - Beach Front">
            <div class="card-body">
                <h2>Villa 8 - Beach Front</h2>
                <div class="price">₱6,500 / Night</div>
            </div>
        </div>

        <!-- Room 9 -->
        <div class="room-card" onclick="openModal('room9')">
            <img src="PNGS/room9.jpg" alt="Villa 9 - Standard">
            <div class="card-body">
                <h2>Villa 9 - Standard</h2>
                <div class="price">₱3,000 / Night</div>
            </div>
        </div>

        <!-- Room 10 -->
        <div class="room-card" onclick="openModal('room10')">
            <img src="PNGS/room10.jpg" alt="Villa 10 with Private Pool - Beach Front">
            <div class="card-body">
                <h2>Villa 10 with Private Pool - Beach Front</h2>
                <div class="price">₱6,500 / Night</div>
            </div>
        </div>

        <!-- Room 11 -->
        <div class="room-card" onclick="openModal('room11')">
            <img src="PNGS/room11.jpg" alt="Villa 11 - Standard">
            <div class="card-body">
                <h2>Villa 11 - Standard</h2>
                <div class="price">₱6,000 / Night</div>
            </div>
        </div>

        <!-- Room 12 -->
        <div class="room-card" onclick="openModal('room12')">
            <img src="PNGS/room12.jpg" alt="Family Room - Corner with Loft">
            <div class="card-body">
                <h2>Family Room - Corner with Loft</h2>
                <div class="price">₱4,000 / Night</div>
            </div>
        </div>

        <!-- Room 13 -->
        <div class="room-card" onclick="openModal('room13')">
            <img src="PNGS/room13.jpg" alt="Family Room">
            <div class="card-body">
                <h2>Family Room</h2>
                <div class="price">₱5,000 / Night</div>
            </div>
        </div>
		
		<!-- Room 14 -->
		<div class="room-card" onclick="openModal('room14')">
			<img src="PNGS/room3.jpg" alt="Standard Room">
			<div class="card-body">
				<h2>Standard Room</h2>
				<div class="price">₱1,800 / Night</div>
			</div>
		</div>

		<!-- Room 15 -->
		<div class="room-card" onclick="openModal('room15')">
			<img src="PNGS/room6.jpg" alt="Standard Room with Loft">
			<div class="card-body">
				<h2>Standard Room with Loft</h2>
				<div class="price">₱3,000 / Night</div>
			</div>
		</div>

		<!-- Room 16 -->
		<div class="room-card" onclick="openModal('room16')">
			<img src="PNGS/room9.jpg" alt="Superior Room">
			<div class="card-body">
				<h2>Superior Room</h2>
				<div class="price">₱2,500 / Night</div>
			</div>
		</div>	
		</div>
		
	
	

    <!-- Modal Popups (for each room) -->

    <!-- Modal for Room 1 -->
    <div id="room1" class="modal">
        <div class="modal-content">
            <img src="PNGS/room1.jpg" alt="Villa 1 with Garden View">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room1')">&times;</span>
                <h2>Villa 1 with Garden View</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                <p>The air-conditioned villa has 1 bedroom and 1 bathroom with a bathtub and a shower. Boasting a balcony with garden views, this villa also features a wardrobe and a flat-screen TV. The unit has 1 bed.</p>
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 king bed</li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
    <!-- Modal for Room 2 -->
    <div id="room2" class="modal">
        <div class="modal-content">
            <img src="PNGS/room2.jpg" alt="Villa 2 with Garden View">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room2')">&times;</span>
                <h2>Villa 2 with Garden View</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                <p>Featuring free toiletries and bathrobes, this villa includes a private bathroom with a bathtub, a shower and a bidet. Boasting a balcony with garden views, this villa also features air conditioning and a flat-screen TV. The unit has 2 beds.</p>
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 king bed</li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
					<li>Clothes rackr</li>
					<li>Towels</li>
					
                </ul>
            </div>
        </div>
    </div>
	
		    <!-- Modal for Room 3 -->
    <div id="room3" class="modal">
        <div class="modal-content">
            <img src="PNGS/room3.jpg" alt="Villa 3 with Garden View">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room3')">&times;</span>
                <h2>Villa 3 with Garden View</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                <p>The air-conditioned villa features 1 bedroom and 1 bathroom with a bath and a shower. Featuring a balcony with garden views, this villa also provides a wardrobe and a flat-screen TV. The unit offers 1 bed.</p>
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen bed, 1 single bed</li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>3 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
			    <!-- Modal for Room 4 -->
    <div id="room4" class="modal">
        <div class="modal-content">
            <img src="PNGS/room4.jpg" alt="Villa 4 with Garden View">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room4')">&times;</span>
                <h2>Villa 4 with Garden Viewh2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                <p>The air-conditioned villa features 1 bedroom and 1 bathroom with a bath and a shower. Featuring a balcony with sea views, this villa also provides a wardrobe and a flat-screen TV. The unit offers 1 bed.</p>
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen bed, 1 single bed</li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>3 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
			    <!-- Modal for Room 5 -->
    <div id="room5" class="modal">
        <div class="modal-content">
            <img src="PNGS/room5.jpg" alt="Villa 5 with Garden View">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room5')">&times;</span>
                <h2>Villa 5 with Garden View</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                <p>The air-conditioned villa features 1 bedroom and 1 bathroom with a bath and a shower. This villa has a wardrobe, an electric kettle, a flat-screen TV and a balcony. The unit offers 1 bed.</p>
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen bed</li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
				    <!-- Modal for Room 6 -->
    <div id="room6" class="modal">
        <div class="modal-content">
            <img src="PNGS/room6.jpg" alt="Villa 6 - Beach Front">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room6')">&times;</span>
                <h2>Villa 6 - Beach Front</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                <p>The air-conditioned villa features 1 bedroom and 1 bathroom with a bath and a shower. Featuring a balcony with sea views, this villa also provides a wardrobe and a flat-screen TV. The unit offers 1 bed.</p>
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen bed</li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
    <!-- Modal for Room 7 -->
    <div id="room7" class="modal">
        <div class="modal-content">
            <img src="PNGS/room7.jpg" alt="Villa 7 - Standard">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room7')">&times;</span>
                <h2>Villa 7 - Standard</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                <p>This villa consists of 1 living room, 1 separate bedroom and 1 bathroom with a bath and free toiletries. Featuring a balcony, this villa also provides air conditioning, a wardrobe and a flat-screen TV. The unit offers 4 beds.</p>
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen bed </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	    <!-- Modal for Room 8 -->
    <div id="room8" class="modal">
        <div class="modal-content">
            <img src="PNGS/room8.jpg" alt="Villa 8 - Beach Front">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room8')">&times;</span>
                <h2>Villa 8 - Beach Front</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen bed</li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	    <!-- Modal for Room 9 -->
    <div id="room9" class="modal">
        <div class="modal-content">
            <img src="PNGS/room9.jpg" alt="Villa 9 - Standard">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room9')">&times;</span>
                <h2>Villa 9 - Standard</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen bed  </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	    <!-- Modal for Room 10 -->
    <div id="room10" class="modal">
        <div class="modal-content">
            <img src="PNGS/room10.jpg" alt="Villa 10 with Private Pool - Beach Front">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room10')">&times;</span>
                <h2>Villa 10 with Private Pool - Beach Front</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
               
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen bed  </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	    <!-- Modal for Room 11 -->
    <div id="room11" class="modal">
        <div class="modal-content">
            <img src="PNGS/room11.jpg" alt="Villa 11 - Standard">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room11')">&times;</span>
                <h2>Villa 11 - Standard</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 king bed, 3 single beds </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>5 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	
	
	    <!-- Modal for Room 12 -->
    <div id="room12" class="modal">
        <div class="modal-content">
            <img src="PNGS/room12.jpg" alt="Family Room - Corner with Loft">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room12')">&times;</span>
                <h2>Family Room - Corner with Loft</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                
				
				<h3>Bed frame:</h3>
                <ul>
                    <li>2 king beds, 2 twin beds  </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>6 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	    <!-- Modal for Room 13 -->
    <div id="room13" class="modal">
        <div class="modal-content">
            <img src="PNGS/room13.jpg" alt="Family Room">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room13')">&times;</span>
                <h2>Family Room</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                
				<h3>Bed frame:</h3>
                <ul>
                    <li>2 king beds, 2 twin beds </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>6 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	    <!-- Modal for Room 14 -->
    <div id="room14" class="modal">
        <div class="modal-content">
            <img src="PNGS/room8.jpg" alt="Standard Room">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room14')">&times;</span>
                <h2>Standard Room</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 queen </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>2 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	    <!-- Modal for Room 15 -->
    <div id="room15" class="modal">
        <div class="modal-content">
            <img src="PNGS/room3.jpg" alt="Standard Room with Loft">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room15')">&times;</span>
                <h2>Standard Room with Loft</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 king bed, 3 twin beds </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>5 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	
	    <!-- Modal for Room 16 -->
    <div id="room16" class="modal">
        <div class="modal-content">
            <img src="PNGS/room5.jpg" alt="Superior Room">
            <div class="modal-text">
                <span class="close-btn" onclick="closeModal('room16')">&times;</span>
                <h2>Superior Room</h2>
                <ul>
                    <li><strong>Entire villa</strong></li>
                    <li><strong>15 m²</strong></li>
                    <li><strong>Balcony</strong></li>
                    <li><strong>Garden view</strong></li>
                    <li><strong>Air conditioning</strong></li>
                    <li><strong>Private Bathroom</strong></li>
                    <li><strong>Flat-screen TV</strong></li>
                    <li><strong>Free Wifi</strong></li>
                </ul>
                
				<h3>Bed frame:</h3>
                <ul>
                    <li>1 king bed, 1 twin bed </li>
                </ul>
				<h3>Good for:</h3>
                <ul>
                <li>3 guests</li>
                </ul>
                <h3>In your private bathroom:</h3>
                <ul>
                    <li>Free toiletries</li>
                    <li>Bathrobe</li>
                    <li>Bidet</li>
                    <li>Toilet</li>
                    <li>Bathtub or shower</li>
                    <li>Towels</li>
                    <li>Slippers</li>
                    <li>Hairdryer</li>
					<li>Toilet paper</li>
                </ul>
					<h3>View:</h3>
                <ul>
                    <li>Garden View</li>
                </ul>
                <h3>Villa Facilities:</h3>
                <ul>
                    <li>Balcony</li>
                    <li>Air conditioning</li>
                    <li>Flat-screen TV</li>
                    <li>Electric kettle</li>
                    <li>Wardrobe or closet</li>
					<li>Clothes rack</li>
					<li>Drying rack for clothing</li>
					<li>Hand sanitizer</li>
                </ul>
            </div>
        </div>
    </div>
	

    <!-- Footer -->
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

    <script>
    function openModal(roomId) {
        document.getElementById(roomId).style.display = "flex";
    }

    function closeModal(roomId) {
        document.getElementById(roomId).style.display = "none";
    }
</script>
</body>
</html>
