<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Administrador
 *
 * @author Ignacio
 */
class Administrador {
    private $idAdministrador;
    private $cedulaAdministrador;
    private $nombreAdministrador;
    private $primerApellidoAdministrador;
    private $segundoApellidoAdministrador;

    function Administrador($idAdministrador,$cedulaAdministrador, $nombreAdministrador,$primerApellidoAdministrador,$segundoApellidoAdministrador) {
        $this->idAdministrador = $idAdministrador;
        $this->cedulaAdministrador = $cedulaAdministrador;
        $this->nombreAdministrador = $nombreAdministrador;
        $this->primerApellidoAdministrador = $primerApellidoAdministrador;
        $this->segundoApellidoAdministrador = $segundoApellidoAdministrador;
    }

    function getIdAdministrador() {
        return $this->idAdministrador;
    }


    function setIdAdministrador($idAdministrador) {
        $this->idAdministrador = $idAdministrador;
    }

    function getCedulaAdministrador() {
        return $this->cedulaAdministrador;
    }
    function setCedulaAdministrador($cedulaAdministrador) {
        $this->cedulaAdministrador = $cedulaAdministrador;
    }
    function getNombreAdministrador() {
        return $this->nombreAdministrador;
    }
    function setNombreAdministrador($nombreAdministrador) {
        $this->nombreAdministrador = $nombreAdministrador;
    }

    function getPrimerApellidoAdministrador() {
        return $this->primerApellidoAdministrador;
    }

    function setPrimerApellidoAdministrador($primerApellidoAdministrador) {
        $this->primerApellidoAdministrador = $primerApellidoAdministrador;
    }

    function setSegundoApellidoAdministrador($segundoApellidoAdministrador) {
        $this->segundoApellidoAdministrador = $segundoApellidoAdministrador;
    }

    function getSegundoApellidoAdministrador() {
        return $this->segundoApellidoAdministrador;
    }
 
}
?>
