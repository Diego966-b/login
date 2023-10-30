<?php


include_once '../configuracion.php';
$objAbmUsuarioRol = new AbmUsuarioRol();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['idusuario']) && isset($datos['idrol'])){
    $listaUsuarioRol = $objAbmUsuarioRol->buscar($datos);
    if (count($listaUsuarioRol)==1){
        $obj= $listaUsuarioRol[0];
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Actualizar UsuarioRol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Editar UsuarioRol</h3>
<?php if ($obj!=null){?>
<form method="post" action="accion/actualizarUsuarioRol.php">
	<label>Id Usuario</label><br/>
	<input id="idusuario" name ="idusuario" width="80" type="text" value="<?php echo $obj->getObjUsuario()->getIdUsuario()?>"><br/> <br/>
	
	<label>Id Rol</label><br/>
	<input id="idrol" name ="idrol" width="80" type="text" value="<?php echo $obj->getObjRol()->getIdrol()?>"><br/> <br/>
	
	<input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit"
	>
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="listarUsuarioRol.php">Volver</a>
</body>
</html>