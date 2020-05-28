<?php
    session_start();
    if (isset($_SESSION['registrados'])) {
        $registrados = $_SESSION['registrados'];
    }
    else{
        $registrados = array();
    }


    if (isset($_POST['btn_registrar'])) {
        $nombre = $_POST['nombre'];
        array_push($registrados,$nombre);
        $_SESSION['registrados'] = $registrados;
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
    <form action="form_registrar.php" method="post">
        Nombre: <input type="text" name="nombre" id="nombre"> <br> <br>
        <input type="submit" value="registrar" name="btn_registrar">
    </form>
    <a href="mostrar_registrados.php">ver nombres</a>
    
</body>
</html>