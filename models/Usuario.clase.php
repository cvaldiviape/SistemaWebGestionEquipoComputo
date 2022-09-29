<?php
class Usuario{
    protected $id;
    protected $username;
    protected $pass;

    public function __construct(){
    
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setUsername($username){
        $this->username=$username;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setPass($pass){
        $this->pass=$pass;
    }
    public function getPass(){
        return $this->pass;
    }
}
?>