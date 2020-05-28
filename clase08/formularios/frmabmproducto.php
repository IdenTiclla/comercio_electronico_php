<?php
  include_once("../clases/conexion.php");
  include_once("../clases/producto.php");
  $cnx = new Conexion();
  $producto = new Producto($cnx);
  
  $id = 0;
  $nombre = "";
  $precio ="";
  $cantidad = "";
  $op = 0;
  $operacion = "";
  $error = "";  
  
  if(isset($_GET["id"]))
  {
      $op = $_GET["op"];
      $id = $_GET["id"];
      if($producto->traerporid($id))
      {
          $nombre = $producto->get_nombre();
          $precio = $producto->get_precio();
          $cantidad = $producto->get_cantidad();
      }
      else
         header("location:frmproducto.php?msg=no existe el producto");
      switch($op)
      {
          case 2: $operacion = "Modificar";break;
          case 3: $operacion = "Eliminar";break;
          default:  header("location:frmproducto.php?msg=operacion no definida");
      }
  }
  else
  {
      // adicionar nuevo
      if( isset($_GET["op"]) && $_GET["op"]==1)
      {
         $op = 1;
         $operacion = "Adicionar";
      }

  }
  //------------------ verificando el metodo post --------------------
  //funcioens
  function procesar_adicionar()
  {//dentro de la funcio no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
     global $cnx;
     global $producto;

     global $nombre;
     global $precio;
     global $cantidad;
     global $error;
     $nombre = $_POST["txtnombre"];
     $precio = $_POST["txtprecio"];
     $cantidad = $_POST["txtcantidad"];
     $producto->inicializar(0,$nombre,$precio,$cantidad);
     if($producto->guardar())
        header("location:frmproducto.php?msg=guardado correctamente!!!");
     else
        $error = "Error al adicionar revise los datos !!!";
     
  }
  function procesar_modificar()
  {//dentro de la funcio no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
     global $cnx;
     global $producto;
     global $id;
     global $nombre;
     global $precio;
     global $cantidad;
     global $error;
     $id = $_POST["txtid"];
     $nombre = $_POST["txtnombre"];
     $precio = $_POST["txtprecio"];
     $cantidad = $_POST["txtcantidad"];
     $producto->inicializar($id,$nombre,$precio,$cantidad);
     if($producto->modificar())
        header("location:frmproducto.php?msg=modificado correctamente!!!");
     else
        $error = "Error al modificar revise los datos !!!";
     
  }
  function procesar_eliminar()
  {//dentro de la funcio no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
     global $cnx;
     global $producto;
     global $id;
     global $nombre;
     global $precio;
     global $cantidad;
     global $error;
     $id = $_POST["txtid"];
     $nombre = $_POST["txtnombre"];
     $precio = $_POST["txtprecio"];
     $cantidad = $_POST["txtcantidad"];
     $producto->inicializar($id,$nombre,$precio,$cantidad);
     if($producto->eliminar())
        header("location:frmproducto.php?msg=eliminado correctamente!!!");
     else
        $error = "Error al eliminar revise los datos !!!";
     
  }
  //------------------------------------------------------------------
  if(isset($_POST["btnaceptar"]))
  {
      $op = $_POST["txtoperacion"];
      switch($op)
      {
          case 1: procesar_adicionar();break;
          case 2: procesar_modificar();break;
          case 3: procesar_eliminar();break;
      }
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registro de productos</h1>
    <h2>Operacion: <?php echo $operacion; ?></h2>
    <form action="frmabmproducto.php" method="post">
        <input type="hidden" name="txtoperacion" value="<?php echo $op; ?>">
        <label for="txtid">ID.</label>    
        <input type="text" name="txtid" id="txtid" value="<?php echo $id; ?>">

        <label for="txtnombre">Nombre(*)</label>    
        <input type="text" name="txtnombre" id="txtnombre" value="<?php echo $nombre; ?>">

        <label for="txtprecio">Precio bs.(*)</label>    
        <input type="number" step="0.01" name="txtprecio" id="txtprecio" value="<?php echo $precio; ?>">
        
        <label for="txtcantidad">Cantidad(*)</label>    
        <input type="number" name="txtcantidad" id="txtcantidad" value="<?php echo $cantidad; ?>">
        
        <input type="submit" value="Aceptar" name="btnaceptar">
        <input type="submit" value="Cancelar" name="btncancelar">
        
        
    </form>
    <H2><?php echo $error; ?></H2>
</body>
</html>