<?php
  include_once("../clases/conexion.php");
  include_once("../clases/cliente.php");
  $cnx = new Conexion();
  $cliente = new Cliente($cnx);
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
    <title>frm clientes</title>
</head>
<body>
    <h1>Clientes</h1>
    <form action="frm_cliente.php" method="post">
        <input type="text" name="txtcriterio" value = "<?php echo $criterio;  ?>" placeholder="buscar por nombre"> 
        <input type="submit" value="Buscar" name="btnbuscar">
        <hr>
        <?php
            if(isset($_POST["btnbuscar"]))
            {
                $cliente->buscarabm($criterio,"frm_abm_cliente.php");
            }
        ?>
    </form>
    <a href="frm_abm_cliente.php?op=1">Adicionar</a>
    <h2>
    <?php
        if(isset($_GET["msg"]))
           echo $_GET["msg"];
    ?>
    </h2>
</body>
</html>