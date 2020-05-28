<?php
class Comentario
{
        private $id;
        private $nombre;
        private $email;
        private $comentario;
        private $cnx;
        
        function __construct($id, $nombre, $email, $comentario, $cnx){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->comentario  = $comentario;
            $this->cnx = $cnx;
        }
        //id
        function set_id($id){
            $this->id = $id;
        }

        function get_id(){
            return $this->id;
        }

        // nombre
        function set_nombre($nombre){
            $this->nombre = $nombre;
        }

        function get_nombre(){
            return $this->nombre;
        }
        // email
        function set_email($email){
            $this->email = $emai;
        }

        function get_email(){
            return $this->email;
        }

        //comentario
        function set_comentario($comentario){
            $this->comentario = $comentario;
        }

        function get_comentario(){
            return $this->comentario;
        }
        function obtener_datos(){
            $nombre = $this->nombre;
            $email = $this->email;
            $comentario = $this->comentario;
            return "$nombre   $email    $comentario";
        }

        function guardar_datos(){

            $nombre = $this->nombre;
            $email = $this->email;
            $comentario = $this->comentario;
            
            $sql = "INSERT INTO comentarios VALUES(null,'$nombre','$email','$comentario')";
            $resultado = $this->cnx->execute($sql);    
            if(isset($resultado) && $this->cnx->filas_afectadas()>0)
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