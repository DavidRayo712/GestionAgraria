<?php
    require_once('../Model/session.model.php');
    $session = new Session();
    if(isset($_GET['action'])){
        if(isset($_GET['action']) && $_GET['action'] == 'register'){
            $session->register(
                $_POST['email'],
                $_POST['name'],
                $_POST['lastname'],
                $_POST['password']
            );
            echo ("<script> window.location.replace('../index.php')</script>");
        }
        if(isset($_GET['action']) && $_GET['action'] == 'login'){
            $data = $session->login(
                $_POST['email'],
                $_POST['password']
            );
            if(count($data) > 0){
                echo ("<script> localStorage.setItem('typeUsert', ".$data[0]['type'].") </script>");
                echo ("<script> localStorage.setItem('idUsert', ".$data[0]['id'].") </script>");
            }
            echo ("<script> window.location.replace('../index.php')</script>");
        }
    }
    // if(isset($_GET['action']) && $_GET['action'] == 'add.abono'){
    //     $proveedores = $abono->getProveedores();
    // }
    // if(isset($_GET['action']) && $_GET['action'] == 'find.abono'){
    //     $gridAbono = $abono->getGridAbono( $_POST['from'],  $_POST['to']);
    // }
?>