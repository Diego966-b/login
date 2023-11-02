<?php
    include_once("../../config.php");
    $pagSeleccionada = "roles";
    $arrayRol = [];
    $colDatos = devolverDatos();
    
    $accion = $colDatos ["accion"]; 
    // $idRol = $colDatos ["idRol"];
    /*
    $objAbmRol = new AbmRol();
    // Busco
    $arrayRol ["idRol"] = $idRol;
    $listaRoles = $objAbmRol->buscar($arrayRol);
    $rolSeleccionado = $listaRoles [0];   
    */  
    print_r($colDatos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($ESTRUCTURA."/header.php");?>
    <link rel="stylesheet" type="text/css" href="<?php echo $CSS ?>/estilos.css">
</head>
<body>
    <?php include($ESTRUCTURA . "/cabeceraSegura.php");?>

<div class="container-sm p-2 mt-3 cajaLista  col-4">
        
            <form method="post" name="nuevoRol" id="nuevoRol" action="<?php echo $VISTA;?>/action/abmRol.php">
                <label for="rolDescripcion" class="form-label">Nueva Descripcion:</label>
                <input type="text" id="rolDescripcion" name="rolDescripcion" class="form-control" type="text" placeholder="Jefe" aria-label="default input example">
                <input type="text" id="accion" name="accion" hidden value="<?php echo $accion;?>" >
                <br><br> 
                <input type="submit" value="Enviar" class="btn btn-primary">
            </form>
</div>
        <?php
    ?>
<?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>