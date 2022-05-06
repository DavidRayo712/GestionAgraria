<?php
require_once('conexion.php');

class Electricidad{
    private $con ;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }
    
    public function getGriElectricidad($from, $to){
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to);
        
        $query = $this->con->query('SELECT ab.id, ab.date,pr.id as idproveedor, pr.name as proveedor, ab.contador, con.name as contadorname, ab.precio, ab.iva FROM electricidad ab inner join proveedores pr on ab.proveedor = pr.id INNER JOIN contador con on ab.contador = con.id WHERE ab.date BETWEEN '.
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
    public function getContador(){
        $query = $this->con->query('SELECT id, name FROM contador');
        $retorno = [];
        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }
    public  function register($id, $Proveedor, $contador, $Precio, $date, $ivatype ){

        $datetime = new DateTime($date);
        if ($id == 0) {
            $text  = "INSERT INTO electricidad(proveedor, contador, precio, iva, date) VALUES (".
            $Proveedor .", ".
            "'". $contador ."', ".
            $Precio .", ".
            $ivatype .", ".
            "'". $datetime->format(DateTime::ATOM) ."')";        
            $query = $this->con->query($text);
        } else {
            $text  = "UPDATE electricidad SET ".
            ' proveedor = '.  $Proveedor.", ".
            " contador = '". $contador ."', ".
            ' precio = '.  $Precio.", ".
            " date = '". $datetime->format(DateTime::ATOM) ."', ".
            ' iva = '.  $ivatype.
            ' WHERE '.
            'id = '. $id;
            $query = $this->con->query($text);
        }
        
    }
    public  function delete($id){//revisar
            $text  = "DELETE FROM electricidad WHERE  id = ". $id;
            $query = $this->con->query($text);
        
    }
}
