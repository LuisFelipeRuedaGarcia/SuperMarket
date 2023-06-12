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


CREATE TABLE Empleados(
    EmpleadoId INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    Celular VARCHAR(14) NOT NULL,
    Direccion VARCHAR(70) NOT NULL,
    Imagen BLOB

);

INSERT INTO Empleados (EmpleadoId, Nombre, Celular, Direccion, Imagen)
VALUES (1, "Lu", "3145768618", "Campus", 1);

CREATE TABLE Proveedores(
    ProveedorId INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(50) NOT NULL,
    Telefono VARCHAR(14) NOT NULL,
    Ciudad VARCHAR(20) NOT NULL
);


/* CREATE TABLE Facturas(
    FacturaId INT PRIMARY KEY AUTO_INCREMENT,
    EmpleadoId INT NOT NULL,
    ClienteId INT NOT NULL,
    Fecha VARCHAR(50) NOT NULL
); */

CREATE TABLE Facturas(
    FacturaId INT PRIMARY KEY AUTO_INCREMENT,
    EmpleadoId INT NOT NULL,
    ClienteId INT NOT NULL,
    Fecha VARCHAR(50) NOT NULL,
    FOREIGN KEY (EmpleadoId) REFERENCES Empleados(EmpleadoId),
    FOREIGN KEY (ClienteId) REFERENCES Clientes(ClienteId)
);


CREATE TABLE Productos(
    ProductoId INT PRIMARY KEY AUTO_INCREMENT,
    CategoriaId INT NOT NULL,
    PrecioUnitario INT NOT NULL,
    Stock INT NOT NULL,
    UnidadesPedidas INT NOT NULL,
    ProveedorId INT NOT NULL,
    Nombre VARCHAR(50) NOT NULL,
    Descontinuado INT NOT NULL,
    FOREIGN KEY (CategoriaId) REFERENCES Categorias(CategoriaId),
    FOREIGN KEY (ProveedorId) REFERENCES Proveedores(ProveedorId)
);

INSERT INTO Productos(
    
);