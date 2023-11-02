<?php
include_once '../../config.php';
$datos = devolverDatos();
$resp = false;
$objTrans = new AbmUsuario();

if (isset($datos['accion'])) {
    if ($datos['accion'] == 'editar') {
        $passEncriptada = md5($datos ["usPass"]);
        $datos["usPass"] = $passEncriptada;
        if ($objTrans->modificacion($datos)) {
            $resp = true;;
        }
    }
    if ($datos['accion'] == 'borrar') {
        if ($objTrans->bajaLogica($datos)) {
            $resp = true;
        }
    }
    if ($datos['accion'] == 'nuevo') {
        $passEncriptada = md5($datos ["usPass"]);
        $datos["usPass"] = $passEncriptada;
        if ($objTrans->alta($datos)) {
            $resp = true;
        }
    }
    if ($datos['accion'] == 'alta') {
        $datos ["usDeshabilitado"] = null;
        if ($objTrans->altaLogica($datos)) {
            $resp = true;
        }
    }
    if ($resp) {
        $mensaje = "<h3 class='text-success'>La accion " . $datos['accion'] . " se realizo correctamente.</h3>";
    } else {
        $mensaje = "<h3 class='text-danger'>La accion " . $datos['accion'] . " no pudo concretarse.</h3>";
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <?php include_once($ESTRUCTURA . "/header.php"); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $CSS ?>/estilos.css">
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <div class="bg-dark sticky-top p-3">
        <h1 class="text-white text-center m-0">TP Login</h1>
    </div>
    <div class="container-fluid text-center cajaLista">
       
        <div class="fw-bold">
                <?php echo $mensaje;?>
        </div>
        <br><a href="../usuarios.php" class="btn btn-dark">Volver</a><br>
    </div>



    <?php include_once($ESTRUCTURA . "/pie.php"); ?>

</body>

</html>