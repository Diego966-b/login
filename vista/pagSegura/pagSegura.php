<?php
    include_once("../../config.php");
    $pagSeleccionada = "pagSegura";
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <?php include_once($ESTRUCTURA."/header.php"); ?>
        </head>
        <body>
            <?php include_once($ESTRUCTURA . "/cabeceraSegura.php");?>
            <H2>VISTA SEGURA</H2>
            <form name="cerrarSesion" id="cerrarSesion" method="post" action="<?php echo $VISTA ?>/action/eliminarSesion.php">
                <input type="submit" value="Cerrar Sesion">
            </form>
        </body>
        </html>
    <?php
?>