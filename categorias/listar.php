<?php
$rutaBase= '../';
require_once '../auth/seguridad.php';
requiereSesion();
require_once '../conexion/conexion.php';
$cats= $conexion->query('SELECT c.*,COUNT(p.id) AS cantidad FROM categorias c LEFT JOIN productos p ON p.categoria_id=c.id GROUP BY c.id ORDER BY c.nombre')->fetchAll();
$error= '';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $nombre= trim($_POST['nombre']??'');
    if($nombre==='')$error= 'Escriba el nombre de la categoría.';
    else{
        try{
            $s= $conexion->prepare('INSERT INTO categorias(nombre) VALUES(?)');
            $s->execute([$nombre]);
            $_SESSION['mensaje']= 'Categoría registrada.';
            header('Location: listar.php');
            exit;
        }
        catch(PDOException $e){
            $error= 'La categoría ya existe o no se pudo guardar.';
        }
    }
}
$titulo= 'Categorías';
include '../plantilla_cabecera.php';
?>
<h1>Categorías</h1>
<?php if($error):
?>
<div class="error">
<?= escapar($error)
?>
</div>
<?php  endif;
?>
<form method="post" class="panel fila-form">
<label>Nombre de la categoría<input name="nombre" required maxlength="80">
</label>
<button class="btn">Agregar</button>
</form>
<div class="tabla-wrap">
<table>
<thead>
<tr>
<th>Nombre</th>
<th>Productos asociados</th>
</tr>
</thead>
<tbody>
<?php foreach($cats as $c):
?>
<tr>
<td>
<?= escapar($c['nombre'])
?>
</td>
<td>
<?= (int)$c['cantidad']
?>
</td>
</tr>
<?php  endforeach;
?>
</tbody>
</table>
</div>
<?php include '../plantilla_pie.php';
?>