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
    <script type="text/javascript" src='../js/bootstrap.min.js'></script><!--estilos-->
    <link rel="stylesheet" type="text/css" href='../css/bootstrap.min.css'><!--estilos-->
    <script type="text/javascript" src='../js/all.min.js'></script><!--colocar iconos ya defininos-->
    <title>OrdenesTrabajo.lista.views</title>
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

    <!--<h1>LISTA DE ORDENES DE TRABAJO</h1>
    <form action="">
        <input type="text" name="caja_busqueda" id="caja_busqueda" size="15" maxlength="15">
        <input type="submit" value="BUSCAR">
    </form>
    <a href="OrdenTrabajo.registro.views">NUEVO</a>-->

    <!--  1300px; margin: auto; margin-top: 30px;-->
    <div class="container mt-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white">
        <h3 class="mt-4" style="color: orangered; font-weight: bold;">ORDENES DE TRABAJO:</h3>
        <div class="form-row">
        <label class="col-form-label ml-2" for="caja_busqueda" style="font-size: 20px; font-weight: bold;;">BUSCAR:</label>
            <div class="form-group ml-3"><!--es necesario para usar el "size" en el input-->
                <input type="text" name="caja_busqueda" id="caja_busqueda" size="20" maxlength="15" class="form-control">
            </div>
            <a class="btn btn-warning ml-3" style="font-weight: bold; height: 40px" href="OrdenTrabajo.registro.views.php">NUEVO</a>
        </div>
        
        <div class="container">
             <div id="datos">
                <!--TABLA: aqui aparecera la tabla, enviada desde el main.js-->
                <!--CONTENIDO DE LA TABLA-->
            </div>
        </div>
        <a class="btn btn-warning mb-4" style="font-weight: bold;" href="../views/Recepcion.principal.php">VOLVER</a>
    </div>
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>