<?php
  require_once("conexion.php");
  require_once("producto.php");
  $cnx = new Conexion();
  $producto = new Producto($cnx);
  $producto->inicializar(1,"coca coala 3 litros",15,300);

  echo "<h1>Productos</h1>";
  $producto->buscarabm("","editarproducto.php");

  

?>