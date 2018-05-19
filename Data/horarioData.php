<?php

class horarioData {

    private $data;

    function __construct() {
        require_once ('data.php');
        $this->data = new Data();
    }

    function insertTBHhorario($Horario) {

        $booleano = 0;
        $horariodia = $Horario->getDiaHorario();
        $horarioHoraInicio = $Horario->getHoraInicioHorario();
        $horarioHoraSalida = $Horario->getHoraFinalHorario();
        $descripcionHorario = $Horario->getDescripcionHorario();
        $horarioEstudianteId = $Horario->getIdHorario();


        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $statement = $conn->prepare("CALL insertHorario(?,?,?,?,?)");
        $statement->bind_param("issss", $horarioEstudianteId, $horariodia, $horarioHoraInicio, $horarioHoraSalida, $descripcionHorario);
        $statement->execute();

        if ($statement == TRUE) {
            $booleano = 1;
        } else {
            echo 'no se pudo acceder';
        }
        $statement->close();
        $conn->close();

        return $booleano;
    }

    public function updateConfirmarHorario($cedula) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //   $conn_set_charset("utf8");
        $result = $conn->query("CALL updateConfirmarHorario('$cedula')");
        $conn->close();
        return $result;
    }

    public function getIdEstudiante($cedula) {
        $idEstudiante = 0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //   $conn_set_charset("utf8");
        $result = $conn->query("CALL getIdEstudiante('$cedula')");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idEstudiante = $row['idestudiante'];
            }
        }
        $conn->close();

        return $idEstudiante;
    }

    public function getIdConfirmarHorario($cedula) {
        $idConfirmar = 0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //   $conn_set_charset("utf8");
        $result = $conn->query("CALL getIdConfirmarHorario('$cedula')");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idConfirmar = $row['confirmahorarioestudiante'];
            }
        }
        $conn->close();

        return $idConfirmar;
    }

    function deleteTBHhorario($idBorrar) {
        $booleano = 0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $statement = $conn->prepare("CALL deleteHorario(?)");
        $statement->bind_param("i", $idBorrar);
        $statement->execute();
        if ($statement == true) {
            $booleano =1;
        } else {
            throw new Exception("Error al eliminar el horario");
        }
        $statement->close();
        $conn->close();
        return $booleano;
    }

    function updateTBHorario($Horario) {
        $booleano=0;
        $dia = $Horario->getDiaHorario();
        $horaInicio = $Horario->getHoraInicioHorario();
        $horaFinal = $Horario->getHoraFinalHorario();
        $descripcionHorario = $Horario->getDescripcionHorario();
        $id = $Horario->getIdHorario();

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $statement = $conn->prepare("CALL updateHorario(?,?,?,?,?)");
        $statement->bind_param("sssis", $dia, $horaInicio, $horaFinal, $id, $descripcionHorario);
        $statement->execute();
        if ($statement == TRUE) {
           echo 'exito';
            $booleano = 1;
        } else {
            echo 'no se pudo acceder';
        }
        $statement->close();
        $conn->close();
        return $booleano;
    }

    function consultTBHhorarioDisponible() {

        require_once '../../Domain/HorarioDisponible.php';

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $HorarioDisponible = array();


        $result = $conn->query("SELECT * FROM tbhorariodisponible");

        if ($result) {
            while ($row = $result->fetch_assoc()) {

                array_push($HorarioDisponible, new HorarioDisponible($row['idhorariodisponible'], $row['diadisponible'], $row['jornada'], $row['estado'], $row['cupos']));
            }
        } else {
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $HorarioDisponible;
    }

    function consultTBHhorarioDisponibleLavanderia() {

        require_once '../../Domain/HorarioDisponibleLavanderia.php';

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $HorarioDisponibleLavanderia = array();


        $result = $conn->query("SELECT * FROM tbhorariodisponiblelavanderia");

        if ($result) {
            while ($row = $result->fetch_assoc()) {

                array_push($HorarioDisponibleLavanderia, new HorarioDisponibleLavanderia($row['idhorariodisponiblelavanderia'], $row['diadisponiblelavanderia'], $row['jornadalavanderia'], $row['estadolavanderia'], $row['cuposlavanderia']));
            }
        } else {
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $HorarioDisponibleLavanderia;
    }


    ///////////////////////////MOSTRAR EL BOTON CONFIRMAR///////////////////////////////////////
    public function mostrarBotonConfirmar($cedula){
        $booleano = 0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $result = $conn->query("CALL mostrarBotonConfirmar('$cedula')");

        if (mysqli_num_rows($result) > 0) {
            $booleano = 1;
        }
        mysqli_close($conn);
        return $booleano;
    }

    function consultTBHhorario($cedEstudiante) {


        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $Horarios ="";

        $result = $conn->query("CALL consultHorario(".$cedEstudiante.")");
            if ($result) {

                  while ($row = $result->fetch_assoc()) {

                      $Horarios=$Horarios."<tr>";
                      $Horarios=$Horarios.'<td id=diahorario'.$row['idhorario'].'>'.$row['diahorario']."</td>";
                      $Horarios=$Horarios.'<td id=horainiciohorario'.$row['idhorario'].'>'.$row['horainiciohorario']."</td>";
                      $Horarios=$Horarios.'<td id=horasalidahorario'.$row['idhorario'].'>'.$row['horasalidahorario']."</td>";
                      $Horarios=$Horarios.'<td id=descripcionhorario'.$row['idhorario'].'>'.$row['descripcionhorario']."</td>";
                      $id = $row['idhorario'];
                      $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarHorario" onclick="editar('.$id.');actualizarHorario('.$id.');" name="idModificar" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';


                      $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs"  data-title="Delete" data-toggle="modal" data-target="#delete" onclick="eliminar('.$id.')" id="btnEliminar" name="btnEliminar" ><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                      $Horarios=$Horarios."</tr>";

                  }
              } else {
                  echo 'Error';
              }
              $conn->close();
              return $Horarios;
    }
///Creando metodo////////
    function consultTBHhorarioLimpieza($idEstudiante) {


        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $HorariosLimpieza ="";

        $result = $conn->query("CALL consultHorarioLimpieza(".$idEstudiante.")");

              if ($result) {

                  while ($row = $result->fetch_assoc()) {

                      $HorariosLimpieza=$HorariosLimpieza."<tr>";
                      $HorariosLimpieza=$HorariosLimpieza.'<td>'.$row['nombrearea']."</td>";
                      $HorariosLimpieza=$HorariosLimpieza.'<td>'.$row['diadisponible']."</td>";
                      $HorariosLimpieza=$HorariosLimpieza.'<td>'.$row['jornada']."</td>";
                      $HorariosLimpieza=$HorariosLimpieza."</tr>";


                  }
              } else {
                  echo 'error';
              }
              $conn->close();
              return $HorariosLimpieza;
    }


    function consultTBHhorarioLavanderia($idEstudiante) {


        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $HorariosLavanderia ="";
        $result = $conn->query("CALL consultHorarioLavanderia(".$idEstudiante.")");

              if ($result) {

                  while ($row = $result->fetch_assoc()) {

                    $HorariosLavanderia=$HorariosLavanderia."<tr>";
                     $HorariosLavanderia=$HorariosLavanderia.'<td>'.$row['diadisponiblelavanderia']."</td>";
                     $HorariosLavanderia=$HorariosLavanderia.'<td>'.$row['jornadalavanderia']."</td>";
                     $HorariosLavanderia=$HorariosLavanderia."</tr>";


                  }
              } else {
                  echo 'error';
              }
              $conn->close();
              return $HorariosLavanderia;
    }

    function consultTBHhorarioDisponibleEstudiante($estudianteId) {

        $idEstudiante = $estudianteId;
        require_once '../Domain/HorarioDisponible.php';

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $HorarioDisponible = array();


        $result = $conn->query("SELECT * FROM tbhorariodisponible hd INNER JOIN  tbhorariolimpieza hl on hl.idestudiante='$idEstudiante' where hd.idhorariodisponible=hl.idhorariodisponible;");

        if ($result) {
            while ($row = $result->fetch_assoc()) {

                array_push($HorarioDisponible, new HorarioDisponible($row['idhorariodisponible'], $row['diadisponible'], $row['jornada'], $row['estado'], $row['cupos']));
            }
        } else {
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $HorarioDisponible;
    }


    public function verificarHorarioEstudiante($cedEstudiante, $dia, $horaInicio, $horaSalida){
        $booleano = 0;
        //echo $cedEstudiante . "," . $dia . "," . $horaInicio . "," . $horaSalida;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $result = $conn->query("CALL verificarHorarioEstudiante('$cedEstudiante','$dia','$horaInicio','$horaSalida')");

        if (mysqli_num_rows($result) > 0) {
            $booleano = 1;
        }
        mysqli_close($conn);
        return $booleano;
    }

      public function verificarHorarioModificar($cedEstudiante, $dia, $horaInicio, $horaSalida,$idHorarioModificar){
        $booleano = 0;
        //echo $cedEstudiante . "," . $dia . "," . $horaInicio . "," . $horaSalida;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $result = $conn->query("CALL verificarHorarioModificar('$cedEstudiante','$dia','$horaInicio','$horaSalida','$idHorarioModificar')");

        if (mysqli_num_rows($result) > 0) {
            $booleano = 1;
        }else{
            $booleano = 0;
        }
        mysqli_close($conn);
        return $booleano;
    }

    ////////////////////////////Verifica el horario al momento de registrarlo//////////////////////////////////
     public function verificarHorarioRegistrar($cedEstudiante, $dia, $horaInicio, $horaSalida){
        $booleano = 0;
        //echo $cedEstudiante . "," . $dia . "," . $horaInicio . "," . $horaSalida;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $result = $conn->query("CALL verificarHorarioRegistrar('$cedEstudiante','$dia','$horaInicio','$horaSalida')");

        if (mysqli_num_rows($result) > 0) {
            $booleano = 1;
        }else{
            $booleano = 0;
        }
        mysqli_close($conn);
        return $booleano;
    }

    public function verificarHorarioLimpieza($idEstudiante,$idHorarioLavanderia){
        $booleano = 0;
        //echo $cedEstudiante . "," . $dia . "," . $horaInicio . "," . $horaSalida;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $result = $conn->query("CALL verificarHorarioLimpieza('$idEstudiante','$idHorarioLavanderia')");

        if (mysqli_num_rows($result) > 0) {
            $booleano = 1;

        }
        mysqli_close($conn);
        return $booleano;
    }

    public function verificarEstadoArea($idAreaLimpieza) {
    $booleano=0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = $conn->query("CALL verificarEstadoArea('$idAreaLimpieza')");
      if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $booleano=1;
            }
        }

        $conn->close();
        return $booleano;
    }

    public function asignarHorarioLimpieza($idestudiante, $cedEstudiante) {
        $booleano=0;
        $estudianteId = $idestudiante;
        $cedula = $cedEstudiante;
        $idAreaLimpieza = rand(1, 4);
        $horario = $this->consultTBHhorarioDisponible();


        foreach ($horario as $current) {
            $diaHorario = $current->getDiaHorario();
            $horainicio = "";
            $horafinal = "";

            $jornada = $current->getJornadaHorario();
            if ($jornada == "Mañana") {
                $horainicio = "08AM";
                $horafinal = "12MD";
            } else if ($jornada == "Tarde") {
                $horainicio = "01PM";
                $horafinal = "05PM";
            } else {
                $horainicio = "05PM";
                $horafinal = "09PM";
            }
            $estadoHorario = $current->getEstadoHorario();
            if ($estadoHorario == 0) {
            } else {
                $existe = $this->verificarHorarioEstudiante($cedula, $diaHorario, $horainicio, $horafinal);

                $estadoArea = $this->verificarEstadoArea($idAreaLimpieza);

                $banderaArea = 1;
                while ($estadoArea == 0 || $banderaArea == 48) {
                    $idAreaLimpieza = rand(1, 4);
                    $estadoArea = $this->verificarEstadoArea($idAreaLimpieza);

                    $banderaArea = $banderaArea + 1;
                }

                if ($existe == 0) {
                    $current->getDiaHorario() ;
                    $current->getJornadaHorario() ;
                    $current->getEstadoHorario() ;
                    $current->getCuposHorario();
                    $idHorarioDisponible = $current->getIdHorario();
                    $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
                    $conn->set_charset('utf8');
                    $result = $conn->query("INSERT INTO tbhorariolimpieza (idestudiante,idarealimpieza,idhorariodisponible) VALUES ('$estudianteId','$idAreaLimpieza','$idHorarioDisponible')");
                    if ($result == TRUE) {
                        $cupos = $current->getCuposHorario();
                        $cuposFinal = $cupos - 1;
                        $cuposArea;
                        $consultarCuposArea = $conn->query("SELECT cuposarea FROM tbareaslimpieza WHERE idarea='$idAreaLimpieza' And estado=1");

                        if ($consultarCuposArea) {
                            while ($row = $consultarCuposArea->fetch_assoc()) {

                                $cuposArea = $row['cuposarea'];
                                $cuposAreaFinal = $cuposArea - 1;
                            }
                        } else {
                            echo 'no se pudo acceder';
                        }


                        $actualizartablahorarioDisponible = $conn->query("UPDATE tbhorariodisponible SET cupos = '$cuposFinal' WHERE idhorariodisponible='$idHorarioDisponible'");
                        if ($cuposFinal == 0) {
                            $estado = 0;
                            $actualizarEstadoTbHorarioDisponible = $conn->query("UPDATE tbhorariodisponible SET estado = '$estado' WHERE idhorariodisponible='$idHorarioDisponible'");
                        }
                        $atualizarTablaAreas = $conn->query("UPDATE tbareaslimpieza SET cuposarea = '$cuposAreaFinal' WHERE idarea='$idAreaLimpieza'");
                        if ($cuposAreaFinal == 0) {
                            $estadoAreas = 0;
                            $actualizarEstadoTbAreasLimpieza = $conn->query("UPDATE tbareaslimpieza SET estado = '$estadoAreas' WHERE idarea='$idAreaLimpieza'");
                        }
                       // $respuestaFinal = "Se asigno el horario de limpieza satisfactoriamente";
                        $booleano=1;
                        break;
                    }
                    //lo inserto en tbhorariolimpieza y actualizo la tabla horariodisponible actualizar tabla areas.
                } else {

                    $booleano=0;
                }

            }
        }

        return $booleano;
    }

    ////////////////////////////////////Horario de Lavanderia///////////////////////////////////////////

    public function asignarHorarioLavanderia($idestudiante, $cedEstudiante) {
        $booleano2=0;
        $estudianteId = $idestudiante;
        $cedula = $cedEstudiante;
        $horarioLavanderia = $this->consultTBHhorarioDisponibleLavanderia();


        foreach ($horarioLavanderia as $current) {
            $diaHorario = $current->getDiaHorarioLavanderia();
            $horainicio = "";
            $horafinal = "";

            $jornada = $current->getJornadaHorarioLavanderia();
            if ($jornada == "Mañana") {
                $horainicio = "08AM";
                $horafinal = "12MD";
            } else if ($jornada == "Tarde") {
                $horainicio = "01PM";
                $horafinal = "05PM";
            } else{
                $horainicio = "05PM";
                $horafinal = "09PM";
            }
            $estadoHorario = $current->getEstadoHorarioLavanderia();
            if ($estadoHorario == 0) {
              //  echo 'estado0';
            } else {
                $existe = $this->verificarHorarioEstudiante($cedula, $diaHorario, $horainicio, $horafinal);

                $idhorariolavanderia = $current->getIdHorarioLavanderia();
                $verifica = $this->verificarHorarioLimpieza($idestudiante,$idhorariolavanderia);

                if ($existe == 0 && $verifica == 0 ) {
                    $current->getDiaHorarioLavanderia() ;
                    $current->getJornadaHorarioLavanderia() ;
                    $current->getEstadoHorarioLavanderia() ;
                    $current->getCuposHorarioLavanderia();
                    $idHorarioDisponibleLavanderia = $current->getIdHorarioLavanderia();

                    $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
                    $conn->set_charset('utf8');

                    $result = $conn->query("INSERT INTO tbhorariolavanderia (idestudiante,idhorariodisponiblelavanderia) VALUES ('$estudianteId','$idHorarioDisponibleLavanderia')");
                    if ($result == TRUE) {
                        $cupos = $current->getCuposHorarioLavanderia();
                        $cuposFinal = $cupos - 1;


                        $actualizartablahorarioDisponibleLavanderia = $conn->query("UPDATE tbhorariodisponiblelavanderia SET cuposlavanderia = '$cuposFinal' WHERE idhorariodisponiblelavanderia='$idHorarioDisponibleLavanderia'");
                        if ($cuposFinal == 0) {
                            $estado = 0;
                            $actualizarEstadoTbHorarioDisponibleLavanderia = $conn->query("UPDATE tbhorariodisponiblelavanderia SET estadolavanderia = '$estado' WHERE idhorariodisponiblelavanderia='$idHorarioDisponiblelavanderia'");
                        }
                        $booleano2=1;
                        break;
                    }

                   //lo inserto en tbhorariolimpieza y actualizo la tabla horariodisponible actualizar tabla areas.
                } else {
             /*       echo "no hay campo en el " . "Horario " .
                    $current->getDiaHorarioLavanderia() .
                    $current->getJornadaHorarioLavanderia() .
                    $current->getEstadoHorarioLavanderia() .
                    $current->getCuposHorarioLavanderia();*/
                    $booleano2=0;
                    //$respuestaFinal = "error";
                }

            }
        }

        return $booleano2;
    }


    //------------------------PARRA------------------------

      //-----------------ReasignarHorarioLavanderia


  public function consultarHorarioLavanderia($dia,$jornada){
    $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
    $conn->set_charset('utf8');
    $idHorario=10;

    $result = $conn->query("CALL consultarHorarioLavanderia('$dia','$jornada') ");

      if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $idHorario = $row['idhorariodisponiblelavanderia'];
        }

    } else {
        echo 'no se pudo acceder';
    }
    $conn->close();
    return $idHorario;
  }



