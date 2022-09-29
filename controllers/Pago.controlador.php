<?php
require_once '../dao/Pago.dao.php';
require_once '../models/Pago.clase.php';

switch($_GET['orden']){
    case 'registrar_pago':
        $p=new Pago();
        $p->setTotal($_POST['total']);
        $p->setOrdenTrabajo($_POST['id_ot']);

        $num=PagoDAO::setRegistrarPago($p);

        if($num!=0){
            header('Location: ../views/OrdenTrabajo.lista.views.php');
        }else{
            header('Location: ../views/error.php');
        }
    break;
}
?>