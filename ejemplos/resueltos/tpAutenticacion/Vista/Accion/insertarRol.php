<?php
include_once '../../configuracion.php';

$data = data_submitted();
//verEstructura($data);

$abmRol = new abmRol();
if($abmRol->alta($data)){
    $mensaje = " El rol fue ingresado.";
    
}else{
    $mensaje = " El rol no pudo ingresarse.";
    
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Proceso: Ingreso Rol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Insertar Rol</h3>
<br><a href="../nuevoRol.php">Volver</a><br>

<?php	
echo $mensaje;
?>

</body>
</html>