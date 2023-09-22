DROP DATABASE IF EXISTS db_archivos;

CREATE DATABASE db_archivos;

USE db_archivos;

CREATE TABLE files(
    id INT PRIMARY KEY AUTO_INCREMENT,
    file_name VARCHAR(255) NOT NULL,
    encrypted_file VARCHAR(255) NOT NULL,
    create_at DATETIME DEFAULT NOW()
);

