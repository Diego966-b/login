
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Usuario Nuevo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Usuario</h3>

<form method="post" action="accion/nuevoUsuario.php">

	<input id="idusuario" name="idusuario" type="hidden" value=null>
	
	<label>Nombre</label><br/>
	<input id="usnombre" name ="usnombre" width="80" type="text" required><br/> <br/>
	
	<label>Pass</label><br/>
	<input id="uspass" name ="uspass" width="80" type="number" required><br/> <br/>
	
	<label>Mail</label><br/>
	<input id="usmail" name ="usmail" width="80" type="text" required><br/> <br/>
	

<input id="accion" name ="accion" value="nuevo" type="hidden">
<input type="submit">
</form>
<br><br>
<a href="listarUsuario.php">Volver</a>
</body>
</html>