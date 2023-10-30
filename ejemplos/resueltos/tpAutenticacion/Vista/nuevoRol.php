<?php include_once '../configuracion.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Rol</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Generar un nuevo rol</h3>

<form method="post" action="accion/insertarRol.php">


<input id="idrol" name ="idrol" type="text" hidden>

<br/><label>Nombre del rol</label><br/>
<input id="rodescripcion" name ="rodescripcion" type="text" required>

<input type="submit" value='Generar'>
</form>
</body>
</html>