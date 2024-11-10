<?php
include('db_connection.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = trim($_POST['username']); 
    $userfirstname = trim($_POST['userfirstname']);
    $userlastname = trim($_POST['userlastname']);
    $userpassword = trim($_POST['userpassword']);
    $useraddress = trim($_POST['useraddress']);
    $usercontactnumber = trim($_POST['usercontactnumber']);
    if (empty($userfirstname) || empty($userlastname) || empty($useraddress) || empty($usercontactnumber)) {
        echo "All fields are required.";
        exit();
    }

    $sql = "UPDATE user SET userfirstname = :userfirstname, userlastname = :userlastname, 
            useraddress = :useraddress, usercontactnumber = :usercontactnumber";

    if (!empty($userpassword)) {
        $hashed_password = password_hash($userpassword, PASSWORD_DEFAULT);
        $sql .= ", user_password = :userpassword"; 
    }
    if ($new_username != $username) {
        $sql .= ", username = :new_username";
    }
    $sql .= " WHERE username = :current_username";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userfirstname', $userfirstname);
        $stmt->bindParam(':userlastname', $userlastname);
        $stmt->bindParam(':useraddress', $useraddress);
        $stmt->bindParam(':usercontactnumber', $usercontactnumber);
        if ($new_username != $username) {
            $stmt->bindParam(':new_username', $new_username);
        }
        if (!empty($userpassword)) {
            $stmt->bindParam(':userpassword', $hashed_password);
        }

        $stmt->bindParam(':current_username', $username);

        if ($stmt->execute()) {
            if ($new_username != $username) {
                $_SESSION['username'] = $new_username;
            }
            header('Location: profile.php?message=Profile updated successfully');
            exit();
        } else {
            echo "Error: Unable to update profile.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
