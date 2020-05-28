<?php
    
    class Cliente{
        private $id;
        private $ci;
        private $nombre;
        private $direccion;
        private $telefono;
        private $cnx;
    
        function __construct($id, $ci, $nombre, $direccion, $telefono, $cnx){
            $this->id = $id;
            $this->ci = $ci;
            $this->nombre = $nombre;
            $this->direccion = $direccion;
            $this->telefono = $telefono;
            $this->cnx = $cnx;
        }

        function set_id($id){
            $this->id = $id;
        }
        function get_id(){
            return $this->id;
        }
        
        function set_ci($ci){
            $this->ci = $ci;
        }
        function get_ci(){
            return $this->ci;
        }

        function set_nombre($nombre){
            $this->nombre = $nombre;
        }
        function get_nombre(){
            return $this->nombre;
        }

        function set_direccion($direccion){
            $this->direccion = $direccion;
        }
        function get_direccion(){
            return $this->direccion;
        }

        function set_telefono($telefono){
            $this->telefono = $telefono;
        }
        function get_telefono(){
            return $this->telefono;
        }

        function obtener_datos(){
            return $this->nombre . "     " . $this->ci . "    " . $this->telefono . "  " . $this->direccion;
        }

        function guardar_datos(){
            #include("db.php");
            $ci = $this->ci;
            $nombre = $this->nombre;
            $direccion = $this->direccion;
            $telefono = $this->telefono;
            
            $sql = "INSERT INTO clientes VALUES(null,$ci,'$nombre','$direccion',$telefono)";
            $resultado = $this->cnx->execute($sql);    
            if(isset($resultado)&&$this->cnx->filas_afectadas()>0)
            {  
            return true;
            }
            else
            {
            return false;
            }
        }


    }

?>