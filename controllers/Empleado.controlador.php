<?php
require_once '../dao/Empleado.dao.php';
require_once '../models/Empleado.clase.php';
switch ($_GET['orden']) {
    case 'loguear':
        $e = new Empleado();
        $e->setUsername($_POST['username']);
        $e->setPass($_POST['pass']);
        $e->setCargo($_POST['cargo']);
        $pst = EmpleadoDAO::setIniciarSesion($e);

        if ($_POST['cargo'] == 'Recepcionista') {
            if ($pst->rowCount() != 0) {
                session_start();
                while ($fila = $pst->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['sesion_id_us'] = $fila['ID_USUARIO'];
                    $_SESSION['sesion_id_em'] = $fila['ID_EMPLEADO'];
                    $_SESSION['sesion_nombre'] = $fila['NOMBRE'] . ' ' . $fila['APELLIDO_P'] . ' ' . $fila['APELLIDO_M'];
                    header('Location: ../views/Recepcion.principal.php');
                }
            } else {
                header('Location: ../views/login.php');
            }
        }
        if ($_POST['cargo'] == 'Tecnico') {
            if ($pst->rowCount() != 0) {
                session_start();
                while ($fila = $pst->fetch(PDO::FETCH_ASSOC)) {
                    $_SESSION['sesion_id_us'] = $fila['ID_USUARIO'];
                    $_SESSION['sesion_id_em'] = $fila['ID_EMPLEADO'];
                    $_SESSION['sesion_nombre'] = $fila['NOMBRE'] . ' ' . $fila['APELLIDO_P'] . ' ' . $fila['APELLIDO_M'];
                    header('Location: ../views/Tecnico.principal.php');
                }
            } else {
                header('Location: ../views/login.php');
            }
        }
    break;
}
