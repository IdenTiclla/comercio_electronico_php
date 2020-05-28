<?php
    session_start();
    if (isset($_POST['btn_enviar_direccion'])) {
        $direccion = $_POST['direccion'];
        $_SESSION['direccion'] = $direccion;
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
    <form action="pagina2.php" method="post">
        direaccion: <input type="text" name="direccion" id="direccion"><br><br>
                <input type="submit" name="btn_enviar_direccion">
    </form>
    
</body>
</html>