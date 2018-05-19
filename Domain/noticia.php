<?php

class Noticia {
    private $idNoticia;
    private $creador;
    private $tema;
    private $descripcion;
    private $fotoNoticia;
    private $fechaCreacion;
    function Noticia($idNoticia,$creador,$tema, $descripcion, $fotoNoticia, $fechaCreacion) {
        $this->idNoticia = $idNoticia;
        $this->creador = $creador;
        $this->tema=$tema;
        $this->descripcion = $descripcion;
        $this->fotoNoticia = $fotoNoticia;
        $this->fechaCreacion = $fechaCreacion;
    }
    function getIdNoticia() {
        return $this->idNoticia;
    }

    function setIdNoticia($idNoticia) {
        $this->idNoticia = $idNoticia;
    }

        function getCreador() {
        return $this->creador;
    }

    function getTema() {
        return $this->tema;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFotoNoticia() {
        return $this->fotoNoticia;
    }

    function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    function setCreador($creador) {
        $this->creador = $creador;
    }

    function setTema($tema) {
        $this->tema = $tema;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFotoNoticia($fotoNoticia) {
        $this->fotoNoticia = $fotoNoticia;
    }

    function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }



}
?>

