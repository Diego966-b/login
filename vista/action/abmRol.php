<?php 
    include_once "../../config.php";
    $pagSeleccionada = "roles";
    $colDatos = devolverDatos();
    $resp = false;
    $objTrans = new AbmRol();
    print_r($colDatos);
    if (isset($colDatos['accion'])){
        $accion = $colDatos['accion'];
        if($accion == 'editar'){
            echo "ENTRE A EDITAR";
            if($objTrans->modificacion($colDatos)){
                $resp = true;
            }
        }
        if($accion == 'eliminar'){
            if($objTrans->baja($colDatos)){
                $resp =true;
            }

        }
        if($accion == 'nuevo'){
            if($objTrans->alta($colDatos)){
                $resp =true;
            }
        }
        if($resp){
            $mensaje = "La accion ".$accion." se realizo correctamente.";
        }else {
            $mensaje = "La accion ".$accion." no pudo concretarse.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($ESTRUCTURA."/header.php");?>
</head>
<body>
    <?php include($ESTRUCTURA."/cabecera.php");?>
    <p><?php echo $mensaje; ?></p>
    <a href="../roles.php">Volver</a>
    <?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>