<?php
class Diagnostico{
    private $id;
    private $descripcion;
    private $fecha;
    private $equipo1;

    public function __construct(){
        
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
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function getFecha(){
        return $this->fecha;
    } 
    public function setEquipo($equipo1){
        $this->equipo1=$equipo1;
    }
    public function getEquipo(){
        return $this->equipo1;
    } 
}
?>