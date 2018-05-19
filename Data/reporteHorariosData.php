<?php

require_once 'data.php';

class ReporteHorariosData {

    private $data;

    function ReporteHorariosData() {
        $this->data = new Data();
    }


//---------------------------------REPORTES HORARIOS CLASES-----------------------------------

//------------------reporta todos los horarios de clases--------------------------------------
function verReporteHorarioClases() {

  $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  $conn->set_charset('utf8');
  $Horarios ="";

  $result = $conn->query("CALL verReporteHorarioClases()");

        if ($result) {

            while ($row = $result->fetch_assoc()) {
                
                $Horarios=$Horarios."<tr>";
                $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                $Horarios=$Horarios.'<td>'.$row['diahorario']."</td>";
                $Horarios=$Horarios.'<td>'.$row['horainiciohorario']."</td>";
                $Horarios=$Horarios.'<td>'.$row['horasalidahorario']."</td>";
                $Horarios=$Horarios.'<td>'.$row['descripcionhorario']."</td>";
                $Horarios=$Horarios."</tr>";
                


            }
        } else {
            echo 'Error';
        }
        $conn->close();
        return $Horarios;
}



//------------------------reporte por cedula horarios de clases--------------------------------------

    function reportarHorarioEstuPalabra($palabra) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";
      $palabra='%'.$palabra.'%';

      $result = $conn->query("CALL reportarHorarioEstuPalabra('$palabra')");

            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $Horarios=$Horarios."<tr>";
                    $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['diahorario']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['horainiciohorario']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['horasalidahorario']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['descripcionhorario']."</td>";
                    $Horarios=$Horarios."</tr>";
                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Horarios;
    }


    //------------------------reporte por carrera horarios de clases--------------------------------------

        function reporteHorariosClasesCarrera($carrera) {

          $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
          $conn->set_charset('utf8');
          $Horarios ="";

          $result = $conn->query("CALL reporteHorariosClasesCarrera('$carrera')");

                if ($result) {

                    while ($row = $result->fetch_assoc()) {

                        $Horarios=$Horarios."<tr>";
                        $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                        $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                        $Horarios=$Horarios.'<td>'.$row['diahorario']."</td>";
                        $Horarios=$Horarios.'<td>'.$row['horainiciohorario']."</td>";
                        $Horarios=$Horarios.'<td>'.$row['horasalidahorario']."</td>";
                        $Horarios=$Horarios.'<td>'.$row['descripcionhorario']."</td>";
                        $Horarios=$Horarios."</tr>";


                    }
                } else {
                    echo 'Error';
                }
                $conn->close();
                return $Horarios;
        }



//---------------------------------REPORTES HORARIOS LIMPIEZA--------------------------

