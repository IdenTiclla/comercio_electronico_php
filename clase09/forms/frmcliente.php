<?php
include_once("../classes/conexion.php");
include_once("../classes/cliente.php");

require_once("../classes/ctrl_session.php");
Ctrl_Session::verificar_inicio_session();
$nombre_usuario = Ctrl_Session::get_nombre_usuario();

$cnx = new Conexion();
$cliente = new Cliente($cnx);

$criterio = "";

if (isset($_POST["btnBuscar"])) {
    $criterio = $_POST["txtCriterio"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../incluir_estilos_encabezado.php"); ?>
    <title>Clientes</title>
</head>

<body>
    <div class="container-fluid">
    <?php include("incluir_menu_formularios.php"); ?>
        <h1>Clientes</h1>
        <div id="form-container" style="margin: 60px">
            <form name="form1" action="frmcliente.php" method="POST">
                <div class="form-group">
                    <label for="productName">Nombre del Cliente</label>
                    <input type="text" class="form-control" id="txtCriterio" name="txtCriterio" value="<?php echo $criterio; ?>">
                </div>
                <button type="submit" class="btn btn-primary" value="Buscar" name="btnBuscar">Enviar</button>
                <hr>
                <?php
                if (isset($_POST["btnBuscar"])) {
                    $cliente->buscarabm($criterio, "frmabmcliente.php");
                }
                ?>
            </form>
            <a href="frmabmcliente.php?op=1">Adicionar</a>
            <h2>
                <?php
                if (isset($_GET["msg"]))
                    echo $_GET["msg"];
                ?>
            </h2>
        </div>
    </div>

    
    <?php include("../incluir_estilos_pie.php"); ?>
</body>

</html>