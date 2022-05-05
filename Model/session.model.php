<?php
require_once('conexion.php');

class Session{
    private $con ;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }
    public function login($email, $password){
        $text  = "SELECT id, email, name, lastname, type FROM user WHERE ".
        "email = '".$email ."' ".
        "and password = '". $password ."'";  
        $query = $this->con->query($text);
        $retorno = [];
        $i = 0;
        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }
    public  function register($email, $name, $lastname, $password ){
        $text  = "INSERT INTO user(email, name, lastname, password, type) VALUES (".
        "'".$email ."', ".
        "'". $name ."', ".
        "'". $lastname ."', ".       
        "'". $password ."', ".       
        "0)";        
        $query = $this->con->query($text);
    }
}

?>