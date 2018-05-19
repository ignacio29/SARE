 <?php


require_once 'administradorBusiness.php';
include_once '../../Domain/Administrador.php';

$actionAdministrador = $_POST['accionAdministrador'];
session_start();

$administradorBusiness = new administradorBusiness();
if ($actionAdministrador == "consultarAdministrador") {
    $cedula = $_SESSION['usuario'];
    if (isset($cedula)) {
        echo $administradorBusiness->consultTBAdministrador($cedula);
    } else {
        echo "Error";
    }
} else if ($actionAdministrador == "actualizarAdministrador") {
    $cedula = $_SESSION['usuario'];
    $nombreAdministrador = $_POST['nombre'];
    $primerApellidoAdministrador = $_POST['primerapellido'];
    $segundoApellidoAdministrador = $_POST['segundoapellido'];
    $idAdministradorModificar = $_POST['idadministrador'];



    if (isset($cedula)&& isset($nombreAdministrador) && isset($primerApellidoAdministrador) && isset($segundoApellidoAdministrador)) {
        $administradorData = new administradorData();

       
            $administrador = new Administrador($idAdministradorModificar,$cedula, $nombre, $primerApellidoAdministrador, $segundoApellidoAdministrador);
            echo $administradorBusiness->updateTBAdministrador($administrador);
            

    } else {
        echo $idAdministradorModificar . "--" . $nombre . "--" . $primerApellidoAdministrador . "--" . $segundoApellidoAdministrador . "--" . "false";
        //echo "Error";
    }
}
?>