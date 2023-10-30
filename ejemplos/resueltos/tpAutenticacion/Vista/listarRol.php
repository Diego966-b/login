<?php

include_once "../configuracion.php";

$objAbmRol = new AbmRol();

$listaRol = $objAbmRol->buscar(null);
//print_R ($listaUsuario);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Rol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3> Ver Rol</h3>
<a href="nuevoRol.php">Nuevo</a>
<table border="1">
<?php	

if( count($listaRol)>0){
    foreach ($listaRol as $objRol) { 
        
        echo '<tr><td>'.$objRol->getIdrol().'</td>';
        echo '<td>'.$objRol->getRodescripcion().'</td>';
        echo '<td><a href="accion/eliminarRol.php?idrol='.$objRol->getIdrol().'">Eliminar</a></td>';
        echo '<td><a href="accion/modificarRol.php?idrol='.$objRol->getIdrol().'">Modificar</a></td></tr>';
	}
}

?>
</table>
</body>
</html>