<?php
require_once 'data.php';
class administradorData {

    private $data;

    function administradorData() {  
        $this->data = new Data();
    }

    function updateTBAdministrador($Administrador) {
        $id = $Administrador->getIdAdministrador();
        $cedula = $Administrador->getIdAdministrador();
        $nombre = $Administrador->getNombreAdministrador();
        $primerApellido = $Administrador->getPrimerApellidoAdministrador();
        $segundoApellido = $Administrador->getSegundoApellidoAdministrador();


        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $statement = $conn->prepare("CALL updateAdministrador(?,?,?,?,?)");
        $statement->bind_param("sssis", $cedula, $nombre, $primerApellido, $id, $segundoApellido);
        $statement->execute();
        $statement->close();
        $conn->close();
    }

    function consultTBAdministrador($cedAdministrador) {
        require_once '../Domain/Administrador.php';

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $Administrador = array();

        if (!$conn) {
            echo 'Error de conexion';
        }

        $result = $conn->query("CALL consultAdministrador('$cedAdministrador')");

        if ($result) {
            while ($row = $result->fetch_assoc()) {

                array_push($Administrador, new Administrador($row['idadministrador'], $row['cedulaadministrador'], $row['nombreadministrador'], $row['primerapellidoadministrador'], $row['segundoapellidoadministrador']));

            }
        } else {
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $Administrador;
    }

}
