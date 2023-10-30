<?php


include_once "../../configuracion.php";

$datos = data_submitted();
print_R($datos);

$objAbmUsuario = new AbmUsuario();
if ($objAbmUsuario-> modificacion($datos)){
    $mensaje = "La modificacion se realizo correctamente";
} else {
    $mensaje = "La modificacion no se realizo";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Actualizar Usuario</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Actualizar Usuario</h3>
<br><a href="../listarUsuario.php">Volver</a><br>

<?php
echo "<br/>". $mensaje;
?>

</body>
</html>

