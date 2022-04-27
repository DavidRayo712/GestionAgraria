<?php
require_once('conexion.php');

class Abono{
    private $con ;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }
    
    public function getGridAbono($from, $to){
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to);
        
        $query = $this->con->query('SELECT ab.date, pr.name as proveedor, ab.producto, ab.cantidad, ab.precio FROM abonos ab inner join proveedores pr on ab.proveedor = pr.id WHERE ab.date BETWEEN '.
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