//------------------reporta todos los horarios de limpieza-----------------------------

    function verReporteHorarioLimpieza($rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL verReporteHorarioLimpieza()");

            if ($result) {
              $cont=1;
              while ($row = $result->fetch_assoc()) {
                  $Horarios=$Horarios."<tr>";
                  $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                  $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                  $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                  $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornada']."</td>";
                  $Horarios=$Horarios.'<td id="area'.$cont.'">'.$row['area']."</td>";
                  if($rol=="administrador"){
                        $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                      data-target="#editarHorarioLimpieza"  onclick="editarHorarioLimpieza('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                    }
                  $Horarios=$Horarios."</tr>";
                  $cont=$cont + 1;
              }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Horarios;
    }



//------------------------------------reporte por una cedula--------------------------------

    function reporteHorarioLimpiezaCedula($cedula,$rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL reporteHorarioLimpiezaCedula(".$cedula.")");

            if ($result) {
              $cont=1;
              while ($row = $result->fetch_assoc()) {
                  $Horarios=$Horarios."<tr>";
                  $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                  $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                  $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                  $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornada']."</td>";
                  $Horarios=$Horarios.'<td id="area'.$cont.'">'.$row['area']."</td>";
                  if($rol=="administrador"){
                        $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                      data-target="#editarHorarioLimpieza"  onclick="editarHorarioLimpieza('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                    }
                  $Horarios=$Horarios."</tr>";
                  $cont=$cont + 1;
              }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Horarios;
    }




//------------------------reporte por una area en especifica-------------------------------------

    function reporteHorarioLimpiezaAreas($area,$rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL reporteHorarioLimpiezaAreas('$area')");

            if ($result) {
              $cont=1;
              while ($row = $result->fetch_assoc()) {
                  $Horarios=$Horarios."<tr>";
                  $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                  $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                  $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                  $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornada']."</td>";
                  $Horarios=$Horarios.'<td id="area'.$cont.'">'.$row['area']."</td>";
                  if($rol=="administrador"){
                        $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                      data-target="#editarHorarioLimpieza"  onclick="editarHorarioLimpieza('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                    }
                  $Horarios=$Horarios."</tr>";
                  $cont=$cont + 1;
              }
            } else {
              echo 'Error';
           }
            $conn->close();
            return $Horarios;
    }



//---------------------------------------------------------------------------------

//------------------------reporte por una dia en especifico-------------------------------------

    function reporteHorarioLimpiezaDias($dia,$rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL reporteHorarioLimpiezaDias('$dia')");

            if ($result) {
              $cont=1;
              while ($row = $result->fetch_assoc()) {
                  $Horarios=$Horarios."<tr>";
                  $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                  $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                  $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                  $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornada']."</td>";
                  $Horarios=$Horarios.'<td id="area'.$cont.'">'.$row['area']."</td>";
                  if($rol=="administrador"){
                        $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                      data-target="#editarHorarioLimpieza"  onclick="editarHorarioLimpieza('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                    }
                  $Horarios=$Horarios."</tr>";
                  $cont=$cont + 1;
              }
            } else {
              echo 'Error';
           }
            $conn->close();
            return $Horarios;
    }



//---------------------------------------------------------------------------------


//------------------------reporte por una dia en especifico-------------------------------------

    function reporteHorarioLimpiezaJornadas($jornada,$rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL reporteHorarioLimpiezaJornada('$jornada')");

            if ($result) {
                $cont=1;
                while ($row = $result->fetch_assoc()) {
                    $Horarios=$Horarios."<tr>";
                    $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                    $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornada']."</td>";
                    $Horarios=$Horarios.'<td id="area'.$cont.'">'.$row['area']."</td>";
                    if($rol=="administrador"){
                          $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                        data-target="#editarHorarioLimpieza"  onclick="editarHorarioLimpieza('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                      }
                    $Horarios=$Horarios."</tr>";
                    $cont=$cont + 1;
                }
            } else {
              echo 'Error';
           }
            $conn->close();
            return $Horarios;
    }



    function palabraBuscaLimpieza($palabra,$rol) {
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $conn->set_charset('utf8');
      $Horarios="";
      $palabra='%'.$palabra.'%';
      $result = $conn->query("CALL palabraBuscaLimpieza('$palabra')");
      if ($result) {
          $cont=1;
          while ($row = $result->fetch_assoc()) {
              $Horarios=$Horarios."<tr>";
              $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
              $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
              $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
              $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornada']."</td>";
              $Horarios=$Horarios.'<td id="area'.$cont.'">'.$row['area']."</td>";
              if($rol=="administrador"){
                    $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                  data-target="#editarHorarioLimpieza"  onclick="editarHorarioLimpieza('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                }
              $Horarios=$Horarios."</tr>";
              $cont=$cont + 1;
          }
      } else {
        echo 'Error';
     }
        $conn->close();
      return $Horarios;
    }

//---------------------------------------------------------------------------------
function palabraBuscaLavanderia($palabra, $rol) {
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $conn->set_charset('utf8');
  $Horarios="";
  $palabra='%'.$palabra.'%';
  $result = $conn->query("CALL palabraBuscaLavanderia('$palabra')");
  if ($result) {
      $cont=1;
      while ($row = $result->fetch_assoc()) {
          $Horarios=$Horarios."<tr>";
          $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
          $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
          $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
          $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornadalavanderia']."</td>";
          if($rol=="administrador"){
                $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
              data-target="#editarHorarioLimpieza"  onclick="editarHorarioLimpieza('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
            }
          $Horarios=$Horarios."</tr>";
          $cont=$cont + 1;
      }
  } else {
    echo 'Error';
 }
    $conn->close();
  return $Horarios;
}




   function verReporteHorarioLavanderia($rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL verReporteHorarioLavanderia()");

            if ($result) {
              $cont=1;
                while ($row = $result->fetch_assoc()) {
                    $Horarios=$Horarios."<tr>";
                    $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                    $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornadalavanderia']."</td>";
                    if($rol=="administrador"){
                          $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                        data-target="#editarHorarioLavanderia"  onclick="editarHorarioLavanderia('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                      }
                    $Horarios=$Horarios."</tr>";

                    $cont=$cont + 1;
                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Horarios;
    }



//------------------------------------reporte por una cedula--------------------------------

    function reporteHorarioLavanderiaCedula($cedula,$rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL reporteHorarioLavanderiaCedula(".$cedula.")");

            if ($result) {
              $cont=1;
                while ($row = $result->fetch_assoc()) {
                    $Horarios=$Horarios."<tr>";
                    $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                    $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornadalavanderia']."</td>";
                    if($rol=="administrador"){
                          $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                          data-target="#editarHorarioLavanderia"  onclick="editarHorarioLavanderia('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                      }
                    $Horarios=$Horarios."</tr>";

                    $cont=$cont + 1;
                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Horarios;
    }




//------------------------reporte por una dia en especifico-------------------------------------

    function reporteHorarioLavanderiaDias($dia,$rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL reporteHorarioLavanderiaDias('$dia')");

            if ($result) {
              $cont=1;
                while ($row = $result->fetch_assoc()) {
                    $Horarios=$Horarios."<tr>";
                    $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                    $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornadalavanderia']."</td>";
                    if($rol=="administrador"){
                          $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                          data-target="#editarHorarioLavanderia"  onclick="editarHorarioLavanderia('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                      }
                    $Horarios=$Horarios."</tr>";

                    $cont=$cont + 1;
                }
            } else {
              echo 'Error';
           }
            $conn->close();
            return $Horarios;
    }



//---------------------------------------------------------------------------------



//------------------------reporte por una Jornada en especifico-------------------------------------

    function reporteHorarioLavanderiaJornadas($jornada,$rol) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Horarios ="";

      $result = $conn->query("CALL reporteHorarioLavanderiaJornada('$jornada')");

            if ($result) {
              $cont=1;
                while ($row = $result->fetch_assoc()) {
                    $Horarios=$Horarios."<tr>";
                    $Horarios=$Horarios.'<td>'.$row['cedula']."</td>";
                    $Horarios=$Horarios.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Horarios=$Horarios.'<td id="dia'.$cont.'">'.$row['dia']."</td>";
                    $Horarios=$Horarios.'<td id="jornada'.$cont.'">'.$row['jornadalavanderia']."</td>";
                    if($rol=="administrador"){
                          $Horarios=$Horarios.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal"
                          data-target="#editarHorarioLavanderia"  onclick="editarHorarioLavanderia('.$cont.','.$row['cedula'].')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                      }
                    $Horarios=$Horarios."</tr>";

                    $cont=$cont + 1;
                }
            } else {
              echo 'Error';
           }
            $conn->close();
            return $Horarios;
    }



//---------------------------------------------------------------------------------

}




?>
