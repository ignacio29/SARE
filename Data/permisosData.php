<?php

require_once 'data.php';

class PermisoData {

    private $data;

    function PermisoData(){
        $this->data = new Data();
    }
//-----------------------ESTUDIANTES---------------------------------------------
    public function  crearMensaje($mensaje){
        $booleano = 0;

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $conn->set_charset('utf8');

        $creador = $mensaje->getCreador();
        $tema = $mensaje->getAsunto();
        $detalle = $mensaje->getDescripcion();
        $fecha = $mensaje->getFecha();
        $estado = $mensaje->getEstado();
        $visible = $mensaje->getVisto();

        $statement = $conn->prepare("CALL crearMensaje(?,?,?,?,?,?)");
        $statement->bind_param("sssssi", $creador, $tema, $detalle,$estado,$fecha,$visible);
        $statement->execute();

        if ($statement == TRUE) {
            $booleano = 1;
        }
        $statement->close();
        $conn->close();

        return $booleano;
    }


    public function  reporteMensajesEstudiante($creador,$asunto){
      $permisos = "";
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
        $conn->set_charset('utf8');
      $result = $conn->query("CALL reporteMensajesEstudiante('$creador','$asunto')");
      if ($result->num_rows > 0) {
          $cont=1;
          while ($row = $result->fetch_assoc()) {
              $permisos=$permisos."<tr>";
              $permisos=$permisos.'<td id=asunto'.$cont.'>'.$row['asuntopermiso']."</td>";
              $permisos=$permisos.'<td id=fecha'.$cont.'>'.$row['fechapermiso']."</td>";
              $permisos=$permisos.'<td  >'.$row['estado']."</td>";

              $id = $row['idpermiso'];
              $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ver"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#cargarMensaje" onclick="cargarVerMensajeEstudiante('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-open"></span></button></p></td>';
              $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarMensaje('.$id.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

              $permisos=$permisos."</tr>";
              $permisos=$permisos.'<input type="hidden" id=detalle'.$cont.' value="'.$row['descripcionpermiso'].'">';
              $permisos=$permisos.'<input type="hidden" id=estado'.$cont.' value="'.$row['estado'].'">';
              $cont=$cont+1;

          }
      }
      $conn->close();
      return $permisos;
    }


    public function verMisMensajesEstudiante($creadorCedula) {
        $permisos = "";
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
          $conn->set_charset('utf8');
        $result = $conn->query("CALL verMisMensajesEstudiante('$creadorCedula')");
        if ($result->num_rows > 0) {
            $cont=1;
            while ($row = $result->fetch_assoc()) {
                $permisos=$permisos."<tr>";
                $permisos=$permisos.'<td id=asunto'.$cont.'>'.$row['asuntopermiso']."</td>";
                $permisos=$permisos.'<td id=fecha'.$cont.'>'.$row['fechapermiso']."</td>";
                $permisos=$permisos.'<td  >'.$row['estado']."</td>";

                $id = $row['idpermiso'];
                $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ver"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#cargarMensaje" onclick="cargarVerMensajeEstudiante('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-open"></span></button></p></td>';
                $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarMensaje('.$id.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                $permisos=$permisos."</tr>";
                $permisos=$permisos.'<input type="hidden" id=detalle'.$cont.' value="'.$row['descripcionpermiso'].'">';
                $permisos=$permisos.'<input type="hidden" id=estado'.$cont.' value="'.$row['estado'].'">';
                $cont=$cont+1;

            }
        }
        $conn->close();
        return $permisos;
    }


    public function  eliminarMensaje($idMensaje){
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $booleano = 0;
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $conn->set_charset('utf8');
      $statement = $conn->prepare("CALL eliminarMensaje(?)");
      $statement->bind_param("i", $idMensaje);
      $statement->execute();
      if ($statement == TRUE) {
          $booleano = 1;
      }
      $statement->close();
      $conn->close();
      return $booleano;
    }




//----------------------------ADMINISTRATIVOS--------------------------------------------------------------------------------------


    public function actualizarDatosMensaje($id,$estado,$visible){
      $booleano = 0;
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $statement = $conn->prepare("CALL actualizarDatosMensaje(?,?,?)");
      $statement->bind_param("isi",$id,$estado,$visible);
      $statement->execute();

      if ($statement == TRUE) {
          $booleano = 1;
      }
      $statement->close();
      $conn->close();
      return $booleano;
    }



    public function verTodosMensajes($asunto) {
        $permisos = "";
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //$conn_set_charset("utf8");
        $result = $conn->query("CALL mostrarTodosPermisos('$asunto')");
        if ($result->num_rows > 0) {
            $cont=1;
            while ($row = $result->fetch_assoc()) {
               $nombreCompleto = $row['nombreestudiante'] . " " . $row['primerapellidoestudiante'];

                $permisos=$permisos."<tr>";
                $permisos=$permisos.'<td id=cedula'.$cont.'>'.$row['cedulaestudiante']."</td>";
                $permisos=$permisos.'<td id=estudiante'.$cont.'>'.$nombreCompleto."</td>";
                $permisos=$permisos.'<td id=asunto'.$cont.'>'.$row['asuntopermiso']."</td>";
                $permisos=$permisos.'<td id=fecha'.$cont.'>'.$row['fechapermiso']."</td>";
                $permisos=$permisos.'<td  >'.$row['estado']."</td>";

                $id = $row['idpermiso'];
                $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ver"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#verMensaje" onclick="cargarVerMensaje('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-open"></span></button></p></td>';
                $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ocultar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarIdOcultar('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-close"></span></button></p></td>';

                $permisos=$permisos."</tr>";
                $permisos=$permisos.'<input type="hidden" id=detalle'.$cont.' value="'.$row['descripcionpermiso'].'">';
                $permisos=$permisos.'<input type="hidden" id=estado'.$cont.' value="'.$row['estado'].'">';
                $permisos=$permisos.'<input type="hidden" id=visible'.$cont.' value="'.$row['visible'].'">';
                $cont=$cont+1;


            }
        }
        $conn->close();
        return $permisos;
    }


    public function ocultarMensaje($idMensaje,$estado){
      $booleano = 0;
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $statement = $conn->prepare("CALL ocultarMensaje(?,?)");
      $statement->bind_param("ii",$idMensaje,$estado);
      $statement->execute();

      if ($statement == TRUE) {
          $booleano = 1;
      }
      $statement->close();
      $conn->close();
      return $booleano;
    }





  public function mostrarMisPermisos($cedEstudiante) {
        $permisos = array();
        require '../Domain/Permisos.php';
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = $conn->query("CALL mostrarMisPermisos('$cedEstudiante')");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
             array_push($permisos, new Permiso($row["idpermiso"],$row["creadorpermiso"], $row["asuntopermiso"], $row["descripcionpermiso"],$row["fechapermiso"],$row["visto"]));
            }
        }
        $conn->close();
        return $permisos;
    }



//---------------------------------REPORTES-------------------------------------
//---------------------------------REPORTES OCULTOS-------------------------------
public function reporteMensajesOcultos($asunto){
  $permisos = "";
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //$conn_set_charset("utf8");
  $result = $conn->query("CALL reporteMensajesOcultos('$asunto')");
  if ($result->num_rows > 0) {
      $cont=1;
      while ($row = $result->fetch_assoc()) {
         $nombreCompleto = $row['nombreestudiante'] . " " . $row['primerapellidoestudiante'];

          $permisos=$permisos."<tr>";
          $permisos=$permisos.'<td id=cedula'.$cont.'>'.$row['cedulaestudiante']."</td>";
          $permisos=$permisos.'<td id=estudiante'.$cont.'>'.$nombreCompleto."</td>";
          $permisos=$permisos.'<td id=asunto'.$cont.'>'.$row['asuntopermiso']."</td>";
          $permisos=$permisos.'<td id=fecha'.$cont.'>'.$row['fechapermiso']."</td>";
          $permisos=$permisos.'<td >'.$row['estado']."</td>";

          $id = $row['idpermiso'];
          $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ver"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#verMensaje" onclick="cargarVerMensaje('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-open"></span></button></p></td>';
          $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ocultar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarIdOcultar('.$id.','.$cont.')" disabled><span class="glyphicon glyphicon-eye-close"></span></button></p></td>';

          $permisos=$permisos."</tr>";
          $permisos=$permisos.'<input type="hidden" id=detalle'.$cont.' value="'.$row['descripcionpermiso'].'">';
          $permisos=$permisos.'<input type="hidden" id=estado'.$cont.' value="'.$row['estado'].'">';
          $permisos=$permisos.'<input type="hidden" id=visible'.$cont.' value="'.$row['visible'].'">';
          $cont=$cont+1;


      }
  }
  $conn->close();
  return $permisos;

}

//---------------------------------REPORTES CEDULAS-------------------------------
public function reporteMensajeBucar($palabra,$asunto){
  $permisos = "";
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $palabra='%'.$palabra.'%';
  //$conn_set_charset("utf8");
  $result = $conn->query("CALL reporteMensajeBucar('$palabra','$asunto')");
  if ($result->num_rows > 0) {
      $cont=1;
      while ($row = $result->fetch_assoc()) {
         $nombreCompleto = $row['nombreestudiante'] . " " . $row['primerapellidoestudiante'];

          $permisos=$permisos."<tr>";
          $permisos=$permisos.'<td id=cedula'.$cont.'>'.$row['cedulaestudiante']."</td>";
          $permisos=$permisos.'<td id=estudiante'.$cont.'>'.$nombreCompleto."</td>";
          $permisos=$permisos.'<td id=asunto'.$cont.'>'.$row['asuntopermiso']."</td>";
          $permisos=$permisos.'<td id=fecha'.$cont.'>'.$row['fechapermiso']."</td>";
          $permisos=$permisos.'<td>'.$row['estado']."</td>";

          $id = $row['idpermiso'];
          $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ver"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#verMensaje" onclick="cargarVerMensaje('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-open"></span></button></p></td>';
          $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ocultar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarIdOcultar('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-close"></span></button></p></td>';

          $permisos=$permisos."</tr>";
          $permisos=$permisos.'<input type="hidden" id=detalle'.$cont.' value="'.$row['descripcionpermiso'].'">';
          $permisos=$permisos.'<input type="hidden" id=estado'.$cont.' value="'.$row['estado'].'">';
          $permisos=$permisos.'<input type="hidden" id=visible'.$cont.' value="'.$row['visible'].'">';
          $cont=$cont+1;


      }
  }
  $conn->close();
  return $permisos;
}

//---------------------------------REPORTES ESTADOS-------------------------------
public function reporteMensajeEstado($estado,$asunto){
  $permisos = "";
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //$conn_set_charset("utf8");
  $result = $conn->query("CALL reporteMensajeEstado('$estado','$asunto')");
  if ($result->num_rows > 0) {
      $cont=1;
      while ($row = $result->fetch_assoc()) {
         $nombreCompleto = $row['nombreestudiante'] . " " . $row['primerapellidoestudiante'];

          $permisos=$permisos."<tr>";
          $permisos=$permisos.'<td id=cedula'.$cont.'>'.$row['cedulaestudiante']."</td>";
          $permisos=$permisos.'<td id=estudiante'.$cont.'>'.$nombreCompleto."</td>";
          $permisos=$permisos.'<td id=asunto'.$cont.'>'.$row['asuntopermiso']."</td>";
          $permisos=$permisos.'<td id=fecha'.$cont.'>'.$row['fechapermiso']."</td>";
          $permisos=$permisos.'<td>'.$row['estado']."</td>";

          $id = $row['idpermiso'];
          $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ver"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#verMensaje" onclick="cargarVerMensaje('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-open"></span></button></p></td>';
          $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ocultar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarIdOcultar('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-close"></span></button></p></td>';

          $permisos=$permisos."</tr>";
          $permisos=$permisos.'<input type="hidden" id=detalle'.$cont.' value="'.$row['descripcionpermiso'].'">';
          $permisos=$permisos.'<input type="hidden" id=estado'.$cont.' value="'.$row['estado'].'">';
          $permisos=$permisos.'<input type="hidden" id=visible'.$cont.' value="'.$row['visible'].'">';
          $cont=$cont+1;


      }
  }
  $conn->close();
  return $permisos;
}

//---------------------------------REPORTES FECHAS-------------------------------
public function reporteMensajeFecha($fecha,$asunto){
  $permisos = "";
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  //$conn_set_charset("utf8");
  $result = $conn->query("CALL reporteMensajeFecha('$fecha','$asunto')");
  if ($result->num_rows > 0) {
      $cont=1;
      while ($row = $result->fetch_assoc()) {
         $nombreCompleto = $row['nombreestudiante'] . " " . $row['primerapellidoestudiante'];

          $permisos=$permisos."<tr>";
          $permisos=$permisos.'<td id=cedula'.$cont.'>'.$row['cedulaestudiante']."</td>";
          $permisos=$permisos.'<td id=estudiante'.$cont.'>'.$nombreCompleto."</td>";
          $permisos=$permisos.'<td id=asunto'.$cont.'>'.$row['asuntopermiso']."</td>";
          $permisos=$permisos.'<td id=fecha'.$cont.'>'.$row['fechapermiso']."</td>";
          $permisos=$permisos.'<td  >'.$row['estado']."</td>";

          $id = $row['idpermiso'];
          $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ver"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#verMensaje" onclick="cargarVerMensaje('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-open"></span></button></p></td>';
          $permisos=$permisos.'<td><p data-placement="top" data-toggle="tooltip" title="Ocultar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarIdOcultar('.$id.','.$cont.')"><span class="glyphicon glyphicon-eye-close"></span></button></p></td>';

          $permisos=$permisos."</tr>";
          $permisos=$permisos.'<input type="hidden" id=detalle'.$cont.' value="'.$row['descripcionpermiso'].'">';
          $permisos=$permisos.'<input type="hidden" id=estado'.$cont.' value="'.$row['estado'].'">';
          $permisos=$permisos.'<input type="hidden" id=visible'.$cont.' value="'.$row['visible'].'">';
          $cont=$cont+1;


      }
  }
  $conn->close();
  return $permisos;
}

}
?>
