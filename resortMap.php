<?php include('databaseConnection.php') ?>
<?php include('guestComponents/headers.php') ?>
<?php include('guestComponents/navigations.php') ?>

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

<?php include('guestComponents/footer.php') ?>