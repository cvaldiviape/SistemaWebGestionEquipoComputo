<?php
class OrdenTrabajo{
    private $id;
    private $fecha;
    private $empleado1;
    private $cliente2;
    private $lista_equipo2;
    
    public function __construct(){
        $this->lista_equipo2= array();
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
    public function setMotivo($motivo){
        $this->motivo=$motivo;
    }
    public function getMotivo(){
        return $this->motivo;
    }
    public function setEmpleado($empleado1){
        $this->empleado1=$empleado1;
    }
    public function getEmpleado(){
        return $this->empleado1;
    }
    public function setCliente($cliente2){
        $this->cliente2=$cliente2;
    }
    public function getCliente(){
        return $this->cliente2;
    }
    public function setlistaEquipoOrden($x){
        array_push($this->lista_equipo2, $x);
    }
    public function getlistaEquipoOrden(){
        return $this->lista_equipo2;
    }    
}
?>