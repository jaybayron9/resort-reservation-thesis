<?php include('databaseConnection.php') ?>
<?php include('guestComponents/headers.php') ?>
<?php include('guestComponents/navigations.php') ?>

<?php 
if (isset($_GET['booked'])) {
    echo "<script>
        alert('Booked Successfully');
        window.location.replace('/');
    </script>";
}
?>

<div class="hero">
    <div class="carousel-container">
        <!-- Slide 1 -->
        <div class="carousel-slide active" style="background-image: url('assets/imgs/Homepage.jpg');">
            <div class="overlay"></div>
            <div class="carousel-content">
                <div class="subtitle">An Oasis by the Shoreline</div>
                <h1>YOUR LUXURIOUS GETAWAY AWAITS</h1>
                <p>Escape to Beatriz Rafaela Resort, where elegance meets tranquility. Let the pristine sands and serene ocean views soothe your senses.</p>
                <a href="roomsSuites.php" class="cta">Discover Our Rooms</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-slide" style="background-image: url('assets/imgs/Homepage3.jpg');">
            <div class="overlay"></div>
            <div class="carousel-content">
                <div class="subtitle">Dive Into Fun and Relaxation</div>
                <h1>A SPLASH OF ADVENTURE AND SERENITY</h1>
                <p>Unwind by our stunning pool or dive into exciting water activities. Whether you're seeking relaxation or adventure, we've got it all.</p>
                <a href="userReservation.php" class="cta">Book Now</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-slide" style="background-image: url('assets/imgs/Homepage2.jpg');">
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
    <div class="arrow arrow-left" id="prevSlice">&#10094;</div>
    <div class="arrow arrow-right" id="nextSlide">&#10095;</div>
</div>

<script src="assets/js/carousel.js"></script>
<?php include('guestComponents/footer.php') ?>