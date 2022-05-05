<?php
    require_once('Model/abono.model.php');
    require_once('Model/iva.model.php');
    $abono = new Abono();
    $iva = new Iva();
    if(isset($_GET['action']) && $_GET['action'] == 'register.abono'){
        $abono->register(
            $_POST['Proveedor'],
            $_POST['producto'],
            $_POST['Cantidad'],
            $_POST['Precio'],
            $_POST['date'],
            $_POST['ivatype'],
        );
    }
    if(isset($_GET['action']) && $_GET['action'] == 'add.abono'){
        $proveedores = $abono->getProveedores();
        $ivaTypes = $iva->getIvaType();
    }
    if(isset($_GET['action']) && $_GET['action'] == 'find.abono'){
        $gridAbono = $abono->getGridAbono( $_POST['from'],  $_POST['to']);
    }
?>