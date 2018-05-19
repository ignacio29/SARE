<?php

class HorarioDisponibleLavanderia {
    private $idHorarioLavanderia;
    private $diaHorarioLavanderia;
    private $jornadaHorarioLavanderia;
    private $estadoHorarioLavanderia;
    private $cuposHorarioLavanderia;

    function HorarioDisponibleLavanderia($idHorarioLavanderia,$diaHorarioLavanderia, $jornadaHorarioLavanderia,$estadoHorarioLavanderia,$cuposHorarioLavanderia) {
        $this->idHorarioLavanderia = $idHorarioLavanderia;
        $this->diaHorarioLavanderia = $diaHorarioLavanderia;
        $this->jornadaHorarioLavanderia = $jornadaHorarioLavanderia;
        $this->estadoHorarioLavanderia = $estadoHorarioLavanderia;
        $this->cuposHorarioLavanderia = $cuposHorarioLavanderia;
    }

    function getidHorarioLavanderia() {
        return $this->idHorarioLavanderia;
    }

    
    function setidHorarioLavanderia($idHorarioLavanderia) {
        $this->idHorarioLavanderia = $idHorarioLavanderia;
    }

        function getdiaHorarioLavanderia() {
        return $this->diaHorarioLavanderia;
    }

        function getjornadaHorarioLavanderia() {
        return $this->jornadaHorarioLavanderia;
    }

    function getestadoHorarioLavanderia() {
        return $this->estadoHorarioLavanderia;
    }
    
    function getcuposHorarioLavanderia() {
        return $this->cuposHorarioLavanderia;
    }
    
    
}
