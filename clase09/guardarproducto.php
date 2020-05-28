<?php
   require_once("classes/conexion.php");
   require_once("classes/producto.php");
   //=========================
   $cnx = new Conexion();
   //=========================
   $nombre = $_POST["productName"];
   $precio = $_POST["productPrice"];
   $cantidad = $_POST["productQuantity"];

   $producto = new Producto($cnx);
   $producto->inicializar(0,$nombre,$precio,$cantidad);
   if($producto->guardar())
      echo "guardo correctamente";
   else
      echo "error al guardar";
?>