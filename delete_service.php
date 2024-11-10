<?php
include('db_connection.php');

$serviceID = $_GET['id'];

if (isset($serviceID) && is_numeric($serviceID)) {
    try {
        $sql = "DELETE FROM services WHERE ServicesID = :serviceID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':serviceID', $serviceID, PDO::PARAM_INT);

        if ($stmt->execute()) {
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
