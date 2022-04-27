<?php
require_once('conexion.php');

class Fitosanitario{
    private $con ;
    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();

    }
    public function getGridFitosanitario($from, $to){
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to); 
        $query = $this->con->query('SELECT fito.date, pr.name as proveedor, fito.producto, fito.cantidad, fito.precio FROM fitosanitarios fito inner join proveedores pr on fito.proveedor = pr.id WHERE fito.date BETWEEN '.
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
        
        $text  = "INSERT INTO fitosanitarios(proveedor, producto, cantidad, precio, date) VALUES (".
        $Proveedor .", ".
        "'". $producto ."', ".
        $Cantidad .", ".
        $Precio .", ".
        "'". $datetime->format(DateTime::ATOM) ."')";        
        $query = $this->con->query($text);
    }
}

?>