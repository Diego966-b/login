<?php
    include_once("../config.php");
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
</head>
<body>
    <?php include_once($ESTRUCTURA."/cabecera.php"); 
        echo "<p>Datos del rol seleccionado</p>";
        echo "<div class='text-center mx-auto'>";
            echo "<table class='table table-bordered border border-black'>";
                echo "<tr>";
                    echo "<td>ID</td>";
                    echo "<td>Descripcion</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>".$rolSeleccionado->getIdRol()."</td>";
                    echo "<td>".$rolSeleccionado->getRolDescripcion()."</td>";
                echo "</tr>";
            echo "</table>";
        echo "</div>";
        ?>
        <p>¿Estas seguro que deseas borrar el rol?</p>
            <form method="post" name="eliminarRol" id="eliminarRol" action="<?php echo $VISTA;?>/action/abmRol.php">
                <input type="text" id="idRol" name="idRol" hidden value="<?php echo $idRol;?>">
                <input type="text" id="accion" name="accion" hidden value="<?php echo $accion;?>">
                <br><br> 
                <input type="submit" value="Si">
                <a href="roles.php">Volver</a>
            </form>
        <?php
    ?>
<?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>