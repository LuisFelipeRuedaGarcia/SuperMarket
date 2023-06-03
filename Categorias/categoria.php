<?php
$servername = "localhost";
$username = "campus";
$password = "campus2023";
$database = "SuperMarket";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Preparar la consulta
$stmt = $conn->prepare("INSERT INTO Categorias (CategoriaId, Nombre, Descripcion, Imagen) VALUES (?, ?, ?, ?)");

// Asignar los parámetros
$stmt->bind_param("isss", $categoriaId, $nombre, $descripcion, $imagen);

// Definir los valores de los parámetros
$categoriaId = 1;
$nombre = "Cuidado Personal";
$descripcion = "productos de limpieza para el cuerpo, así como maquillajes, perfumes y cremas";

// Leer la imagen desde un archivo
$imagen = file_get_contents("supermarket0.jpeg");

// Ejecutar la consulta
$stmt->execute();

// Verificar si la inserción fue exitosa
if ($stmt->affected_rows > 0) {
    echo "Imagen insertada correctamente.";
} else {
    echo "Error al insertar la imagen.";
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conn->close();
?>