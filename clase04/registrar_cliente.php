<?php
    require("cliente.php");



    $ci = $_POST["ci"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    $cliente = new Cliente(0, $ci, $nombre, $direccion, $telefono);


    if ($cliente->guardar_datos()) {
        echo "Guardardo Correctamente";
    }
    else{
        echo "Error al guardar";
    }

?>