<?php

class Asistente {

    private $idAsistente;
    private $cedulaAsistente;
    private $nombreAsistente;
    private $primerA;
    private $segundoA;
    private $sexo;
    private $correo;
    private $rol;
    private $contrasena;

    function Asistente($idAsistente, $cedulaAsistente, $nombreAsistente, $primerA, $segundoA, $sexo, $correo, $rol, $contrasena) {
        $this->idAsistente = $idAsistente;
        $this->cedulaAsistente = $cedulaAsistente;
        $this->nombreAsistente = $nombreAsistente;
        $this->primerA = $primerA;
        $this->segundoA = $segundoA;
        $this->sexo = $sexo;
        $this->correo = $correo;
        $this->rol = $rol;
        $this->contrasena = $contrasena;
    }
    
    function getIdAsistente() {
        return $this->idAsistente;
    }

    function getCedulaAsistente() {
        return $this->cedulaAsistente;
    }

    function getNombreAsistente() {
        return $this->nombreAsistente;
    }

    function getPrimerA() {
        return $this->primerA;
    }

    function getSegundoA() {
        return $this->segundoA;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getRol() {
        return $this->rol;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function setIdAsistente($idAsistente) {
        $this->idAsistente = $idAsistente;
    }

    function setCedulaAsistente($cedulaAsistente) {
        $this->cedulaAsistente = $cedulaAsistente;
    }

    function setNombreAsistente($nombreAsistente) {
        $this->nombreAsistente = $nombreAsistente;
    }

    function setPrimerA($primerA) {
        $this->primerA = $primerA;
    }

    function setSegundoA($segundoA) {
        $this->segundoA = $segundoA;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

}

?>
