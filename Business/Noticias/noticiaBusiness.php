<?php

include '../../Data/noticiaData.php';

class NoticiaBusiness {

    private $noticiaData;

    function NoticiaBusiness() {
        $this->noticiaData = new NoticiaData();
    }

    public function insertarNoticia($noticia) {
        return $this->noticiaData->insertarNoticia($noticia);
    }

    public function mostrarTodasNoticias() {
        return $this->noticiaData->mostrarTodasNoticias();
    }

    function actualizarAviso($aviso) {
        return $this->noticiaData->actualizarAviso($aviso);
    }

    public function mostrarComentarioAviso($aviso) {
        return $this->noticiaData->mostrarComentarioAviso($aviso);
    }

    public function insertarComentario($comentario) {
        return $this->noticiaData->insertarComentario($comentario);
    }

    function mostrarMisAvisos($creador) {
        return $this->noticiaData->mostrarMisAvisos($creador);
    }

    function getIndiceImagen($creador) {
        return $this->noticiaData->getIndiceImagen($creador);
    }
    function eliminarNoticia($idNoticia) {
        return $this->noticiaData->eliminarNoticia($idNoticia);
    }


    function verMisNoticias($id) {
        return $this->noticiaData->verMisNoticias($id);
    }
    function verMisNoticiasReporte($id) {
        return $this->noticiaData->verMisNoticiasReporte($id);
    }

    function palabraBuscadaNoticia($palabra,$idCreador) {
        return $this->noticiaData->palabraBuscadaNoticia($palabra,$idCreador);
    }

    function buscarFehaNoticia($fecha,$idCreador) {
        return $this->noticiaData->buscarFehaNoticia($fecha,$idCreador);
    }
    function buscarFechaNoticiaReporte($fecha,$idCreador) {
        return $this->noticiaData->buscarFechaNoticiaReporte($fecha,$idCreador);
    }
    function consultarNoticiaResidencial($idNoticia){
        return $this->noticiaData-> consultarNoticiaResidencial($idNoticia);
    }


    function consultarCreadorNoticiaAdm($cedulaCreador){
        return $this->noticiaData-> consultarCreadorNoticiaAdm($cedulaCreador);
    }

    function consultarCreadorNoticiaAsi($cedulaCreador){
        return $this->noticiaData-> consultarCreadorNoticiaAsi($cedulaCreador);
    }
 
}

?>
