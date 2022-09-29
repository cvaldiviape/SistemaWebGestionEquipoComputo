<?php
class Pago{
    private $id;
    private $fecha;
    private $total;
    private $cliente3;
    private $lista_reparacion1;
    private $ordenTrabajo;

    public function __construct(){
        $this->lista_reparacion1= array();
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setTotal($total){
        $this->total=$total;
    }
    public function getTotal(){
        return $this->total;
    }
    public function setCliente($cliente3){
        $this->cliente3=$cliente3;
    }
    public function getCliente(){
        return $this->cliente3;
    }
    public function setListaRepracion($x){
        array_push($this->lista_reparacion1, $x);
    }
    public function getListaReparacion(){
        return $this->lista_reparacion1;
    }
    public function setOrdenTrabajo($x){
        $this->ordenTrabajo=$x;
    }
    public function getOrdenTrabajo(){
        return $this->ordenTrabajo;
    }
}
?>