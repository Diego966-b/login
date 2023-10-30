<?php


include_once "../../configuracion.php";

$datos = data_submitted();
print_R($datos);

$objAbmUsuarioRol = new AbmUsuarioRol();
if ($objAbmUsuarioRol-> modificacion($datos)){
    echo "La modificacion se realizo correctamente";
} else {
    echo "La modificacion no se realizo";
}

