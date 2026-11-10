<?php
// EJECUTAR UNA SOLA VEZ y luego eliminar este archivo por seguridad.
require_once 'conexion/conexion.php';
$correo= 'admin@local.test';
$s= $conexion->prepare('SELECT id FROM usuarios WHERE correo=?');
$s->execute([$correo]);
if($s->fetch()){
    exit('El administrador ya existe. Elimine setup_admin.php ahora.');
}
$s= $conexion->prepare('INSERT INTO usuarios(nombre,correo,contrasena,rol) VALUES(?,?,?,?)');
$s->execute(['Administrador', $correo, password_hash('Admin123!', PASSWORD_DEFAULT), 'admin']);
echo 'Administrador creado. Usuario: admin@local.test · Contraseña: Admin123! · Elimine setup_admin.php inmediatamente.';
