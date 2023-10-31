<?php
    include_once("../config.php");
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
</head>
<body>
    <?php include_once($ESTRUCTURA."/cabecera.php"); 
        ?>
        <p>Nuevos Datos:</p>
            <form method="post" name="nuevoRol" id="nuevoRol" action="<?php echo $VISTA;?>/action/abmRol.php">
                <label for="rolDescripcion">Descripcion:</label>
                <input type="text" id="rolDescripcion" name="rolDescripcion">
                <input type="text" id="accion" name="accion" hidden value="<?php echo $accion;?>">
                <br><br> 
                <input type="submit" value="Enviar">
            </form>
        <?php
    ?>
<?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>