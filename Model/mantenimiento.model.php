<?php
require_once('conexion.php');

class Mantenimiento{
    private $con ;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }
    
    public function getGriMantenimiento($from, $to){
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to);
        
        $query = $this->con->query('SELECT ab.id, ab.date,pr.id as idproveedor, pr.name as proveedor, ab.concepto, ab.precio, ab.iva FROM mantenimiento ab inner join proveedores pr on ab.proveedor = pr.id  WHERE ab.date BETWEEN '.
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
        require_once('Model/proveedor.model.php');
        $proveedor = new Proveedor();
        return $proveedor->getProveedores();
    }
    public  function register($id, $Proveedor, $concepto, $Precio, $date, $ivatype ){

        $datetime = new DateTime($date);
        if ($id == 0) {
            $text  = "INSERT INTO mantenimiento(proveedor, concepto, precio, iva, date) VALUES (".
            $Proveedor .", ".
            "'". $concepto ."', ".
            $Precio .", ".
            $ivatype .", ".
            "'". $datetime->format(DateTime::ATOM) ."')";        
            $query = $this->con->query($text);
        } else {
            $text  = "UPDATE mantenimiento SET ".
            ' proveedor = '.  $Proveedor.", ".
            " concepto = '". $concepto ."', ".
            ' precio = '.  $Precio.", ".
            " date = '". $datetime->format(DateTime::ATOM) ."', ".
            ' iva = '.  $ivatype.
            ' WHERE '.
            'id = '. $id;
            $query = $this->con->query($text);
        }
        
    }
    public  function delete($id){
            $text  = "DELETE FROM mantenimiento WHERE  id = ". $id;
            $query = $this->con->query($text);
        
    }
}
