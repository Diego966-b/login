<?php
    include_once("../config.php");
    $objSesion = new Sesion();
    if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true)
    {
        echo "No";
        header("Refresh: 0; URL='$VISTA/login.php'");
    }
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
            <H2>VISTA SEGURA</H2>
            <form name="cerrarSesion" id="cerrarSesion" method="post" action="action/eliminarSesion.php">
                <input type="submit" value="cerrar">
            </form>
        </body>
        </html>
    <?php
?>