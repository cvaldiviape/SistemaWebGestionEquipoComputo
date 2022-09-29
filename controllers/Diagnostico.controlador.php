<?php
require_once '../dao/Diagnostico.dao.php';
require_once '../models/Equipo.clase.php';
require_once '../models/Diagnostico.clase.php';

switch($_GET['orden']){
    case 'registrar_diagnostico':
        $e=new Equipo();
        $e->setId($_POST['id_equipo']);

        $d=new Diagnostico();
        $d->setDescripcion($_POST['diagnostico']);
        $d->setEquipo($e);

        $num=DiagnosticoDAO::setRegistrarDiagnostico($d);
        if($num!=0){
            header('Location: ../views/Tecnico.Equipos.lista.views.php');
        }else{
            header('Location: ../views/error.php');
        }
    break;
}
?>