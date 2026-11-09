<?php
require_once 'auth/seguridad.php';
require_once 'conexion/conexion.php';
if (!empty($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}
$error= '';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $correo= trim($_POST['correo']??'');
    $clave= $_POST['contrasena']??'';
    if ($correo==='' || $clave==='') $error= 'Complete el correo y la contraseña.';
    else {
        $q= $conexion->prepare('SELECT id,nombre,correo,contrasena,rol FROM usuarios WHERE correo=? AND activo=1');
        $q->execute([$correo]);
        $u= $q->fetch();
        if ($u && password_verify($clave, $u['contrasena'])) {
            session_regenerate_id(true);
            $_SESSION['usuario_id']= $u['id'];
            $_SESSION['usuario_nombre']= $u['nombre'];
            $_SESSION['usuario_rol']= $u['rol'];
            header('Location: index.php');
            exit;
        }
        $error= 'Credenciales incorrectas o usuario inactivo.';
    }
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Iniciar sesión</title>
<link rel="stylesheet" href="css/estilos.css">
</head>
<body class="login-fondo">
<form class="login panel" method="post">
<h1>Ventas e Inventario</h1>
<p class="muted">Ingrese para continuar</p>
<?php if($error):
?>
<div class="error">
<?= escapar($error)
?>
</div>
<?php  endif;
?>
<label>Correo electrónico<input type="email" name="correo" required maxlength="120" autocomplete="username">
</label>
<label>Contraseña<input type="password" name="contrasena" required autocomplete="current-password">
</label>
<button class="btn ancho" type="submit">Iniciar sesión</button>
</form>
</body>
</html>