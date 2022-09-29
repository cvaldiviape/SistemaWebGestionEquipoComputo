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
    <title>Tecnico.laptop.detalle</title>
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
    <?php
        /*require_once '../dao/Laptop.dao.php'; 
        $id_equipo=$_GET['id'];//proviene de "Tecnico.Equipos.lista.views.php" y lo almaceno en $x.
                       //para luego usarlo en el metodo "PcDAO::getDetallePcXid($x);"
        $fila=LaptopDAO::getDetalleLaptopXid($id_equipo);
        if($fila['CARGADOR']=='0'){
            $cargador='NO';
        }else{
            $cargador='SI';
        }
        if($fila['BATERIA']=='0'){
            $bateria='NO';
        }else{
            $bateria='SI';
        }*/
    ?>
    <!--<h1>Detalle Laptop:</h1>
    <label for="">Marca:</label>
    <input type="text" value="<?//=$fila['LAPTOP_MARCA']?>" readonly="readonly" size="10">
    <label for="">Color:</label>
    <input type="text" value="<?//=$fila['LAPTOP_COLOR']?>" readonly="readonly" size="10">
    <label for="">Cargador:</label>
    <input type="text" value="<?//=$cargador?>" readonly="readonly" size="1">
    <label for="">Bateria:</label>
    <input type="text" value="<?//=$bateria?>" readonly="readonly" size="1">
    <br>
    <p>Datos de disco duro:</p>
    <label for="">Capcidad:</label>
    <input type="text" value="<?//=$fila['DISCO_CAPACIDAD']?>" readonly="readonly" size="4">
    <label for="">Tipo:</label>
    <input type="text" value="<?//=$fila['DISCO_TIPO']?>" readonly="readonly" size="3">
    <label for="">Marca:</label>
    <input type="text" value="<?//=$fila['DISCO_MARCA']?>" readonly="readonly" size="15">
    <label for="">Categoria:</label>
    <input type="text" value="<?//=$fila['DISCO_CATEGORIA']?>" readonly="readonly" size="10">
    <br>
    <p>Datos de memoria RAM:</p>
    <label for="">Capacidad:</label>
    <input type="text" value="<?//=$fila['MEMORIA_CAPACIDAD']?>" readonly="readonly" size="4">
    <label for="">Tipo:</label>
    <input type="text" value="<?//=$fila['MEMORIA_TIPO']?>" readonly="readonly" size="4">
    <br>
    <br>
    <label for="">MOTIVO:</label>
    <input type="text" value="<?//=$fila['MOTIVO']?>" readonly="readonly" size="20">
    
    <h2>CLIENTE:</h2>
    <?php //require_once '../dao/Cliente.dao.php';?>
    <?php //$filax=ClienteDAO::getDetalleCliente($id_equipo);?>
    <label for="">Nombre:</label>
    <input type="text" value="<?//= $filax['NOMBRE'] . ' ' . $filax['APELLIDO']; ?>" readonly="readonly" size="15">
    <label for="">Celular:</label>
    <input type="text" value="<?//= $filax['CELULAR']; ?>" readonly="readonly" size="6">


    <h2>DIAGNOSTICO:</h2>
    <?php //require_once '../dao/Diagnostico.dao.php';?>
    <?php //$fila=DiagnosticoDAO::getDetalleDiagnostico($id_equipo); ?>
    <label for="">Descripcion:</label><br>
    <textarea  cols="60" rows="5" readonly="readonly"><?//=$fila['DESCRIPCION'];?></textarea><br>
    <label for="">Fecha:</label>
    <input type="date" value="<?//= $fila['FECHA']?>" readonly="readonly">
    

    <h2>REPARACIONES:</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>DESCRIPCION</th>
            <th>COSTO</th>
            <th>FECHA</th>
        </tr>
        <?php //require_once '../dao/Reparacion.dao.php'; ?>
        <?php //$fila2=ReparacionDAO::getListaReparacion($id_equipo); ?>
        <?php //$total=0; ?>
        <?php //foreach($fila2 as $a): ?>
        <?php //$total=$total+$a['COSTO']; ?>
        <tr>
            <td><?//= $a['ID_REPARACION']; ?></td>
            <td><?//= $a['DESCRIPCION']; ?></td>
            <td><?//= $a['COSTO']; ?></td>
            <td><?//= $a['FECHA']; ?></td>
        </tr>
        <?php // endforeach; ?>
        </table>
        <br>
        <label for="">TOTAL S/.:</label>
        <input type="text" value="<?//= $total;?>" readonly="readonly" size="3">
    <br>
    <br>
    <form action="../controllers/Equipo.controlador.php?orden=marcar_estado" method="POST">
        <input type="hidden" name="id_equipo" value="<?//= $id_equipo; ?>" >
        <label for="">Estado:</label>
        <select name="estado" id="">
            <option value="0">EN REVISION</option>
            <option value="1">LISTO</option>
        </select>
        <input type="submit" value="MARCAR">
    </form>
    <br>
    <br>
    <a href="../views/Tecnico.Equipos.lista.views.php">VOLVER</a>-->


    ---------------------------------------------------------------------------------------------
    <?php
    require_once '../dao/Laptop.dao.php';
    $id_equipo = $_GET['id']; //proviene de "Tecnico.Equipos.lista.views.php" y lo almaceno en $x.
    //para luego usarlo en el metodo "PcDAO::getDetallePcXid($x);"
    $fila = LaptopDAO::getDetalleLaptopXid($id_equipo);
    if ($fila['CARGADOR'] == '0') {
        $cargador = 'NO';
    } else {
        $cargador = 'SI';
    }
    if ($fila['BATERIA'] == '0') {
        $bateria = 'NO';
    } else {
        $bateria = 'SI';
    }
    ?>
    <div class="container mb-4" style="border: 4px solid rgb(255, 255, 255); border-radius: 15px; background: white;">
        <h3 class="mt-4" style="color: rgb(255, 0, 0); font-weight: bold;">DETALLE DE LAPTOP:</h3>

        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Marca:</label>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $fila['LAPTOP_MARCA']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="apellido">Color:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['LAPTOP_COLOR']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="celular">Cargador:</label>
            <div>
                <input type="text" class="form-control" value="<?= $cargador; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="celular">Bateria:</label>
            <div>
                <input type="text" class="form-control" value="<?= $bateria; ?>" readonly="readonly" size="10">
            </div>
        </div>
        <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">Datos de disco duro:</p>
        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Capacidad:</label>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $fila['DISCO_CAPACIDAD']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="apellido">Tipo:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['DISCO_TIPO']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="celular">Marca:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['DISCO_MARCA']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="celular">Categoria:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['DISCO_CATEGORIA']; ?>" readonly="readonly" size="10">
            </div>
        </div>
        <p style="color: rgb(2, 120, 255); font-weight: bold; font-size: 23px;">Datos de la memoria RAM:</p>
        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Capacidad:</label>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $fila['MEMORIA_CAPACIDAD']; ?>" readonly="readonly" size="10">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="apellido">Tipo:</label>
            <div>
                <input type="text" class="form-control" value="<?= $fila['MEMORIA_TIPO']; ?>" readonly="readonly" size="10">
            </div>
        </div>
        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">MOTIVO:</label>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $fila['MOTIVO']; ?>" readonly="readonly" size="10">
            </div>
        </div>

        <?php require_once '../dao/Cliente.dao.php'; ?>
        <?php $filax = ClienteDAO::getDetalleCliente($id_equipo); ?>
        <p style="color: rgb(162, 0, 255); font-weight: bold; font-size: 23px;">CLIENTE:</p>
        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Nombre:</label>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $filax['NOMBRE'] . ' ' . $filax['APELLIDO']; ?>" readonly="readonly" size="14">
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="apellido">Celular:</label>
            <div>
                <input type="text" class="form-control" value="<?= $filax['CELULAR']; ?>" readonly="readonly" size="10">
            </div>
        </div>

        <?php require_once '../dao/Diagnostico.dao.php'; ?>
        <?php $fila = DiagnosticoDAO::getDetalleDiagnostico($id_equipo); ?>
        <p style="color: rgb(162, 0, 255); font-weight: bold; font-size: 23px;">DIAGNOSTICO:</p>
        <div class="form-row">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">Descripcion:</label>
            <div class="form-group">
                <textarea cols="60" rows="5" readonly="readonly"><?= $fila['DESCRIPCION']; ?></textarea>
            </div>
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="apellido">Fecha:</label>
            <div>
                <input type="date" class="form-control" value="<?= $fila['FECHA']; ?>" readonly="readonly" size="10">
            </div>
        </div>

        <p style="color: rgb(162, 0, 255); font-weight: bold; font-size: 23px;">REPARACIONES:</p>
        <table class='table table-hover table-bordered table-sm table-light'>
            <thead class='table-dark' align='center'>
                <tr>
                    <th>ID</th>
                    <th>DESCRIPCION</th>
                    <th>COSTO</th>
                    <th>FECHA</th>
                </tr>
            </thead>
            <tbody align='center'>
                <?php require_once '../dao/Reparacion.dao.php'; ?>
                <?php $fila2 = ReparacionDAO::getListaReparacion($id_equipo); ?>
                <?php $total = 0; ?>
                <?php foreach ($fila2 as $a) : ?>
                    <?php $total = $total + $a['COSTO']; ?>
                    <tr>
                        <td><?= $a['ID_REPARACION']; ?></td>
                        <td><?= $a['DESCRIPCION']; ?></td>
                        <td><?= $a['COSTO']; ?></td>
                        <td><?= $a['FECHA']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <div class="form-row mt-5">
            <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">TOTAL A PAGAR: S/.</label>
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $total; ?>" readonly="readonly" size="14">
            </div>
        </div>


        <form action="../controllers/Equipo.controlador.php?orden=marcar_estado" method="POST">
            <input type="hidden" name="id_equipo" value="<?= $id_equipo; ?>">
            <div class="form-row">
                <label class="col-form-label" style="font-size: 20px; font-weight: bold;" for="nombre">ESTADO:</label>
                <div class="rows">
                    <div class="form-group">
                        <select class="form-control" name="estado" id="">
                            <option value="0">EN REVISION</option>
                            <option value="1">LISTO</option>
                        </select>
                    </div>
                </div>
                <div class="form-group ml-3">
                    <input class="btn btn-warning m-auto" style="font-size: 20px; font-weight: bold;" type="submit" value="MARCA">
                </div>
            </div>
        </form>

        <div class="form-row mt-3 mb-1">
            <a class="btn btn-dark mb-4" style="font-size: 20px; font-weight: bold;" href="../views/Tecnico.Equipos.lista.views.php">VOLVER</a>
        </div>
    </div>





</body>
</html>