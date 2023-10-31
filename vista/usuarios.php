
<?php
    include_once("../config.php");
    $pagSeleccionada="usuarios";

?> 
<!DOCTYPE html>
<html lang="en">
<head>   
    <!-- Redirecciona al informe: -->
    <!-- <meta http-equiv="refresh" content="0; url='<?php echo $VISTA; ?>/home/index.php'"/>        -->
    <?php include_once($ESTRUCTURA."/header.php"); ?>
</head>
<body>
    <?php include_once($ESTRUCTURA."/cabecera.php"); ?>
    <div class="container text-center">

        <h3>Bienvenidos a usuarios </h3>
    </div>

    <?php include_once($ESTRUCTURA."/pie.php"); ?>
    <script src="<?php echo $JS?>/validar.js"></script>
</body>
</html>