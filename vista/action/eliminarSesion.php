<?php
    include_once("../../config.php");
    $objSesion = new Sesion();
    $exito = $objSesion -> cerrar();
    if ($exito)
    {
        echo "Se cerro";
        header("Refresh: 2; URL='$VISTA/login/login.php'");
    }
    else
    {
        echo "No se cerro";
        header("Refresh: 2; URL='$VISTA/pagSegura/pagSegura.php'");
    }
?>