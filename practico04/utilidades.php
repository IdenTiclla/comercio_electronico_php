<?php
    function tiene_cookie_usuario_email(){
        if (isset($_COOKIE['nombre']) && isset($_COOKIE['email'])){
            return true;
        }
        return false;
        
    }
?>