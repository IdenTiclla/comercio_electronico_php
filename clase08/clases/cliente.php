<?php
class Cliente{
      private $id;
      private $nombre;
      private $email;
      private $direccion;
      private $login;
      private $password;
      private $telefono;
      // conexion
      private $cnx;

      //inicializar

      function inicializar($id, $nombre, $email, $direccion, $login, $password, $telefono){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->direccion = $direccion;
            $this->login = $login;
            $this->password = $password;
            $this->telefono = $telefono;
      }

      // constructor 
      function __construct($cnx){
            $this->id = 0;
            $this->nombre = "";
            $this->email = "";
            $this->direccion = "";
            $this->login = "";
            $this->password = "";
            $this->telefono = "";
            // ojo con la conexion
            $this->cnx = $cnx;
      }

      //id
      function set_id($id){
            $this->id = $id;
      }
      function get_id(){
            return $this->id;
      }
      //nombre
      function get_nombre(){
            return $this->nombre;
      }
      function set_nombre($nombre){
            $this->nombre = $nombre;
      }
      // email
      function get_email(){
            return $this->email;
      }
      function set_email($email){
            $this->email = $email;
      }
      // direccion
      function get_direccion(){
            return $this->direccion;
      }
      function set_direccion($direccion){
            $this->direccion = $direccion;
      }

      //login
      function get_login(){
            return $this->login;
      }

      function set_login($login){
            $this->login = $login;
      }

      //password
      function get_password(){
            return $this->password;
      }

      function set_password($password){
            $this->password = $password;
      }
      //telefono
      function get_telefono(){
            return $this->telefono;
      }

      function set_telefono($telefono){
            $this->telefono = $telefono;
      }
      // funcion para guardar el cliente en la base de datos
      function guardar(){
            //seteamos nuestras variables para armar luego la consulta sql
            $n = $this->nombre;
            $e = $this->email;
            $d = $this->direccion;
            $l = $this->login;
            $p = $this->password;
            $t = $this->telefono;
            // consulta sql
            $sql = "insert into clientes values(null,'$n','$e','$d','$l','$p','$t')";     
            
            $resultado = $this->cnx->execute($sql);    
            if(isset($resultado) && $this->cnx->filas_afectadas() > 0)
            {  
            return true;
            }
            else
            {
            return false;
            }
      }
      function modificar(){
            //seteamos nuestras variables para armar luego la consulta sql
            $n = $this->nombre;
            $e = $this->email;
            $d = $this->direccion;
            $l = $this->login;
            $p = $this->password;
            $t = $this->telefono;
            $id = $this->id;
            // consulta sql
            $sql = "UPDATE clientes SET nombre = '$n', email = '$e', direccion = '$d', login = '$l', password = '$p', telefono = '$t'  WHERE id = $id";
            $resultado = $this->cnx->execute($sql);    
            if(isset($resultado) && $this->cnx->filas_afectadas() > 0)
            {  
            return true;
            }
            else
            {
            return false;
            }

      }
      function eliminar(){
            // recuperamos el id
            $id = $this->id;
            $sql = "delete from clientes where id = $id";
            $resultado = $this->cnx->execute($sql);    
            if(isset($resultado) && $this->cnx->filas_afectadas() > 0)
            {  
            return true;
            }
            else
            {
            return false;
            }
      }
      function buscar($criterionombre)
      {     
            //$id = $this->id;
            $sql = "SELECT * FROM clientes WHERE nombre like '%$criterionombre%' ";
            $resultado = $this->cnx->execute($sql);    
            if(isset($resultado) && $this->cnx->filas_afectadas() > 0)
            {  
            return $resultado;
            }
            else
            {
            return false;
            }
      }
      // traer cliente por id
      function traerporid($id)
    {     
        //$id = $this->id;
        $sql = "select * from clientes where id = $id";
        $resultado = $this->cnx->execute($sql);    
        if(isset($resultado) && $this->cnx->filas_afectadas() > 0)
        {  
           $registro = $this->cnx->next($resultado);
           $this->id = $id;
           $this->nombre = $registro["nombre"];
           $this->email = $registro["email"];
           $this->direccion = $registro["direccion"];

           $this->login = $registro["login"];
           $this->password = $registro["password"];
           $this->telefono = $registro["telefono"];
           return true;
        }
        else
        {
           return false;
        }
    }


      // buscar abm
      function buscarabm($criterionombre,$paginadestino)
      {     
            //$id = $this->id;
            $sql = "select * from clientes where nombre like '%$criterionombre%' ";
            $resultado = $this->cnx->execute($sql);    
            if(isset($resultado)&&$this->cnx->filas_afectadas()>0)
            {  
                  echo "<table border='1'>";
                  
                  echo"<tr>
                              <th>Id.</th>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>direccion</th>
                              <th>login</th>
                              <th>password</th>
                              <th>telefono</th> 
                              <th>Mod.</th>
                              <th>Elim.</th>
                        </tr>";
                  while($registro = $this->cnx->next($resultado))
                  {
                        // recuperamos los  datos en nuestras variables
                        $n = $registro["nombre"];
                        $e = $registro["email"];
                        $d = $registro["direccion"];
                        $l = $registro["login"];
                        $p = $registro["password"];
                        $t = $registro["telefono"];
                        $id = $registro["id"];

                        // links
                        $linkmodificar = "<a href='$paginadestino?id=$id&op=2'>Modificar</a>";
                        $linkeliminar = "<a href='$paginadestino?id=$id&op=3'>Eliminar</a>";
                        
                        echo "<tr>
                                    <td>$id</td>
                                    <td>$n</td>
                                    <td>$e</td>
                                    <td>$d</td>
                                    <td>$l</td>
                                    <td>$p</td>
                                    <td>$t</td>
                                    <td>$linkmodificar</td>
                                    <td>$linkeliminar</td>
                              </tr>";
                  
                  }
                  echo "</table>";
            }
            else
            {
            return false;
            }
      }
}
?>