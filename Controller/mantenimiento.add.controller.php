<?php
    require_once('Model/mantenimiento.model.php');
    require_once('Model/iva.model.php');
    $mantenimiento = new Mantenimiento();
    $iva = new Iva();
    $dataForm = [
        "date" => '',
        "id" => 0,
        "idproveedor" => null,
        "concepto" => null,
        "precio" => null,
        "iva" => null,
    ];
    if(isset($_GET['action']) && $_GET['action'] == 'register.mantenimiento'){
        $mantenimiento->register(
            $_POST['idmantenimiento'],
            $_POST['Proveedor'],
            $_POST['concepto'],
            $_POST['Precio'],
            $_POST['date'],
            $_POST['ivatype']
        );
    }
    if(isset($_GET['action']) && $_GET['action'] == 'delete.mantenimiento'){
        $mantenimiento->delete( $_POST['idmantenimiento'] );
    }
    if(isset($_GET['action']) && ($_GET['action'] == 'add.mantenimiento' || $_GET['action'] == 'edit.mantenimiento')){
        $proveedores = $mantenimiento->getProveedores();
        $ivaTypes = $iva->getIvaType();
        $dataForm["date"] = isset($_POST['date']) ? $_POST['date'] : '';
        $dataForm["id"] = isset($_POST['id']) ? $_POST['id'] : '0';
        $dataForm["idproveedor"] = isset($_POST['idproveedor']) ? $_POST['idproveedor'] : '';
        $dataForm["concepto"] = isset($_POST['concepto']) ? $_POST['concepto'] : '';
        $dataForm["precio"] = isset($_POST['precio']) ? $_POST['precio'] : '';
        $dataForm["iva"] = isset($_POST['iva']) ? $_POST['iva'] : '';
    }
    if(isset($_GET['action']) && $_GET['action'] == 'find.mantenimiento'){
        $gridMantenimiento = $mantenimiento->getGriMantenimiento( $_POST['from'],  $_POST['to']);
    }
