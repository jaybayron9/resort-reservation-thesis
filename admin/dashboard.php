<?php include('../databaseConnection.php') ?>
<?php include('adminComponents/headers.php') ?>
<?php include('adminComponents/navigations.php') ?>

<div class="main-content">
    <div class="content-header">
        <h2>Admin Dashboard</h2>
        <p>Welcome, <?=$_SESSION['admin_data']['first_name'] . " " . $_SESSION['admin_data']['last_name']; ?>! Manage your resort operations from here.</p>
    </div>
    <div class="card">
        <h3>Latest Reservations</h3>
        <p class="mb-3">View and manage the most recent reservations made.</p>
        <a href="reservationM.php" class="book-now-button">View Reservations</a>
    </div>
    <div class="card">
        <h3>Payments Management</h3>
        <p class="mb-3">Manage payment details most recent payment made.</p>
        <a href="payments_list.php" class="book-now-button">View Payments</a>
    </div>
    <div class="card">
        <h3>Logs Management</h3>
        <p class="mb-3">Check and monitor daily logs.</p>
        <a href="logs_list.php" class="book-now-button">View Logs</a>
    </div>
    <div class="card">
        <h3>Contact Information</h3>
        <p>Contact us: beatrizrafaelaresort@gmail.com | Phone: 0950 682 8971</p>
    </div>
</div>

<?php include('adminComponents/footer.php') ?>