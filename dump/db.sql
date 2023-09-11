/*CREATE DATABASE IF NOT EXISTS listatelefonica; */ 

CREATE TABLE IF NOT EXISTS 'nome' (
    'id' int PRIMARY KEY AUTO_INCREMENT, 
    'nome' varchar(255) NOT NULL 
) 

CREATE TABLE IF NOT EXISTS 'telefone' (
    'id' int AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    'telefone' varchar(255) NOT NULL, 
    'id_nome' INT NOT NULL FOREIGN KEY 'nome(id)'
)

