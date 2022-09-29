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
    <title>Tecnico.Equipos.lista.views</title>
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

    <div class="container mb-4 mt-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white;">
        <h3 class="mt-4" style="color: rgb(0, 119, 255); font-weight: bold;">EQUIPOS DE COMPUTO:</h3>

        <p style="color: rgb(255, 0, 0); font-weight: bold; font-size: 23px;">LISTA DE PCs:</p>
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
                    <th  style='background: rgb(0, 102, 255);'>OP #1</th>
                    <th  style='background: rgb(255, 0, 0);'>OP #2</th>
                    <th  style='background: rgb(255, 251, 0); color: black;'>OP #3</th>
                </tr>
            </thead>
            <tbody align='center'>
                <?php require_once '../dao/Pc.dao.php'; ?>
                <?php $lista_pc = PcDAO::getListaPcXtecnico($_SESSION['sesion_id_em']); ?>
                <?php foreach ($lista_pc as $a) : ?>
                    <?php
                        if ($a['ESTADO'] == '0') {
                            $estado1 = 'EN REVISION';
                        } else {
                            $estado1 = 'LISTO';
                        }
                        ?>
                    <tr>
                        <td><?= $a['ID_EQUIPO'] ?></td>
                        <td><?= $a['CASEX'] ?></td>
                        <td><?= $a['COLOR'] ?></td>
                        <td><?= $a['DISCO'] ?></td>
                        <td><?= $a['MEMORIA'] ?></td>
                        <td><?= $a['MOTIVO'] ?></td>
                        <td><?= $estado1 ?></td>
                        <td><a href="../views/Tecnico.pc.detalle.php?id=<?= $a['ID_EQUIPO'] ?>">Ver detalle</a></td>
                        <td><a href="../views/Diagnostico.registro.views.php?id=<?= $a['ID_EQUIPO'] ?>">Reg. Diagnostico</a></td>
                        <td><a href="../views/Reparacion.registro.views.php?id=<?= $a['ID_EQUIPO'] ?>">Reg. Reparacion</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>

        <p style="color: rgb(255, 0, 0); font-weight: bold; font-size: 23px;">LISTA DE LAPTOPs:</p>
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
                    <th style='background: rgb(0, 102, 255);'>OP #1</th>
                    <th style='background: rgb(255, 0, 0);'>OP #2</th>
                    <th style='background: rgb(255, 251, 0); color: black;'>OP #3</th>
                </tr>
            </thead>
            <tbody align='center'>
                <?php require_once '../dao/Laptop.dao.php'; ?>
                <?php $lista_laptop = LaptopDAO::getListaLaptopXtecnico($_SESSION['sesion_id_em']); ?>
                <?php foreach ($lista_laptop as $b) : ?>
                    <?php
                        if ($b['ESTADO'] == '0') {
                            $estado2 = 'EN REVISION';
                        } else {
                            $estado2 = 'LISTO';
                        }
                        ?>
                    <tr>
                        <td><?= $b['ID_EQUIPO'] ?></td>
                        <td><?= $b['MARCA'] ?></td>
                        <td><?= $b['COLOR'] ?></td>
                        <td><?= $b['DISCO'] ?></td>
                        <td><?= $b['MEMORIA'] ?></td>
                        <td><?= $b['MOTIVO'] ?></td>
                        <td><?= $estado2 ?></td>
                        <td><a href="../views/Tecnico.laptop.detalle.php?id=<?= $b['ID_EQUIPO'] ?>">Ver detalle</a></td>
                        <td><a href="../views/Diagnostico.registro.views.php?id=<?= $b['ID_EQUIPO'] ?>">Reg. Diagnostico</a></td>
                        <td><a href="../views/Reparacion.registro.views.php?id=<?= $b['ID_EQUIPO'] ?>">Reg. Reparacion</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a class="btn btn-warning mb-4" style="font-weight: bold;" href="Tecnico.principal.php">VOLVER</a>
    </div>
</body>

</html>