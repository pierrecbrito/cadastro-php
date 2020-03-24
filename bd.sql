DROP DATABASE IF EXISTS cadastro_php;
CREATE DATABASE cadastro_php;

USE cadastro_php;
CREATE TABLE pessoa (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf CHAR(14) NOT NULL,
    data_nascimento DATE NOT NULL,
    whatsapp CHAR(14) NOT NULL, 
    salario DECIMAL(15, 2) NOT NULL
);