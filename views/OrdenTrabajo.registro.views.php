<?php
error_reporting(0);
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
    <title>OrdenesTrabajo.registro.views</title>
</head>

<body style="background: url(../img/disco7.gif);">
    <nav class="navbar navbar-expand-md navbar-dark" style="background: orangered;">
        <div class="container">
            <a href="#" class="navbar-brand" style="font-weight: bold; color: white">
                SISTEMA WEB CEC
            </a>
            <div class="navbar-collapse">
                <ul class="navbar-nav ">
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../library/cierra_sesion.php">Cerrar Sesion</a></li>
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../views/OrdenTrabajo.lista.views">Ordenes de trabajo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--<p>NUEVA ORDEN DE TRABAJO</p>
    <form action="../controllers/OrdenTrabajo.controlador.php?orden=registrar_orden" method="POST">
        <p>DATOS DE CLIENTE:</p>
        <label for="nombre">Nombre:</label>
        <input type="text" size="15" maxlength="15" name="nombre">
        <label for="apellido">Apellido:</label>
        <input type="text" size="15" maxlength="15" name="apellido">
        <label for="celular">Celular:</label>
        <input type="text" size="9" maxlength="9" name="celular">
        <p>SELECIONAR TECNICO:</p>
        <select name="id_tecnico">
            <option value="2">CRISTINA</option>
            <option value="3">JESSICA</option>
            <option value="4">PAMELA</option>
            <option value="5">ALONDRA</option>
        </select>
        <br><br>
        <input type="submit" value="REGISTRAR ORDEN">
    </form>
    <br>
    <a href="OrdenTrabajo.lista.views">VOLVER</a>-->

    <div class="container mt-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white;">
        <h3 class="mt-4" style="color: orangered; font-weight: bold;">NUEVA ORDEN DE TRABAJO:</h3>
        <form action="../controllers/OrdenTrabajo.controlador.php?orden=registrar_orden" method="POST" class="mt-2">
            <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">Datos del cliente:</p>
            <div class="form-row">
                <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Nombre:</label>
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" name="nombre" placeholder="Ingrese nombre" maxlength="15">
                </div>
                <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="apellido">Apellido:</label>
                <div>
                    <input type="text" class="form-control" id="apep" name="apellido" placeholder="Ingrese apellido" size="25" maxlength="15">
                </div>
                <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="celular">Celular:</label>
                <div>
                    <input type="text" class="form-control" id="apem" name="celular" placeholder="Ingrese celular" size="25" maxlength="9">
                </div>
            </div>
            <div class="form-row">
                <label class="col-form-label" for="id_tecnico" style="font-size: 20px; font-weight: bold;">Tecnico:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="id_tecnico" id="id_tecnico">
                            <option value="2">CRISTINA</option>
                            <option value="3">JESSICA</option>
                            <option value="4">PAMELA</option>
                            <option value="5">ALONDRA</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row mt-3 mb-5">
                <a class="btn btn-dark mb-4" style="font-size: 20px; font-weight: bold;" href="OrdenTrabajo.lista.views.php">VOLVER</a>
                <input class="btn btn-warning m-auto" style="font-size: 20px; font-weight: bold;" type="submit" value="REGISTRAR">
            </div>
        </form>
    </div>
</body>
</html>