<?php

class Sesion{
    
    private $id;
    private $password;
    
    function Sesion($identificador,$contrasena){
        $this->id=$identificador;
        $this->password=$contrasena;
        
    }
    
    function setId($id){
        $this->id=$id;
    }
    
    function  getID(){
        return $this->id;
    }
    
    function  setPasword($pas){
        $this->password=$pas;
    }
    function  getPasword(){
        return $this->password;
    }
    
}

