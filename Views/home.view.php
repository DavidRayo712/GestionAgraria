<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de Empresa Agraria</title>
    <script type="text/javascript" src="js/index.js"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- link CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

    <!-- CABECERA -->
    <header>
        <h1>Proyecto de Desarrollo de Aplicaciones Web</h1>
    </header>

    <div>
        <h2 id="titulo-gestion">Gestión de Empresa Agraria</h2>
    </div>

    <!-- BARRA DE NAVEGACION -->
    <nav>
        <div class="navcontainer">
            <div class="logo">
                <a href="index.php"><img src="img/olivo.PNG" alt="logo" id="olivo"></a>
            </div>
            <ul id="nav-menus" class="d-none">
                <li><a href="index.php?action=abono">Abonos</a></li>
                <li><a href="index.php?action=fitosanitario">Fitosanitarios</a></li>
                <li><a href="index.php?action=combustible">Combustible</a></li>
                <li><a href="index.php?action=electricidad">Electricidad</a></li>
                <li><a href="index.php?action=mantenimiento">Mantenimiento</a></li>
                <li><a href="index.php?action=impuestos">Impuestos</a></li>
                <li><a href="index.php" onclick="closeSession()">LogOut</a></li>
            </ul>
            <ul id="nav-sesion" class="d-none">
                <li><a href="index.php?action=viewlogin">Iniciar Sesion</a></li>
                <li><a href="index.php?action=viewregister">Registrar</a></li>
            </ul>
        </div>
    </nav>
    <div id="body-session" class="d-none">
        <?php
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'viewlogin':
                    require_once('Views/login.view.php');
                    break;
                case 'viewregister':
                    require_once('Views/register.view.php');
                    break;
                default:
                    require_once('Views/login.view.php');
                    break;
            }
        } else {
            #página de inicio
            require_once('Views/login.view.php');
        }
        ?>
    </div>

    <div id="body-functions" class="d-none">
        <?php
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                    #vista principales
                case 'abono':
                case 'fitosanitario':
                case 'combustible':
                case 'electricidad':
                case 'mantenimiento':
                case 'impuestos':
                    #agregar gastos
                case 'add.abono':
                case 'add.fitosanitario':
                case 'add.combustible':
                case 'add.electricidad':
                case 'add.mantenimiento':
                    #buscar gastos
                case 'find.abono':
                case 'find.fitosanitario':
                case 'find.combustible':
                case 'find.electricidad':
                case 'find.mantenimiento':
                case 'find.impuestos':
                    require_once("Views/" . $_GET['action'] . ".view.php");
                    break;
                    #editar gastos
                case 'edit.abono':
                case 'edit.fitosanitario':
                case 'edit.combustible':
                case 'edit.electricidad':
                case 'edit.mantenimiento':
                    require_once("Views/add." . str_replace('edit.', "", $_GET['action']) . ".view.php");
                    #borrar gastos
                case 'delete.abono':
                case 'delete.fitosanitario':
                case 'delete.combustible':
                case 'delete.electricidad':
                case 'delete.mantenimiento':
                    require_once('Controller/abono.add.controller.php');
                    require_once('Controller/fitosanitario.add.controller.php');
                    require_once('Controller/combustible.add.controller.php');
                    require_once('Controller/electricidad.add.controller.php');
                    require_once('Controller/mantenimiento.add.controller.php');
                    require_once('Views/selection.view.php');
                    break;
                case 'register.abono':
                case 'register.combustible':
                case 'register.fitosanitario':
                case 'register.electricidad':
                case 'register.mantenimiento':
                case 'register.iva':
                case 'add.proveedor':
                    require_once('Controller/abono.add.controller.php');
                    require_once('Controller/fitosanitario.add.controller.php');
                    require_once('Controller/combustible.add.controller.php');
                    require_once('Controller/electricidad.add.controller.php');
                    require_once('Controller/mantenimiento.add.controller.php');
                    require_once('Controller/proveedor.controller.php');
                    require_once('Controller/iva.controller.php');

                    require_once('Views/selection.view.php');
                    break;
                case 'iva':
                    require_once("Views/iva.view.php");
                    break;
                case 'edit.iva':
                    require_once("Views/add.iva.view.php");
                    break;
                case 'proveedor':
                    require_once("Views/proveedor.view.php");
                    break;
                default:
                    require_once('Views/selection.view.php');
                    break;
            }
        } else {
            #página de inicio
            require_once('Views/selection.view.php');
        }

        ?>
    </div>

    <footer>
        <img src="img/aceituna.png" alt="logo" id="aceituna">
        <p>David Torres&copy;2022</p>
    </footer>
    <?php
    echo ("<script>" .
        "window.onload = function(){" .
        "validSession();" .
        "validTypeUser();" .
        "}" .
        "</script>"
    );
    ?>
</body>

</html>