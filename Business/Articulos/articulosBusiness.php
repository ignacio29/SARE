<?php
include '../../Data/Articulos/articulosData.php';

class articulosBusiness {

    public $articulosData;

    function articulosBusiness() {
        $this->articulosData = new articulosData();
    }

    public function insertarTBArticulos($nombre,$serie,$tipo,$descripcion,$estado,$propietario,$tipoArticulo,$aprobacion) {
        return $this->articulosData->insertTBArticulos($nombre,$serie,$tipo,$descripcion,$estado,$propietario,$tipoArticulo,$aprobacion);
    }

    public function consultarTBArticulos($propietario) {
        return $this->articulosData->consultTBArticulos($propietario);
    }

    public function buscarPalabra($palabra) {
        return $this->articulosData->buscarPalabra($palabra);
    }

    public function buscarPalabraP($palabra) {
        return $this->articulosData->buscarPalabraP($palabra);
    }

    public function buscarPalabraEs($palabra,$cedula) {
        return $this->articulosData->buscarPalabraEs($palabra,$cedula);
    }


    public function aprobarArticulo($palabra) {
        return $this->articulosData->aprobarArticulo($palabra);
    }

    public function consultarTBArticulosInstitucionales() {
        return $this->articulosData->consultTBArticulosInstitucionales();
    }

    public function consultarTBArticulosPersonales() {
        return $this->articulosData->consultTBArticulosPersonales();
    }

    public function eliminarTBArticulos($idarticulo) {
        return $this->articulosData->deleteTBArticulos($idarticulo);
    }

    public function consultarTBArticuloId($id) {
        return $this->articulosData->consultTBArticuloId($id);
    }

    public function actualizarTBArticulos($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado) {
        return $this->articulosData->updateTBArticulos($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado);
    }

    public function actualizarTBArticulosInstitucionales($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado,$aprobar) {
        return $this->articulosData->updateTBArticulosInstitucionales($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado,$aprobar);
    }

    public function actualizarTBArticulosPersonales($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado,$aprobar) {
        return $this->articulosData->updateTBArticulosPersonales($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado,$aprobar);
    }

    public function consultarPorTipoArticulo($tipoArticulo,$propietario) {
        return $this->articulosData->consultarPorTipoArticulo($tipoArticulo,$propietario);
    }

    public function consultarPorTipoArticuloInstitucional($tipoArticulo) {
        return $this->articulosData->consultarPorTipoArticuloInstitucional($tipoArticulo);
    }

    public function consultarPorEstadoArticulo($estadoArticulo,$propietario) {
        return $this->articulosData->consultarPorEstadoArticulo($estadoArticulo,$propietario);
    }

    public function consultarPorEstadoArticuloInstitucional($estadoArticulo) {
        return $this->articulosData->consultarPorEstadoArticuloInstitucional($estadoArticulo);
    }

    public function consultarPorTipoArticuloPersonal($tipoArticulo) {
        return $this->articulosData->consultarPorTipoArticuloPersonal($tipoArticulo);
    }
    public function consultarPorTipoArticuloEst($tipoArticulo,$cedula) {
        return $this->articulosData->consultarPorTipoArticuloEst($tipoArticulo,$cedula);
    }
    public function buscarAprobadosArticulosP() {
        return $this->articulosData->buscarAprobadosArticulosP();
    }


    public function consultarPorEstadoArticuloPersonal($estadoArticulo) {
        return $this->articulosData->consultarPorEstadoArticuloPersonal($estadoArticulo);
    }


    public function consultarPorEstadoArticuloEst($estadoArticulo,$cedula) {
        return $this->articulosData->consultarPorEstadoArticuloEst($estadoArticulo,$cedula);
    }

    public function reportarArticuloDanado($cedula) {
        return $this->articulosData->reportarArticuloDanado($cedula);
    }

    public function insertarArticuloDanado($idarticulo,$cedula,$descripcion,$fecha) {
        return $this->articulosData->insertarArticuloDanado($idarticulo,$cedula,$descripcion,$fecha);
    }

    public function updateEstadoArticulo($idarticulo) {
        return $this->articulosData->updateEstadoArticulo($idarticulo);
    }

    public function filtroClaseInstitucionalArticulo($clase) {
        return $this->articulosData->filtroClaseInstitucionalArticulo($clase);
    }

    public function filtroClasePersonalArticulo($cedula,$clase) {
        return $this->articulosData->filtroClasePersonalArticulo($cedula,$clase);
    }

    public function filtroTipoArticuloDeficiente($cedula,$tipo) {
        return $this->articulosData->filtroTipoArticuloDeficiente($cedula,$tipo);
    }


    public function busquedaReportarArticuloDeficiente($cedula,$palabra) {
        return $this->articulosData->busquedaReportarArticuloDeficiente($cedula,$palabra);
    }

    public function verArticulosDeficientes() {
        return $this->articulosData->verArticulosDeficientes();
    }

    public function filtroClaseArticuloDeficiente($clase) {
        return $this->articulosData->filtroClaseArticuloDeficiente($clase);
    }

    public function filtroTipoArticuloDeficienteAd($tipo) {
        return $this->articulosData->filtroTipoArticuloDeficienteAd($tipo);
    }

     public function busquedaArticulosDeficientesAd($palabra) {
        return $this->articulosData->busquedaArticulosDeficientesAd($palabra);
    }

    public function eliminarArticuloDeficiente($idBorrar) {
        return $this->articulosData->eliminarArticuloDeficiente($idBorrar);
    }

    public function updateEstadoArticuloDeficiente($idActualizar) {
        return $this->articulosData->updateEstadoArticuloDeficiente($idActualizar);
    }

    public function deleteArticuloDeficiente($idDano) {
        return $this->articulosData->deleteArticuloDeficiente($idDano);
    }

}

?>
