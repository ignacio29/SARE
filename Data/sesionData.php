<?php

require_once 'data.php';

class SesionesData {

    private $data;

    function SesionesData() {
        $this->data = new Data();
    }

    public function verificarLogin($Sesion) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $us = $Sesion->getId();
        $pas = $Sesion->getPasword();


        $result = $conn->query("CALL autenticarCuenta('$us','$pas')");

        $user = array();



        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                array_push($user, $row['idlogin']);
                array_push($user, $row['userlogin']);
                array_push($user, $row['passwordlogin']);
                array_push($user, $row['rollogin']);
            }
            return $user;
        } else {
          $user=null;
            return $user;
        }

        mysqli_close($conn);
    }

    public Function recuperarEstudiante($user) {
        $usuarioF = array();
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result2 = $conn->query("CALL consultarEstudianteLogin('$user[0]')");


        if ($result2) {
            while ($row = $result2->fetch_assoc()) {

                array_push($usuarioF, $user[3]);
                array_push($usuarioF, $row['cedulaestudiante']);
            }
        }else{
          return "no acceso";
        }
        mysqli_close($conn);
        return $usuarioF;
    }

    public Function recuperarAsistente($user) {
        $usuarioF = array();
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result2 = $conn->query("CALL consultarAsistenteLogin('$user[0]')");


        if ($result2) {
            while ($row = $result2->fetch_assoc()) {

                array_push($usuarioF, $user[3]);
                array_push($usuarioF, $row['cedulaasistente']);
            }
            return $usuarioF;
        } else {
            return $usuarioF;
        }
        mysqli_close($conn);
    }

    public Function recuperarAdministrador($user) {
        $usuarioF = array();
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result2 = $conn->query("CALL consultarAdministradorLogin('$user[0]')");


        if ($result2) {
            while ($row = $result2->fetch_assoc()) {

                array_push($usuarioF, $user[3]);
                array_push($usuarioF, $row['cedulaadministrador']);
            }
            return $usuarioF;
        } else {
            return $usuarioF;
        }
        mysqli_close($conn);
    }

    public function validarSesion($Sesion) {
        $usuarioF = array();
        $user = array();

        $user = $this->verificarLogin($Sesion);

        if ($user!=null) {

            if ($user[3] == "estudiante") {
                $usuarioF = $this->recuperarEstudiante($user);

                return $usuarioF;
            } else if ($user[3] == "administrador") {

                $usuarioF = $this->recuperarAdministrador($user);
                return $usuarioF;
            } else if ($user[3] == "asistente") {
                $usuarioF = $this->recuperarAsistente($user);

                return $usuarioF;
            }
        } else {
            return $usuarioF;
        }
    }

}
