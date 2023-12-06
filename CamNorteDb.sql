CREATE DATABASE camNorte;

use camNorte;

CREATE TABLE touristSpot(
    `place_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `place_name` VARCHAR(255) NOT NULL,
    `location` VARCHAR(255) NOT NULL,
    `activities` VARCHAR(255) NOT NULL,
    `description` VARCHAR(255) NOT NULL,
    `picture` VARCHAR(255) NOT NULL,
    `ratings` VARCHAR(255) NOT NULL DEFAULT 0,
    `date_posted` DATE DEFAULT CURRENT_DATE
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=UTF8MB4_GENERAL_CI;

ALTER TABLE `touristSpot` ADD COLUMN `date_updated` DATE DEFAULT NULL;

CREATE TABLE user(
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `fullname` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(255) NOT NULL,
    `date_created` DATE DEFAULT CURRENT_DATE,
    `roles` VARCHAR(20) NOT NULL  
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=UTF8MB4_GENERAL_CI AUTO_INCREMENT = 1000; 

CREATE TABLE comments(
    `comment_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `content` VARCHAR(500) DEFAULT NULL,
    `date` DATE DEFAULT CURRENT_DATE,
    `id` INT(11),
	FOREIGN KEY (id) REFERENCES user(id),
    `place_id` INT(11),
    FOREIGN KEY (place_id) REFERENCES touristSpot(place_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=UTF8MB4_GENERAL_CI;

ALTER TABLE `comments` ADD COLUMN `ranking` INT(1) DEFAULT 0;

CREATE TABLE latest(
    `latest_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `image` VARCHAR(255) NOT NULL, 
    `description` VARCHAR(255) NOT NULL,
    `date` VARCHAR(255) NOT NULL   
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=UTF8MB4_GENERAL_CI;
