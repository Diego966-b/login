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
    echo "<div class='container text-center p-4 mt-3 cajaLista'>";
        echo "<h3>Datos del rol seleccionado</h3>";
        echo "<div class='text-center mx-auto'>";
            echo "<table class='table m-auto'>";
            echo  "<thead class='table-dark fw-bold'>";
            echo "<tr>";
                    echo "<td>ID</td>";
                    echo "<td>Descripcion</td>";
                echo "</tr>";
                echo "</thead>";
                echo "<tr>";
                    echo "<td>".$rolSeleccionado->getIdRol()."</td>";
                    echo "<td>".$rolSeleccionado->getRolDescripcion()."</td>";
                echo "</tr>";
            echo "</table>";
        echo "</div>";
        ?>
        
            <form method="post" name="eliminarRol" id="eliminarRol" action="<?php echo $VISTA;?>/action/abmRol.php">
                <input type="text" id="idRol" name="idRol" hidden value="<?php echo $idRol;?>">
                <input type="text" id="accion" name="accion" hidden value="<?php echo $accion;?>">
                <br><br> 
                <p>¿Estas seguro que deseas borrar el rol?</p>
                <input type="submit" value="Eliminar" class="btn btn-danger">                
            </form>
            <a href="roles.php"> <button class="btn btn-success">Volver</button></a>
        <?php
    ?>
    </div>
<?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>