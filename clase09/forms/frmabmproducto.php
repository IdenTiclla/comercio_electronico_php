<?php
include_once("../classes/conexion.php");
include_once("../classes/producto.php");

require_once("../classes/ctrl_session.php");
Ctrl_Session::verificar_inicio_session();
$nombre_usuario = Ctrl_Session::get_nombre_usuario();

$cnx = new Conexion();
$producto = new Producto($cnx);

$id = 0;
$nombre = "";
$precio = "";
$cantidad = "";
$op = 0;
$operacion = "";
$error = "";

if (isset($_GET["id"])) {
    $op = $_GET["op"];
    $id = $_GET["id"];
    if ($producto->buscarPorId($id)) {
        $nombre = $producto->get_nombre();
        $precio = $producto->get_precio();
        $cantidad = $producto->get_cantidad();
    } else
        header("location:frmproducto.php?msg=No existe el producto");
    switch ($op) {
        case 2:
            $operacion = "Modificar";
            break;
        case 3:
            $operacion = "Eliminar";
            break;
        default:
            header("location:frmproducto.php?msg=Operacion no permitida");
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
    global $cnx;
    global $producto;

    global $nombre;
    global $precio;
    global $cantidad;
    global $error;

    $nombre = $_POST["txtNombre"];
    $precio = $_POST["txtPrecio"];
    $cantidad = $_POST["txtCantidad"];
    $producto->inicializar(0, $nombre, $precio, $cantidad);
    if ($producto->guardar())
        header("location:frmproducto.php?msg=guardad correctamente!!!");
    else
        $error = "Error al adicionar, revise los datos!!!";
}
//Funciones
function procesarModificar()
{ //dentro de la funcion no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
    global $cnx;
    global $producto;
    global $id;
    global $nombre;
    global $precio;
    global $cantidad;
    global $error;
    $id = $_POST["txtId"];
    $nombre = $_POST["txtNombre"];
    $precio = $_POST["txtPrecio"];
    $cantidad = $_POST["txtCantidad"];
    $producto->inicializar($id, $nombre, $precio, $cantidad);
    if ($producto->modificar())
        header("location:frmproducto.php?msg=modificado correctamente!!!");
    else
        $error = "Error al modificar revise los datos !!!";
}
function procesarEliminar()
{ //dentro de la funcio no puedo accedr a las variables globales 
    //si quiero acceder tengo que explicitar con la palabra global
    global $cnx;
    global $producto;
    global $id;
    global $nombre;
    global $precio;
    global $cantidad;
    global $error;
    $id = $_POST["txtId"];
    $nombre = $_POST["txtNombre"];
    $precio = $_POST["txtPrecio"];
    $cantidad = $_POST["txtCantidad"];
    $producto->inicializar($id, $nombre, $precio, $cantidad);
    if ($producto->eliminar())
        header("location:frmproducto.php?msg=eliminado correctamente!!!");
    else
        $error = "Error al eliminar revise los datos !!!";
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
    <title>Registro de productos</title>
</head>

<body>
    <div class="container-fluid">
        <?php include("incluir_menu_formularios.php"); ?>
        <h1>Registro de Productos</h1>
        <h2>Operacion: <?php echo $operacion ?></h2>
            <div id="form-container" style="margin: 60px">
            <form name="form1" action="frmabmproducto.php" method="POST">
                <div class="form-group">
                    <input type="hidden" class="form-control" id="txtOperacion" name="txtOperacion" value="<?php echo $op ?>">
                </div>
                <div class="form-group">
                    <label for="productName">Id del Producto</label>
                    <input type="text" class="form-control" id="txtId" name="txtId" value="<?php echo $id ?>">
                </div>
                <div class="form-group">
                    <label for="productName">Nombre del Producto</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" value="<?php echo $nombre ?>">
                </div>
                <div class="form-group">
                    <label for="productPrice">Precio del Producto</label>
                    <input type="number" class="form-control" step="0.01" id="txtPrecio" name="txtPrecio" value="<?php echo $precio ?>">
                </div>
                <div class="form-group">
                    <label for="productQuantity">Cantidad</label>
                    <input type="number" class="form-control" id="txtCantidad" name="txtCantidad" value="<?php echo $cantidad ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="btnAceptar" value="Acptar">Aceptar</button>
                <button type="submit" class="btn btn-primary" name="btnCancelar" value="Cancelar">Cancelar</button>
            </form>
            <h2><?php echo $error; ?></h2>
            </div>
    </div>
    <?php include("../incluir_estilos_pie.php"); ?>

</body>

</html>