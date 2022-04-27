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
            <ul>
                <li><a href="index.php?action=abono">Abonos</a></li>
                <li><a href="index.php?action=fitosanitario">Fitosanitarios</a></li>
                <li><a href="index.php?action=combustible">Combustible</a></li>
                <li><a href="index.php?action=electricidad">Electricidad</a></li>
                <li><a href="index.php?action=mantenimiento">Mantenimiento</a></li>
                <li><a href="index.php?action=impuestos">Impuestos</a></li>
            </ul>
        </div>
    </nav>

    <?php
    if (isset($_GET['action'])) {
        if (#vista principales
            ($_GET['action'] == "abono") ||
            ($_GET['action'] == "fitosanitario") ||
            ($_GET['action'] == "combustible") ||
            ($_GET['action'] == "electricidad") ||
            ($_GET['action'] == "mantenimiento") ||
            ($_GET['action'] == "impuestos") ||
            #agregar gastos
            ($_GET['action'] == "add.abono") ||
            ($_GET['action'] == "add.fitosanitario") ||
            ($_GET['action'] == "add.combustible") ||
            ($_GET['action'] == "add.electricidad") ||
            ($_GET['action'] == "add.mantenimiento") ||
            #buscar gastos
            ($_GET['action'] == "find.abono") ||
            ($_GET['action'] == "find.fitosanitario") ||
            ($_GET['action'] == "find.combustible") ||
            ($_GET['action'] == "find.electricidad") ||
            ($_GET['action'] == "find.mantenimiento")
        ) {
            #página de inicio
            require_once("Views/".$_GET['action'].".view.php");
        } else {
            #página de inicio
            require_once('Views/selection.view.php');
        }
    } else {
         #página de inicio
        require_once('Views/selection.view.php');
    }

    ?>

    <footer>
        <img src="img/aceituna.png" alt="logo" id="aceituna">
        <p>David Torres&copy;2022</p>
    </footer>
</body>

</html>