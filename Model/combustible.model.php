<?php
require_once('conexion.php');

class Combustible{
    private $con ;
    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }

    public function getGridCombustible($from, $to){
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to);
        
        $query = $this->con->query('SELECT combustibles.date, pr.name as proveedor, combustibles.producto, combustibles.cantidad, combustibles.precio, combustibles.cantidad * combustibles.precio as importe FROM combustibles inner join proveedores pr on combustibles.proveedor = pr.id WHERE combustibles.date BETWEEN '.
        "'". $fromDate->format(DateTime::ATOM)."' AND ".
        "'". $toDate->format(DateTime::ATOM)."'");
        $retorno = [];
        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }

    public function getProveedores(){
        $query = $this->con->query('SELECT id, name FROM proveedores');
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
        
        $text  = "INSERT INTO combustibles(proveedor, producto, cantidad, precio, date) VALUES (".
        $Proveedor .", ".
        "'". $producto ."', ".
        $Cantidad .", ".
        $Precio .", ".
        "'". $datetime->format(DateTime::ATOM) ."')";        
        $query = $this->con->query($text);
    }
}

?>