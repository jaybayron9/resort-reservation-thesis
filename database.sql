-- Active: 1722739486548@@127.0.0.1@3306@beatrizrafaelaresort
CREATE TABLE `admin` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(255) NULL,
    `password` varchar(255) NULL,
    `account_name` varchar(255) NULL,
    `account_lastname` varchar(255) NULL,
    `account_address` varchar(255) NULL,
    `account_contact` varchar(255) NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

