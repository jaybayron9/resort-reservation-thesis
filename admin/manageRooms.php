<?php include('../databaseConnection.php') ?>
<?php include('adminComponents/headers.php') ?>
<?php include('adminComponents/navigations.php') ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['addRoom'])) {
        $name = $_POST['name'];
        $bedFrame = $_POST['bedFrame'];
        $capacity = $_POST['capacity'];
        $view = $_POST['view'];
        $status = $_POST['status'];
        $rate = $_POST['rate'];
    
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $photoTmpPath = $_FILES['photo']['tmp_name'];
            $photoName = $_FILES['photo']['name'];
            $photoSize = $_FILES['photo']['size'];
            $photoError = $_FILES['photo']['error'];
    
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $photoType = mime_content_type($photoTmpPath);
    
            if (in_array($photoType, $allowedTypes)) {
                $photoNewName = uniqid('', true) . '.' . pathinfo($photoName, PATHINFO_EXTENSION);
                $photoDestination = '../uploads/' . $photoNewName;
    
                if (move_uploaded_file($photoTmpPath, $photoDestination)) {
                    $result = $conn->query("
                        INSERT INTO rooms (name, bed_frame, capacity, view, status, rate, photo)
                        VALUES ('$name', '$bedFrame', '$capacity', '$view', '$status', '$rate', '$photoNewName')
                    ");
                    if ($result) {
                        echo "<script>alert('Room created successfully')</script>";
                    } else {
                        echo "<script>alert('Error saving room to database')</script>";
                    }
                } else {
                    echo "<script>alert('Error uploading photo')</script>";
                }
            } else {
                echo "<script>alert('Invalid photo format. Only JPEG, PNG, and GIF are allowed.')</script>";
            }
        } else {
            echo "<script>alert('No photo uploaded or there was an error.')</script>";
        }
    }

    if (isset($_POST['updateRoom'])) {
        $id = $_POST['id'];
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $bedFrame = mysqli_real_escape_string($conn, $_POST['bedFrame']);
        $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
        $view = mysqli_real_escape_string($conn, $_POST['view']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        $rate = mysqli_real_escape_string($conn, $_POST['rate']);
        $photoNewName = null;
    
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
            $photoTmpPath = $_FILES['photo']['tmp_name'];
            $photoName = $_FILES['photo']['name'];
            $photoSize = $_FILES['photo']['size'];
            $photoError = $_FILES['photo']['error'];
    
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $photoType = mime_content_type($photoTmpPath);
    
            if (in_array($photoType, $allowedTypes)) {
                $maxFileSize = 2 * 1024 * 1024;
                if ($photoSize <= $maxFileSize) {
                    $photoNewName = uniqid('room_', true) . '.' . pathinfo($photoName, PATHINFO_EXTENSION);
                    $photoDestination = '../uploads/' . $photoNewName;
    
                    if (!move_uploaded_file($photoTmpPath, $photoDestination)) {
                        echo "<script>alert('Error uploading photo')</script>";
                    }
                } else {
                    echo "<script>alert('Photo is too large. Max size is 2MB.')</script>";
                }
            } else {
                echo "<script>alert('Invalid photo format. Only JPEG, PNG, and GIF are allowed.')</script>";
            }
        }
    
        if ($photoNewName) {
            $stmt = $conn->prepare("UPDATE rooms SET name = ?, bed_frame = ?, capacity = ?, view = ?, status = ?, rate = ?, photo = ? WHERE id = ?");
            $stmt->bind_param("sssssssi", $name, $bedFrame, $capacity, $view, $status, $rate, $photoNewName, $id);
        } else {
            $stmt = $conn->prepare("UPDATE rooms SET name = ?, bed_frame = ?, capacity = ?, view = ?, status = ?, rate = ? WHERE id = ?");
            $stmt->bind_param("ssssssi", $name, $bedFrame, $capacity, $view, $status, $rate, $id);
        }
    
        if ($stmt->execute()) {
            echo "<script>alert('Room updated successfully')</script>";
        } else {
            echo "<script>alert('Error updating room in database')</script>";
        }
        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] == 'delete') {
    $roomId = $_GET['id'];
    $result = $conn->query("SELECT photo FROM rooms WHERE id = {$roomId} LIMIT 1");

    if ($result && $room = $result->fetch_assoc()) {
        $photoToDelete = $room['photo'];

        if ($photoToDelete && file_exists('../uploads/' . $photoToDelete)) {
            unlink('../uploads/' . $photoToDelete);
        }

        $deleteResult = $conn->query("DELETE FROM rooms WHERE id = {$roomId}");

        if ($deleteResult) {
            echo "<script>alert('Room and photo deleted successfully')</script>";
        } else {
            echo "<script>alert('Error deleting room from database')</script>";
        }
    } else {
        echo "<script>alert('Room not found')</script>";
    }
    header('location: '. $_SERVER['PHP_SELF']);
}
?>

<script src="https://cdn.tailwindcss.com"></script>

