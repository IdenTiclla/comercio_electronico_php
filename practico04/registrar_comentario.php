<?php
    include("utilidades.php");
    include("clases/conexion.php");
    include("clases/comentario.php");

    //--------------------------------
    $cnx = new Conexion();
   
    //--------------------------------

    if($_POST['btnComentar']){
        // si tiene cookies
        if (tiene_cookie_usuario_email()) {
            $nombre = $_COOKIE['nombre'];
            $email = $_COOKIE['email'];
            $comentario = $_POST['comentario'];
            

            
        }
        else{
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $comentario = $_POST['comentario'];
            
            // seteamos las cookies
            
            setcookie('nombre', $nombre);
            setcookie('email', $email);

            
            
        }
        
        $c = new Comentario(0,$nombre,$email,$comentario,$cnx);

        if ($c->guardar_datos()) {
            echo "Guardardo Correctamente";
        }
        else{
            echo "Error al guardar";
        }
        

    }


?>