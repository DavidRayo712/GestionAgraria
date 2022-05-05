<?php
require_once('conexion.php');

class Iva{
    private $con ;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }
    
    public function getIvaType(){
        $query = $this->con->query('SELECT id, value, name FROM iva ');
        $retorno = [];
        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }
    public  function register($Proveedor, $producto, $Cantidad, $Precio, $date ){
        $datetime = new DateTime($date);
        
        $text  = "INSERT INTO abonos(proveedor, producto, cantidad, precio, date) VALUES (".
        $Proveedor .", ".
        "'". $producto ."', ".
        $Cantidad .", ".
        $Precio .", ".
        "'". $datetime->format(DateTime::ATOM) ."')";        
        $query = $this->con->query($text);
    }
}

?>