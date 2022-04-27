<?php
require_once('conexion.php');

class Electricidad{
    private $con ;
    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }
    
    public function getGridElectricidad($from, $to){
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to);
        
        $query = $this->con->query('SELECT elect.date, pr.name as proveedor, elect.lugar, elect.precio FROM electricidad elect inner join proveedores pr on elect.proveedor = pr.id WHERE elect.date BETWEEN '.
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
    public function register($Proveedor, $lugar, $Precio, $date ){
        $datetime = new DateTime($date);
        
        $text  = "INSERT INTO electricidad(proveedor, lugar, precio, date) VALUES (".
        $Proveedor .", ".
        "'". $lugar .", ".
        $Precio .", ".
        "'". $datetime->format(DateTime::ATOM) ."')";        
        $query = $this->con->query($text);
    }
}

?>