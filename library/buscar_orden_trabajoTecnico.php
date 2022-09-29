<?php
require_once '../library/Conexion.php';
session_start(); 
/*if (!isset($_SESSION['sesion_id_em']) && !isset($_SESSION['sesion_id_us'])) { 
    header('Location: ../views/login.php');
}*/

$x = new Conexion();
$cn = $x->getConexion();

$salida = "";

if (isset($_POST['consultaTecnico'])) {//SI ESCRIBIO ALGO EN LA CAJA DE TEXTO, HACER LO SIGUIENTE
    $valor = $_POST['consultaTecnico'];
    $sql = "SELECT O.ID_ORDEN_TRABAJO AS ID_OT, C.NOMBRE, C.APELLIDO, C.CELULAR, O.FECHA, EM.NOMBRE AS TECNICO FROM ORDEN_TRABAJO O
            INNER JOIN CLIENTE C ON C.ID_CLIENTE=O.ID_CLIENTE
            INNER JOIN EMPLEADO EM ON EM.ID_EMPLEADO=O.ID_EMPLEADO
            LEFT JOIN PAGO PA ON PA.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
            WHERE (O.ID_ORDEN_TRABAJO LIKE :a OR C.NOMBRE LIKE :b OR C.APELLIDO LIKE :c OR O.FECHA LIKE :d) AND EM.ID_EMPLEADO=:e AND PA.ID_PAGO IS NULL";
    $pst = $cn->prepare($sql);
    $pst->bindValue(':a', '%'.$valor.'%');
    $pst->bindValue(':b', '%'.$valor.'%');
    $pst->bindValue(':c', '%'.$valor.'%');
    $pst->bindValue(':d', '%'.$valor.'%');
    $pst->bindValue(':e', $_SESSION['sesion_id_em']);
    $pst->execute();
    if ($pst->rowCount() != 0) {
$salida .= "<table class='table table-hover table-bordered table-sm table-light'>
    <thead class='table-dark' align='center'>
        <tr>
            <th>ID_OT</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CELULAR</th>
            <th>FECHA</th>
            <th style='background: rgb(255, 0, 0);'>OP #1</th>
        </tr>
    </thead>
    <tbody align='center'>";;
        while ($a = $pst->fetch(PDO::FETCH_ASSOC)) {
            $salida .= "<tr>
        <td style='font-weight: bold;'>" . $a['ID_OT'] . "</td>
        <td style='font-weight: bold;'>" . $a['NOMBRE'] . "</td>
        <td style='font-weight: bold;'>" . $a['APELLIDO'] . "</td>
        <td style='font-weight: bold;'>" . $a['CELULAR'] . "</td>
        <td style='font-weight: bold;'>" . $a['FECHA'] . "</td>
        <td style='font-weight: bold;'><a href='Tecnico.OrdenTrabajo.detalle.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Ver detalle</a></td>
    </tr>";
        }
        $salida .= "</tbody></table>";
    } else {
        $salida .= "No hay datos :(";
    }
    echo $salida;

    $x->cerrarConexion();
} else {//SI NO ESCRIBIO NADA EN LA CAJA DE TEXTO, MOSTRARA LA TABLA CON TODOS LOS DATOS PREDETERMINADAMENTE.
    $salida .= "<table class='table table-hover table-bordered table-sm table-light'>
    <thead class='table-dark' align='center'>
        <tr>
            <th>ID_OT</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>CELULAR</th>
            <th>FECHA</th>
            <th style='background: rgb(255, 0, 0);'>OP #1</th>
        </tr>
    <tbody align='center'>";;
    require_once '../dao/OrdenTrabajo.dao.php';
    $fila='';
    $fila=OrdenTrabajoDAO::getListaOrdenTrabajoXtecnico($_SESSION['sesion_id_em']);
    if($fila!=''){
        foreach($fila as $a){
            $salida .= "<tr>
        <td style='font-weight: bold;'>" . $a['ID_OT'] . "</td>
        <td style='font-weight: bold;'>" . $a['NOMBRE'] . "</td>
        <td style='font-weight: bold;'>" . $a['APELLIDO'] . "</td>
        <td style='font-weight: bold;'>" . $a['CELULAR'] . "</td>
        <td style='font-weight: bold;'>" . $a['FECHA'] . "</td>
        <td style='font-weight: bold;'><a href='Tecnico.OrdenTrabajo.detalle.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Ver detalle</a></td>
    </tr>";
        }
        $salida .= "</tbody></table>";
    } else {
        $salida .= "No hay datos :(";
    }
    echo $salida;

    $x->cerrarConexion();
}
