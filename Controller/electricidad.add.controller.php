<?php
    require_once('Model/electricidad.model.php');
    require_once('Model/iva.model.php');
    $electricidad = new Electricidad();
    $iva = new Iva();
    $dataForm = [
        "date" => '',
        "id" => 0,
        "idproveedor" => null,
        "contador" => null,
        "precio" => null,
        "iva" => null,
    ];
    if(isset($_GET['action']) && $_GET['action'] == 'register.electricidad'){
        $electricidad->register(
            $_POST['idelectricidad'],
            $_POST['Proveedor'],
            $_POST['contador'],
            $_POST['Precio'],
            $_POST['date'],
            $_POST['ivatype']
        );
    }
    if(isset($_GET['action']) && $_GET['action'] == 'delete.electricidad'){
        $electricidad->delete( $_POST['idelectricidad'] );
    }
    if(isset($_GET['action']) && ($_GET['action'] == 'add.electricidad' || $_GET['action'] == 'edit.electricidad')){
        $proveedores = $electricidad->getProveedores();
        $contadores = $electricidad->getContador();
        $ivaTypes = $iva->getIvaType();
        $dataForm["date"] = isset($_POST['date']) ? $_POST['date'] : '';
        $dataForm["id"] = isset($_POST['id']) ? $_POST['id'] : '0';
        $dataForm["idproveedor"] = isset($_POST['idproveedor']) ? $_POST['idproveedor'] : '';
        $dataForm["contador"] = isset($_POST['contador']) ? $_POST['contador'] : '';
        $dataForm["precio"] = isset($_POST['precio']) ? $_POST['precio'] : '';
        $dataForm["iva"] = isset($_POST['iva']) ? $_POST['iva'] : '';
    }
    if(isset($_GET['action']) && $_GET['action'] == 'find.electricidad'){
        $gridElectricidad = $electricidad->getGriElectricidad( $_POST['from'],  $_POST['to']);
    }
