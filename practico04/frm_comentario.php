<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("utilidades.php") ?>
    <form action="registrar_comentario" method="POST">
        
        <?php if(!tiene_cookie_usuario_email()) : ?>
            Nombre: <input type="text" name="nombre" placeholder="Ingrese su nombre."><br><br>
            Email: <input type="text" name="email" placelholder="Ingrese su email."><br><br>
        <?php else : ?>
            <?php $nombre= $_COOKIE['nombre'];?>
            <?php $email=$_COOKIE['email'];?>
            <h1>hola <?=$nombre?> tu correo es:<?=$email?></h1>
        <?php endif; ?>

        
        Comentario: <input type="text" name="comentario" placeholder="Ingrese su comentario"><br><br>
        <input type="submit" name="btnComentar" value="Enviar comentario"><br>
    </form>
    
</body>
</html>