<?php
class Reparacion{
    private $id;
    private $descripcion;
    private $costo;
    private $fecha;
    private $equipo4;

    public function __construct(){
        $this->equipo4=new Equipo();
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function getDescripcion(){
        return $this->descripcion;
    } 
    public function setCosto($costo){
        $this->costo=$costo;
    }
    public function getCosto(){
        return $this->costo;
    } 
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    } 
    public function setEquipo($equipo4){
        $this->equipo4=$equipo4;
    }
    public function getEquipo(){
        return $this->equipo4;
    } 
}
?>