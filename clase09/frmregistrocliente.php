<?php
include_once("classes/conexion.php");
include_once("classes/cliente.php");
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
        header("location: index.php?msg=cliente registrado correctamente!!! puede iniciar session");
    else {
        $error = "Error al adicionar, revise los datos!!!";
    }
}
if (isset($_POST["btnAceptar"])) {
    $op = $_POST["txtOperacion"];
    switch ($op) {
        case 1:
            procesarAdicionar();
            break;
        case 2:
           // procesarModificar();
            break;
        case 3:
            //procesarEliminar();
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
    <?php include("incluir_estilos_encabezado.php");?>
    <title>Regisro cliente</title>
</head>
</style>

<body>
    <div class="container-fluid">
        <?php include("incluir_menu_principal.php");?>
        
        <h1>Registro de Clientes</h1>
        <h2>Operacion: <?php echo $operacion ?></h2>
        <div id="form-container" style="margin: 60px">
            <form name="form1" action="frmregistrocliente.php" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="txtOperacion" name="txtOperacion" value="1">
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
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" value="<?php echo $password ?>">
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
    <?php include("incluir_estilos_pie.php");?>
</body>
</html>