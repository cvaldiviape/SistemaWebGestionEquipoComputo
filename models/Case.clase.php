<?php
class Casex{
    private $id;
    private $marca;
    private $color;
    private $pc;
    
    public function __construct(){
        
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id_case;
    }
    public function setMarca($x){
        $this->marca=$x;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function setColor($y){
        $this->color=$y;
    }
    public function getColor(){
        return $this->color;
    }
    public function setPc($pc){
        $this->pc=$pc;
    }
    public function getPc(){
        return $this->pc;
    }
}
?>