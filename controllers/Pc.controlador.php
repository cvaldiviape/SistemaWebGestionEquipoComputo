<?php
require_once '../dao/Pc.dao.php';
require_once '../models/OrdenTrabajo.clase.php';
require_once '../models/Case.clase.php';
require_once '../models/Pc.clase.php';
require_once '../models/Disco.clase.php';
require_once '../models/Memoria.clase.php';

switch($_GET['orden']){
    case 'registrar_pc';
        $o=new OrdenTrabajo();
        $o->setId($_POST['id_orden_trabajo']);

        $c=new Casex();
        $c->setMarca($_POST['c_marca']);
        $c->setColor($_POST['c_color']);
        
        $d=new Disco();
        $d->setCapacidad($_POST['disco_capacidad']);
        $d->setTipo($_POST['disco_tipo']);
        $d->setMarca($_POST['disco_marca']);
        $d->setCategoria($_POST['disco_categoria']);

        $m=new Memoria();
        $m->setCapacidad($_POST['memoria_capacidad']);
        $m->setTipo($_POST['memoria_tipo']);

        $p=new Pc();
        if(isset($_POST['tarjeta_video'])){
            $p->setTarjetaVideo($_POST['tarjeta_video']);
        }
        else{
            $p->setTarjetaVideo('0');
        }
        if(isset($_POST['monitor'])){
            $p->setMonitor($_POST['monitor']);
        }
        else{
            $p->setMonitor('0');
        }
        $p->setMotivo($_POST['motivo']);
        $p->setOrdenTrabajo($o);
        $p->setCase($c);
        $p->setDisco($d);
        $p->setMemoria($m);

        $sum=PcDAO::setRegistrarPc($p);
        if($sum==5){
            header('Location: ../views/OrdenTrabajo.lista.views.php');
        }else{
            header('Location: ../views/error.php');
        }
    break;
}
?>