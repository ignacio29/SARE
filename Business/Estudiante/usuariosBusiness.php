<?php

include '../../Data/usuariosData.php';

class usuariosBusiness {

    private $usuariosData = null;

    public function usuariosBusiness() {
        $this->usuariosData = new UsuariosData();
    }

    public function registrarEstudiante($Estudiante) {

        $this->usuariosData->registrarEstudiante($Estudiante);
    }

    public function registrarAsistente($Asistente) {

        $this->usuariosData->registrarAsistente($Asistente);
    }

    public function eliminarEstudiante($cedula) {

      return  $this->usuariosData->eliminarEstudiante($cedula);
    }

    public function eliminarAsistente($cedula) {

      return  $this->usuariosData->eliminarAsistente($cedula);
    }

    public function updateEstudiante($Estudiante) {

      return  $this->usuariosData->actualizarEstudianteAdministrador($Estudiante);
    }
    public function updateAdministrador($Estudiante) {

        return $this->usuariosData->actualizarAdministrador($Estudiante);
    }


    public function updateAsistente($Asistente) {

        $this->usuariosData->actualizarAsistenteAdministrador($Asistente);
    }
    public function verAsistente() {

      return  $this->usuariosData->verAsistentes();
    }
    public function verEstudiante($usuario) {

      return  $this->usuariosData->verEstudiantes($usuario);
    }
    public function verProvinciaAsistente($provincia) {

      return  $this->usuariosData->verProAsistente($provincia);
    }
    public function verProvinciaEstudiante($provincia,$rol) {

      return  $this->usuariosData->verProEstudiante($provincia,$rol);
    }
    public function verSexoAsistente($sex) {

      return  $this->usuariosData->verSexAsistente($sex);
    }
    public function verSexoEstudiante($sex,$rol) {

      return  $this->usuariosData->verSexoEstudiante($sex,$rol);
    }
    public function verBusqAsistente($ser) {

      return  $this->usuariosData->verBusquedaAsistente($ser);
    }
    public function verBusqEstudiante($ser,$usuario) {

      return  $this->usuariosData->verBusquedaEstudiante($ser,$usuario);
    }
    public function verORdNomAsistente($ser) {

      return  $this->usuariosData->verORdeNomAsistente($ser);
    }
    public function verORdNomEstudiante($ser,$usu) {

      return  $this->usuariosData->verORdeNomEstudiante($ser,$usu);
    }
    public function verORdApeAsistente($ser) {

      return  $this->usuariosData->verORdApellidoAsistente($ser);
    }
    public function verORdApeEstudiante($ser,$usuario) {

      return  $this->usuariosData->verORdApellidoEstudiante($ser,$usuario);
    }
    public function verORdCarreEstudiante($ser,$user) {

      return  $this->usuariosData->verOrdenarCarreEstudiante($ser,$user);
    }
    public function verORdAcceEstudiante($ser,$user) {

      return  $this->usuariosData->verOrdenarAccesoEstudiante($ser,$user);
    }
    public function verORdAniEstudiante($ser,$user) {

      return  $this->usuariosData->verOrdenarAnioEstudiante($ser,$user);
    }
    public function CargarPerfil($ser,$rol) {

      return  $this->usuariosData->cargarPerfilUsuario($ser,$rol);
    }
    public function verDisponibilidadCorreo($correo) {

      return  $this->usuariosData->cargarDisponibilidadCorreo($correo);
    }


    public function verDatosReporte($cedula,$rol) {

      return  $this->usuariosData->verDatosReporte($cedula,$rol);
    }


}
