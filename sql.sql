CREATE DATABASE db_aquaflow;

CREATE TABLE usuario(
    id INT  AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);          

CREATE TABLE funcionario(
    id INT AUTO_INCREMENT,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    nome VARCHAR(100) NOT NULL,
    data_contratacao DATE NOT NULL,
    data_admissao DATE,
    PRIMARY KEY(id)
);

CREATE TABLE produto(
    id INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL UNIQUE,
    valor DECIMAL(10,2) NOT NULL,
    estoque INT,
    PRIMARY KEY(id)
);