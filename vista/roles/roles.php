<?php 
    $pagSeleccionada = "roles";
    include_once("../../config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($ESTRUCTURA."/header.php");?>
    <link rel="stylesheet" type="text/css" href="<?php echo $CSS ?>/estilos.css">
</head>
<body>  
    <?php include($ESTRUCTURA . "/cabeceraSegura.php");?>
    <div class="container text-center p-4 mt-3 cajaLista">
        <h3>Bienvenidos a roles</h3>
    <?php 
        $objAbmRol = new AbmRol();
        $listaRoles = $objAbmRol->buscar(null);
        if (count($listaRoles) > 0)
        {
            echo "<div class='text-center mx-auto'>";
                echo "<table class='table m-auto'>";
                echo  "<thead class='table-dark fw-bold'>";
                    echo "<tr>";
                        echo "<td>ID</td>";
                        echo "<td>Descripcion</td>";
                        echo "<td>Acciones</td>";
                    echo "</tr>";
                    echo "</thead>";
                foreach ($listaRoles as $objRol) { 
                        echo "<tr>";
                            echo '<td>'.$objRol->getIdRol().'</td>';
                            echo '<td>'.$objRol->getRolDescripcion().'</td>';
                            echo '<td><a href="'.$VISTA.'/roles/editarRol.php?idRol='.$objRol->getIdRol().'&accion=editar"><button class="btn btn-primary mx-1">Editar</button></a>';
                            echo '<a href="'.$VISTA.'/roles/eliminarRol.php?idRol='.$objRol->getIdRol().'&accion=eliminar"><button class="btn btn-danger mx-1">Eliminar</button></a></td>'; 
                        echo "</tr>";
                }
                echo "</table>";
            echo "</div>";
            echo '<a href='.$VISTA.'/roles/nuevoRol.php?accion=nuevo><button class="btn btn-success"> Crear nuevo rol </button></a>';
        }
        else
        {
            echo "<h3>No hay roles cargados</h3>";
            echo '<a href='.$VISTA.'/roles/nuevoRol.php?accion=nuevo><button class="btn btn-success m-2"> Crear nuevo rol </button></a>';
        }
       
    ?>
     </div>
    <?php include($ESTRUCTURA."/pie.php");?>
</body>
</html>