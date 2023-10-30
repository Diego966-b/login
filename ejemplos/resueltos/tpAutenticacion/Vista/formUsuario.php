<?php
 
include_once '../configuracion.php';
$objAbmUsuario = new AbmUsuario();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['idusuario'])){
    $listaUsuario = $objAbmUsuario->buscar($datos);
    if (count($listaUsuario)==1){
        $obj= $listaUsuario[0];
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Actualizar Usuario</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Editar Usuario</h3>
<?php if ($obj!=null){?>
<form method="post" action="accion/actualizarLogin.php">
	<label>Id Usuario</label><br/>
	<input id="idusuario"  readonly name ="idusuario" width="80" type="text" value="<?php echo $obj->getIdUsuario()?>"><br/> <br/>
	
	<label>Nombre</label><br/>
	<input id="usnombre" name ="usnombre" width="80" type="text" value="<?php echo $obj->getUsNombre()?>"><br/> <br/>
	
	<label>Pass</label><br/>
	<input id="uspass" name ="uspass" width="80" type="text" value="<?php echo $obj->getUsPass()?>"><br/> <br/>
	
	<label>Mail</label><br/>
	<input id="usmail" name ="usmail" width="80" type="text" value="<?php echo $obj->getUsMail()?>"><br/> <br/>
	
	<label>Deshabilitado</label><br/>
	<input id="usdeshabilitado" name ="usdeshabilitado" width="80" type="text" value="<?php echo $obj->getUsDeshabilitado()?>"><br/> <br/>
	
	<input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit"
	>
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="listarUsuario.php">Volver</a>
</body>
</html>