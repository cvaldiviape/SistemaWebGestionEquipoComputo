<?php
require_once '../models/Equipo.clase.php';
class Pc extends Equipo{
    private $tarjetaVideo;
    private $monitor;
    private $case1;

    public function __construct(){
         
    }
    public function setTarjetaVideo($tarjetaVideo){
        $this->tarjetaVideo=$tarjetaVideo;
    }
    public function getTarjetaVideo(){
        return $this->tarjetaVideo;
    }
    public function setMonitor($monitor){
        $this->monitor=$monitor;
    }
    public function getMonitor(){
        return $this->monitor;
    }
    public function setCase($a){
        $this->case1=$a;
    }
    public function getCase(){
        return $this->case1;
    }
}
?>