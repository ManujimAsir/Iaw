<?php
$conexion = new mysqli("localhost", "root", "", "db_peliculas");

if ($conexion->connect_error) {
    die("Error: " . $conexion->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS pelicula (
    ID INT(10) NOT NULL AUTO_INCREMENT,
    id_director INT(10) NOT NULL,
    titulo VARCHAR(300) NOT NULL,
    genero VARCHAR(64) NOT NULL,
    precio INT(8) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conexion->query($sql) === TRUE) {
    echo "Tabla 'pelicula' creada correctamente.";
} else {
    echo "Error al crear la tabla: " . $conexion->error;
}
$conexion->close();
?>