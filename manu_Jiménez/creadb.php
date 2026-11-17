<?php
$servidor = "localhost";
$usuario  = "root";
$password = "";

$conexion = new mysqli($servidor, $usuario, $password);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS db_peliculas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

if ($conexion->query($sql) === TRUE) {
    echo "Base de datos db_peliculas creada correctamente.";
} else {
    echo "Error al crear la base de datos: " . $conexion->error;
}

$conexion->close();
?>