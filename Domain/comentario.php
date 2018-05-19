<?php

class comentarioAviso {

    private $idcomentario;
    private $idaviso;
    private $creador;
    private $mensajecomentario;

    function comentarioAviso($idcomentario, $idaviso, $creador, $mensajecomentario) {
        $this->idcomentario = $idcomentario;
        $this->idaviso = $idaviso;
        $this->creador = $creador;
        $this->mensajecomentario = $mensajecomentario;
    }

    public function getIdComentario() {
        return $this->idcomentario;
    }

    public function getIdAviso() {
        return $this->idaviso;
    }

    public function getCreador() {
        return $this->creador;
    }

    public function getMensaje() {
        return $this->mensajecomentario;
    }

}

?>
