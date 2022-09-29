<?php
//error_reporting(0); es para que no se muestre los mensajes de error de php. INVERSTIGAR.
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
    <script type="text/javascript" src='../js/bootstrap.min.js'></script>    <!--estilos-->
    <link rel="stylesheet" type="text/css" href='../css/bootstrap.min.css'>    <!--estilos-->
    <script type="text/javascript" src='../js/all.min.js'></script>    <!--colocar iconos ya defininos-->
    <title>OrdenesTrabajo.lista.views</title>
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
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../views/Tecnico.OrdenTrabajo.lista.views.php">Ordenes de trabajo</a></li>
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../views/Tecnico.Equipos.lista.views.php">Equipos de computo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--<h1>LISTA DE ORDENES DE TRABAJO</h1>
    <input type="text" name="caja_busquedaTecnico" id="caja_busquedaTecnico" size="15" maxlength="15">
    <input type="submit" value="BUSCAR">
    
    <a href="../views/Tecnico.principal.php">VOLVER</a>-->
    
    <div class="container mt-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white">
        <h3 class="mt-4" style="color: rgb(0, 119, 255); font-weight: bold;">ORDENES DE TRABAJO:</h3>
        <div class="form-row">
        <label class="col-form-label ml-2" for="caja_busquedaTecnico" style="font-size: 20px; font-weight: bold;;">BUSCAR:</label>
            <div class="form-group ml-3"><!--es necesario para usar el "size" en el input-->
                <input type="text" name="caja_busquedaTecnico" id="caja_busquedaTecnico" size="20" maxlength="15" class="form-control">
            </div>
        </div>
        
        <div class="container">
            <div id="datosTecnico">
                <!--TABLA: aqui aparecera la tabla, enviada desde el main.js-->
                <!--CONTENIDO DE LA TABLA-->
            </div>
        </div>
        <a class="btn btn-warning mb-4" style="font-weight: bold;" href="../views/Tecnico.principal.php">VOLVER</a>
    </div>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>