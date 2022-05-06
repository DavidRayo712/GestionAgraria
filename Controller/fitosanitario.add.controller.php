<?php
    require_once('Model/fitosanitario.model.php');
    require_once('Model/iva.model.php');
    $fitosanitario = new Fitosanitario();
    $iva = new Iva();
    $dataForm = [
        "date" => '',
        "id" => 0,
        "idproveedor" => null,
        "producto" => null,
        "cantidad" => null,
        "precio" => null,
        "iva" => null,
    ];
    if(isset($_GET['action']) && $_GET['action'] == 'register.fitosanitario'){
        $fitosanitario->register(
            $_POST['idfitosanitario'],
            $_POST['Proveedor'],
            $_POST['producto'],
            $_POST['Cantidad'],
            $_POST['Precio'],
            $_POST['date'],
            $_POST['ivatype']
        );
    }
    if(isset($_GET['action']) && $_GET['action'] == 'delete.fitosanitario'){
        $fitosanitario->delete( $_POST['idfitosanitario'] );
    }
    if(isset($_GET['action']) && ($_GET['action'] == 'add.fitosanitario' || $_GET['action'] == 'edit.fitosanitario')){
        $proveedores = $fitosanitario->getProveedores();
        $ivaTypes = $iva->getIvaType();
        $dataForm["date"] = isset($_POST['date']) ? $_POST['date'] : '';
        $dataForm["id"] = isset($_POST['id']) ? $_POST['id'] : '0';
        $dataForm["idproveedor"] = isset($_POST['idproveedor']) ? $_POST['idproveedor'] : '';
        $dataForm["producto"] = isset($_POST['producto']) ? $_POST['producto'] : '';
        $dataForm["cantidad"] = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
        $dataForm["precio"] = isset($_POST['precio']) ? $_POST['precio'] : '';
        $dataForm["iva"] = isset($_POST['iva']) ? $_POST['iva'] : '';
    }
    if(isset($_GET['action']) && $_GET['action'] == 'find.fitosanitario'){
        $gridFitosanitario = $fitosanitario->getGridFitosanitarios( $_POST['from'],  $_POST['to']);
    }
