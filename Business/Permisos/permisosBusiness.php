<?php

include '../../Data/permisosData.php';

class PermisoBusiness{
     private $permisoData;

    function PermisoBusiness() {
        $this->permisoData = new PermisoData();
    }

    public function insertarPermiso($permiso) {
        return $this->permisoData->insertarPermiso($permiso);
    }

    public function verTodosMensajes($asunto) {
        return $this->permisoData->verTodosMensajes($asunto);
    }

    public function ocultarMensaje($id,$estado) {
        return $this->permisoData->ocultarMensaje($id,$estado);
    }

    public function mostrarMisPermisos($cedEstudiante) {
        return $this->permisoData->mostrarMisPermisos($cedEstudiante);
    }
    public function actualizarDatosMensaje($id,$estado,$visible) {
        return $this->permisoData->actualizarDatosMensaje($id,$estado,$visible);

    }

    public function reporteMensajeBucar($palabra,$asunto){
      return $this->permisoData->reporteMensajeBucar($palabra,$asunto);
    }

    public function reporteMensajeEstado($estado,$asunto){
      return $this->permisoData->reporteMensajeEstado($estado,$asunto);
    }

    public function reporteMensajeFecha($fecha,$asunto){
      return $this->permisoData->reporteMensajeFecha($fecha,$asunto);
    }

    public function reporteMensajesOcultos($asunto){
        return $this->permisoData->reporteMensajesOcultos($asunto);
    }

    //-------------Estudiantes-------------
    public function  crearMensaje($mensaje){
        return $this->permisoData->crearMensaje($mensaje);
    }

    public function  reporteMensajesEstudiante($creador,$asunto){
        return $this->permisoData->reporteMensajesEstudiante($creador,$asunto);
    }

    public function  verMisMensajesEstudiante($creador){
        return $this->permisoData->verMisMensajesEstudiante($creador);
    }

    public function  eliminarMensaje($idMensaje){
        return $this->permisoData->eliminarMensaje($idMensaje);
    }


}
