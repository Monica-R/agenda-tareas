CREATE DATABASE IF NOT EXISTS schedule;
USE schedule;

CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    passwd VARCHAR(100) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Task (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    input_date DATE,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    expiration_date DATE,
    description VARCHAR(500),
    status BOOLEAN NOT NULL DEFAULT 0,
    user_ID INT NOT NULL,
    FOREIGN KEY (user_ID) REFERENCES Users (user_id)
);


-- CREATE USER 'monica-r'@'localhost' IDENTIFIED BY 'daw123';
-- GRANT ALL PRIVILEGES ON *.* TO 'monica-r'@'localhost' IDENTIFIED BY 'daw123';
-- FLUSH PRIVILEGES;