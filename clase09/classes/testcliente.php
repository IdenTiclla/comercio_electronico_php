<?php
require_once("conexion.php");
require_once("cliente.php");
$cnx = new Conexion();
$cliente = new Cliente($cnx);
$cliente->inicializar(0, "Alexander the Great", "alex@gmail.com", "Av. China", "alex", "alexpassword", "69896936");
// if ($cliente->guardar())
//     echo "guardado correctamente";

echo "<h1>Clientes</h1>";
$cliente->buscarabm("", "../editarcliente.php");
