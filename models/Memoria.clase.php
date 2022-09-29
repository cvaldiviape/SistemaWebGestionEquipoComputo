<?php
class Memoria{
    private $id;
    private $capacidad;
    private $tipo;
    private $equipo3;
        
    public function __construct(){
        
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setCapacidad($capacidad){
        $this->capacidad=$capacidad;
    }
    public function getCapacidad(){
        return $this->capacidad;
    }
    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setEquipo($equipo3){
        $this->equipo3=$equipo3;
    }
    public function getEquipo(){
        return $this->equipo3;
    }
}
?>