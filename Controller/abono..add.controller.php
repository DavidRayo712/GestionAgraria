<?php
    require_once('Model/abono.model.php');
    $abono = new Abono();
    if(isset($_POST['producto'])){
        $abono->register(
            $_POST['Proveedor'],
            $_POST['producto'],
            $_POST['Cantidad'],
            $_POST['Precio'],
            $_POST['date']
        );
    }
    if(isset($_GET['add'])){
        $proveedores = $abono->getProveedores();
    }
    if(isset($_POST['from'])){
        $gridAbono = $abono->getGridAbono( $_POST['from'],  $_POST['to']);
    }
?>