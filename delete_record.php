<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beatrizrafaelaresort";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET['id'])) {
        $records_id = $_GET['id'];

        $sql = "DELETE FROM records WHERE RecordsID = :records_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':records_id', $records_id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("Location: record_list.php");
            exit();
        } else {
            echo "Error deleting record.";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
