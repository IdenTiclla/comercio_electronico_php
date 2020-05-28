<?php
class Producto
{
    private $id;
    private $nombre;
    private $precio;
    private $cantidad;

    private $cnx;

    function inicializar($id,$nombre,$precio,$cantidad)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->cantidad = $cantidad;
    }
    function __construct($cnx)
    {
        $this->id = 0;
        $this->nombre = "";
        $this->precio = 0;
        $this->cantidad = 0;
        $this->cnx = $cnx;
    }
    function set_id($id)
    {
        $this->id = $id;
    }
    function get_id()
    {
        return $this->id;
    }
    function set_nombre($nombre)
    {
        $this->nombre = $nombre;
    }
    function get_nombre()
    {
        return $this->nombre;
    }
    function set_precio($precio)
    {
        $this->precio = $precio;
    }
    function get_precio()
    {
        return $this->precio;
    }
    function set_cantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }
    function get_cantidad()
    {
        return $this->cantidad;
    }
    
    function guardar()
    {     
        $n = $this->nombre;
        $p = $this->precio;
        $c = $this->cantidad;
        $sql = "insert into productos values(null,'$n',$p,$c)";
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
    function modificar()
    {     
        $n = $this->nombre;
        $p = $this->precio;
        $c = $this->cantidad;
        $id = $this->id;

        $sql = "update productos set nombre = '$n', precio = $p,cantidad = $c where id = $id";
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
    function eliminar()
    {     
        $id = $this->id;
        $sql = "delete from productos where id = $id";
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
    function buscar($criterionombre)
    {     
        //$id = $this->id;
        $sql = "select * from productos where nombre like '%$criterionombre%' ";
        $resultado = $this->cnx->execute($sql);    
        if(isset($resultado)&&$this->cnx->filas_afectadas()>0)
        {  
           return $resultado;
        }
        else
        {
           return false;
        }
    }
    function traerporid($id)
    {     
        //$id = $this->id;
        $sql = "select * from productos where id = $id";
        $resultado = $this->cnx->execute($sql);    
        if(isset($resultado)&&$this->cnx->filas_afectadas()>0)
        {  
           $registro = $this->cnx->next($resultado);
           $this->id = $id;
           $this->nombre = $registro["nombre"];
           $this->precio = $registro["precio"];
           $this->cantidad = $registro["cantidad"];
           return true;
        }
        else
        {
           return false;
        }
    }

    function buscarabm($criterionombre,$paginadestino)
    {     
        //$id = $this->id;
        $sql = "select * from productos where nombre like '%$criterionombre%' ";
        $resultado = $this->cnx->execute($sql);    
        if(isset($resultado)&&$this->cnx->filas_afectadas()>0)
        {  
            echo "<table border='1'>";
            echo "<tr><th>Id.</th><th>Nombre</th><th>Precio bs.</th><th>Cantidad</th><th>Mod.</th><th>Elim.</th>";
            while($registro = $this->cnx->next($resultado))
            {
                $id = $registro["id"];
                $n = $registro["nombre"];
                $p = $registro["precio"];
                $c = $registro["cantidad"];
                $linkmodificar = "<a href='$paginadestino?id=$id&op=2'>Modificar</a>";
                $linkeliminar = "<a href='$paginadestino?id=$id&op=3'>Eliminar</a>";
                
                echo "<tr><td>$id</td><td>$n</td><td>$p</td><td>$c</td><td>$linkmodificar</th><th>$linkeliminar</th>";
                
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