<?php
    require_once("../classes/ctrl_session.php");
    Ctrl_Session::verificar_inicio_session();
    $nombre_usuario = Ctrl_Session::get_nombre_usuario();

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../incluir_estilos_encabezado.php"); ?>
    <title>Ventas</title>
</head>
<body>
    <div class="container-fluid">
        <?php include("incluir_menu_formularios.php")?>
        <H1>VENTAS EN LINEA</H1>
        <h2>Usuario: <?php echo($nombre_usuario);?></h2>
    </div>

    <?php include("../incluir_estilos_pie.php"); ?>
</body>
</html>