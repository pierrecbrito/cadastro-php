DROP DATABASE IF EXISTS cadastro_php;
CREATE DATABASE cadastro_php;

USE cadastro_php;

CREATE TABLE pessoa (
	id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf CHAR(14) NOT NULL UNIQUE,
    data_nascimento DATE NOT NULL,
    whatsapp VARCHAR(20) NOT NULL, 
    salario DECIMAL(8, 2) NOT NULL,
    senha VARCHAR(50) NOT NULL
);

CREATE TABLE endereco (
	id INT AUTO_INCREMENT PRIMARY KEY,
    cep CHAR(9) NOT NULL,
    estado CHAR(2) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    bairro VARCHAR(100) NOT NULL,
    rua VARCHAR(120) NOT NULL,
    numero SMALLINT NOT NULL,
    id_pessoa INT NOT NULL,
    
    FOREIGN KEY (id_pessoa) REFERENCES pessoa(id)
		ON DELETE CASCADE
);





