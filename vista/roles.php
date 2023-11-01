<?php 
    $pagSeleccionada = "roles";
    include_once("../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($ESTRUCTURA."/header.php");?>
</head>
<body>  
    <?php include($ESTRUCTURA."/cabecera.php");?>
    <div class="container-fluid text-center">
        <h3>Bienvenidos a rooles</h3>
    </div>
    <?php 
        $objAbmRol = new AbmRol();
        $listaRoles = $objAbmRol->buscar(null);
        if (count($listaRoles) > 0)
        {
            echo "<div class='text-center mx-auto'>";
                echo "<table class='table table-bordered border border-black'>";
                    echo "<tr>";
                        echo "<td>ID</td>";
                        echo "<td>Descripcion</td>";
                        echo "<td>Acciones</td>";
                    echo "</tr>";
                foreach ($listaRoles as $objRol) { 
                        echo "<tr>";
                            echo '<td style="width:500px;">'.$objRol->getIdRol().'</td>';
                            echo '<td style="width:500px;">'.$objRol->getRolDescripcion().'</td>';
                            echo '<td><a href="editarRol.php?idRol='.$objRol->getIdRol().'&accion=editar">Editar</a>';
                            echo " - - - - - - ";
                            echo '<a href="eliminarRol.php?idRol='.$objRol->getIdRol().'&accion=eliminar">Eliminar</a></td>'; 
                        echo "</tr>";
                }
                echo "</table>";
            echo "</div>";
            echo '<a href='.$VISTA.'/nuevoRol.php?accion=nuevo>Crear nuevo rol</a>';
        }
        else
        {
            echo "<h3>No hay roles cargados</h3>";
            echo '<a href='.$VISTA.'/nuevoRol.php?accion=nuevo>Crear nuevo rol</a>';
        }
    ?>
    <?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>