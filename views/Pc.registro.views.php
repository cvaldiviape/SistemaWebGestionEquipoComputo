<?php
session_start();
if (!isset($_SESSION['sesion_id_em']) && !isset($_SESSION['sesion_id_us'])) {
    header('Location: ../views/login.php');
}

$id_orden_trabajo = $_GET['id_orden_trabajo']; //lo que envie desde "OrdenTrabajo.lista.views.php" lo guardo en $x.
//para colocarlo posteriormente en un "hidden" es decir escondido, ya que 
//ese id lo usare para registrar la Pc.
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
    <title>Pc.registro.views</title>
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


    <!--<h1>REGISTRO DE PC:</h1>
    <form action="../controllers/Pc.controlador.php?orden=registrar_pc" method="POST">
        <input type="hidden" name="id_orden_trabajo" value="<?= $id_orden_trabajo; ?>">
        <label for="">Case:</label>
        <select name="c_marca" id="">
            <option value="1">ANTRYX</option>
            <option value="2">GAMBYTE</option>
            <option value="3">HALION</option>
            <option value="4">AVATEC</option>
            <option value="5">THERMALTAKE</option>
            <option value="6">NZXT</option>
            <option value="7">STORM</option>
            <option value="8">GAMEMAX</option>
            <option value="9">NUKA COLA</option>
            <option value="10">MASTERBOX</option>
        </select>
        <label for="">Color:</label>
        <select name="c_color" id="">
            <option value="1">NEGRO</option>
            <option value="2">NEGRO/BLANCO</option>
            <option value="3">NEGRO/ROJO</option>
            <option value="4">NEGRO/AZUL</option>
            <option value="5">NEGRO/VERDE</option>
            <option value="6">NEGRO/GRIS</option>
            <option value="7">GRISS</option>
            <option value="8">ROJO</option>
            <option value="9">AZUL</option>
            <option value="10">VERDE</option>
            <option value="11">MARRON</option>
            <option value="12">ROSADO</option>
            <option value="13">PLATEADO</option>
        </select>
        <label for="">Tarjeta de video:</label>
        <input type="checkbox" name="tarjeta_video" id="" value="1">
        <label for="">Monitor:</label>
        <input type="checkbox" name="monitor" id="" value="1">
        <br>

        <p>Datos de disco duro:</p>
        <label for="">Capacidad:</label>
        <select name="disco_capacidad" id="">
            <option value="80GB">80GB</option>
            <option value="120GB">120GB</option>
            <option value="160GB">160GB</option>
            <option value="320GB">320GB</option>
            <option value="500GB">500GB</option>
            <option value="720GB">720GB</option>
            <option value="1TB">1TB</option>
        </select>
        <label for="">Tipo:</label>
        <select name="disco_tipo" id="">
            <option value="1">SATA</option>
            <option value="2">ID</option>
        </select>
        <label for="">Marca:</label>
        <select name="disco_marca" id="">
            <option value="1">TOSHIBA</option>
            <option value="2">MAXTOR</option>
            <option value="3">KINGSTON</option>
            <option value="4">HITACHI</option>
            <option value="5">WESTERN DIGITAL</option>
            <option value="6">SAMSUMG</option>
        </select>
        <label for="">Categoria</label>
        <select name="disco_categoria" id="">
            <option value="1">MECANICO</option>
            <option value="2">SOLIDO</option>
        </select>
        <br>

        <p>Datos de memoria RAM:</p>
        <label for="">Capacidad:</label>
        <select name="memoria_capacidad" id="">
            <option value="2GB">2GB</option>
            <option value="4GB">4GB</option>
            <option value="8GB">8GB</option>
            <option value="16GB">16GB</option>
            <option value="32GB">32GB</option>
        </select>
        <label for="">Tipo:</label>
        <select name="memoria_tipo" id="">
            <option value="1">DDR</option>
            <option value="2">DDR2</option>
            <option value="3">DDR3</option>
            <option value="4">DDR4</option>
        </select>
        <br>
        <br>
        <label for="">MOTIVO:</label>
        <select name="motivo" id="">
            <option value="1">SE APAGA</option>
            <option value="2">NO PRENDE</option>
            <option value="3">SE RECALIENTA</option>
            <option value="4">PANTALLA SE QUEDA OSCURA</option>
            <option value="5">LE CAYO AGUA</option>
            <option value="6">SE REINICIA</option>
            <option value="7">TIENE VIRUS</option>
            <option value="8">SE GOLPEO</option>
            <option value="9">ESTA LENTO EL SISTEMA</option>
            <option value="10">PROGRAMAS NO FUNCIONAN</option>
            <option value="11">NO FUNCIONA EL AUDIO</option>
            <option value="12">NO CONECTA A INTERNET</option>
            <option value="13">REVISAR SOFTWARE GENERAL</option>
            <option value="14">REVISAR HARDWARE GENERAL</option>
            <option value="15">REVISION GENERAL</option>
        </select>
        <br>
        <br>
        <input type="submit" value="REGISTRAR">
    </form>-->

    <div class="container mt-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white;">
        <h3 class="mt-4" style="color: orangered; font-weight: bold;">REGISTRO DE PC:</h3>
        <form action="../controllers/Pc.controlador.php?orden=registrar_pc" method="POST" class="mt-2">
            <input type="hidden" name="id_orden_trabajo" value="<?= $id_orden_trabajo; ?>">
            <div class="form-row">
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Case:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="c_marca" id="">
                            <option value="1">ANTRYX</option>
                            <option value="2">GAMBYTE</option>
                            <option value="3">HALION</option>
                            <option value="4">AVATEC</option>
                            <option value="5">THERMALTAKE</option>
                            <option value="6">NZXT</option>
                            <option value="7">STORM</option>
                            <option value="8">GAMEMAX</option>
                            <option value="9">NUKA COLA</option>
                            <option value="10">MASTERBOX</option>
                        </select>
                    </div>
                </div>
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Color:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="c_color" id="">
                            <option value="1">NEGRO</option>
                            <option value="2">NEGRO/BLANCO</option>
                            <option value="3">NEGRO/ROJO</option>
                            <option value="4">NEGRO/AZUL</option>
                            <option value="5">NEGRO/VERDE</option>
                            <option value="6">NEGRO/GRIS</option>
                            <option value="7">GRISS</option>
                            <option value="8">ROJO</option>
                            <option value="9">AZUL</option>
                            <option value="10">VERDE</option>
                            <option value="11">MARRON</option>
                            <option value="12">ROSADO</option>
                            <option value="13">PLATEADO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group form-check ml-5">
                        <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Tarjeta de video:</label>
                        <input type="checkbox" name="tarjeta_video" id="" value="1">
                    </div>
                    <div class="form-group form-check ml-3">
                        <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Monitor:</label>
                        <input type="checkbox" name="monitor" id="" value="1">
                    </div>
                </div>
            </div>
            <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">Datos de disco duro:</p>
            <div class="form-row">
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Capacidad:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="disco_capacidad" id="">
                            <option value="80GB">80GB</option>
                            <option value="120GB">120GB</option>
                            <option value="160GB">160GB</option>
                            <option value="320GB">320GB</option>
                            <option value="500GB">500GB</option>
                            <option value="720GB">720GB</option>
                            <option value="1TB">1TB</option>
                        </select>
                    </div>
                </div>
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Tipo:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="disco_tipo" id="">
                            <option value="1">SATA</option>
                            <option value="2">ID</option>
                        </select>
                    </div>
                </div>
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Marca:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="disco_marca" id="">
                            <option value="1">TOSHIBA</option>
                            <option value="2">MAXTOR</option>
                            <option value="3">KINGSTON</option>
                            <option value="4">HITACHI</option>
                            <option value="5">WESTERN DIGITAL</option>
                            <option value="6">SAMSUMG</option>
                        </select>
                    </div>
                </div>
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Categoria:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="disco_categoria" id="">
                            <option value="1">MECANICO</option>
                            <option value="2">SOLIDO</option>
                        </select>
                    </div>
                </div>
            </div>
            <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">Datos de memoria RAM:</p>
            <div class="form-row">
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Capacidad:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="memoria_capacidad" id="">
                            <option value="2GB">2GB</option>
                            <option value="4GB">4GB</option>
                            <option value="8GB">8GB</option>
                            <option value="16GB">16GB</option>
                            <option value="32GB">32GB</option>
                        </select>
                    </div>
                </div>
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">Tipo:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="memoria_tipo" id="">
                            <option value="1">DDR</option>
                            <option value="2">DDR2</option>
                            <option value="3">DDR3</option>
                            <option value="4">DDR4</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <label class="col-form-label" for="" style="font-size: 20px; font-weight: bold;">MOTIVO:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="motivo" id="">
                            <option value="1">SE APAGA</option>
                            <option value="2">NO PRENDE</option>
                            <option value="3">SE RECALIENTA</option>
                            <option value="4">PANTALLA SE QUEDA OSCURA</option>
                            <option value="5">LE CAYO AGUA</option>
                            <option value="6">SE REINICIA</option>
                            <option value="7">TIENE VIRUS</option>
                            <option value="8">SE GOLPEO</option>
                            <option value="9">ESTA LENTO EL SISTEMA</option>
                            <option value="10">PROGRAMAS NO FUNCIONAN</option>
                            <option value="11">NO FUNCIONA EL AUDIO</option>
                            <option value="12">NO CONECTA A INTERNET</option>
                            <option value="13">REVISAR SOFTWARE GENERAL</option>
                            <option value="14">REVISAR HARDWARE GENERAL</option>
                            <option value="15">REVISION GENERAL</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row mt-3 mb-1">
                <a class="btn btn-dark mb-4" style="font-size: 20px; font-weight: bold;" href="OrdenTrabajo.lista.views.php">VOLVER</a>
                <input class="btn btn-warning m-auto" style="font-size: 20px; font-weight: bold;" type="submit" value="REGISTRAR">
            </div>
        </form>
    </div>
</body>

</html>