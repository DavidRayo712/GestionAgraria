<?php
    require_once('Model/iva.model.php');
    $iva = new Iva();
    $dataForm = [
        "id" => 0,
        "value" => null,
        "name" => null
    ];
    if(isset($_GET['action']) && $_GET['action'] == 'register.iva'){
        $iva->register(
            $_POST['idiva'],
            $_POST['value'],
            $_POST['name']
        );
    }
    if(isset($_GET['action']) && ($_GET['action'] == 'add.iva' || $_GET['action'] == 'edit.iva')){
        $dataForm["id"] = isset($_POST['id']) ? $_POST['id'] : '0';
        $dataForm["value"] = isset($_POST['value']) ? $_POST['value'] : '';
        $dataForm["name"] = isset($_POST['name']) ? $_POST['name'] : '';
    }
    if(isset($_GET['action']) && $_GET['action'] == 'iva'){
        $gridIva = $iva->getIvaType();
    }
