<?php
include('../databaseConnection.php');

$records_id = $_GET['id'];
$sql = "DELETE FROM records WHERE RecordsID = $records_id";
$stmt = $conn->query($sql);
header("Location: record_list.php");
exit();
