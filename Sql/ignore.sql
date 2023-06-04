SHOW DATABASES;
CREATE DATABASE SuperMarket;
USE SuperMarket;
SHOW TABLES;
CREATE TABLE Categorias(
    CategoriaId INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR (30) NOT NULL,
    Descripcion VARCHAR (150),
    Imagen VARCHAR (70)
);

 DROP TABLE Categorias;

/* DESCRIBE TABLE Categorias; */

DESCRIBE Categorias;

ALTER TABLE Categorias MODIFY COLUMN Imagen BLOB;

INSERT INTO Categorias (CategoriaId, Nombre, Descripcion, Imagen)
VALUES (1, "Cuidado Personal", "productos de limpieza para el cuerpo, así como maquillajes, perfumes y cremas", 1);

CREATE TABLE Clientes(
    ClienteId INT PRIMARY KEY AUTO_INCREMENT,
    Celular INT NOT NULL
);

ALTER TABLE Clientes ADD COLUMN Company VARCHAR(30);

INSERT INTO Clientes (ClienteId, Celular, Company)
VALUES (1, 3145768618, "Claro");

ALTER TABLE Clientes MODIFY COLUMN Celular VARCHAR(14) NOT NULL;
