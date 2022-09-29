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
    <title>Pago.registro.views</title>
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

    <!--<?php //$id_orden_trabajo = $_GET['id_orden_trabajo']; ?>
    <h1>REGISTRO DE PAGO:</h1>
    <?php //require_once '../dao/Cliente.dao.php'; ?>
    <?php //$fila1 = ClienteDAO::getDetalleClienteXidOrdenTrabajo($id_orden_trabajo); ?>
    <label for="">Cliente:</label>
    <input type="text" readonly='readonly' value="<?//= $fila1['NOMBRE'] . ' ' . $fila1['APELLIDO']; ?>">
    <p>EQUIPOS - PC</p>
    <table>
        <tr>
            <th>ID</th>
            <th>CASE</th>
            <th>COLOR</th>
            <th>REPARACION</th>
            <th>COSTO</th>
        </tr>
        <?php //require_once '../dao/Reparacion.dao.php'; ?>
        <?php //$fila2 = ReparacionDAO::getListaReparacionDetalladoPc($id_orden_trabajo); ?>
        <?php //foreach ($fila2 as $a) : ?>
            <tr>
                <td><//?= $a['ID_EQUIPO'] ?></td>
                <td><//?= $a['CASEX'] ?></td>
                <td><//?= $a['COLOR'] ?></td>
                <td><//?= $a['REPARACION'] ?></td>
                <td><//?= $a['COSTO'] ?></td>
            </tr>
        <?php //endforeach; ?>
    </table>
    <p>EQUIPOS - LAPTOP</p>
    <table>
        <tr>
            <th>ID</th>
            <th>MARCA</th>
            <th>COLOR</th>
            <th>REPARACION</th>
            <th>COSTO</th>
        </tr>
        <?php //$fila3 = ReparacionDAO::getListaReparacionDetalladoLaptop($id_orden_trabajo); ?>
        <?php //foreach ($fila3 as $a) : ?>
            <tr>
                <td><//?= $a['ID_EQUIPO'] ?></td>
                <td><//?= $a['MARCA'] ?></td>
                <td><//?= $a['COLOR'] ?></td>
                <td><//?= $a['REPARACION'] ?></td>
                <td><//?= $a['COSTO'] ?></td>
            </tr>
        <?php //endforeach; ?>
    </table>
    <br>
    <?php //$montoTotal = ReparacionDAO::getMontoTotalReparacionesXidOrdenTrabajo($id_orden_trabajo) ?>

    <p>TOTAL A PAGAR:</p>
    <form action="../controllers/Pago.controlador?orden=registrar_pago" method="POST">
        <input type="hidden" name="id_ot" value="<?//= $id_orden_trabajo; ?>">
        <label for="">S/.</label>
        <input type="text" name="total" value="<?//= $montoTotal['TOTAL'] ?>" readonly="readonly" size="6">
        <br><br>
        <input type="submit" value="Registrar">
    </form>
    <br>
    <br>
    <a href="../views/OrdenTrabajo.lista.views.php">VOLVER</a>-->




    ------------------------------------------------------------------------------------------
    <?php $id_orden_trabajo = $_GET['id_orden_trabajo']; ?>
    <?php require_once '../dao/Cliente.dao.php'; ?>
    <?php $fila1 = ClienteDAO::getDetalleClienteXidOrdenTrabajo($id_orden_trabajo); ?>
    <div class="container mb-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white;">
        <h3 class="mt-4" style="color: orangered; font-weight: bold;">REGISTRO DE PAGO:</h3>

        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Cliente:</label>
            <div class="form-group">
                <input type="text" class="form-control" readonly='readonly' value="<?= $fila1['NOMBRE'] . ' ' . $fila1['APELLIDO']; ?>">
            </div>
        </div>

        <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">EQUIPOS - PC:</p>
        <table class='table table-hover table-bordered table-sm table-light'>
            <thead class='table-dark' align='center'>
                <tr>
                    <th>ID</th>
                    <th>CASE</th>
                    <th>COLOR</th>
                    <th>REPARACION</th>
                    <th>COSTO</th>
                </tr>
            </thead>
            <tbody align='center'>
                <?php require_once '../dao/Reparacion.dao.php'; ?>
                <?php $fila2 = ReparacionDAO::getListaReparacionDetalladoPc($id_orden_trabajo); ?>
                <?php foreach ($fila2 as $a) : ?>
                    <tr>
                        <td style='font-weight: bold;'><?= $a['ID_EQUIPO'] ?></td>
                        <td style='font-weight: bold;'><?= $a['CASEX'] ?></td>
                        <td style='font-weight: bold;'><?= $a['COLOR'] ?></td>
                        <td style='font-weight: bold;'><?= $a['REPARACION'] ?></td>
                        <td style='font-weight: bold;'><?= $a['COSTO'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">EQUIPOS - LAPTOP:</p>
        <table class='table table-hover table-bordered table-sm table-light'>
            <thead class='table-dark' align='center'>
                <tr>
                    <th>ID</th>
                    <th>CASE</th>
                    <th>COLOR</th>
                    <th>REPARACION</th>
                    <th>COSTO</th>
                </tr>
            </thead>
            <tbody align='center'>
                <?php $fila3 = ReparacionDAO::getListaReparacionDetalladoLaptop($id_orden_trabajo); ?>
                <?php foreach ($fila3 as $a) : ?>
                    <tr>
                        <td style='font-weight: bold;'><?= $a['ID_EQUIPO'] ?></td>
                        <td style='font-weight: bold;'><?= $a['MARCA'] ?></td>
                        <td style='font-weight: bold;'><?= $a['COLOR'] ?></td>
                        <td style='font-weight: bold;'><?= $a['REPARACION'] ?></td>
                        <td style='font-weight: bold;'><?= $a['COSTO'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php $montoTotal = ReparacionDAO::getMontoTotalReparacionesXidOrdenTrabajo($id_orden_trabajo);?>
        <form action="../controllers/Pago.controlador?orden=registrar_pago" method="POST">
            <div class="form-row">
                <input type="hidden" name="id_ot" value="<?= $id_orden_trabajo; ?>">
                <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">TOTAL A PAGAR: S/.</label>
                <div class="form-group">
                    <input type="text" class="form-control" name="total" value="<?= $montoTotal['TOTAL'] ?>" readonly="readonly" size="6">
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