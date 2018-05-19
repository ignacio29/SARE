<?php

session_start();
include 'usuariosBusiness.php';
include '../../Domain/estudiante.php';
include_once '../../Domain/Asistente.php';
include_once '../../Domain/Administrador.php';

$accion = $_POST['accion'];

if ($accion == "registrarEstudiante") {

    if (isset($_POST['cedula']) & isset($_POST['sexo']) & isset($_POST['fechaIngreso']) & isset($_POST['nombre']) & isset($_POST['primerA']) & isset($_POST['segundoA']) & isset($_POST['cabina']) & isset($_POST['carrera']) & isset($_POST['correo']) & isset($_POST['password'])) {

        $name = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $primerA = $_POST['primerA'];
        $segundoA = $_POST['segundoA'];
        $sexo = $_POST['sexo'];
        $cabina = $_POST['cabina'];
        $fechaIngreso = $_POST['fechaIngreso'];
        $carrera = $_POST['carrera'];
        $user = $_POST['correo'];
        $pass = $_POST['password'];



        if (strlen($name) > 0 && strlen($sexo) > 0 && strlen($fechaIngreso) > 0 && strlen($cedula) > 0 && strlen($primerA) > 0 && strlen($segundoA) > 0 && strlen($cabina) > 0 && strlen($carrera) > 0 && strlen($user) > 0 && strlen($pass) > 0) {
            if (isset($_SESSION['administrador'])) {
                $Estudiante = new Estudiante("", $cedula, $name, $primerA, $segundoA, $sexo, $cabina, $fechaIngreso, $carrera, "estudiante", 1, $user, $pass);
            } else {
                $Estudiante = new Estudiante("", $cedula, $name, $primerA, $segundoA, $sexo, $cabina, $fechaIngreso, $carrera, "estudiante", 0, $user, $pass);
            }
            $usuariosBusiness = new usuariosBusiness();
            $result = $usuariosBusiness->registrarEstudiante($Estudiante);



            if ($result == true) {
                echo 'true';
            }
        } else {
            //vacio
        }
    } else {

        //header("Location: ../index.php?error-error");
    }
}

if ($accion == "eliminarEstudiante") {
echo "entro 1";
    if (isset($_POST['cedula'])) {
echo "entro 1";
        $cedula = $_POST['cedula'];
        $usuariosBusiness = new usuariosBusiness();
        $result = $usuariosBusiness->eliminarEstudiante($cedula);
        if ($result == true) {
            echo 'true';
        }
    } else {
        //vacio
    }
}
if ($accion == "disponibildadCorreo") {

    if (isset($_POST['correo'])) {

        $correo = $_POST['correo'];
        $usuariosBusiness = new usuariosBusiness();
        return $result = $usuariosBusiness->verDisponibilidadCorreo($correo);

    } else {
        //vacio
    }
}



if ($accion == "eliminarAsistente") {

    if (isset($_POST['cedula'])) {

        $cedula = $_POST['cedula'];
        $usuariosBusiness = new usuariosBusiness();
        $result = $usuariosBusiness->eliminarAsistente($cedula);
        if ($result == true) {
            echo 'true';
        }
    } else {
        //vacio
    }
}


if ($accion == "registrarAsistente") {

    if (isset($_POST['cedula']) & isset($_POST['sexo']) & isset($_POST['nombre']) & isset($_POST['primerA']) & isset($_POST['segundoA']) & isset($_POST['correo']) & isset($_POST['password'])) {

        $name = $_POST['nombre'];
        $cedula = $_POST['cedula'];
        $primerA = $_POST['primerA'];
        $segundoA = $_POST['segundoA'];
        $sexo = $_POST['sexo'];
        $user = $_POST['correo'];
        $pass = $_POST['password'];



        if (strlen($name) > 0 && strlen($sexo) > 0 && strlen($cedula) > 0 && strlen($primerA) > 0 && strlen($segundoA) > 0 && strlen($user) > 0 && strlen($pass) > 0) {
            $Asistente = new Asistente("", $cedula, $name, $primerA, $segundoA, $sexo, $user, "asistente", $pass);
            $usuariosBusiness = new usuariosBusiness();
            $result = $usuariosBusiness->registrarAsistente($Asistente);
            if ($result == true) {
                echo 'true';
            }else{
                echo 'false';
            }
        } else {
          echo 'vacio';
        }
    } else {

        //header("Location: ../index.php?error-error");
    }





}
if ($accion == "verAsistente") {

    $usuariosBusiness = new usuariosBusiness();

  echo  $result = $usuariosBusiness->verAsistente();

}

