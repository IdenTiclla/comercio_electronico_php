<?php
    require_once("clases/conexion.php");
    require_once("clases/cliente.php");

    //--------------------------------
    $cnx = new Conexion();
   
    //--------------------------------



    $ci = $_POST["ci"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $telefono = $_POST["telefono"];

    $cliente = new Cliente(0, $ci, $nombre, $direccion, $telefono,$cnx);


    if ($cliente->guardar_datos()) {
        echo "Guardardo Correctamente";
    }
    else{
        echo "Error al guardar";
    }

?>