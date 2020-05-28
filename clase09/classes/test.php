<?php
require_once("conexion.php");
require_once("producto.php");
$cnx = new Conexion();
$producto = new Producto($cnx);
$producto->inicializar(2, "coca cola 3 litros", 11,  300);
echo "<h1>Productos</h1>";
$producto->buscarabm("", "../forms/frmabmproducto.php");
