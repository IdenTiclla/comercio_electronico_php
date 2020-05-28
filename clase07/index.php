<?php
    require_once("producto.php");
    $producto = new Producto();
    $producto->inicializar(1,"coca cola",11,20);
    $producto->set_nombre("coca cola 2 litros retornable");
    $datos = $producto->obtener_datos();
    echo "hola los datos del objeto son: $datos";
    

?>

