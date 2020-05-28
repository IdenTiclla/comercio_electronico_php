<?php
include_once("classes/conexion.php");
include_once("classes/cliente.php");
include_once("classes/ctrl_session.php");

$cnx = new Conexion();
$cliente = new Cliente($cnx);

$id = 0;
$login = "";
$password = "";

$error = "";

//=================verificnado metodo post
//funciones
function procesarIniciarSession()
{
    //se pone global para acceder a las variables globales desde una funcion
    global $cliente;
    global $login;
    global $password;
    global $error;

   
    $login = $_POST["txtLogin"];
    $password = $_POST["txtPassword"];

    if ($cliente->loguear($login,$password)==true)
    {
        //guardar datos en la session 
       // $_SESSION["login_usuario"]=$login;
       // $_SESSION["id_usuario"] = $cliente->get_id();
       // $_SESSION["nombre_usuario"] = $cliente->get_nombre();
        Ctrl_Session::iniciar_session($login,$cliente->get_id(),$cliente->get_nombre());
        header("location: forms/index.php?msg=logueado correctamente");
    }    
    else {
        $error = "Error al iniciar revise sus datos de acceso";
    }
}
if (isset($_POST["btnAceptar"])) {
            procesarIniciarSession();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("incluir_estilos_encabezado.php");?>
    <title>Login cliente</title>
</head>
</style>

<body>
    <div class="container-fluid">
        <?php include("incluir_menu_principal.php");?>
        <h1>Iniciar session cliente:</h1>
        <div id="form-container" style="margin: 60px">
            <form name="form1" action="frmlogin.php" method="POST">
                <div class="form-group">
                    <label for="txtLogin">Login del Cliente</label>
                    <input type="text" class="form-control" id="txtLogin" name="txtLogin" value="<?php echo $login ?>">
                </div>
                <div class="form-group">
                    <label for="txtPassword">Password del Cliente</label>
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" value="<?php echo $password ?>">
                </div>
                
                <button type="submit" class="btn btn-primary" name="btnAceptar" value="Aceptar">Aceptar</button>
                <button type="submit" class="btn btn-primary" name="btnCancelar" value="Cancelar">Cancelar</button>

            </form>
            <h2><?php echo $error; ?></h2>
        </div>
        <?php include("incluir_estilos_pie.php");?>
    </div>
</body>

</html>