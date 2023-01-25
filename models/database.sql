CREATE DATABASE IF NOT EXISTS Schedule;
USE Schedule;

CREATE TABLE User (
    user_id INT NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    passwd VARCHAR(100) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT TIMESTAMP
);

CREATE TABLE Task (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    input_date DATE,
    creation_date TIMESTAMP DEFAULT CURRENT TIMESTAMP,
    expiration_date DATE,
    description VARCHAR(500),
    status BOOLEAN,
    user_ID INT,
    FOREIGN KEY (user_ID) REFERENCES User (user_id)
);
