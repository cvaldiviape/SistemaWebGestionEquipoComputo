<?php
require_once '../dao/Laptop.dao.php';
require_once '../models/OrdenTrabajo.clase.php';
require_once '../models/Laptop.clase.php';
require_once '../models/Disco.clase.php';
require_once '../models/Memoria.clase.php';

switch($_GET['orden']){
    case 'registrar_laptop';
        $o=new OrdenTrabajo();
        $o->setId($_POST['id_ot']);

        $d=new Disco();
        $d->setCapacidad($_POST['disco_capacidad']);
        $d->setTipo($_POST['disco_tipo']);
        $d->setMarca($_POST['disco_marca']);
        $d->setCategoria($_POST['disco_categoria']);

        $m=new Memoria();
        $m->setCapacidad($_POST['memoria_capacidad']);
        $m->setTipo($_POST['memoria_tipo']);

        $la=new Laptop();
        if(isset($_POST['cargador'])){
            $la->setCargador($_POST['cargador']);
        }
        else{
            $la->setCargador('0');
        }
        if(isset($_POST['bateria'])){
            $la->setBateria($_POST['bateria']);
        }
        else{
            $la->setBateria('0');
        }
        $la->setMarca($_POST['la_marca']);
        $la->setColor($_POST['la_color']);
        $la->setMotivo($_POST['motivo']);
        $la->setOrdenTrabajo($o);
        $la->setDisco($d);
        $la->setMemoria($m);
        
        $sum=LaptopDAO::setRegistrarLaptop($la);

        if($sum==4){
            header('Location: ../views/OrdenTrabajo.lista.views.php');
        }else{
            header('Location: ../views/error.php');
        }
    break;
}
?>