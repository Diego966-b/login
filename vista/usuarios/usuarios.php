<?php
include_once("../../config.php");
$pagSeleccionada = "usuarios";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Redirecciona al informe: -->
    <!-- <meta http-equiv="refresh" content="0; url='<?php echo $VISTA; ?>/home/index.php'"/>        -->
    <?php include_once($ESTRUCTURA . "/header.php"); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $CSS ?>/estilos.css">
</head>
<body class="">
    <?php include($ESTRUCTURA . "/cabeceraSegura.php"); 
    $objUsuario = new AbmUsuario;
    $objRolUsuario = new AbmUsuarioRol;
    $objRol = new AbmRol;

    $listadoRoles = $objRol->buscar(null);
    $listaUsuarios = $objUsuario->buscar(null);
    $listadoRolesYusuarios = $objRolUsuario->buscar(null);
     //Inicio modificacion Marco
    foreach ($listadoRoles as $rol){
        if($rol->getRolDescripcion() == "empleado" && $rol->getIdRol() == 2){
            $rolDescripcion= $rol->getRolDescripcion();
            $rolId = $rol->getIdRol();
            $rolSeleccionado = $rol;
        }        
    }
 //Fin modificacion Marco
    ?>
    <div class="container text-center p-4 mt-3 cajaLista">
        <h2>Lista de usuarios </h2>
        <table  class="table m-auto">
            <thead class="table-dark fw-bold">
                <tr>
                    <td>Nombre Usuario</td>
                    <td>Password</td>
                    <td>Mail</td>
                    <td>Estado</td>
                    <td>Rol</td>
                    <td colspan="8">Acciones</td>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($listaUsuarios) > 0) {
                    foreach ($listaUsuarios as $user) {
                        echo '<tr><td>' . $user->getUsNombre() . '</td>';
                        echo '<td>' . $user->getUsPass() . '  </td>';
                        echo '<td>' . $user->getUsMail() . '  </td>';
                        if ($user->getUsDeshabilitado() == null)
                        {
                            echo '<td>Activo</td>';
                        }
                        else
                        {
                            echo '<td>Baja desde: ' . $user->getUsDeshabilitado() . '  </td>';
                        }                        
                        //Inicio modificacion Marco 
                        foreach ($listadoRoles as $roles){
                            foreach ($listadoRolesYusuarios as $rolesUsuarios){
                                    $objUsuario = $rolesUsuarios->getObjUsuario();
                                    $objRol = $rolesUsuarios->getObjRol();
                                    $roles->getIdRol();
                                    $user->getIdUsuario();
                                    //print_r($objRol);
                                    //echo $objRol[0]->getIdRol();
                                    if($objRol[0]->getIdRol() ==  $roles->getIdRol() && $objUsuario[0]->getIdUsuario() == $user->getIdUsuario()){
                                        echo '<td>' . $roles->getRolDescripcion() . '</td>';
                                    }else{
                                        echo '<td>';
                                    }
                            }                           
                        }    
                        echo "<td>";
                        if ($user->getUsDeshabilitado() == null)
                        {   
                            echo '<a class="btn btn-danger mx-1" href="'.$VISTA.'/action/abmUsuarios.php?accion=borrar&idUsuario=' . $user->getIdUsuario() . '">Dar baja</a>';
                        }   
                        else
                        {
                            echo '<a class="btn btn-success mx-1" href="'.$VISTA.'/action/abmUsuarios.php?accion=alta&idUsuario=' . $user->getIdUsuario() . '">Dar de alta</a>';
                        }  
                        //Fin modificacion Marco
                        echo '<button type="button mx-1" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal" data-bs-id=' . $user->getIdUsuario() . '>Editar</button>';
                        echo "</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>

    </div>
    <?php include_once($ESTRUCTURA . "/pie.php"); ?>
</body>
</html>
<!-- Modal para edicion + archivo getUsuario -->
<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form name="editarForm" id="editarForm" method="post" action="<?php echo $VISTA;?>/action/abmUsuarios.php">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="editarModalLabel">Editar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id='id' name="idUsuario">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="usNombre">
                    </div>
                    <div class="mb-3">
                        <label for="mail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="mail" name="usMail">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="usPass">
                    </div>
                    <!-- Inicio Modificacion de Marco -->
                    <div class="mb-3">
                        <label for="administrador">
                        <input type="checkbox" name="administrador" id="administrador">
                        Administrador</label>
                        <label for="empleado">
                        <input type="checkbox" name="empleado" id="empleado">
                        Empleado</label>
                        <label for="jeef">
                        <input type="checkbox" name="jefe" id="jefe">
                        Jefe</label>
                        <label for="usuario">
                        <input type="checkbox" name="usuario" id="usuario">
                        Usuario</label>
                    </div>
                    <!-- fin Modificacion de Marco -->
                    <input id="accion" name="accion" value="editar" type="hidden">
                </div>
                <div class="modal-footer  bg-dark">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    let editarModal = document.getElementById('editarModal');
    editarModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget;
        let id = button.getAttribute("data-bs-id");
        let inputId = editarModal.querySelector('.modal-body #id')
        let inputNombre = editarModal.querySelector('.modal-body #nombre')
        let inputMail = editarModal.querySelector('.modal-body #mail')
        let inputPasword = editarModal.querySelector('.modal-body #password')

        let url = "getUsuario.php";
        let formData = new FormData();
        formData.append('id', id);
        fetch(url, {
                method: "POST",
                body: formData
            }).then(response => response.json())
            .then(data => {
                console.log(data)
                console.log("despues del segundo then");
                inputId.value = data.id;
                inputNombre.value = data.nombre;
                inputMail.value = data.mail;
                inputPasword.value = data.password;
            }).catch(err => console.log(err))
    })
</script>
<script src="<?php echo $JS; ?>/validarEditar.js"></script>