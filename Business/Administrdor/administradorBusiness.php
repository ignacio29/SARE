<?php
include '../../Data/administradorData.php';
class administradorBusiness {
       private $administradorData;

    function administradorBusiness() {
        
        $this->administradorData = new administradorData();
    }
    public function consultTBAdministrador($cedula) { 
        return $this->administradorData->consultTBAdministrador($cedula);
    }

    public function updateTBAdministrador($idAdministrador) {
        return $this->administradorData->updateTBAdministrador($idAdministrador);
    }

}
?>