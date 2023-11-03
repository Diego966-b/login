<?php 
    include_once "../../config.php";
    $pagSeleccionada = "roles";
    $colDatos = devolverDatos();
    $resp = false;
    $objTrans = new AbmRol();
    if (isset($colDatos['accion'])){
        $accion = $colDatos['accion'];
        if($accion == 'editar'){
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
    <link rel="stylesheet" type="text/css" href="<?php echo $CSS ?>/estilos.css">
</head>
<body>
    <?php include($ESTRUCTURA."/cabeceraSegura.php");?>
    
   
    <div class="container-fluid text-center cajaLista">        
        <div class="fw-bold">
                <?php echo $mensaje;?>
        </div>
        <br><a href="<?php echo $VISTA?>/roles/roles.php" class="btn btn-dark">Volver</a><br>
    </div>
    
    <?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>