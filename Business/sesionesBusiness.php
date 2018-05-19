<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../Data/sesionData.php';
class sesionesBusiness{
    
    private $sesionData=null;
    public function sesionesBusiness(){
        $this->sesionData= new SesionesData();
    }
     public function validarSesion($sesion){
         return $this->sesionData->validarSesion($sesion);
     }
    
}


