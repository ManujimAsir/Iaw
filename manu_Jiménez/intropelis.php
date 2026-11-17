<?php
$conexion = new mysqli("localhost", "root", "", "db_peliculas");
if ($conexion->connect_error) die(...);

$peliculas = [
    [1, "El Padrino", "Drama", 12],
    [2, "Pulp Fiction", "Crimen", 10],
    [3, "Interestelar", "Ciencia ficción", 15]
];

$stmt = $conexion->prepare("INSERT INTO pelicula (id_director, titulo, genero, precio) VALUES (?, ?, ?, ?)");
$stmt->bind_param("issi", $id_director, $titulo, $genero, $precio);

foreach ($peliculas as $p) {
    $id_director = $p[0];
    $titulo = $p[1];
    $genero = $p[2];
    $precio = $p[3];
    $stmt->execute();
}