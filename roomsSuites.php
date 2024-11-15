<?php include('databaseConnection.php') ?>
<?php include('guestComponents/headers.php') ?>
<?php include('guestComponents/navigations.php') ?>

<div class="overview-section">
    <h1>ROOMS AND SUITES</h1>
    <p>Experience comfort and luxury in our stylish rooms and suites, each featuring modern amenities and stunning views. Whether for relaxation or adventure, our accommodations offer the perfect setting for your stay.</p>

<!-- Room List Section -->
<div class="book-room-section">
    
<div class="room-list">
    <!-- Room 1 -->
    <div class="room-card" onclick="openModal('room1')">
        <img src="/assets/imgs/room1.jpg" alt="Villa 1 with Garden View">
        <div class="card-body">
            <h2>Villa 1 with Garden View</h2>
            <div class="price">₱5,000 / Night</div>
        </div>
    </div>

    <!-- Room 2 -->
    <div class="room-card" onclick="openModal('room2')">
        <img src="/assets/imgs/room2.jpg" alt="Villa 2 with Garden View">
        <div class="card-body">
            <h2>Villa 2 with Garden View</h2>
            <div class="price">₱5,000 / Night</div>
        </div>
    </div>

    <!-- Room 3 -->
    <div class="room-card" onclick="openModal('room3')">
        <img src="/assets/imgs/room3.jpg" alt="Villa 3 with Garden View">
        <div class="card-body">
            <h2>Villa 3 with Garden View</h2>
            <div class="price">₱5,000 / Night</div>
        </div>
    </div>

    <!-- Room 4 -->
    <div class="room-card" onclick="openModal('room4')">
        <img src="/assets/imgs/room4.jpg" alt="Villa 4 with Garden View">
        <div class="card-body">
            <h2>Villa 4 with Garden View</h2>
            <div class="price">₱5,000 / Night</div>
        </div>
    </div>

    <!-- Room 5 -->
    <div class="room-card" onclick="openModal('room5')">
        <img src="/assets/imgs/room5.jpg" alt="Villa 5 with Garden View">
        <div class="card-body">
            <h2>Villa 5 with Garden View</h2>
            <div class="price">₱4,000 / Night</div>
        </div>
    </div>

    <!-- Room 6 -->
    <div class="room-card" onclick="openModal('room6')">
        <img src="/assets/imgs/room6.jpg" alt="Villa 6 - Beach Front">
        <div class="card-body">
            <h2>Villa 6 - Beach Front</h2>
            <div class="price">₱6,500 / Night</div>
        </div>
    </div>

    <!-- Room 7 -->
    <div class="room-card" onclick="openModal('room7')">
        <img src="/assets/imgs/room7.jpg" alt="Villa 7 - Standard">
        <div class="card-body">
            <h2>Villa 7 - Standard</h2>
            <div class="price">₱3,000 / Night</div>
        </div>
    </div>

    <!-- Room 8 -->
    <div class="room-card" onclick="openModal('room8')">
        <img src="/assets/imgs/room8.jpg" alt="Villa 8 - Beach Front">
        <div class="card-body">
            <h2>Villa 8 - Beach Front</h2>
            <div class="price">₱6,500 / Night</div>
        </div>
    </div>

    <!-- Room 9 -->
    <div class="room-card" onclick="openModal('room9')">
        <img src="/assets/imgs/room9.jpg" alt="Villa 9 - Standard">
        <div class="card-body">
            <h2>Villa 9 - Standard</h2>
            <div class="price">₱3,000 / Night</div>
        </div>
    </div>

    <!-- Room 10 -->
    <div class="room-card" onclick="openModal('room10')">
        <img src="/assets/imgs/room10.jpg" alt="Villa 10 with Private Pool - Beach Front">
        <div class="card-body">
            <h2>Villa 10 with Private Pool - Beach Front</h2>
            <div class="price">₱6,500 / Night</div>
        </div>
    </div>

    <!-- Room 11 -->
    <div class="room-card" onclick="openModal('room11')">
        <img src="/assets/imgs/room11.jpg" alt="Villa 11 - Standard">
        <div class="card-body">
            <h2>Villa 11 - Standard</h2>
            <div class="price">₱6,000 / Night</div>
        </div>
    </div>

    <!-- Room 12 -->
    <div class="room-card" onclick="openModal('room12')">
        <img src="/assets/imgs/room12.jpg" alt="Family Room - Corner with Loft">
        <div class="card-body">
            <h2>Family Room - Corner with Loft</h2>
            <div class="price">₱4,000 / Night</div>
        </div>
    </div>

    <!-- Room 13 -->
    <div class="room-card" onclick="openModal('room13')">
        <img src="/assets/imgs/room13.jpg" alt="Family Room">
        <div class="card-body">
            <h2>Family Room</h2>
            <div class="price">₱5,000 / Night</div>
        </div>
    </div>
    
    <!-- Room 14 -->
    <div class="room-card" onclick="openModal('room14')">
        <img src="/assets/imgs/room3.jpg" alt="Standard Room">
        <div class="card-body">
            <h2>Standard Room</h2>
            <div class="price">₱1,800 / Night</div>
        </div>
    </div>

    <!-- Room 15 -->
    <div class="room-card" onclick="openModal('room15')">
        <img src="/assets/imgs/room6.jpg" alt="Standard Room with Loft">
        <div class="card-body">
            <h2>Standard Room with Loft</h2>
            <div class="price">₱3,000 / Night</div>
        </div>
    </div>

    <!-- Room 16 -->
    <div class="room-card" onclick="openModal('room16')">
        <img src="/assets/imgs/room9.jpg" alt="Superior Room">
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
        <img src="/assets/imgs/room1.jpg" alt="Villa 1 with Garden View">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room1')">&times;</span>
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
        <img src="/assets/imgs/room2.jpg" alt="Villa 2 with Garden View">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room2')">&times;</span>
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
        <img src="/assets/imgs/room3.jpg" alt="Villa 3 with Garden View">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room3')">&times;</span>
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
        <img src="/assets/imgs/room4.jpg" alt="Villa 4 with Garden View">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room4')">&times;</span>
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
        <img src="/assets/imgs/room5.jpg" alt="Villa 5 with Garden View">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room5')">&times;</span>
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
        <img src="/assets/imgs/room6.jpg" alt="Villa 6 - Beach Front">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room6')">&times;</span>
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
        <img src="/assets/imgs/room7.jpg" alt="Villa 7 - Standard">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room7')">&times;</span>
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
        <img src="/assets/imgs/room8.jpg" alt="Villa 8 - Beach Front">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room8')">&times;</span>
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
        <img src="/assets/imgs/room9.jpg" alt="Villa 9 - Standard">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room9')">&times;</span>
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
        <img src="/assets/imgs/room10.jpg" alt="Villa 10 with Private Pool - Beach Front">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room10')">&times;</span>
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
        <img src="/assets/imgs/room11.jpg" alt="Villa 11 - Standard">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room11')">&times;</span>
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
        <img src="/assets/imgs/room12.jpg" alt="Family Room - Corner with Loft">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room12')">&times;</span>
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
        <img src="/assets/imgs/room13.jpg" alt="Family Room">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room13')">&times;</span>
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
        <img src="/assets/imgs/room8.jpg" alt="Standard Room">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room14')">&times;</span>
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
        <img src="/assets/imgs/room3.jpg" alt="Standard Room with Loft">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room15')">&times;</span>
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
        <img src="/assets/imgs/room5.jpg" alt="Superior Room">
        <div class="modal-text">
            <span class="close-btn text-white" onclick="closeModal('room16')">&times;</span>
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

<script src="/assets/js/roomsSuites.js"></script>
<?php include('guestComponents/footer.php') ?>