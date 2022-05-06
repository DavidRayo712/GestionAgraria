<?php
require_once('conexion.php');

class Fitosanitario{
    private $con ;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }
    
    public function getGridFitosanitarios($from, $to){
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to);
        
        $query = $this->con->query('SELECT ab.id, ab.date,pr.id as idproveedor, pr.name as proveedor, ab.producto, ab.cantidad, ab.precio, ab.iva FROM fitosanitarios ab inner join proveedores pr on ab.proveedor = pr.id WHERE ab.date BETWEEN '.
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
    public  function register($id, $Proveedor, $producto, $Cantidad, $Precio, $date, $ivatype ){

        $datetime = new DateTime($date);
        if ($id == 0) {
            $text  = "INSERT INTO fitosanitarios(proveedor, producto, cantidad, precio, iva, date) VALUES (".
            $Proveedor .", ".
            "'". $producto ."', ".
            $Cantidad .", ".
            $Precio .", ".
            $ivatype .", ".
            "'". $datetime->format(DateTime::ATOM) ."')";        
            $query = $this->con->query($text);
        } else {
            $text  = "UPDATE fitosanitarios SET ".
            ' proveedor = '.  $Proveedor.", ".
            " producto = '". $producto ."', ".
            ' cantidad = '.  $Cantidad.", ".
            ' precio = '.  $Precio.", ".
            " date = '". $datetime->format(DateTime::ATOM) ."', ".
            ' iva = '.  $ivatype.
            ' WHERE '.
            'id = '. $id;
            $query = $this->con->query($text);
        }
        
    }
    public  function delete($id){
            $text  = "DELETE FROM fitosanitarios WHERE  id = ". $id;
            $query = $this->con->query($text);
        
    }
}
