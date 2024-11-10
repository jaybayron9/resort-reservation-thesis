<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beatrizrafaelaresort";
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $checkOutID = $_GET['id'];

 
    $sql = "DELETE FROM `check-out` WHERE CheckOutID='$checkOutID'";

    if ($conn->query($sql) === TRUE) {
 
        $conn->close();
  
        header("Location: check-out_list.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