public function ReasignarHorarioLavanderia($estudianteId,$idHorarioDisponibleLavanderia) {
  $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  $conn->set_charset('utf8');
  $booleano=0;
  $result = $conn->query("CALL  ReasignarHorarioLavanderia('.$estudianteId.' , '.$idHorarioDisponibleLavanderia.' )");
  if($result){
    $booleano=1;
  }else {
      echo 'no se pudo acceder';
  }
  $conn->close();
  return $booleano;
}

//-----------------ReasignarHorario limpieza-----------------------------


public function consultarHorarioLimpiezaDis($dia,$jornada){
    $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
    $conn->set_charset('utf8');
    $idHorario=10;

    $result = $conn->query("CALL consultarHorarioLimpieza('$dia','$jornada') ");

    if($result->num_rows > 0){
      while ($row = $result->fetch_assoc()) {
          $idHorario = $row['idhorariodisponible'];
      }

    } else {
      echo 'no se pudo acceder';
    }
    $conn->close();
    return $idHorario;
}



public function ReasignarHorarioLimpieza($estudianteId,$idHorarioDisponibleLimpieza,$area) {
    $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
    $conn->set_charset('utf8');
    $booleano=0;
    $result = $conn->query("CALL  ReasignarHorarioLimpieza('$estudianteId' , '$idHorarioDisponibleLimpieza','$area' )");
    if($result){
    $booleano=1;
    }else {
    echo 'no se pudo acceder';
    }
    $conn->close();
    return $booleano;
}


}
?>
