<?php
  include_once("../clases/conexion.php");
  include_once("../clases/cliente.php");
  $cnx = new Conexion();
  $cliente = new Cliente($cnx);
  
  $id = 0;
  $nombre = "";
  //$precio ="";
  //$cantidad = "";
  $email = "";
  $direccion="";
  $login="";
  $password="";
  $telefono="";
  
//aux
  $op = 0;
  $operacion = "";
  $error = "";  
  
  // si existe el parametro id en la url es decir si utilizamos el metodos GET
  if(isset($_GET["id"]))
  {
      $op = $_GET["op"];
      $id = $_GET["id"];
      if($cliente->traerporid($id))
      {
          $nombre = $cliente->get_nombre();
          //$precio = $producto->get_precio();
          //$cantidad = $producto->get_cantidad();

            $email = $cliente->get_email();
            $direccion= $cliente->get_direccion();
            $login=$cliente->get_login();
            $password=$cliente->get_password();
            $telefono=$cliente->get_telefono();
      }
      else
         header("location:frm_cliente.php?msg=no existe el cliente");
      switch($op)
      {
          case 2: $operacion = "Modificar";break;
          case 3: $operacion = "Eliminar";break;
          default:  header("location:frm_cliente.php?msg=operacion no definida");
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
  function procesar_adicionar_cliente()
  {//dentro de la funcio no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
     global $cnx;
     global $cliente; // se necesita la instancia global

     global $nombre;
     //global $precio;
     //global $cantidad;
     global $email;
     global $direccion;
     global $login;
     global $password;
     global $telefono;
     
     // para setear un error
     global $error;
     
     $nombre = $_POST["txt_nombre"];
     $email = $_POST["txt_email"];
     $direccion = $_POST["txt_direccion"];
     $login = $_POST["txt_login"];
     $password = $_POST["txt_password"];
     $telefono = $_POST["txt_telefono"];

     //$precio = $_POST["txtprecio"];
     //$cantidad = $_POST["txtcantidad"];
     $cliente->inicializar(0,$nombre,$email,$direccion,$login,$password,$telefono);
     if($cliente->guardar())
        header("location:frm_cliente.php?msg=guardado correctamente!!!");
     else
        $error = "Error al adicionar revise los datos !!!";
     
  }
  function procesar_modificar_cliente()
  {//dentro de la funcio no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
     global $cnx;
     global $cliente;

     global $id;
     //global $precio;
     //global $cantidad;
     global $nombre;
     global $email;
     global $direccion;
     global $login;
     global $password;
     global $telefono;

     global $error;

     $id = $_POST["txt_id"];
     $nombre = $_POST["txt_nombre"];
     $email = $_POST["txt_email"];
     $direccion = $_POST["txt_direccion"];
     $login = $_POST["txt_login"];
     $password = $_POST["txt_password"];
     $telefono = $_POST["txt_telefono"];



     $cliente->inicializar($id,$nombre,$email,$direccion,$login,$password,$telefono);
     if($cliente->modificar())
        header("location:frm_cliente.php?msg=modificado correctamente!!!");
     else
        $error = "Error al modificar revise los datos !!!";
     
  }
  function procesar_eliminar_cliente()
  {//dentro de la funcio no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
     global $cnx;
     global $cliente;

     global $id;
     //global $precio;
     //global $cantidad;
     global $nombre;
     global $email;
     global $direccion;
     global $login;
     global $password;
     global $telefono;

     global $error;

     $id = $_POST["txt_id"];
     $nombre = $_POST["txt_nombre"];
     $email = $_POST["txt_email"];
     $direccion = $_POST["txt_direccion"];
     $login = $_POST["txt_login"];
     $password = $_POST["txt_password"];
     $telefono = $_POST["txt_telefono"];
     
     $cliente->inicializar($id,$nombre,$email,$direccion,$login,$password,$telefono);
     if($cliente->eliminar())
        header("location:frm_cliente.php?msg=eliminado correctamente!!!");
     else
        $error = "Error al eliminar revise los datos !!!";
     
  }
  //------------------------------------------------------------------
  // cuando hacemos click en el boton aceptar se fija en la operacion y hacemos lo que debemos xd
  if(isset($_POST["btnaceptar"]))
  {
      $op = $_POST["txtoperacion"];
      switch($op)
      {
          case 1: procesar_adicionar_cliente();break;
          case 2: procesar_modificar_cliente();break;
          case 3: procesar_eliminar_cliente();break;
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
    <h1>Registro de clientes</h1>
    
    <h2>Operacion: <?php echo $operacion; ?></h2>

    <form action="frm_abm_cliente.php" method="post">
        <input type="hidden" name="txtoperacion" value="<?php echo $op; ?>">
        
        <label for="txtid">ID.</label>    
        <input type="text" name="txt_id" id="txt_id" value="<?php echo $id; ?>">

        <label for="txtnombre">Nombre(*)</label>    
        <input type="text" name="txt_nombre" id="txt_nombre" value="<?= $nombre; ?>">

        <label for="txtnombre">Email(*)</label>    
        <input type="text" name="txt_email" id="txt_email" value="<?= $email; ?>">

        <label for="txtnombre">Direccion(*)</label>    
        <input type="text" name="txt_direccion" id="txt_direccion" value="<?= $direccion; ?>">
        
        <label for="txtnombre">Login(*)</label>    
        <input type="text" name="txt_login" id="txt_login" value="<?=$login; ?>">

        <label for="txtnombre">Password(*)</label>    
        <input type="text" name="txt_password" id="txt_password" value="<?=$password; ?>">

        <label for="txtnombre">Telefono(*)</label>    
        <input type="text" name="txt_telefono" id="txt_telefono" value="<?=$telefono; ?>">


        <input type="submit" value="Aceptar" name="btnaceptar">
        <input type="submit" value="Cancelar" name="btncancelar">
        
        
    </form>
    <H2><?php echo $error; ?></H2>
</body>
</html>