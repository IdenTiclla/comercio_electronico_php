<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="form1" action="guardarproducto.php" method="post">
        <label for="nombre">Nombre del producto</label>
        <input type="text" name="nombre" id="nombre" placeholder="nombre del producto" required>
        <label for="precio"></label>
        <input type="text" name="precio" id="precio" placeholder="precio bs." required>
        <label for="nombre"></label>
        <input type="text" name="cantidad" id="cantidad" placeholder="cantidad existente" required>
        <label for="nombre"></label>
        <input type="submit" name="btnenviar" id="btnenviar" value="Enviar">
        
    </form>
</body>
</html>