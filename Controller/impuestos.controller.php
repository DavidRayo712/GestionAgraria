<?php
    require_once('Model/impuestos.model.php');
    $impuestos = new Impuestos();

    if(isset($_GET['action']) && $_GET['action'] == 'find.impuestos'){
        $gridImpuestos = $impuestos->getGriImpuestos( $_POST['from'],  $_POST['to']);
    }
