<?php
include_once("../classes/conexion.php");
include_once("../classes/cliente.php");

require_once("../classes/ctrl_session.php");
Ctrl_Session::verificar_inicio_session();
$nombre_usuario = Ctrl_Session::get_nombre_usuario();

$cnx = new Conexion();
$cliente = new Cliente($cnx);

$id = 0;
$nombre = "";
$email = "";
$direccion = "";
$login = "";
$password = "";
$telefono = "";

$op = 0;
$operacion = "";
$error = "";

if (isset($_GET["id"])) {
    $op = $_GET["op"];
    $id = $_GET["id"];
    if ($cliente->buscarPorId($id)) {
        $nombre = $cliente->get_nombre();
        $email = $cliente->get_email();
        $direccion = $cliente->get_direccion();
        $login = $cliente->get_login();
        $password = $cliente->get_password();
        $telefono = $cliente->get_telefono();
    } else
        header("location:frmcliente.php?msg=No existe el cliente");
    switch ($op) {
        case 2:
            $operacion = "Modificar";
            break;
        case 3:
            $operacion = "Eliminar";
            break;
        default:
            header("location:frmcliente.php?msg=Operacion no permitida");
            break;
    }
} else {
    if (isset($_GET["op"]) && $_GET["op"] == 1) {
        $op = 1;
        $operacion = "Adicionar";
    }
}
//=================verificnado metodo post
//funciones
function procesarAdicionar()
{
    //se pone global para acceder a las variables globales desde una funcion
    global $cliente;

    global $nombre;
    global $email;
    global $direccion;
    global $login;
    global $password;
    global $telefono;
    global $error;

    $nombre = $_POST["txtNombre"];
    $email = $_POST["txtEmail"];
    $direccion = $_POST["txtDireccion"];
    $login = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];
    $telefono = $_POST["txtTelefono"];

    $cliente->inicializar(0, $nombre, $email, $direccion, $login, $password, $telefono);
    if ($cliente->guardar())
        header("location:frmcliente.php?msg=guardado correctamente!!!");
    else {
        $error = "Error al adicionar, revise los datos!!!";
    }
}
//Funciones
function procesarModificar()
{ //dentro de la funcion no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
    global $cliente;
    global $id;
    global $nombre;
    global $email;
    global $direccion;
    global $login;
    global $password;
    global $telefono;
    global $error;
    $id = $_POST["txtId"];
    $nombre = $_POST["txtNombre"];
    $email = $_POST["txtEmail"];
    $direccion = $_POST["txtDireccion"];
    $login = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];
    $telefono = $_POST["txtTelefono"];
    $cliente->inicializar($id, $nombre, $email, $direccion, $login, $password, $telefono);
    if ($cliente->modificar())
        header("location:frmcliente.php?msg=modificado correctamente!!!");
    else {
        $error = "Error al modificar revise los datos !!!";
    }
}
function procesarEliminar()
{ //dentro de la funcio no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
    global $cnx;
    global $cliente;
    global $id;
    global $nombre;
    global $email;
    global $direccion;
    global $login;
    global $password;
    global $telefono;
    global $error;
    $id = $_POST["txtId"];
    $nombre = $_POST["txtNombre"];
    $email = $_POST["txtEmail"];
    $direccion = $_POST["txtDireccion"];
    $login = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];
    $telefono = $_POST["txtTelefono"];
    $cliente->inicializar($id, $nombre, $email, $direccion, $login, $password, $telefono);
    if ($cliente->eliminar())
        header("location:frmcliente.php?msg=eliminado correctamente!!!");
    else {
        $error = "Error al eliminar revise los datos !!!";
    }
}
//=========
if (isset($_POST["btnAceptar"])) {
    $op = $_POST["txtOperacion"];
    switch ($op) {
        case 1:
            procesarAdicionar();
            break;
        case 2:
            procesarModificar();
            break;
        case 3:
            procesarEliminar();
            break;
        default:
            echo "no hay operacion";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../incluir_estilos_encabezado.php"); ?>
    <title>Frm abm cliente</title>

</head>

<body>
    <div class="container-fluid">
    <?php include("incluir_menu_formularios.php"); ?>
        <h1>Registro de Clientes</h1>
        <h2>Operacion: <?php echo $operacion ?></h2>
        <div id="form-container" style="margin: 60px">
            <form name="form1" action="frmabmcliente.php" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="txtOperacion" name="txtOperacion" value="<?php echo $op ?>">
                </div>
                <div class="form-group">
                    <label for="txtId">Id del Cliente</label>
                    <input type="text" class="form-control" id="txtId" name="txtId" value="<?php echo $id ?>">
                </div>
                <div class="form-group">
                    <label for="txtNombre">Nombre del Cliente</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php echo $nombre ?>">
                </div>
                <div class=" form-group">
                    <label for="txtEmail">Email del Cliente</label>
                    <input type="text" class="form-control" id="txtEmail" name="txtEmail" value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <label for="txtDireccion">Dirección del Cliente</label>
                    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" value="<?php echo $direccion ?>">
                </div>
                <div class="form-group">
                    <label for="txtLogin">Login del Cliente</label>
                    <input type="text" class="form-control" id="txtLogin" name="txtLogin" value="<?php echo $login ?>">
                </div>
                <div class="form-group">
                    <label for="txtPassword">Password del Cliente</label>
                    <input type="text" class="form-control" id="txtPassword" name="txtPassword" value="<?php echo $password ?>">
                </div>
                <div class="form-group">
                    <label for="txtTelefono">Teléfono del Cliente</label>
                    <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" value="<?php echo $telefono ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="btnAceptar" value="Aceptar">Aceptar</button>
                <button type="submit" class="btn btn-primary" name="btnCancelar" value="Cancelar">Cancelar</button>

            </form>
            <h2><?php echo $error; ?></h2>
        </div>
    
    </div>

    
    <?php include("../incluir_estilos_pie.php"); ?>    
</body>

</html>