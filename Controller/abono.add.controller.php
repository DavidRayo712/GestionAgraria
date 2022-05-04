<?php
    require_once('Model/abono.model.php');
    $abono = new Abono();
    if(isset($_GET['action']) && $_GET['action'] == 'register.abono'){
        $abono->register(
            $_POST['Proveedor'],
            $_POST['producto'],
            $_POST['Cantidad'],
            $_POST['Precio'],
            $_POST['date']
        );
    }
    if(isset($_GET['action']) && $_GET['action'] == 'add.abono'){
        $proveedores = $abono->getProveedores();
    }
    if(isset($_POST['from'])){
        $gridAbono = $abono->getGridAbono( $_POST['from'],  $_POST['to']);
    }
?>