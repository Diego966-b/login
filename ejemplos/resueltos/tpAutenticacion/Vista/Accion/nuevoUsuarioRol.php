<?php 
include_once '../../configuracion.php';

$data = data_submitted();

$abmUsuarioRol = new AbmUsuarioRol();


if($abmUsuarioRol->alta($data)){
    $mensaje = " Rol agregado al usuario correctamente.";
    
}else{
    $mensaje = " Error al agregar rol al usuario, verifique los datos ingresados.";
    
}
//echo  $mensaje;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Proceso: Agregar Rol al Usuario</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Agregar Rol al Usuario</h3>


<?php	
echo $mensaje;
?>

<br>
<br>
<br><a href="../usuarioRol_nuevo.php">Volver</a><br>
</body>
</html>