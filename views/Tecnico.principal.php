<?php
session_start();
if (!isset($_SESSION['sesion_id_em']) && !isset($_SESSION['sesion_id_us'])) {
    header('Location: ../views/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src='../js/bootstrap.min.js'></script><!--estilos-->
    <link rel="stylesheet" type="text/css" href='../css/bootstrap.min.css'><!--estilos-->
    <script type="text/javascript" src='../js/all.min.js'></script><!--colocar iconos ya defininos-->
    <title>Panel Tecnico</title>
</head>

<body style="background: url(../img/disco6.gif);">
    <!--<h1>Tecnico PANEL PRINCIPAL</h1>
    <a class="nav-link" style="font-weight: bold; color: white" href="../library/cierra_sesion.php">Cerrar Sesion</a>
    <a class="nav-link" style="font-weight: bold; color: white" href="../views/Tecnico.OrdenTrabajo.lista.views">Ordenes de trabajo</a>
    <a class="nav-link" style="font-weight: bold; color: white" href="../views/Tecnico.Equipos.lista.views">Equipos de computo</a>
    <p>Bienvenido <?= $_SESSION['sesion_nombre']; ?></p>-->
    <nav class="navbar navbar-expand-md navbar-dark" style="background: rgb(0, 119, 255);">
        <div class="container">
            <a href="#" class="navbar-brand" style="font-weight: bold; color: white">
                SISTEMA WEB CEC
            </a>
            <div class="navbar-collapse">
                <ul class="navbar-nav ">
                    <li class="nav-item"> <a class="nav-link" style="font-weight: bold; color: white" href="../library/cierra_sesion.php">Cerrar Sesion</a></li>
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../views/Tecnico.OrdenTrabajo.lista.views.php">Ordenes de trabajo</a></li>
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../views/Tecnico.Equipos.lista.views.php">Equipos de computo</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="background: white; border-radius: 20px;"> 
        <h3 class="ml-2 mt-4 pt-4" style="color: rgb(2, 120, 255); font-weight: bold;">BIENVENIDO AL SISTEMA WEB:</h3>
        <h3 class="ml-2 pb-4" style="color:rgb(255, 0, 0); font-weight: bold; padding-left: 200px;"><?= $_SESSION['sesion_nombre']; ?></h3>
    </div>

</body>

</html>