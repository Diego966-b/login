<?php
$pagSeleccionada = "login";
include_once("../../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include($ESTRUCTURA . "/header.php"); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $CSS ?>/estilos.css">
</head>

<body>
    <?php include($ESTRUCTURA . "/cabeceraNoSegura.php"); ?>
    <div class="container text-center p-4 mt-3 cajaLista col-4">
        <h3>Bienvenidos a login</h3>

        <div>
            <form name="loginForm" id="loginForm" method="post" action="<?php echo $VISTA ?>/action/verificarLogin.php" class="mb-3">
                    <label for="usNombre" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="usNombre" name="usNombre" placeholder="Pepe" value="Nombre">
                    <br>
                    <label for="usPass" class="form-label">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="usPass" name="usPass" placeholder="****" value="12345abc">
                    <input type="submit" value="Iniciar sesion" class="btn btn-success mt-4">
            </form>
        </div>
    </div>
    <?php include($ESTRUCTURA . "/pie.php"); ?>
</body>

</html>