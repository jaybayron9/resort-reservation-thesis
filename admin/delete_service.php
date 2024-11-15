<?php
include('../databaseConnection.php');

$serviceID = $_GET['id'];

if (isset($serviceID) && is_numeric($serviceID)) {
    try {
        $sql = "DELETE FROM services WHERE ServicesID = $serviceID";
        $stmt = $conn->query($sql);
        if ($stmt) {
            header("Location: services_list.php?message=Service deleted successfully.");
            exit();
        } else {
            echo "Error: Unable to delete service.";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid Service ID.";
}
?>
