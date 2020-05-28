<?php
    require_once("../classes/ctrl_session.php");
    Ctrl_Session::verificar_inicio_session();
    $nombre_usuario = Ctrl_Session::get_nombre_usuario();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include("../incluir_estilos_encabezado.php"); ?>
    <title>Sistema de ventas</title>

</head>
<body>
    <div class="container-fluid">
      <?php include("incluir_menu_formularios.php"); ?>
      <h1>Sistema de ventas en linea</h1>
      
      
    </div>
    <?php include("../incluir_estilos_pie.php"); ?>
</body>
</html>
<?php

    // require_once("producto.php");

    // $producto = new Producto(1, "coca cola", 11, 20);
    // $producto->set_nombre("coca cola 2 litros retornable");
    // $datos = $producto->obtener_datos();
    // echo "hola los datos del objeto son: $datos";
?>

