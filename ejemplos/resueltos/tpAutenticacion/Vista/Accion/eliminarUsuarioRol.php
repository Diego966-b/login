<?php

include_once "../../configuracion.php";

$datos = data_submitted();

$objAbmUsuarioRol = new AbmUsuarioRol();


if($objAbmUsuarioRol->baja($datos)){
    
    $resp =true;
    $mensaje = "Se ha borrado el usuarioRol";
} else {
    $mensaje = "El usuarioRol no se ha podido borrar";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Eliminar UsuarioRol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Eliminar UsuarioRol</h3>
<br><a href="../listarUsuarioRol.php">Volver</a><br>

<?php	
echo "<br/>". $mensaje;
?>

</body>
</html>

