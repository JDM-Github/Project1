-- RUN NIO SA DATABASE NIO
DROP DATABASE IF EXISTS test;
CREATE DATABASE test;
USE test;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    userName VARCHAR(100) NOT NULL UNIQUE,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP

    -- DAGDAGAN NIO NG GUSTO NYO
    -- AYUSIN NIO NLANG UNG NASA REDIRECT IF EVER SAKA UNG FORM SA REGISTER
);
