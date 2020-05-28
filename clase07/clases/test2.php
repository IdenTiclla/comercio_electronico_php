<?php
    require("conexion.php");
    require("cliente.php");

    $cnx = new Conexion();

    $cliente = new Cliente($cnx);
    $cliente->inicializar(4,"fulanito quispe","fulanito11.xd@gmail.com","plan 4000","fulanito123","fulanito123","77744411");
    /*
    if ($cliente->modificar()) {
        echo "modificado Correctamente";
    }
    else{
        echo "error al modificar";
    }
    */
    
    
    echo "<h1>Clientes</h1>";
    $cliente->buscarabm("","editar_cliente.php");
    
?>