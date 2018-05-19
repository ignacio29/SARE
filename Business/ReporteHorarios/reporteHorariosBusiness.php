<?php
include '../../Data/reporteHorariosData.php';
class ReporteHorariosBusiness{

  private $reporteHorariosData;

  public function ReporteHorariosBusiness() {
      $this->reporteHorariosData = new ReporteHorariosData();
  }

  public function verReporteHorarioLimpieza($rol) {
    return $this->reporteHorariosData->verReporteHorarioLimpieza($rol);
  }

  public function verReporteHorarioClases() {
    return $this->reporteHorariosData->verReporteHorarioClases();
  }


  public function verReporteHorarioLavanderia($rol) {
    return $this->reporteHorariosData->verReporteHorarioLavanderia($rol);
  }

  public function reportarHorarioEstuPalabra($palabra) {
    return $this->reporteHorariosData->reportarHorarioEstuPalabra($palabra);
  }

  public function reporteHorariosClasesCarrera($carrera) {
    return $this->reporteHorariosData->reporteHorariosClasesCarrera($carrera);
  }

  public function reporteHorarioLimpiezaCedula($cedula,$rol) {
    return $this->reporteHorariosData->reporteHorarioLimpiezaCedula($cedula,$rol);
  }

  public function reporteHorarioLavanderiaCedula($cedula,$rol) {
    return $this->reporteHorariosData->reporteHorarioLavanderiaCedula($cedula,$rol);
  }
  public function reporteHorarioLimpiezaAreas($area,$rol) {
    return $this->reporteHorariosData->reporteHorarioLimpiezaAreas($area,$rol);
  }

  public function reporteHorarioLimpiezaDias($dia,$rol) {
    return $this->reporteHorariosData->reporteHorarioLimpiezaDias($dia,$rol);
  }

  public function reporteHorarioLimpiezaJornadas($jornada,$rol) {
    return $this->reporteHorariosData->reporteHorarioLimpiezaJornadas($jornada,$rol);
  }

  public function reporteHorarioLavanderiaDias($dia,$rol) {
    return $this->reporteHorariosData->reporteHorarioLavanderiaDias($dia,$rol);
  }

  public function reporteHorarioLavanderiaJornadas($jornada,$rol) {
    return $this->reporteHorariosData->reporteHorarioLavanderiaJornadas($jornada,$rol);
  }

  public  function palabraBuscaLimpieza($palabra,$rol) {
    return  $this->reporteHorariosData->palabraBuscaLimpieza($palabra,$rol);
  }
  public  function palabraBuscaLavanderia($palabra,$rol) {
    return  $this->reporteHorariosData->palabraBuscaLavanderia($palabra,$rol);
  }
}
?>
