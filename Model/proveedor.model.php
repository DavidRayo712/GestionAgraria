<?php
require_once('conexion.php');

class Proveedor{
    private $con ;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
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
    public  function register($name ){
            $text  = "INSERT INTO proveedores(name) VALUES (".
            "'". $name ."') " ;        
            $query = $this->con->query($text);
    }
}
