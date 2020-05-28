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
    function obtener_datos()
    {
        return $this->id . " " . $this->nombre . " ".$this->precio . " ". $this->cantidad;
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
}
?>