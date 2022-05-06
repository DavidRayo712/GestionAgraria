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
    public  function register($id, $value, $name ){
        if ($id == 0) {
            $text  = "INSERT INTO iva(value, name) VALUES (".
            $value .", ".
            "'".$name ."') ";        
            $query = $this->con->query($text);
        } else {
            $text  = "UPDATE iva SET ".
            " value = ". $value .", ".
            " name = '". $name ."'".
            ' WHERE '.
            'id = '. $id;
            $query = $this->con->query($text);
        }
    }
}

?>