<?php
require_once('conexion.php');

class Impuestos
{
    private $con;

    public function __construct()
    {
        $conAux = new Conexion();
        $this->con = $conAux->get_con();
    }

    public function getGriImpuestos($from, $to)
    {
        $fromDate = new DateTime($from);
        $toDate = new DateTime($to);
        $query = $this->con->query("CALL getimpuestos('" . $fromDate->format(DateTime::ATOM) . "', '" . $toDate->format(DateTime::ATOM) . "')");

        $retorno = [];
        $i = 0;
        while ($fila = $query->fetch_assoc()) {
                $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }
}
