<?php

include_once "../configuracion.php";

$objAbmUsuarioRol = new AbmUsuarioRol();


$listaUsuarioRol = $objAbmUsuarioRol->buscar(null);

//print_R ($listaUsuarioRol);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>UsuarioRol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3> Ver UsuarioRol</h3>
<a href="usuarioRol_nuevo.php">nuevo</a>
<table border="1">
<?php	

if( count($listaUsuarioRol)>0){
    foreach ($listaUsuarioRol as $objUsuarioRol) { 
        
        echo '<td style="width:500px;">'.$objUsuarioRol->getObjUsuario()->getIdUsuario().'</td>';
        echo '<td style="width:500px;">'.$objUsuarioRol->getObjRol()->getRodescripcion().'</td> ';
        
        
        
        echo '<td><a href="formUsuarioRol.php?idrol='.$objUsuarioRol->getObjRol()->getIdrol().'&idusuario='.$objUsuarioRol->getObjUsuario()->getIdUsuario().'">editar</a></td>';
        echo '<td><a href="accion/eliminarUsuarioRol.php?idrol='.$objUsuarioRol->getObjRol()->getIdrol().'&idusuario='.$objUsuarioRol->getObjUsuario()->getIdUsuario().'">eliminar</a></td></tr>';
   //     echo '<td><a href="accion/abmUsuario.php?accion=borrar&idsuario='.$objUsuario->getIdUsuario().'">borrar</a></td></tr>'; 
	}
}

?>
</table>
</body>
</html>