<?php 

include('databaseConnection.php');

$password = md5('password');

$conn->query("
    INSERT INTO admins
        (username, password, first_name, last_name, email_address, contact_no)
    VALUES
        ('admin', '$password', 'john', 'doe', 'johndoe@gmail.com', '639504523454')
");
