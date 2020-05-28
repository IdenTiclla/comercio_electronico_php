<?php
    session_start();
    if (isset($_POST['btn_enviar_nombre'])) {
        $nombre = $_POST['nombre'];
        $_SESSION['nombre'] = $nombre;
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
    <form action="pagina1.php" method="post">
        Nombre: <input type="text" name="nombre" id="nombre"><br><br>
                <input type="submit" name="btn_enviar_nombre">
    </form>
    
</body>
</html>