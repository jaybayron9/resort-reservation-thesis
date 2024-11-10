<?php

if (isset($_GET["id"])) {
    $services_id = $_GET["id"];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beatrizrafaelaresort";
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "DELETE FROM services WHERE ServicesID = '$services_id'";

    if ($conn->query($sql) === TRUE) {

        $conn->close();

        header("Location: services_list.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID not specified";
}
?>
