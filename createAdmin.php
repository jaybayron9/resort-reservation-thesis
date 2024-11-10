<?php 

$conn = new mysqli('localhost', 'root', '', 'beatrizrafaelaresort');

$password = password_hash('admin123', PASSWORD_DEFAULT);

$result = $conn->query("
    INSERT INTO admin 
        (username, password, account_name, account_lastname, account_address, account_contact)
    VALUES
        ('admin', '$password', 'admin', 'admin', 'admin', 'admin')
");

print_r($result);