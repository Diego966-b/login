<?php
    include_once("../../config.php");
    $pagSeleccionada = "login";
    $colDatos = devolverDatos();
    $contraseniaIngresada = $colDatos ["usPass"];
    $nombreIngresado = $colDatos ["usNombre"];
    $objEncriptar = new Encriptar();
    $contraseniaEncriptada = $objEncriptar -> encriptarMd5($contraseniaIngresada);
    /*
    un script Vista/login.php que invoque al script accion/verificarLogin.php el cual redirecciona al 
    script Vista/paginaSegura.php si los datos ingresados se corresponden con un usuario/pass 
    registrados. Caso contrario se redirecciona nuevamente al script Vista/login.ph
    */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once($ESTRUCTURA."/header.php");?>
</head>
<body>
    <?php include_once($ESTRUCTURA."/cabeceraNoSegura.php");
        $abmUsuario = new AbmUsuario();
        $listaUsuarios = $abmUsuario -> buscar(null);
        $valido = false;
        if (count($listaUsuarios) > 0)
        {
            foreach ($listaUsuarios as $usuario)
            {
                $contrasenia = $usuario -> getUsPass();
                $nombreUsuario = $usuario -> getUsNombre();
                $usDeshabilitado = $usuario -> getUsDeshabilitado();
                if ($usDeshabilitado <> null)
                {
                    echo "El usuario esta deshabilitado";
                }
                elseif (($contrasenia == $contraseniaEncriptada) && ($nombreUsuario == $nombreIngresado))
                {
                    $valido = true;
                }
            }
        }
        if ($valido)
        {
            $objSesion = new Sesion();
            $objSesion -> iniciar($nombreIngresado, $contraseniaEncriptada);
            echo "Valido";
            header("Refresh: 2; URL='$VISTA/pagSegura/pagSegura.php'");
        }
        else
        {
            echo "NoValido";
            header("Refresh: 2; URL='$VISTA/login/login.php'");
        }
    ?>
    <?php include_once($ESTRUCTURA."/pie.php");?>
</body>
</html>