<?php
$precio = isset($_POST['precio']) ? (int)$_POST['precio'] : 0;
...
$stmt = $conexion->prepare("SELECT ID, id_director, titulo, genero, precio FROM pelicula WHERE precio < ? ORDER BY precio ASC");
$stmt->bind_param("i", $precio);