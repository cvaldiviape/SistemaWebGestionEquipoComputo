<?php
require_once '../dao/OrdenTrabajo.dao.php';
require_once '../models/OrdenTrabajo.clase.php';
//require_once '../models/Cliente.clase.php';// ya esta siendo llamado desde  require_once '../dao/OrdenTrabajo.dao.php';
require_once '../models/Empleado.clase.php';
switch($_GET['orden']){
    case 'registrar_orden':
        $c=new Cliente();
        $c->setNombre($_POST['nombre']);
        $c->setApellido($_POST['apellido']);
        $c->setCelular($_POST['celular']);

        $e=new Empleado();
        $e->setId($_POST['id_tecnico']);

        $o=new OrdenTrabajo();
        $o->setCliente($c);
        $o->setEmpleado($e);

        $id_orden_trabajo=OrdenTrabajoDAO::setRegistrarOrdenTrabajo($o);
        if($id_orden_trabajo!=0){
            header('Location: ../views/OrdenTrabajo.lista.views.php');
        }else{
            //header('Location: ../views/OrdenTrabajo.registro.views.php');
            header('Location: ../views/error.php');
        }
    break;
}
?>