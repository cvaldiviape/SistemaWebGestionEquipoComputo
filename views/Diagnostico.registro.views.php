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
    <script type="text/javascript" src='../js/bootstrap.min.js'></script>
    <!--estilos-->
    <link rel="stylesheet" type="text/css" href='../css/bootstrap.min.css'>
    <!--estilos-->
    <script type="text/javascript" src='../js/all.min.js'></script>
    <!--colocar iconos ya defininos-->
    <title>Diagnostico.registro.views</title>
</head>

<body style="background: url(../img/disco6.gif);">
    <nav class="navbar navbar-expand-md navbar-dark" style="background: rgb(0, 119, 255);">
        <div class="container">
            <a href="#" class="navbar-brand" style="font-weight: bold; color: white">
                SISTEMA WEB CEC
            </a>
            <div class="navbar-collapse">
                <ul class="navbar-nav ">
                    <li class="nav-item"> <a class="nav-link" style="font-weight: bold; color: white" href="../library/cierra_sesion.php">Cerrar Sesion</a></li>
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../views/Tecnico.OrdenTrabajo.lista.views">Ordenes de trabajo</a></li>
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../views/Tecnico.Equipos.lista.views">Equipos de computo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--<h1>REGISTRO DE DIAGNOSTICO:</h1>
    <form action="../controllers/Diagnostico.controlador.php?orden=registrar_diagnostico" method="POST">-->
        <?php $id_equipo = $_GET['id'] ?>
        <!--proviene de "Tecnico.Equipos.lista.views"-->
        <!--<input type="hidden" name="id_equipo" value="<?= $id_equipo ?>">
        <textarea name="diagnostico" cols="100" rows="5"></textarea>
        <br>
        <input type="submit" value="Registrar">
    </form>
    <br>
    <br>
    <a href="../views/Tecnico.Equipos.lista.views.php">VOLVER</a>-->


    <div class="container mb-4 mt-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white;">
        <h3 class="mt-4" style="color: rgb(255, 0, 0); font-weight: bold;">REGISTRO DE DIAGNOSTICO:</h3>
        <form action="../controllers/Diagnostico.controlador.php?orden=registrar_diagnostico" method="POST">
            <?php $id_equipo = $_GET['id'] ?>
            <input type="hidden" name="id_equipo" value="<?= $id_equipo ?>">
            <div class="form-row">
                <div class="form-group">
                    <textarea class="form-control" name="diagnostico" cols="100" rows="5"></textarea>
                </div>
            </div>
            <div class="form-row mt-3 mb-5">
                <a class="btn btn-dark mb-4" style="font-size: 20px; font-weight: bold;" href="Tecnico.Equipos.lista.views.php">VOLVER</a>
                <input class="btn btn-warning m-auto" style="font-size: 20px; font-weight: bold;" type="submit" value="REGISTRAR">
            </div>
        </form>
    </div>

</body>
</html>