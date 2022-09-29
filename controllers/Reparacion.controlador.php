<?php
require_once '../dao/Reparacion.dao.php';
require_once '../models/Equipo.clase.php';
require_once '../models/Reparacion.clase.php';

switch($_GET['orden']){
    case 'registrar_reparacion':
        $e=new Equipo();
        $e->setId($_POST['id_equipo']);

        $r=new Reparacion();
        $r->setDescripcion($_POST['reparacion']);
        $r->setCosto($_POST['costo']);
        $r->setEquipo($e);  

        $num=ReparacionDAO::setRegistrarReparacion($r);
        if($num!=0){
            header('Location: ../views/Tecnico.Equipos.lista.views.php');
        }else{
            header('Location: ../views/error.php');
        }
    break;
}
?>