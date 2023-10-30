<?php
include_once '../../configuracion.php';

$data = data_submitted();
//verEstructura($data);

$abmRol = new abmRol();
if($abmRol->baja($data)){
    $mensaje = " El rol fue eliminado.";
    
}else{
    $mensaje = " El rol no pudo eliminarse.";
    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Proceso: Eliminacion Rol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Eliminar Rol</h3>
<br><a href="../listarRol.php">Volver</a><br>

<?php	
echo $mensaje;
?>

</body>
</html>