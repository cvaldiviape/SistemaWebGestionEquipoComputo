<?php
require_once '../library/Conexion.php';
$x = new Conexion();
$cn = $x->getConexion();

$salida = "";

if (isset($_POST['consulta'])) {//SI ESCRIBIO ALGO EN LA CAJA DE TEXTO, HACER LO SIGUIENTE
    $valor = $_POST['consulta'];
    $sql = "SELECT O.ID_ORDEN_TRABAJO AS ID_OT, C.NOMBRE, C.APELLIDO, C.CELULAR, O.FECHA, EM.NOMBRE AS TECNICO FROM ORDEN_TRABAJO O
            INNER JOIN CLIENTE C ON C.ID_CLIENTE=O.ID_CLIENTE
            INNER JOIN EMPLEADO EM ON EM.ID_EMPLEADO=O.ID_EMPLEADO
            LEFT JOIN PAGO PA ON PA.ID_ORDEN_TRABAJO=O.ID_ORDEN_TRABAJO
            WHERE (O.ID_ORDEN_TRABAJO LIKE :a OR C.NOMBRE LIKE :b OR C.APELLIDO LIKE :c OR O.FECHA LIKE :d) AND PA.ID_PAGO IS NULL";
    $pst = $cn->prepare($sql);
    $pst->bindValue(':a', '%'.$valor.'%');
    $pst->bindValue(':b', '%'.$valor.'%');
    $pst->bindValue(':c', '%'.$valor.'%');
    $pst->bindValue(':d', '%'.$valor.'%');
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
            <th>TECNICO</th>
            <th style='background: rgb(0, 102, 255);'>OP #1</th>
            <th style='background: rgb(255, 0, 0);'>OP #2</th>
            <th style='background: rgb(255, 251, 0);'>OP #3</th>
            <th style='background: rgb(21, 255, 0);'>OP #4</th>
        </tr>
    </thead>
    <tbody align='center'>";
        while ($a = $pst->fetch(PDO::FETCH_ASSOC)) {
            $salida .= "<tr>
            <td style='font-weight: bold;'>" . $a['ID_OT'] . "</td>
            <td style='font-weight: bold;'>" . $a['NOMBRE'] . "</td>
            <td style='font-weight: bold;'>" . $a['APELLIDO'] . "</td>
            <td style='font-weight: bold;'>" . $a['CELULAR'] . "</td>
            <td style='font-weight: bold;'>" . $a['FECHA'] . "</td>
            <td style='font-weight: bold;'>" . $a['TECNICO'] . "</td>
            <td style='font-weight: bold;'><a href='OrdenTrabajo.detalle.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Ver detalle</a></td>
            <td style='font-weight: bold;'><a href='Pc.registro.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Agregar Pc</a></td>
            <td style='font-weight: bold;'><a href='Laptop.registro.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Agregar Laptop</a></td>
            <td style='font-weight: bold;'><a href='Pago.registro.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Registrar Pago</a></td>
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
            <th>TECNICO</th>
            <th style='background: rgb(0, 102, 255);'>OP #1</th>
            <th style='background: rgb(255, 0, 0);'>OP #2</th>
            <th style='background: rgb(255, 251, 0); color: black;'>OP #3</th>
            <th style='background: rgb(21, 255, 0); color: black;'>OP #4</th>
        </tr>
    </thead>
    <tbody align='center'>";
    require_once '../dao/OrdenTrabajo.dao.php';
    $fila='';
    $fila=OrdenTrabajoDAO::getListaOrdenTrabajo();
    if($fila!=''){
        foreach($fila as $a){
            $salida .= "<tr>
            <td style='font-weight: bold;'>" . $a['ID_OT'] . "</td>
            <td style='font-weight: bold;'>" . $a['NOMBRE'] . "</td>
            <td style='font-weight: bold;'>" . $a['APELLIDO'] . "</td>
            <td style='font-weight: bold;'>" . $a['CELULAR'] . "</td>
            <td style='font-weight: bold;'>" . $a['FECHA'] . "</td>
            <td style='font-weight: bold;'>" . $a['TECNICO'] . "</td>
            <td style='font-weight: bold;'><a href='OrdenTrabajo.detalle.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Ver detalle</a></td>
            <td style='font-weight: bold;'><a href='Pc.registro.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Agregar Pc</a></td>
            <td style='font-weight: bold;'><a href='Laptop.registro.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Agregar Laptop</a></td>
            <td style='font-weight: bold;'><a href='Pago.registro.views.php?id_orden_trabajo=" . $a['ID_OT'] . "'>Registrar Pago</a></td>
        </tr>";
        }
        $salida .= "</tbody></table>";
    } else {
        $salida .= "No hay datos :(";
    }
    echo $salida;

    $x->cerrarConexion();
}
