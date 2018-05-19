<?php
include 'reporteHorariosBusiness.php';
$accion = $_POST['accion'];


if ($accion == "verReporteHorarioClases") {
    $reportesBusiness = new ReporteHorariosBusiness();
    echo $result = $reportesBusiness->verReporteHorarioClases();
}

if ($accion == "reportarHorarioEstuPalabra") {
    if (isset($_POST['cedula'])) {
        $palabra = $_POST['cedula'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->reportarHorarioEstuPalabra($palabra);
    } else {
        //vacio
    }
}

if ($accion == "reporteHorariosClasesCarrera") {
    if (isset($_POST['carrera'])) {
        $carrera = $_POST['carrera'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->reporteHorariosClasesCarrera($carrera);
    } else {
        //vacio
    }
}

//------------------------PARRA------------------------
  //--------------------------limpieza------------------------
if ($accion == "verReporteHorarioLimpieza") {
  session_start();
  $rol="";
  if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
    $rol= $_SESSION['administrador'];
  }
    $reportesBusiness = new ReporteHorariosBusiness();
    echo $result = $reportesBusiness->verReporteHorarioLimpieza($rol);
}


if ($accion == "palabraBuscaLimpieza") {
  session_start();
  $rol="";
  if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
    $rol= $_SESSION['administrador'];
  }

    if (isset($_POST['cedula'])) {
        $palabra = $_POST['cedula'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->palabraBuscaLimpieza($palabra,$rol);
    } else {
        //vacio
    }
}

if ($accion == "reporteHorarioLimpiezaAreas") {
  session_start();
  $rol="";
  if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
    $rol= $_SESSION['administrador'];
  }
    if (isset($_POST['area'])) {
        $area = $_POST['area'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->reporteHorarioLimpiezaAreas($area,$rol);
    } else {
        //vacio
    }
}

if ($accion == "reporteHorarioLimpiezaDias") {
  session_start();
  $rol="";
  if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
    $rol= $_SESSION['administrador'];
  }
    if (isset($_POST['dias'])) {
        $dia = $_POST['dias'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->reporteHorarioLimpiezaDias($dia,$rol);
    } else {
        //vacio
    }
}

if ($accion == "reporteHorarioLimpiezaJornadas") {
  session_start();
  $rol="";
  if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
    $rol= $_SESSION['administrador'];
  }
    if (isset($_POST['jornadas'])) {
        $jornada = $_POST['jornadas'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->reporteHorarioLimpiezaJornadas($jornada,$rol);
    } else {
        //vacio
    }
}

if ($accion == "verReporteHorarioLavanderia") {
    session_start();
    $rol="";
    if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
      $rol= $_SESSION['administrador'];
    }
    $reportesBusiness = new ReporteHorariosBusiness();
    echo $result = $reportesBusiness->verReporteHorarioLavanderia($rol);
}

if ($accion == "palabraBuscaLavanderia") {
    session_start();
    $rol="";
    if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
      $rol= $_SESSION['administrador'];
    }
    if (isset($_POST['cedula'])) {
        $palabla = $_POST['cedula'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->palabraBuscaLavanderia($palabla,$rol);
    } else {
        //vacio
    }
}

if ($accion == "reporteHorarioLavanderiaDias") {
    session_start();
    $rol="";
    if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
      $rol= $_SESSION['administrador'];
    }
    if (isset($_POST['dias'])) {
        $dia = $_POST['dias'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->reporteHorarioLavanderiaDias($dia,$rol);
    } else {
        //vacio
    }
}

if ($accion == "reporteHorarioLavanderiaJornadas") {
    session_start();
    $rol="";
    if(isset($_SESSION['administrador']) & $_SESSION['administrador'] == 'administrador' ){
      $rol= $_SESSION['administrador'];
    }
    if (isset($_POST['jornadas'])) {
        $jornada = $_POST['jornadas'];
        $reportesBusiness = new ReporteHorariosBusiness();
        echo $result = $reportesBusiness->reporteHorarioLavanderiaJornadas($jornada,$rol);
    } else {
        //vacio
    }
}


 ?>
