<?php
class Permiso{
    private $idpermiso;
    private $creador;
    private $asunto;
    private $descripcion;
    private $fecha;
    private $estado;
    private $visto;
    function Permiso($idpermiso,$creador, $asunto,$descripcion,$fecha,$estado,$visto){
        $this->idpermiso=$idpermiso;
        $this->creador=$creador;
        $this->asunto=$asunto;
        $this->descripcion=$descripcion;
        $this->fecha=$fecha;
        $this->estado=$estado;
        $this->visto=$visto;
    }
    function getVisto() {
        return $this->visto;
    }

    function setVisto($visto) {
        $this->visto = $visto;
    }

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

        function getIdPermiso() {
        return $this->idpermiso;
    }

    function setIdPermiso($idpermiso) {
        $this->idpermiso = $idpermiso;
    }

    function getCreador() {
        return $this->creador;
    }

    function getAsunto() {
        return $this->asunto;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setCreador($creador) {
        $this->creador = $creador;
    }

    function setAsunto($asunto) {
        $this->asunto = $asunto;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}
?>
