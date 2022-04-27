<?php

class Conexion{

    private $con;

    public function __construct()
    {
        $this->con = new mysqli('localhost', 'libreria', '123456', 'abono',3306);
    }

    public function get_con(){
        return $this->con;
    }
}

?>