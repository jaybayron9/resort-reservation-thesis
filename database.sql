-- Active: 1722739486548@@127.0.0.1@3306@resort
create database resort;

CREATE TABLE `admins` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(255) NULL,
    `password` varchar(255) NULL,
    `first_name` varchar(255) NULL,
    `last_name` varchar(255) NULL,
    `email_address` varchar(255) NULL,
    `contact_no` varchar(255) NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

drop tables admins;


CREATE TABLE `users` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `first_name` varchar(255) NULL,
    `last_name` varchar(255) NULL,
    `gender` varchar(255) NULL,
    `contact_no` varchar(255) NULL,
    `email_address` varchar(255) NULL,
    `username` varchar(255) NULL,
    `password` varchar(255) NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

drop table users;

CREATE TABLE `reservations` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `user_id` varchar(255) NULL,
    `room_id` varchar(255) NULL,
    `check_in` date DEFAULT NULL,
    `check_out` date DEFAULT NULL,
    `no_adults` varchar(255) NULL,
    `no_kids` varchar(255) NULL,
    `no_infants` varchar(255) NULL,
    `no_pets` varchar(255) NULL,
    `total_amount` varchar(255) NULL,
    `status` varchar(255) NULL,
    `additional_details` longtext null,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

drop table reservations;

CREATE TABLE `users_logs` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `user_id` varchar(255) NULL,
    `role` varchar(255) NULL,
    `action` varchar(255) NULL,
    `details` varchar(255) NULL,
    `ip_address` varchar(255) NULL,
    `user_agent` varchar(255) NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

drop table users_logs;

CREATE TABLE `rooms` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `photo` varchar(255) NULL,
    `name` varchar(255) NULL,
    `bed_frame` varchar(255) NULL,
    `capacity` varchar(255) NULL,
    `view` varchar(255) NULL,
    `status` varchar(255) NULL,
    `rate` varchar(255) NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

drop table rooms;

CREATE TABLE inclusions (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(255) NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);

drop table rooms;

$conn = new mysqli('bwpwvqcrmommf85z6ned-mysql.services.clever-cloud.com', 'urvx4vkmgfagncjv', '4SUZjlgL0Fqsqgl7DO6R', 'bwpwvqcrmommf85z6ned');


CREATE TABLE `records` (
  `RecordsID` int(11) PRIMARY KEY AUTO_INCREMENT,
  `AccountID` varchar(50) DEFAULT NULL,
  `ServicesID` varchar(50) DEFAULT NULL,
  `GuestFirstName` varchar(50) DEFAULT NULL,
  `GuestLastName` varchar(50) DEFAULT NULL,
  `GuestContactNumber` varchar(50) DEFAULT NULL,
  `RoomName` varchar(50) DEFAULT NULL,
  `RoomSize` varchar(50) DEFAULT NULL,
  `RoomType` varchar(50) DEFAULT NULL,
  `GuestEmail` varchar(50) DEFAULT NULL,
  `NumberOfAdult` varchar(50) DEFAULT NULL,
  `NumberOfKids` varchar(50) DEFAULT NULL,
  `ReservationDate` date DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
`updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
)

CREATE TABLE `services` (
    `ServicesID` int(11) PRIMARY KEY AUTO_INCREMENT,
    `ServicesName` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `ServicesType` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `ServicesPrice` int DEFAULT NULL,
    `ServicesDescription` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
)

CREATE TABLE `payments` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `user_id` varchar(50) DEFAULT NULL,
    `room_id` varchar(50) DEFAULT NULL,
    `reservation_id` varchar(50) DEFAULT NULL,
    `amount` varchar(50) DEFAULT NULL,
    `PaymentMethod` varchar(50) DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);
drop table payments;

CREATE TABLE `check_in` (
    `id` int(11) PRIMARY KEY AUTO_INCREMENT,
    `Check_In` varchar(50) DEFAULT NULL,
    `ReservationID` varchar(50) DEFAULT NULL,
    `GuestID` varchar(50) DEFAULT NULL,
    `RoomID` varchar(50) DEFAULT NULL,
    `CheckInDate` varchar(50) DEFAULT NULL,
    `CheckOutDate` varchar(50) DEFAULT NULL,
    `NumberOfAdults` varchar(50) DEFAULT NULL,
    `NumberOfKids` varchar(50) DEFAULT NULL,
    `CheckInTotalAmount` varchar(50) DEFAULT NULL,
    `CheckInPayment` varchar(50) DEFAULT NULL,
    `CheckInCredit` varchar(50) DEFAULT NULL,
    `CheckInStatus` varchar(50) DEFAULT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
)




users
id
first_name
last_name
gender
contact_no
email_address
username
password
created_at
updated_at

rooms
id
photo
name
bed_frame
capacity
view
status
rate
created_at
updated_at

reservations
id
user_id
room_id
check_in
check_out
no_adults
no_kids
no_infants
no_pets
total_amount
status
additional_details
created_at
updated_at


payments
id
user_id
room_id
reservation_id
created_at
updated_at


users_logs
id
user_id
action
created_at
updated_at


miscellaneous
id
service_id
user_id
order_no
description
created_at
updated_at


services
id
name
rate
description
created_at
updated_at


admins
id
username
password
first_name
last_name
email_address
contact_no
created_at
updated_at

admins_logs
id
action
table_update
created_at
updated_at