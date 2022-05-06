<?php
require_once('conexion.php');

class Impuestos{
    private $con ;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }
    
    public function getGriImpuestos($from, $to){
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to);
        
        $query = $this->con->query('SELECT ab.id, ab.date,pr.id as porcentaje, pr.name as proveedor, ab.producto, pro.name as productname, ab.cantidad, ab.precio, ab.iva FROM combustibles ab inner join proveedores pr on ab.proveedor = pr.id INNER JOIN productos pro on ab.producto = pro.id WHERE ab.date BETWEEN '.
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
}
