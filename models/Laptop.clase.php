<?php
require_once '../models/Equipo.clase.php';
class Laptop extends Equipo{
    private $marca;
    private $color;
    private $cargador;
    private $bateria;

    public function __construct(){

    }
    public function setMarca($marca){
        $this->marca=$marca;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function setColor($color){
        $this->color=$color;
    }
    public function getColor(){
        return $this->color;
    }
    public function setCargador($cargador){
        $this->cargador=$cargador;
    }
    public function getCargador(){
        return $this->cargador;
    }
    public function setBateria($bateria){
        $this->bateria=$bateria;
    }
    public function getBateria(){
        return $this->bateria;
    }
}

?>