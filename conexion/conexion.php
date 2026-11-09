<?php

$host = 'localhost';
$bd = 'ventas_inventario';
$usuario = 'root';
$contrasena = '';
try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd;charset=utf8mb4", $usuario, $contrasena, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
    ]);
}
catch (PDOException $e) {
    http_response_code(500);
    exit('No se pudo conectar con la base de datos. Verifique XAMPP y conexion/conexion.php.');
}
