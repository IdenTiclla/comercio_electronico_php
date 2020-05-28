<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>

<form action="registrar_cliente.php" method="POST">
    
  <div class="form-group">
    <label for="ci">ci</label>
    <input type="text" class="form-control" id="ci" name="ci">
  </div>

  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>

  <div class="form-group">
    <label for="direccion">direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion">
  </div>

  <div class="form-group">
    <label for="telefono">telefono</label>
    <input type="text" class="form-control" id="telefono" name="telefono">
  </div>


  <button type="submit" class="btn btn-primary btn-block">Submit</button>
</form>

</body>
</html>