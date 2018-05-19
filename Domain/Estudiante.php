<?php
class Estudiante {
    private $idEstudiante;
    private $cedulaEstudiante;
    private $nombreEstudiante;
    private $primerApellidoEstudiante;
    private $segundoApellidoEstudiante;
    private $sexo;
    private $numeroCuartoEstudiante;
    private $fechaIngreso;
    private $carreraEstudiante;
    private $rolEstudiante;
    private $idConfirmacionEstudiante;
    private $correoEstudiante;
    private $contrasena;
            
    function Estudiante($idEstudiante, $cedulaEstudiante, $nombreEstudiante, $primerApellidoEstudiante, $segundoApellidoEstudiante, $sexo, $numeroCuartoEstudiante, $fechaIngreso, $carreraEstudiante, $rolEstudiante, $idConfirmacionEstudiante, $correoEstudiante,$contrasena) {
        $this->idEstudiante = $idEstudiante;
        $this->cedulaEstudiante = $cedulaEstudiante;
        $this->nombreEstudiante = $nombreEstudiante;
        $this->primerApellidoEstudiante = $primerApellidoEstudiante;
        $this->segundoApellidoEstudiante = $segundoApellidoEstudiante;
        $this->sexo = $sexo;
        $this->numeroCuartoEstudiante = $numeroCuartoEstudiante;
        $this->fechaIngreso = $fechaIngreso;
        $this->carreraEstudiante = $carreraEstudiante;
        $this->rolEstudiante = $rolEstudiante;
        $this->idConfirmacionEstudiante = $idConfirmacionEstudiante;
        $this->correoEstudiante = $correoEstudiante;
        $this->contrasena = $contrasena;
    }
    
    function getIdEstudiante() {
        return $this->idEstudiante;
    }

    function getCedulaEstudiante() {
        return $this->cedulaEstudiante;
    }

    function getNombreEstudiante() {
        return $this->nombreEstudiante;
    }

    function getPrimerApellidoEstudiante() {
        return $this->primerApellidoEstudiante;
    }

    function getSegundoApellidoEstudiante() {
        return $this->segundoApellidoEstudiante;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getNumeroCuartoEstudiante() {
        return $this->numeroCuartoEstudiante;
    }

    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function getCarreraEstudiante() {
        return $this->carreraEstudiante;
    }

    function getRolEstudiante() {
        return $this->rolEstudiante;
    }

    function getIdConfirmacionEstudiante() {
        return $this->idConfirmacionEstudiante;
    }

    function getCorreoEstudiante() {
        return $this->correoEstudiante;
    }

    function setIdEstudiante($idEstudiante) {
        $this->idEstudiante = $idEstudiante;
    }

    function setCedulaEstudiante($cedulaEstudiante) {
        $this->cedulaEstudiante = $cedulaEstudiante;
    }

    function setNombreEstudiante($nombreEstudiante) {
        $this->nombreEstudiante = $nombreEstudiante;
    }

    function setPrimerApellidoEstudiante($primerApellidoEstudiante) {
        $this->primerApellidoEstudiante = $primerApellidoEstudiante;
    }

    function setSegundoApellidoEstudiante($segundoApellidoEstudiante) {
        $this->segundoApellidoEstudiante = $segundoApellidoEstudiante;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setNumeroCuartoEstudiante($numeroCuartoEstudiante) {
        $this->numeroCuartoEstudiante = $numeroCuartoEstudiante;
    }

    function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    function setCarreraEstudiante($carreraEstudiante) {
        $this->carreraEstudiante = $carreraEstudiante;
    }

    function setRolEstudiante($rolEstudiante) {
        $this->rolEstudiante = $rolEstudiante;
    }

    function setIdConfirmacionEstudiante($idConfirmacionEstudiante) {
        $this->idConfirmacionEstudiante = $idConfirmacionEstudiante;
    }

    function setCorreoEstudiante($correoEstudiante) {
        $this->correoEstudiante = $correoEstudiante;
    } 
    function getContrasena() {
        return $this->contrasena;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }


}
?>