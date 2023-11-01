<?php 
    $pagSeleccionada = "login";
    include_once("../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($ESTRUCTURA."/header.php");?>
</head>
<body>  
    <?php include($ESTRUCTURA."/cabecera.php");?>
    <div class="container-fluid text-center">
        <h3>Bienvenidos a login</h3>
    </div>
    <div>
        <form name="loginForm" id="loginForm" method="post" action="action/verificarLogin.php">
            <label for="usNombre">Nombre de usuario</label>
            <input type="text" name="usNombre" id="usNombre">
            <br><br>
            <label for="usPass">Contrase&ntilde;a</label>
            <input type="text" name="usPass" id="usPass">
            <input type="submit" value="enviar">
        </form>
    </div>
    <?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>