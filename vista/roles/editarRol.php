<?php
    include_once("../../config.php");
    $pagSeleccionada = "roles";
    $arrayRol = [];
    $colDatos = devolverDatos();
    $objAbmRol = new AbmRol();
    $accion = $colDatos ["accion"]; 
    $idRol = $colDatos ["idRol"];
    // Busco
    $arrayRol ["idRol"] = $idRol;
    $listaRoles = $objAbmRol->buscar($arrayRol);
    $rolSeleccionado = $listaRoles [0];     
    print_r($rolSeleccionado);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($ESTRUCTURA."/header.php");?>
    <link rel="stylesheet" type="text/css" href="<?php echo $CSS ?>/estilos.css">
</head>
<body>
    <?php include($ESTRUCTURA . "/cabeceraSegura.php"); 
     echo "<div class='container text-center p-4 mt-3 cajaLista col-4'>";
        echo "<h3>Datos del rol seleccionado</h3>";
        echo "<div class='text-center mx-auto'>";
        echo "<table class='table m-auto'>";
        echo  "<thead class='table-dark fw-bold'>";
                echo "<tr>";
                    echo "<td>ID</td>";
                    echo "<td>Descripcion</td>";
                echo "</tr>";
                echo "<tr>";
                echo "</thead>";
                    echo "<td>".$rolSeleccionado->getIdRol()."</td>";
                    echo "<td>".$rolSeleccionado->getRolDescripcion()."</td>";
                echo "</tr>";
            echo "</table>";
        echo "</div>";
        ?>
        <p>Nuevos Datos:</p>
            <form method="post" name="editarRol" id="editarRol" action="<?php echo $VISTA;?>/action/abmRol.php">
                <label for="rolDescripcion">Descripcion nueva:</label>
                <input type="text" id="rolDescripcion" name="rolDescripcion" value='<?php echo $rolSeleccionado->getRolDescripcion();?>' class="form-control">
                <input type="text" id="idRol" name="idRol" hidden value="<?php echo $idRol;?>">
                <input type="text" id="accion" name="accion" hidden value="<?php echo $accion;?>">
                <br><br> 
                
                <input type="submit" value="Enviar" class="btn btn-primary">
            </form>
            <a href="roles.php"> <button class="btn btn-success">Volver</button></a>
        <?php
    ?>
<?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>