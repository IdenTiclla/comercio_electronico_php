<?php
  include_once("../clases/conexion.php");
  include_once("../clases/producto.php");
  $cnx = new Conexion();
  $producto = new Producto($cnx);
  $criterio = "";
  if(isset($_POST["btnbuscar"]))
  {
     $criterio = $_POST["txtcriterio"];
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
    <h1>Productos</h1>
    <form action="frmproducto.php" method="post">
        <input type="text" name="txtcriterio" value = "<?php echo $criterio;  ?>" placeholder="buscar por nombre"> 
        <input type="submit" value="Buscar" name="btnbuscar">
        <hr>
        <?php
            if(isset($_POST["btnbuscar"]))
            {
                $producto->buscarabm($criterio,"frmabmproducto.php");
            }
        ?>
    </form>
    <a href="frmabmproducto.php?op=1">Adicionar</a>
    <h2>
    <?php
        if(isset($_GET["msg"]))
           echo $_GET["msg"];
    ?>
    </h2>
</body>
</html>