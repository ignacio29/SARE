<?php

include 'permisosBusiness.php';

$accion=$_POST['accion'];

//Ver Todos los mensajes segun el asunto y el rol de usuario
if($accion=='verTodosMensajes'){
  session_start();
  $permisosBusiness = new PermisoBusiness();
  $asunto=$_POST['asunto'];

  if($asunto!="queja"){
      echo $result=$permisosBusiness->verTodosMensajes($asunto);
  }else {
    if(isset($_SESSION['administrador'])){
      echo $result=$permisosBusiness->verTodosMensajes($asunto);
    }else {
      echo "SinPrivilegio";
    }
  }

}


if($accion=="ocultarMensaje"){
  $id=$_POST['id'];
  $estado=0;
  $permisosBusiness = new PermisoBusiness();
  if(isset($id)){
    echo $result=$permisosBusiness->ocultarMensaje($id,$estado);
  }else {
    echo "ErrorID";
  }
}

if($accion=="actualizarDatosMensaje"){
  $permisosBusiness = new PermisoBusiness();
  if(isset($_POST['id']) & isset($_POST['estado']) & isset($_POST['visible'])){
    $id=$_POST['id'];
    $estado=$_POST['estado'];
    $visible=$_POST['visible'];
    echo $result=$permisosBusiness->actualizarDatosMensaje($id,$estado,$visible);
  }else {
    echo "camposNulos";
  }
}

//---------------------------------REPORTES-----------------------------------------
if($accion=="reporteMensajeBucar"){
  $permisosBusiness = new PermisoBusiness();
  if(isset($_POST['cedula']) & isset($_POST['asunto'])){
    $palabra=$_POST['cedula'];
    $asunto=$_POST['asunto'];
    echo $result=$permisosBusiness->reporteMensajeBucar($palabra,$asunto);
  }else {
    echo "camposNulos";
  }

}

if($accion=="reporteMensajeEstado"){
  $permisosBusiness = new PermisoBusiness();
  if(isset($_POST['estado']) & isset($_POST['asunto'])){
    $estado=$_POST['estado'];
    $asunto=$_POST['asunto'];
    echo $result=$permisosBusiness->reporteMensajeEstado($estado,$asunto);
  }else {
    echo "camposNulos";
  }

}

if($accion=="reporteMensajeFecha"){
  $permisosBusiness = new PermisoBusiness();
  if(isset($_POST['fecha']) & isset($_POST['asunto'])){
    $fecha=$_POST['fecha'];
    $asunto=$_POST['asunto'];
    echo $result=$permisosBusiness->reporteMensajeFecha($fecha,$asunto);
  }else {
    echo "camposNulos";
  }

}

if($accion=="reporteMensajesOcultos"){
  $permisosBusiness = new PermisoBusiness();
  if(isset($_POST['asunto'])){
    $asunto=$_POST['asunto'];
    echo $result=$permisosBusiness->reporteMensajesOcultos($asunto);
  }else {
    echo "camposNulos";
  }

}


//-----------------------ESTUDIANTE---------------------------------------------
if($accion=="crearMensaje"){
  include '../../Domain/Permisos.php';
  session_start();
  $permisosBusiness = new PermisoBusiness();
  if(isset($_POST['asunto']) & isset($_POST['detalle']) & !empty($_POST['detalle'])){
    $asunto=$_POST['asunto'];
    $detalle=$_POST['detalle'];
    $mensaje= new Permiso("",$_SESSION['usuario'], $asunto,$detalle,date("Y-m-d"),"NUEVO",1);
    echo $result=$permisosBusiness->crearMensaje($mensaje);
  }else {
    echo "camposNulos";
  }

}

if($accion=="eliminarMensaje"){
  $permisosBusiness = new PermisoBusiness();
  if(isset($_POST['idMensaje'])){
    $idMensaje=$_POST['idMensaje'];
    echo $result=$permisosBusiness->eliminarMensaje($idMensaje);
  }else {
    echo "camposNulos";
  }

}

if($accion=="reporteMensajesEstudiante"){
  session_start();
  $permisosBusiness = new PermisoBusiness();
  if(isset($_POST['asunto'])){
    $asunto=$_POST['asunto'];
      echo $result=$permisosBusiness->reporteMensajesEstudiante($_SESSION['usuario'],$asunto);
  }else {
    echo "camposNulos";
  }


}

if($accion=="verMisMensajesEstudiante"){
  session_start();
  $permisosBusiness = new PermisoBusiness();
  echo $result=$permisosBusiness->verMisMensajesEstudiante($_SESSION['usuario']);
}
