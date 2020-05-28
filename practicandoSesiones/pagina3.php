<?php
    session_start();
    if (isset($_SESSION['nombre']) && isset($_SESSION['direccion'])) {
        $nombre = $_SESSION['nombre'];
        $direccion = $_SESSION['direccion'];
        echo "$nombre       $direccion";
    }

?>