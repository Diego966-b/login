<?php
include_once "../configuracion.php";

$objAbmUsuario = new AbmUsuario();

$listaUsuario = $objAbmUsuario->buscar(null);
//print_R ($listaUsuario);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Usuario</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3> Ver Usuario</h3>
<a href="usuarioNuevo.php">nuevo</a>
<table border="1">
<?php	

if( count($listaUsuario)>0){
    foreach ($listaUsuario as $objUsuario) { 
        
        echo '<td style="width:500px;">'.$objUsuario->getIdUsuario().'</td>';
        echo '<td style="width:500px;">'.$objUsuario->getUsNombre().'</td>';
        echo '<td style="width:500px;">'.$objUsuario->getUsPass().'</td>';
        echo '<td style="width:500px;">'.$objUsuario->getUsMail().'</td>';
        echo '<td style="width:500px;">'.$objUsuario->getUsDeshabilitado().'</td>';
         
        
        
        
        echo '<td><a href="formUsuario.php?idusuario='.$objUsuario->getIdUsuario().'">editar</a></td>';
        echo '<td><a href="accion/eliminarLogin.php?idusuario='.$objUsuario->getIdUsuario().'">eliminar</a></td></tr>';
   //     echo '<td><a href="accion/abmUsuario.php?accion=borrar&idsuario='.$objUsuario->getIdUsuario().'">borrar</a></td></tr>'; 
	}
}

?>
</table>
</body>
</html>