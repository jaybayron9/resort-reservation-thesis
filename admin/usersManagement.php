<?php include('../databaseConnection.php') ?>
<?php include('adminComponents/headers.php') ?>
<?php include('adminComponents/navigations.php') ?>
<div class="container" style="padding: 20px;">
    <h2>User List</h2>
    
    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success text-green-700 bg-green-300 py-2">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Contact Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php

        $sql = "SELECT * FROM users"; 
        $stmt = $conn->query($sql);

        if ($stmt->num_rows > 0) {

            foreach ($stmt->fetch_all(MYSQLI_ASSOC) as $row) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['email_address']}</td>
                    <td>{$row['contact_no']}</td>
                    <td>
                        <a href='edit_account.php?id={$row['id']}'>Edit</a>
                        <a href='delete_account.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No users found.</td></tr>";
        }


        $pdo = null;
        ?>
        </tbody>
    </table>
</div>

<?php include('adminComponents/footer.php') ?>