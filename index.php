<?php
// index.php - Archivo de prueba PHP
echo "<h1>Bienvenido ManujimASIR a PHP!</h1>";
echo "<p>Usuario actual: <strong>" . get_current_user() . "</strong></p>";
echo "<p>Versión de PHP: <strong>" . phpversion() . "</strong></p>";
echo "<p>Fecha y hora: <strong>" . date('d/m/Y H:i:s') . "</strong></p>";
echo "<p>Servidor: <strong>" . $_SERVER['SERVER_SOFTWARE'] . "</strong></p>";
?>