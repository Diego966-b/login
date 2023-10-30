<?php
include_once '../configuracion.php';
$abmRol = new AbmRol();
$arregloRoles = $abmRol->buscar(null);
$comp_selectRol = " <select id=idrol name =idrol >";
foreach ($arregloRoles as $rol){
    
    $comp_selectRol .= "<option value=".$rol -> getIdrol()." >".$rol->getRodescripcion()."</option>";
    
}
$comp_selectRol .= " </select> ";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Nuevo Usuario Rol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Nuevo Usuario Rol</h3>

<form method="post" action="accion/nuevoUsuarioRol.php">
	<label>Id Usuario</label><br/>
	<input id="idusuario" name ="idusuario" width="80" type="number" required="required" min="0"  value=""><br/> <br/>
	
	<label>Rol</label><br/>
	
	<?php echo $comp_selectRol ?>
	
	<br>
	<br>
	
	<input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit"
	>
</form>
<a href="listarUsuarioRol.php">Volver</a>
</body>
</html>