if ($accion == "verEstudiante") {
  $usuario="";
  $usuariosBusiness = new usuariosBusiness();

if(isset($_SESSION['administrador'])){
$usuario="administrador";
    $result = $usuariosBusiness->verEstudiante($usuario);
}else{
      $result = $usuariosBusiness->verEstudiante($usuario);
}





  echo $result;
}
if ($accion == "verProvinciaAsistente") {

  $pro=$_POST['provinvia'];
    $usuariosBusiness = new usuariosBusiness();
  $result = $usuariosBusiness->verProvinciaAsistente($pro);
  echo $result;
}
if ($accion == "verProvinciaEstudiante") {
$usuario="";
  $pro=$_POST['provinvia'];

  $usuariosBusiness = new usuariosBusiness();
  if(isset($_SESSION['administrador'])){
  $usuario="administrador";

      $result = $usuariosBusiness->verProvinciaEstudiante($pro,$usuario);
  }else{
      $result = $usuariosBusiness->verProvinciaEstudiante($pro,$usuario);
  }


  echo $result;
}
if ($accion == "verSexoAsistente") {

  $sex=$_POST['sexo'];
    $usuariosBusiness = new usuariosBusiness();
  $result = $usuariosBusiness->verSexoAsistente($sex);
  echo $result;
}
if ($accion == "verSexoEstudiante") {
$usuario="";
  $sex=$_POST['sexo'];
    $usuariosBusiness = new usuariosBusiness();

    if(isset($_SESSION['administrador'])){
    $usuario="administrador";

        $result = $usuariosBusiness->verSexoEstudiante($sex,$usuario);
    }else{
        $result = $usuariosBusiness->verSexoEstudiante($sex,$usuario);
    }


  echo $result;
}
if ($accion == "verbusquedaAsistente") {

  $search=$_POST['buscar'];
    $usuariosBusiness = new usuariosBusiness();
  $result = $usuariosBusiness->verBusqAsistente($search);
  echo $result;
}
if ($accion == "verbusquedaEstudiante") {

  $search=$_POST['buscar'];

  $usuario="";
    $usuariosBusiness = new usuariosBusiness();


    if(isset($_SESSION['administrador'])){
    $usuario="administrador";

          $result = $usuariosBusiness->verBusqEstudiante($search,$usuario);
    }else{
        $result = $usuariosBusiness->verBusqEstudiante($search,$usuario);
    }

  echo $result;
}
if ($accion == "verOrdenarNombreAsistente") {

  $search=$_POST['buscar'];
    $usuariosBusiness = new usuariosBusiness();
  $result = $usuariosBusiness->verORdNomAsistente($search);
  echo $result;
}
if ($accion == "verOrdenarNombreEstudiante") {
$usuario="";
  $search=$_POST['buscar'];

  $usuariosBusiness = new usuariosBusiness();


  if(isset($_SESSION['administrador'])){
  $usuario="administrador";
$result = $usuariosBusiness->verORdNomEstudiante($search,$usuario);
}else{
$result = $usuariosBusiness->verORdNomEstudiante($search,$usuario);
  }


  echo $result;
}
if ($accion == "verOrdenarApellidoAsistente") {

  $search=$_POST['buscar'];
    $usuariosBusiness = new usuariosBusiness();
  $result = $usuariosBusiness->verORdApeAsistente($search);
  echo $result;
}
if ($accion == "verOrdenarApellidoEstudiante") {
$usuario="";
  $usuariosBusiness = new usuariosBusiness();
  $search=$_POST['buscar'];
  if(isset($_SESSION['administrador'])){
  $usuario="administrador";

  $result = $usuariosBusiness->verORdApeEstudiante($search,$usuario);
}else{
    $result = $usuariosBusiness->verORdApeEstudiante($search,$usuario);
}
  echo $result;
}
if ($accion == "verOrdenarCarreraEstudiante") {
$usuario="";
  $search=$_POST['buscar'];
    $usuariosBusiness = new usuariosBusiness();
    if(isset($_SESSION['administrador'])){
    $usuario="administrador";
  $result = $usuariosBusiness->verORdCarreEstudiante($search,$usuario);}
  else{
      $result = $usuariosBusiness->verORdCarreEstudiante($search,$usuario);}

  echo $result;
}
if ($accion == "verOrdenarAcesoEstudiante") {
$usuario="";
  $search=$_POST['buscar'];
    $usuariosBusiness = new usuariosBusiness();
    if(isset($_SESSION['administrador'])){
    $usuario="administrador";
  $result = $usuariosBusiness->verORdAcceEstudiante($search,$usuario);}
  else{
      $result = $usuariosBusiness->verORdAcceEstudiante($search,$usuario);
  }
  echo $result;
}
if ($accion == "verOrdenarAnioEstudiante") {

  $search=$_POST['buscar'];
    $usuariosBusiness = new usuariosBusiness();
    $usuario="";
    if(isset($_SESSION['administrador'])){
    $usuario="administrador";
  $result = $usuariosBusiness->verORdAniEstudiante($search,$usuario);}
  else{
      $result = $usuariosBusiness->verORdAniEstudiante($search,$usuario);
  }
  echo $result;
}
if($accion=="actualizarEstudianteAdministrador"){
  echo "entro al actualizar Estudiante";
  if (isset($_POST['cedula']) & isset($_POST['sexo']) & isset($_POST['nombre']) & isset($_POST['primerA']) & isset($_POST['segundoA']) & isset($_POST['cabina']) & isset($_POST['carrera']) & isset($_POST['fechaIngreso'])  & isset($_POST['acceso']) ) {
echo "todo no nulo";
      $name = $_POST['nombre'];
      $cedula = $_POST['cedula'];
      $primerA = $_POST['primerA'];
      $segundoA = $_POST['segundoA'];
      $sexo = $_POST['sexo'];
      $cabina = $_POST['cabina'];
      $carrera = $_POST['carrera'];
      $fecha= $_POST['fechaIngreso'];
      $acces=$_POST['acceso'];



      if (strlen($name) > 0 && strlen($sexo) > 0 && strlen($cedula) > 0 && strlen($primerA) > 0 && strlen($segundoA) > 0 && strlen($carrera) > 0 && strlen($fecha) > 0) {
          $Estudiante = new Estudiante("", $cedula, $name, $primerA, $segundoA, $sexo,$cabina, $fecha,$carrera, "estudiante", $acces,"","");
          $usuariosBusiness = new usuariosBusiness();
          $result = $usuariosBusiness->updateEstudiante($Estudiante);
          if ($result == true) {
              echo 'true';
          }else{
              echo 'false';
          }
      } else {
        echo 'vacio';
      }
  } else {

      //header("Location: ../index.php?error-error");
  }



}
if($accion=="actualizarAdministrador"){

  if (isset($_POST['cedulaN'])  & isset($_POST['nombre']) & isset($_POST['primerA']) & isset($_POST['segundoA']) ) {

      $name = $_POST['nombre'];
      $cedulaN = $_POST['cedulaN'];
      $primerA = $_POST['primerA'];
      $segundoA = $_POST['segundoA'];



      if (strlen($name) > 0  && strlen($cedulaN) > 0 && strlen($primerA) > 0 && strlen($segundoA) > 0 ) {
          $Administrador = new Administrador("", $cedulaN, $name, $primerA,$segundoA);
          $usuariosBusiness = new usuariosBusiness();
          $result = $usuariosBusiness->updateAdministrador($Administrador);
          if ($result == true) {
              echo 'true';
          }else{
              echo 'false';
          }
      } else {
        echo 'vacio';
      }
  } else {

      //header("Location: ../index.php?error-error");
  }



}
if($accion=="actualizarAsistenteAdministrador"){
  echo "entro al actualizar asistente";
  if (isset($_POST['cedula']) & isset($_POST['sexo']) & isset($_POST['nombre']) & isset($_POST['primerA']) & isset($_POST['segundoA'])  ) {
echo "todo no nulo";
      $name = $_POST['nombre'];
      $cedula = $_POST['cedula'];
      $primerA = $_POST['primerA'];
      $segundoA = $_POST['segundoA'];
      $sexo = $_POST['sexo'];




      if (strlen($name) > 0 && strlen($sexo) > 0 && strlen($cedula) > 0 && strlen($primerA) > 0 && strlen($segundoA) > 0 ) {
          $Estudiante = new Asistente("", $cedula, $name, $primerA, $segundoA, $sexo,"","asistente","");
          $usuariosBusiness = new usuariosBusiness();
          $result = $usuariosBusiness->updateAsistente($Estudiante);
          if ($result == true) {
              echo 'true';
          }else{
              echo 'false';
          }
      } else {
        echo 'vacio';
      }
  } else {

      //header("Location: ../index.php?error-error");
  }



}

if($accion=="cargarPerfil"){

  if (isset($_POST['valor'])&&isset($_POST['tipo'])){

      $cedula=$_POST['valor'];
      $rol=$_POST['tipo'];



      if (strlen($cedula) > 0 && strlen($rol) > 0  ) {

          $usuariosBusiness = new usuariosBusiness();
          $result = $usuariosBusiness->CargarPerfil($cedula,$rol);
          if ($result == true) {
              echo $result;
          }else{
              echo 'false';
          }
      } else {
        echo 'vacio';
      }
  } else {

      //header("Location: ../index.php?error-error");
  }



}

if($accion="verDatosReporte"){
  $rol = "";
    $usuariosBusiness = new usuariosBusiness();
     if (isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador') {
       $rol=$_SESSION['administrador'];
    }else if(isset($_SESSION['asistente']) && $_SESSION['asistente'] == 'asistente'){
       $rol=$_SESSION['asistente'];
    }else if(isset($_SESSION['estudiante']) && $_SESSION['estudiante'] == 'estudiante'){
       $rol=$_SESSION['estudiante'];
    }
    echo $result = $usuariosBusiness->verDatosReporte($_SESSION['usuario'],$rol);
  } 
?>