<?php if (isset($_GET['action']) && $_GET['action'] == 'create'): ?>
    <div class="flex justify-center">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="mt-20 w-2/6 bg-gray-100 rounded-md p-10">
            <div class="mb-2">
                <label for="photo" class="block picture">Photo</label>
                <input type="file" name="photo" id="photo" class="block border border-gray-200 w-full">
            </div>
            <div class="mb-2">
                <label for="name" class="block">Name</label>
                <input type="text" name="name" id="name" class="block border border-gray-200 w-full">
            </div>
            <div class="mb-2">
                <label for="bedFrame" class="block">Bed Frame</label>
                <input type="text" name="bedFrame" id="bedFrame" class="block border border-gray-200 w-full">
            </div>
            <div class="mb-2">
                <label for="capacity" class="block">Capacity</label>
                <input type="text" name="capacity" id="capacity" class="block border border-gray-200 w-full">
            </div>
            <div class="mb-2">
                <label for="view" class="block">View</label>
                <input type="text" name="view" id="view" class="block border border-gray-200 w-full">
            </div>
            <div class="mb-2">
                <label for="status" class="block">Status</label>
                <input type="text" name="status" id="status" class="block border border-gray-200 w-full">
            </div>
            <div class="mb-2">
                <label for="rate" class="block">Rate</label>
                <input type="text" name="rate" id="rate" class="block border border-gray-200 w-full">
            </div>
            <button type="submit" name="addRoom" class="w-full mt-5 py-3 bg-yellow-700 text-white rounded-md">Add</button>
        </form>
    </div>
<?php 
elseif(isset($_GET['action']) && $_GET['action'] == 'update'): 
    $result = $conn->query("SELECT * FROM rooms WHERE id = {$_GET['id']} limit 1");
    $room = $result->fetch_assoc();
?>
      <div class="flex justify-center">
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="mt-14 w-2/6 bg-gray-100 rounded-md p-10" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            
            <div class="mb-2">
                <label for="photo" class="block picture">Photo</label>
                <input type="file" name="photo" class="block border border-gray-200 w-full">
            </div>

            <div class="mb-2">
                <label for="name" class="block">Name</label>
                <input type="text" name="name" value="<?= $room['name'] ?>" class="block border border-gray-200 w-full p-2">
            </div>

            <div class="mb-2">
                <label for="bedFrame" class="block">Bed Frame</label>
                <input type="text" name="bedFrame" value="<?= $room['bed_frame'] ?>" class="block border border-gray-200 w-full p-2">
            </div>

            <div class="mb-2">
                <label for="capacity" class="block">Capacity</label>
                <input type="text" name="capacity" value="<?= $room['capacity'] ?>" class="block border border-gray-200 w-full p-2">
            </div>

            <div class="mb-2">
                <label for="view" class="block">View</label>
                <input type="text" name="view" value="<?= $room['view'] ?>" class="block border border-gray-200 w-full p-2">
            </div>

            <div class="mb-2">
                <label for="status" class="block">Status</label>
                <input type="text" name="status" value="<?= $room['status'] ?>" class="block border border-gray-200 w-full p-2">
            </div>

            <div class="mb-2">
                <label for="rate" class="block">Rate</label>
                <input type="text" name="rate" value="<?= $room['rate'] ?>" class="block border border-gray-200 w-full">
            </div>

            <button type="submit" name="updateRoom" class="w-full mt-5 py-3 bg-yellow-700 text-white rounded-md">Update</button>
        </form>
    </div>
<?php else: ?>
    <div class="container" style="padding: 20px;">
    <h2>Room List</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <table>
        <tr>
            <th>Room ID</th>
            <th>Preview</th>
            <th>Name</th>
            <th>Bed Frame</th>
            <th>Capacity</th>
            <th>View</th>
            <th>Status</th>
            <th>Rate</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
        </tr>
        <?php
        $rooms = $conn->query( "SELECT * FROM rooms");

        if ($rooms->num_rows > 0) {
            foreach ($rooms->fetch_all(MYSQLI_ASSOC) as $row) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>
                        <a href='/uploads/{$row['photo']}'>
                            <img src='/uploads/{$row['photo']}' class='h-12 w-12' />
                        </a>
                    </td>
                    <td>{$row['name']}</td>
                    <td>{$row['bed_frame']}</td>
                    <td>{$row['capacity']}</td>
                    <td>{$row['view']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['rate']}</td>
                    <td>{$row['created_at']}</td>
                    <td>{$row['updated_at']}</td>
                    <td>
                        <a href='/admin/manageRooms.php?action=update&id={$row['id']}'>Edit</a> |
                        <a href='/admin/manageRooms.php?action=delete&id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this room?\");'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No rooms found.</td></tr>";
        }
        ?>
    </table>
</div>

<a href="/admin/manageRooms.php?action=create" class="fixed-button">Add Room</a>
<?php endif; ?>

<?php include('adminComponents/footer.php') ?>