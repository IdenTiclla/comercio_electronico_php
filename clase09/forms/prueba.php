<?php

if (isset($_GET["id"])) {
    $op = $_GET["op"];
    $id = $_GET["id"];
    echo "id:" . $id;
    echo "op:" . $op;
}
include_once("../classes/conexion.php");
include_once("../classes/producto.php");
$cnx = new Conexion();
$producto = new Producto($cnx);

$id = 0;
$nombre = "";
$precio = "";
$cantidad = "";
$op = 0;
$operacion = "";
$error = "";

if (isset($_GET["id"])) {
    $op = $_GET["op"];
    $id = $_GET["id"];
    if ($producto->buscarPorId($id)) {
        $nombre = $producto->get_nombre();
        $precio = $producto->get_precio();
        $cantidad = $producto->get_cantidad();
        var_dump($id);
        var_dump($nombre);
    }
    var_dump($id);
    echo "$nombre, $precio, $cantidad";
}
