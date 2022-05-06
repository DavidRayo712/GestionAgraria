<?php
require_once('Model/proveedor.model.php');
$proveedor = new Proveedor();
if (isset($_GET['action']) && $_GET['action'] == 'add.proveedor') {
    $proveedor->register($_POST['name']);
}
