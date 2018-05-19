<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HorarioDisponible
 *
 * @author prueba
 */
class HorarioDisponible {
    private $idHorario;
    private $diaHorario;
    private $jornadaHorario;
    private $estadoHorario;
    private $cuposHorario;

    function HorarioDisponible($idHorario,$diaHorario, $jornadaHorario,$estadoHorario,$cuposHorario) {
        $this->idHorario = $idHorario;
        $this->diaHorario = $diaHorario;
        $this->jornadaHorario = $jornadaHorario;
        $this->estadoHorario = $estadoHorario;
        $this->cuposHorario = $cuposHorario;
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

        function getJornadaHorario() {
        return $this->jornadaHorario;
    }

    function getEstadoHorario() {
        return $this->estadoHorario;
    }
    
    function getCuposHorario() {
        return $this->cuposHorario;
    }
    
    
}
