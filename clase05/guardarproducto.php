<?php
   require_once("clases/conexion.php");
   require_once("clases/producto.php");
   //--------------------------------
   $cnx = new Conexion();
   
   //--------------------------------
   $nombre = $_POST["nombre"];
   $precio = $_POST["precio"];
   $cantidad = $_POST["cantidad"];
   
   $producto = new Producto($cnx);
   $producto->inicializar(0,$nombre,$precio,$cantidad);
   if($producto->guardar())
      echo "guardo correctamente";
   else 
      echo "error al guardar";
?>