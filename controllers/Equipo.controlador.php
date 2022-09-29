<?php
require_once '../dao/Equipo.dao.php';
require_once '../models/Equipo.clase.php';
switch($_GET['orden']){
    case 'marcar_estado':
        $e=new Equipo();
        $e->setEstado($_POST['estado']);
        $e->setId($_POST['id_equipo']);

        $num=EquipoDAO::setEstadoEquipo($e);

        if($num!=0){
            header('location: ../views/Tecnico.Equipos.lista.views.php');
        }else{
            header('Location: ../views/error.php');
        }
    break;
}
?>
