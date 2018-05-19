<?php

require_once 'horarioBusiness.php';
include_once '../../Domain/HorarioEstudiante.php';

$actionHorario = $_POST['accionHorario'];
session_start();

$horarioBusiness = new horarioBusiness();


if ($actionHorario == "asignarHorario") {
   $cedula = $_SESSION['usuario'];
    $estudianteId = $horarioBusiness->getIdEstudiante($cedula);
    if (isset($estudianteId)) {

         $result = $horarioBusiness->asignarHorarioLimpieza($estudianteId, $cedula);

         if($result==1){
                if (isset($estudianteId)) {
                     
                     $result2 =  $horarioBusiness->asignarHorarioLavanderia($estudianteId, $cedula);

                     if($result2==1){

                      echo $result3 =  $horarioBusiness->updateConfirmarHorario($cedula);

                     }

                } else {
                    echo "Error";
                }
         }

    } else {
        echo "Error";
    }
}




if ($actionHorario == "insertarHorario") {

    $cedula = $_SESSION['usuario'];
    $estudianteId = $horarioBusiness->getIdEstudiante($cedula);
    $horarioDia = $_POST['diahorario'];
    $horarioHoraInicio = $_POST['horainicio'];
    $horarioHoraSalida = $_POST['horasalida'];
    $curso = $_POST['curso'];
    $profesor = $_POST['profesor'];
    


    if (isset($horarioDia) && !empty($horarioDia) && isset($horarioHoraInicio) && !empty($horarioHoraInicio) && isset($horarioHoraSalida) && !empty($horarioHoraSalida) && isset($curso) && !empty($curso) && isset($profesor) && !empty($profesor)) {
        $descripcion = $curso . '-' . $profesor;
        $horarioData = new horarioData();
         $existe = $horarioData->verificarHorarioRegistrar($cedula, $horarioDia, $horarioHoraInicio, $horarioHoraSalida);
        if ($existe == 0) {
            $horario = new HorarioEstudiante($estudianteId, $horarioDia, $horarioHoraInicio, $horarioHoraSalida, $descripcion);
          echo  $horarioBusiness->insertarTBHorario($horario);
        } else {
            echo 'Error ya existe un horario con esos datos';
        }
    } else {
        echo "Campos Vacios";
    }
} else if ($actionHorario == "actualizarHorario") {
    $cedula = $_SESSION['usuario'];
    $horarioDia = $_POST['diahorario'];
    $horarioHoraInicio = $_POST['horaInicio'];
    $horarioHoraSalida = $_POST['horaSalida'];
    $cusrso = $_POST['curso'];
    $profesor = $_POST['profesor'];
    $descripcion = $cusrso . '-' . $profesor;
    $idHorarioModificar = $_POST['idhorario'];



    if (isset($horarioDia) && isset($horarioHoraInicio) && isset($horarioHoraSalida) && isset($descripcion)) {
        $horarioData = new horarioData();
        $existe = $horarioData->verificarHorarioModificar($cedula, $horarioDia, $horarioHoraInicio, $horarioHoraSalida,$idHorarioModificar);
        if ($existe == 0) {
            $horario = new HorarioEstudiante($idHorarioModificar, $horarioDia, $horarioHoraInicio, $horarioHoraSalida, $descripcion);
              $horarioBusiness->actualizarTBHorario($horario);
            //echo $idHorarioModificar."--".$horarioDia."--".$horarioHoraInicioFinal."--".$horarioHoraSalidaFinal."--".'true';
        } else {
            echo 'Error ya existe un horario con esos datos';
        }
    } else {
        //echo $idHorarioModificar . "--" . $horarioDia . "--" . $horarioHoraInicioFinal . "--" . $horarioHoraSalidaFinal . "--" . "false";
        //echo "Error";
    }
} else if ($actionHorario == "eliminarHorario") {
    if (isset($_POST['idborrar'])) {
         $horarioId = $_POST['idborrar'];
         echo $horarioBusiness->eliminarTBHorario($horarioId);
    }
}

if ($actionHorario == "consultTBHhorario") {
  
    $horarioBusiness =  new horarioBusiness();

  echo  $result = $horarioBusiness->consultTBHhorario( $_SESSION['usuario']);

}

if ($actionHorario == "consultTBHhorarioLimpieza") {
    $cedula = $_SESSION['usuario'];
    $estudianteId = $horarioBusiness->getIdEstudiante($cedula);
    $horarioBusiness =  new horarioBusiness();

  echo  $result = $horarioBusiness->consultTBHhorarioLimpieza($estudianteId);

}

if ($actionHorario == "consultTBHhorarioLavanderia") {
    $cedula = $_SESSION['usuario'];
    $estudianteId = $horarioBusiness->getIdEstudiante($cedula);
    $horarioBusiness =  new horarioBusiness();

  echo  $result = $horarioBusiness->consultTBHhorarioLavanderia($estudianteId);

}

///////////////////////////////////////////HORARIO CONFIRMADO//////////////////////////////
if ($actionHorario == "getIdConfirmarHorario") {
    $cedula = $_SESSION['usuario'];
    $horarioBusiness =  new horarioBusiness();

  echo  $result = $horarioBusiness->getIdConfirmarHorario($cedula);

}
///////////////////////////////METODO PARA EL BOTON CONFIRMAR//////////////////////////////
if ($actionHorario == "mostrarBotonConfirmar") {
    $cedula = $_SESSION['usuario'];
    $horarioBusiness =  new horarioBusiness();

  echo  $result = $horarioBusiness->mostrarBotonConfirmar($cedula);

}
//------------------------PARRA------------------------

  //-------------------reasignar horario de LAVANDERIA------------------------
  if ($actionHorario == "ReasignarHorarioLavanderia") {
    if(isset($_POST['cedula']) && isset($_POST['dia']) && isset($_POST['jornada'])){
      $cedula = $_POST['cedula'];
      $dia = $_POST['dia'];
      $jornada = $_POST['jornada'];
      $horarioBusiness =  new horarioBusiness();
      $idHorarioDisponibleLavanderia= $horarioBusiness->consultarHorarioLavanderia($dia,$jornada);
      $estudianteId = $horarioBusiness->getIdEstudiante($cedula);
      $result = $horarioBusiness->ReasignarHorarioLavanderia($estudianteId,$idHorarioDisponibleLavanderia);
      if($result){
      echo $result;
      }else {
        echo "Error";
      }
  }else {
    echo "ErrorCampos Nulos";
  }
  }


  //-------------------reasignar horario de LIMPIEZA------------------------
  if ($actionHorario == "ReasignarHorarioLimpieza") {
    if(isset($_POST['cedula']) && isset($_POST['dia']) && isset($_POST['jornada'])){
      $cedula = $_POST['cedula'];
      $dia = $_POST['dia'];
      $jornada = $_POST['jornada'];
      $area = $_POST['area'];
      $horarioBusiness =  new horarioBusiness();
      $idHorarioDisponibleLimpieza= $horarioBusiness->consultarHorarioLimpiezaDis($dia,$jornada);
      $estudianteId = $horarioBusiness->getIdEstudiante($cedula);
      $result = $horarioBusiness->ReasignarHorarioLimpieza($estudianteId,$idHorarioDisponibleLimpieza,$area);
      if($result){
      echo $result;
      }else {
        echo "Error";
      }
  }else {
    echo "ErrorCampos Nulos";
  }
  }
