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
    <script type="text/javascript" src='../js/bootstrap.min.js'></script>    <!--estilos-->
    <link rel="stylesheet" type="text/css" href='../css/bootstrap.min.css'>    <!--estilos-->
    <script type="text/javascript" src='../js/all.min.js'></script>    <!--colocar iconos ya defininos-->
    <title>OrdenTrabajo.detalle.views</title>
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
                    <li class="nav-item"><a class="nav-link" style="font-weight: bold; color: white" href="../views/OrdenTrabajo.lista.views.php">Ordenes de trabajo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    require_once '../dao/OrdenTrabajo.dao.php';
    $x = new OrdenTrabajo();
    //$_GET[] uso por que esta viniendo desde un link <a href=></a> en la pagina "OrdenTrabajo.lista.views.php"
    $x->setId($_GET['id_orden_trabajo']); //'id_orden_trabajo' ya estableci en id_orden_trabajo=<?= $a['ID_OT'] en OrdenTrabajo.lista.views.php"
    $fila = OrdenTrabajoDAO::getBuscarXid($x);
    ?>
    <!--<p>DETALLE DE ORDEN DE TRABAJO</p>
    <p>Datos del cliente:</p>
    <label for="">Nombre:</label>
    <input type="text" value="<?= $fila['NOMBRE']; ?>" readonly="readonly" size="10">
    <label for="">Apellido:</label>
    <input type="text" value="<?= $fila['APELLIDO']; ?>" readonly="readonly" size="10">
    <label for="">Celular:</label>
    <input type="text" value="<?= $fila['CELULAR']; ?>" readonly="readonly" size="10">
    <p>Tecnico a cargo:</p>
    <label for="">Nombre:</label>
    <input type="text" value="<?= $fila['NOM_TECNICO']; ?>" readonly="readonly" size="10">
    <label for="">Apellidos:</label>
    <input type="text" value="<?= $fila['APEP_TECNICO'] . ' ' . $fila['APEM_TECNICO']; ?>" readonly="readonly" size="17">
    <label for="">Celular:</label>
    <input type="text" value="<?= $fila['CEL_TECNICO']; ?>" readonly="readonly" size="10">-->



    <div class="container mb-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white;">
        <h3 class="mt-4" style="color: orangered; font-weight: bold;">DETALLE DE ORDEN DE TRABAJO:</h3>

        <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">Datos del cliente:</p>
        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Nombre:</label>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $fila['NOMBRE']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="apellido">Apellido:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['APELLIDO']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="celular">Celular:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['CELULAR']; ?>" readonly="readonly" size="10">
            </div>
        </div>

        <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">Tecnico a cargo:</p>
        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Nombre:</label>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $fila['NOM_TECNICO']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="apellido">Apellidos:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['APEP_TECNICO'] . ' ' . $fila['APEM_TECNICO']; ?>" readonly="readonly" size="17">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="celular">Celular:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['CEL_TECNICO']; ?>" readonly="readonly" size="10">
            </div>
        </div>

        <p style="color: rgb(160, 0, 252); font-weight: bold; font-size: 23px;">LISTA PCs:</p>
        <table class='table table-hover table-bordered table-sm table-light'>
            <thead class='table-dark' align='center'>
                <tr>
                    <th>ID</th>
                    <th>CASE</th>
                    <th>COLOR</th>
                    <th>DISCO</th>
                    <th>MEMORIA</th>
                    <th>MOTIVO</th>
                    <th>ESTADO</th>
                </tr>
            </thead>
            <tbody align='center'>
                <?php require_once '../dao/Pc.dao.php'; ?>
                <?php $lista_pc = PcDAO::getListaPcXidOrdenTrabajo($fila['ID_OT']); ?>
                <?php foreach ($lista_pc as $a) : ?>
                    <?php
                        if ($a['ESTADO'] == '0') {
                            $estado = 'EN REVISION';
                        } else {
                            $estado = 'LISTO';
                        }
                        ?>
                    <tr>
                        <td style='font-weight: bold;'><?= $a['ID_EQUIPO'] ?></td>
                        <td style='font-weight: bold;'><?= $a['CASEX'] ?></td>
                        <td style='font-weight: bold;'><?= $a['COLOR'] ?></td>
                        <td style='font-weight: bold;'><?= $a['DISCO'] ?></td>
                        <td style='font-weight: bold;'><?= $a['MEMORIA'] ?></td>
                        <td style='font-weight: bold;'><?= $a['MOTIVO'] ?></td>
                        <td style='font-weight: bold;'><?= $estado ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p style="color: rgb(160, 0, 252); font-weight: bold; font-size: 23px;">LISTA LAPTOPs:</p>
        <table class='table table-hover table-bordered table-sm table-light'>
            <thead class='table-dark' align='center'>
                <tr>
                    <th>ID</th>
                    <th>MARCA</th>
                    <th>COLOR</th>
                    <th>DISCO</th>
                    <th>MEMORIA</th>
                    <th>MOTIVO</th>
                    <th>ESTADO</th>
                </tr>
            </thead>
            <tbody align='center'>
                <?php require_once '../dao/Laptop.dao.php'; ?>
                <?php $lista_laptop = LaptopDAO::getListaLaptopXidOrdenTrabajo($fila['ID_OT']) ?>
                <?php foreach ($lista_laptop as $b) : ?>
                    <?php
                        if ($b['ESTADO'] == '0') {
                            $estado = 'EN REVISION';
                        } else {
                            $estado = 'LISTO';
                        }
                    ?>
                    <tr>
                        <td style='font-weight: bold;'><?= $b['ID_EQUIPO'] ?></td>
                        <td style='font-weight: bold;'><?= $b['MARCA'] ?></td>
                        <td style='font-weight: bold;'><?= $b['COLOR'] ?></td>
                        <td style='font-weight: bold;'><?= $b['DISCO'] ?></td>
                        <td style='font-weight: bold;'><?= $b['MEMORIA'] ?></td>
                        <td style='font-weight: bold;'><?= $b['MOTIVO'] ?></td>
                        <td style='font-weight: bold;'><?= $estado ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-warning mb-4" style="font-weight: bold;" href="OrdenTrabajo.lista.views.php">VOLVER</a>
    </div>
</body>
</html>