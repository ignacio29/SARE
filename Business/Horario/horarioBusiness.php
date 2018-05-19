<?php
include '../../Data/horarioData.php';
class horarioBusiness {

    private $horarioData;

    function horarioBusiness() {

        $this->horarioData = new horarioData();
    }

     public function getIdEstudiante($cedula){
        return $this->horarioData->getIdEstudiante($cedula);
    }
    public function getIdConfirmarHorario($cedula){
        return $this->horarioData->getIdConfirmarHorario($cedula);
    }
    public function insertarTBHorario($horario) {
        return $this->horarioData->insertTBHhorario($horario);
    }
    public function consultarHorarioLimpieza($estudianteId) {
        return $this->horarioData->consultTBHhorarioDisponibleEstudiante($estudianteId);
    }

    public function actualizarTBHorario($horario) {
        return $this->horarioData->updateTBHorario($horario);
    }

    public function eliminarTBHorario($idBorrar) {
        return $this->horarioData->deleteTBHhorario($idBorrar);
    }

    public function verficarHorarioEstudiante($cedula,$dia,$horaInicio,$horaSalida){
        return $this->horarioData->verificarHorarioEstudiante($cedula, $dia, $horaInicio, $horaSalida);
    }

    public function asignarHorarioLimpieza($estudianteId,$cedula){
        return $this->horarioData->asignarHorarioLimpieza($estudianteId,$cedula);
    }

    public function asignarHorarioLavanderia($estudianteId,$cedula){
        return $this->horarioData->asignarHorarioLavanderia($estudianteId,$cedula);
    }

     public function updateConfirmarHorario($cedula){
        return $this->horarioData->updateConfirmarHorario($cedula);
    }
    public function consultTBHhorario($cedEstudiante) {
      return  $this->horarioData->consultTBHhorario($cedEstudiante);
    }

    public function consultTBHhorarioLimpieza($idEstudiante) {
      return  $this->horarioData->consultTBHhorarioLimpieza($idEstudiante);
    }

    public function consultTBHhorarioLavanderia($idEstudiante) {
      return  $this->horarioData->consultTBHhorarioLavanderia($idEstudiante);
    }

    public function ReasignarHorarioLavanderia($estudianteId,$idHorarioDisponibleLavanderia) {
      return  $this->horarioData->ReasignarHorarioLavanderia($estudianteId,$idHorarioDisponibleLavanderia);
    }

    public function consultarHorarioLavanderia($dia,$jornada) {
      return  $this->horarioData->consultarHorarioLavanderia($dia,$jornada);
    }

    public function ReasignarHorarioLimpieza($estudianteId,$idHorarioDisponibleLimpieza,$area) {
      return  $this->horarioData->ReasignarHorarioLimpieza($estudianteId,$idHorarioDisponibleLimpieza,$area);
    }

    public function consultarHorarioLimpiezaDis($dia,$jornada) {
      return  $this->horarioData->consultarHorarioLimpiezaDis($dia,$jornada);
    }

    public function mostrarBotonConfirmar($cedula) {
      return  $this->horarioData->mostrarBotonConfirmar($cedula);
    }



}

?>
