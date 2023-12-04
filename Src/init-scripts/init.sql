DROP DATABASE IF EXISTS dbtecweb;
CREATE DATABASE IF NOT EXISTS dbtecweb;
USE dbtecweb;

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password) VALUES
    ('user1', 'password1'),
    ('user2', 'password2'),
    ('tony2bo', 'tonytomilli');
