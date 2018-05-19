<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HorarioEstudiante
 *
 * @author prueba
 */
class HorarioEstudiante {
    private $idHorario;
    private $diaHorario;
    private $horaFinalHorario;
    private $horaInicioHorario;
    private $descripcionHorario;

    function HorarioEstudiante($idHorario,$diaHorario, $horaInicioHorario,$horaFinalHorario,$descripcionHorario) {
        $this->idHorario = $idHorario;
        $this->diaHorario = $diaHorario;
        $this->horaFinalHorario = $horaFinalHorario;
        $this->horaInicioHorario = $horaInicioHorario;
        $this->descripcionHorario = $descripcionHorario;
    }

    function getIdHorario() {
        return $this->idHorario;
    }

    
    function setIdHorario($idHorario) {
        $this->idHorario = $idHorario;
    }

        function getDiaHorario() {
        return $this->diaHorario;
    }

        function getHoraFinalHorario() {
        return $this->horaFinalHorario;
    }

    function getHoraInicioHorario() {
        return $this->horaInicioHorario;
    }


    function setDiaHorario($diaHorario) {
        $this->diaHorario = $diaHorario;
    }

    function setHoraFinalHorario($horaFinalHorario) {
        $this->horaFinalHorario = $horaFinalHorario;
    }

    function setHoraInicioHorario($horaInicioHorario) {
        $this->horaInicioHorario = $horaInicioHorario;
    }
    
    function getDescripcionHorario() {
        return $this->descripcionHorario;
    }
    
    function setDescripcionHorario($descripcionHorario){
        $this->descripcionHorario = $descripcionHorario;
    }
    
}
?>