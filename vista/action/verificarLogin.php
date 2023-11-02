<?php
    include_once("../../config.php");
    $pagSeleccionada = "login";
    $colDatos = devolverDatos();
    $contraseniaIngresada = $colDatos ["usPass"];
    $nombreIngresado = $colDatos ["usNombre"];
    $contraseniaEncriptada = md5($contraseniaIngresada);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($ESTRUCTURA."/header.php");?>
</head>
<body>
    <?php include($ESTRUCTURA."/cabeceraNoSegura.php");
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
        /*
            un script Vista/login.php que invoque al script accion/verificarLogin.php el cual redirecciona al 
            script Vista/paginaSegura.php si los datos ingresados se corresponden con un usuario/pass 
            registrados. Caso contrario se redirecciona nuevamente al script Vista/login.ph
        */
        if ($valido)
        {
            $objSesion = new Sesion();
            $objSesion -> iniciar($nombreIngresado, $contraseniaEncriptada);
            // echo $VISTA."/pagSegura.php";
            echo "Valido";
            // echo "<script>location.href ='$VISTA/roles/roles.php'; </script>";
            header("Refresh: 2; URL='$VISTA/pagSegura/pagSegura.php'");
            // /login/vista/pagSegura.phpValido

        }
        else
        {
            echo "NoValido";
            header("Refresh: 2; URL='$VISTA/login/login.php'");
        }
    ?>
    <?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>