<?php

require_once 'data.php';

class UsuariosData {

    private $data;

    function UsuariosData() {
        $this->data = new Data();
    }

    public function registrarEstudiante($Estudiante) {

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $name = $Estudiante->getNombreEstudiante();
        $corre = $Estudiante->getCorreoEstudiante();
        $pass = $Estudiante->getContrasena();
        $primeA = $Estudiante->getPrimerApellidoEstudiante();
        $segunA = $Estudiante->getSegundoApellidoEstudiante();
        $cabina = $Estudiante->getNumeroCuartoEstudiante();
        $carrera = $Estudiante->getCarreraEstudiante();
        $cedul = $Estudiante->getCedulaEstudiante();
        $sexo = $Estudiante->getSexo();
        $ingreso = $Estudiante->getFechaIngreso();
        $tipo = $Estudiante->getRolEstudiante();

        $Bandera1 = true;
        $Bandera2 = true;
        $Bandera3 = true;

        $statement = $conn->prepare("CALL insertLogin(?,?,?)");
        $statement->bind_param("sss", $corre, $pass, $tipo);
        $statement->execute();

        if ($statement == TRUE) {

            $booleano = 1;
        } else {

            $Bandera1 = false;
        }
        $statement->close();
        $conn->close();

        /////////////////////////////////////////////////////////////
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = $conn->query("CALL autenticarCuenta('$corre','$pass')");


        $idL;

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $idL = $row['idlogin'];
            }
        } else {
            $Bandera2 = false;
        }
        mysqli_close($conn);
        /////////////////////////////////////////7

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $valor = $Estudiante->getIdConfirmacionEstudiante();

        $confHorario = 0;
        $statement2 = $conn->prepare("CALL insertEstudiante(?,?,?,?,?,?,?,?,?,?,?)");
        $statement2->bind_param("ssssisiiisi", $name, $primeA, $segunA, $cedul, $cabina, $carrera, $idL, $valor, $confHorario, $sexo, $ingreso);
        $statement2->execute();

        if ($statement2 == TRUE) {

            $booleano = 1;
        } else {

            $Bandera3 = false;
        }
        $statement2->close();
        $conn->close();

        if ($Bandera1 == 1 && $Bandera2 == 1 && $Bandera3 == 1) {

            return true;
        } else {

            return false;
        }
    }

    public function registrarAsistente($Asistente) {

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $name = $Asistente->getNombreAsistente();
        $corre = $Asistente->getCorreo();
        $pass = $Asistente->getContrasena();
        $primeA = $Asistente->getPrimerA();
        $segunA = $Asistente->getSegundoA();
        $cedul = $Asistente->getCedulaAsistente();
        $sexo = $Asistente->getSexo();
        $tipo = $Asistente->getRol();

        $Bandera1 = true;
        $Bandera2 = true;
        $Bandera3 = true;

        $statement = $conn->prepare("CALL insertLogin(?,?,?)");
        $statement->bind_param("sss", $corre, $pass, $tipo);
        $statement->execute();

        if ($statement == TRUE) {

            $booleano = 1;
        } else {

            $Bandera1 = false;
        }
        $statement->close();
        $conn->close();

        /////////////////////////////////////////////////////////////
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $result = $conn->query("CALL autenticarCuenta('$corre','$pass')");


        $idL;

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $idL = $row['idlogin'];
            }
        } else {
            $Bandera2 = false;
        }
        mysqli_close($conn);
        /////////////////////////////////////////7

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $statement2 = $conn->prepare("CALL insertAsistente(?,?,?,?,?,?)");
        $statement2->bind_param("ssssis", $name, $primeA, $segunA, $cedul, $idL, $sexo);
        $statement2->execute();

        if ($statement2 == TRUE) {

            $booleano = 1;
        } else {

            $Bandera3 = false;
        }
        $statement2->close();
        $conn->close();

        if ($Bandera1 == 1 && $Bandera2 == 1 && $Bandera3 == 1) {

            return true;
        } else {

            return false;
        }
    }




    public function eliminarEstudiante($cedula){
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $booleano = 0;
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $statement = $conn->query("CALL elimarEstudiante('$cedula')");
      $statement->bind_param("s", $cedula);
      $statement->execute();
      if ($statement == TRUE) {
          $booleano = 1;
      }
      $statement->close();
      $conn->close();
      return $booleano;
    }



    public function eliminarAsistente($cedula){
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $booleano = 0;
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $statement = $conn->prepare("CALL elimarAsistente(?)");
      $statement->bind_param("s", $cedula);
      $statement->execute();
      if ($statement == TRUE) {
          $booleano = 1;
      }
      $statement->close();
      $conn->close();
      return $booleano;
    }



    function updateEstudiante($Estudiante) {

        $name = $Estudiante->getNombreEstudiante();
        $primeA = $Estudiante->getPrimerApellidoEstudiante();
        $segunA = $Estudiante->getSegundoApellidoEstudiante();
        $cabina = $Estudiante->getNumeroCuartoEstudiante();
        $carrera = $Estudiante->getCarreraEstudiante();
        $cedul = $Estudiante->getCedulaEstudiante();
        $sexo = $Estudiante->getSexo();
        $ingreso = $Estudiante->getFechaIngreso();
        $id=$Estudiante->getIdEstudiante();
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $statement = $conn->prepare("CALL updateEstudiante(?,?,?,?,?,?,?,?,?,?)");
        $statement->bind_param("sssisssii", $name, $primeA, $segunA, $cabina, $carrera, $cedul, $sexo, $ingreso,$id);
        $statement->execute();
        $statement->close();
        $conn->close();
    }

    function updateAsistente($Asistente) {

        $name = $Asistente->getNombreAsistente();
        $primeA = $Asistente->getPrimerA();
        $segunA = $Asistente->getSegundoA();
        $cedul = $Asistente->getCedulaAsistente();
        $sexo = $Asistente->getSexo();
        $id=$Asistente->getIdAsistente();

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $statement = $conn->prepare("CALL updateAsistente(?,?,?,?,?,?)");
        $statement->bind_param("sssssi", $name, $primeA, $segunA, $cedul, $sexo,$id);
        $statement->execute();
        $statement->close();
        $conn->close();
    }

public function actualizarEstudianteAdministrador($Estudiante){

  $name = $Estudiante->getNombreEstudiante();
  $primeA = $Estudiante->getPrimerApellidoEstudiante();
  $segunA = $Estudiante->getSegundoApellidoEstudiante();
  $cabina = $Estudiante->getNumeroCuartoEstudiante();
  $carrera = $Estudiante->getCarreraEstudiante();
  $sexo = $Estudiante->getSexo();
  $ingreso = $Estudiante->getFechaIngreso();
  $cedul=$Estudiante->getCedulaEstudiante();
  $acces=$Estudiante->getIdConfirmacionEstudiante();
///////////////////////////////////////////////////////////////////
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  ////////////////////////////////////////////////////

  $statement = $conn->prepare("CALL actualizarEstudianteAdmi(?,?,?,?,?,?,?,?,?)");
  $statement->bind_param("sssssiisi", $cedul,$name, $primeA, $segunA,$sexo,$cabina,$ingreso,$carrera,$acces);
  $statement->execute();
  $statement->close();
  $conn->close();
}

public function actualizarAsistenteAdministrador($Estudiante){

  $name = $Estudiante->getNombreAsistente();
  $primeA = $Estudiante->getPrimerA();
  $segunA = $Estudiante->getSegundoA();
  $sexo = $Estudiante->getSexo();

  $cedul=$Estudiante->getCedulaAsistente();

///////////////////////////////////////////////////////////////////
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  ////////////////////////////////////////////////////

  $statement = $conn->prepare("CALL actualizarAsistenteAdmi(?,?,?,?,?)");
  $statement->bind_param("sssss",$name, $primeA, $segunA,$sexo,$cedul);
  $statement->execute();
  $statement->close();
  $conn->close();
}

public function actualizarAdministrador($Estudiante){

  $name = $Estudiante->getNombreAdministrador();
  $primeA = $Estudiante->getPrimerApellidoAdministrador();
  $segunA = $Estudiante->getSegundoApellidoAdministrador();


  $cedul=$Estudiante->getCedulaAdministrador();
echo $name;
echo $primeA;
echo $segundoA;
echo $cedul;
///////////////////////////////////////////////////////////////////
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  ////////////////////////////////////////////////////

  $statement = $conn->prepare("CALL actualizarAdministrador(?,?,?,?)");
  $statement->bind_param("ssss",$cedul,$name, $primeA,$segunA);
  $statement->execute();
  $statement->close();
  $conn->close();

}


    public function verAsistentes() {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $Asistentes = "";

              $result = $conn->query("CALL verAsistentes()");
                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                      $Asistentes=$Asistentes."<tr>";
                      $Asistentes=$Asistentes.'<td id="cedulaAsistente'.$cont.'">'.$row['cedulaasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="nombreAsistente'.$cont.'">'.$row['nombreasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="primerApellidoAsistente'.$cont.'">'.$row['primerapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="segundoApellidoAsistente'.$cont.'">'.$row['segundoapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="sexoAsistente'.$cont.'">'.$row['sexo'].'</td>';

                      $id = '"'.$row['idasistente'].'"';
                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarAsistente" onclick="editarAsistente('.$cont.')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';


                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarAsistente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                      $Asistentes=$Asistentes."</tr>";
                     $cont++;

                  }
              } else {
                  echo 'no se pudo acceder';
              }
              $conn->close();
              return $Asistentes;
    }
    public function verProAsistente($provincia) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $Asistentes = "";

              $result = $conn->query("CALL ordenarProviAsistente('$provincia')");
                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                      $Asistentes=$Asistentes."<tr>";
                      $Asistentes=$Asistentes.'<td id="cedulaAsistente'.$cont.'">'.$row['cedulaasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="nombreAsistente'.$cont.'">'.$row['nombreasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="primerApellidoAsistente'.$cont.'">'.$row['primerapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="segundoApellidoAsistente'.$cont.'">'.$row['segundoapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="sexoAsistente'.$cont.'">'.$row['sexo'].'</td>';

                      $id = '"'.$row['idasistente'].'"';
                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarAsistente" onclick="editarAsistente('.$cont.')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';


                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarAsistente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                      $Asistentes=$Asistentes."</tr>";
                     $cont++;

                  }
              } else{
                $Asistentes=$Asistentes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Asistentes;
              }
              $conn->close();
              return $Asistentes;
    }
    public function verProEstudiante($provincia,$rol) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $Estudiantes = "";

              $result = $conn->query("CALL ordenarProvinciaEstudiantes('$provincia')");
                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                    $Estudiantes=$Estudiantes."<tr>";
                    $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabinaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                    if($row['confirmacuetaestudiante']==1){
                 $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

               }else{
                  $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
               }


                    $id = '"'.$row['idestudiante'].'"';

                    if($rol=="administrador"){

                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                        <td><input type="hidden" id="idEstudiante"></td>

                    ';
                  }




                    $Estudiantes=$Estudiantes."</tr>";
                   $cont++;
                  }

              } else{
                $Estudiantes=$Estudiantes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Estudiantes;
              }
              $conn->close();
              return $Estudiantes;
    }
    public function verSexAsistente($Sex) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $Asistentes = "";

              $result = $conn->query("CALL ordenarSexoAsistente('$Sex')");
                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                      $Asistentes=$Asistentes."<tr>";
                      $Asistentes=$Asistentes.'<td id="cedulaAsistente'.$cont.'">'.$row['cedulaasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="nombreAsistente'.$cont.'">'.$row['nombreasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="primerApellidoAsistente'.$cont.'">'.$row['primerapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="segundoApellidoAsistente'.$cont.'">'.$row['segundoapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="sexoAsistente'.$cont.'">'.$row['sexo'].'</td>';

                      $id = '"'.$row['idasistente'].'"';
                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarAsistente" onclick="editarAsistente('.$cont.')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';


                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarAsistente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                      $Asistentes=$Asistentes."</tr>";
                     $cont++;

                  }
              } else{
                $Asistentes=$Asistentes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Asistentes;
              }
              $conn->close();
              return $Asistentes;
    }
    public function verSexoEstudiante($Sex,$rol) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $Estudiantes = "";

              $result = $conn->query("CALL ordenarSexoEstudiantes('$Sex')");
                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                    $Estudiantes=$Estudiantes."<tr>";
                    $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabinaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                    if($row['confirmacuetaestudiante']==1){
                 $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

               }else{
                  $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
               }


                    $id = '"'.$row['idestudiante'].'"';
                    if($rol=="administrador"){


                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                        <td><input type="hidden" id="idEstudiante"></td>

                    ';}




                    $Estudiantes=$Estudiantes."</tr>";
                   $cont++;
                  }
              } else{
                $Estudiantes=$Estudiantes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Estudiantes;
              }
              $conn->close();
              return $Estudiantes;
    }
    public function verBusquedaAsistente($ser) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $nueva='%'.$ser.'%';
              $Asistentes = "";

              $result = $conn->query("CALL busquedaAsistente('$nueva')");
                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                      $Asistentes=$Asistentes."<tr>";
                      $Asistentes=$Asistentes.'<td id="cedulaAsistente'.$cont.'">'.$row['cedulaasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="nombreAsistente'.$cont.'">'.$row['nombreasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="primerApellidoAsistente'.$cont.'">'.$row['primerapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="segundoApellidoAsistente'.$cont.'">'.$row['segundoapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="sexoAsistente'.$cont.'">'.$row['sexo'].'</td>';

                      $id = '"'.$row['idasistente'].'"';
                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarAsistente" onclick="editarAsistente('.$cont.')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';


                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarAsistente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                      $Asistentes=$Asistentes."</tr>";
                     $cont++;

                  }
              } else{
                $Asistentes=$Asistentes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Asistentes;
              }
              $conn->close();
              return $Asistentes;
    }
    public function verBusquedaEstudiante($ser,$usuario) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $nueva='%'.$ser.'%';
              $Estudiantes = "";

              $result = $conn->query("CALL busquedaEstudiante('$nueva')");
                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                    $Estudiantes=$Estudiantes."<tr>";
                    $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabinaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                    if($row['confirmacuetaestudiante']==1){
                 $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

               }else{
                  $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
               }


                    $id = '"'.$row['idestudiante'].'"';
                    if($usuario=="administrador"){
                      $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                      $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                          <td><input type="hidden" id="idEstudiante"></td>';
                    }







                    $Estudiantes=$Estudiantes."</tr>";
                   $cont++;

                  }
              } else{
                $Estudiantes=$Estudiantes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Estudiantes;
              }
              $conn->close();
              return $Estudiantes;
    }
    public function verORdeNomAsistente($ser) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');

              $Asistentes = "";

  if($ser=="A"){
      $result = $conn->query("CALL ordenarNombreParametrosAsistente ('A','G')");
  }else if($ser=="B"){

      $result = $conn->query("CALL ordenarNombreParametrosAsistente ('H','L')");
  }else if($ser=="C"){
      $result = $conn->query("CALL ordenarNombreParametrosAsistente ('M','P')");
  }else if($ser=="D"){
      $result = $conn->query("CALL ordenarNombreParametrosAsistente ('Q','U')");
  }else if($ser=="E"){
      $result = $conn->query("CALL ordenarNombreParametrosAsistente ('V','Z')");
  }

                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                      $Asistentes=$Asistentes."<tr>";
                      $Asistentes=$Asistentes.'<td id="cedulaAsistente'.$cont.'">'.$row['cedulaasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="nombreAsistente'.$cont.'">'.$row['nombreasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="primerApellidoAsistente'.$cont.'">'.$row['primerapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="segundoApellidoAsistente'.$cont.'">'.$row['segundoapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="sexoAsistente'.$cont.'">'.$row['sexo'].'</td>';

                      $id = '"'.$row['idasistente'].'"';
                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarAsistente" onclick="editarAsistente('.$cont.')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';


                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarAsistente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                      $Asistentes=$Asistentes."</tr>";
                     $cont++;

                  }
              } else{
                $Asistentes=$Asistentes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Asistentes;
              }
              $conn->close();
              return $Asistentes;
    }

    public function verORdeNomEstudiante($ser,$user
  ) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');

              $Estudiantes = "";

  if($ser=="A"){
      $result = $conn->query("CALL ordenarNombreParametrosEstudiante ('A','G')");
  }else if($ser=="B"){

      $result = $conn->query("CALL ordenarNombreParametrosEstudiante ('H','L')");
  }else if($ser=="C"){
      $result = $conn->query("CALL ordenarNombreParametrosEstudiante ('M','P')");
  }else if($ser=="D"){
      $result = $conn->query("CALL ordenarNombreParametrosEstudiante ('Q','U')");
  }else if($ser=="E"){
      $result = $conn->query("CALL ordenarNombreParametrosEstudiante ('V','Z')");
  }

                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                    $Estudiantes=$Estudiantes."<tr>";
                    $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabinaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                    if($row['confirmacuetaestudiante']==1){
                 $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

               }else{
                  $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
               }


                    $id = '"'.$row['idestudiante'].'"';
                    if($user=="administrador"){
                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                        <td><input type="hidden" id="idEstudiante"></td>

                    ';}




                    $Estudiantes=$Estudiantes."</tr>";
                   $cont++;

                  }
              } else{
                $Estudiantes=$Estudiantes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Estudiantes;
              }
              $conn->close();
              return $Estudiantes;
    }
    public function verORdApellidoAsistente($ser) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');

              $Asistentes = "";

    if($ser=="A"){
      $result = $conn->query("CALL ordenarApellidoParametrosAsistente ('A','G')");
    }else if($ser=="B"){

      $result = $conn->query("CALL ordenarApellidoParametrosAsistente ('H','L')");
    }else if($ser=="C"){
      $result = $conn->query("CALL ordenarApellidoParametrosAsistente ('M','P')");
    }else if($ser=="D"){
      $result = $conn->query("CALL ordenarApellidoParametrosAsistente ('Q','U')");
    }else if($ser=="E"){
      $result = $conn->query("CALL ordenarApellidoParametrosAsistente ('V','Z')");
    }

                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                      $Asistentes=$Asistentes."<tr>";
                      $Asistentes=$Asistentes.'<td id="cedulaAsistente'.$cont.'">'.$row['cedulaasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="nombreAsistente'.$cont.'">'.$row['nombreasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="primerApellidoAsistente'.$cont.'">'.$row['primerapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="segundoApellidoAsistente'.$cont.'">'.$row['segundoapellidoasistente'].'</td>';
                      $Asistentes=$Asistentes.'<td id="sexoAsistente'.$cont.'">'.$row['sexo'].'</td>';

                      $id = '"'.$row['idasistente'].'"';
                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarAsistente" onclick="editarAsistente('.$cont.')"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';


                      $Asistentes=$Asistentes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarAsistente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                      $Asistentes=$Asistentes."</tr>";
                     $cont++;

                  }
              } else{
                $Asistentes=$Asistentes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Asistentes;
              }
              $conn->close();
              return $Asistentes;
    }
    public function verORdApellidoEstudiante($ser,$usuario) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');

              $Estudiantes = "";

    if($ser=="A"){
      $result = $conn->query("CALL ordenarApellidoParametrosEstudiante ('A','G')");
    }else if($ser=="B"){

      $result = $conn->query("CALL ordenarApellidoParametrosEstudiante ('H','L')");
    }else if($ser=="C"){
      $result = $conn->query("CALL ordenarApellidoParametrosEstudiante ('M','P')");
    }else if($ser=="D"){
      $result = $conn->query("CALL ordenarApellidoParametrosEstudiante ('Q','U')");
    }else if($ser=="E"){
      $result = $conn->query("CALL ordenarApellidoParametrosEstudiante ('V','Z')");
    }

                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                    $Estudiantes=$Estudiantes."<tr>";
                    $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabinaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                    if($row['confirmacuetaestudiante']==1){
                 $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

               }else{
                  $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
               }


                    $id = '"'.$row['idestudiante'].'"';
                    if($usuario=="administrador"){


                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                        <td><input type="hidden" id="idEstudiante"></td>

                    ';}




                    $Estudiantes=$Estudiantes."</tr>";
                   $cont++;

                  }
              } else{
                $Estudiantes=$Estudiantes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Estudiantes;
              }
              $conn->close();
              return $Estudiantes;
    }
    public function verOrdenarCarreEstudiante($ser,$user) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');

              $Estudiantes = "";

    if($ser=="A"){
      $result = $conn->query("CALL verOrdenarCarreraEstudiante ('Administracion de empresas')");
    }else if($ser=="B"){

      $result = $conn->query("CALL verOrdenarCarreraEstudiante ('Administracion de oficinas')");
    }else if($ser=="C"){
      $result = $conn->query("CALL verOrdenarCarreraEstudiante ('Educacion rural')");
    }else if($ser=="D"){
      $result = $conn->query("CALL verOrdenarCarreraEstudiante ('Ingenieria en sistemas')");
    }else if($ser=="E"){
      $result = $conn->query("CALL verOrdenarCarreraEstudiante ('Recreacion turistica')");
    }

                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                    $Estudiantes=$Estudiantes."<tr>";
                    $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabinaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                    if($row['confirmacuetaestudiante']==1){
                 $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

               }else{
                  $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
               }


                    $id = '"'.$row['idestudiante'].'"';
                    if($user=="administrador"){
                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                        <td><input type="hidden" id="idEstudiante"></td>

                    ';}




                    $Estudiantes=$Estudiantes."</tr>";
                   $cont++;

                  }
              } else{
                $Estudiantes=$Estudiantes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Estudiantes;
              }
              $conn->close();
              return $Estudiantes;
    }
    public function verOrdenarAccesoEstudiante($ser,$user) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');

              $Estudiantes = "";

      $result = $conn->query("CALL verOrdenarAccesoEstudiante ('$ser')");


                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                    $Estudiantes=$Estudiantes."<tr>";
                    $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabinaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                    if($row['confirmacuetaestudiante']==1){
                 $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

               }else{
                  $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
               }


                    $id = '"'.$row['idestudiante'].'"';
                    if($user=="administrador"){


                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                        <td><input type="hidden" id="idEstudiante"></td>

                    ';}




                    $Estudiantes=$Estudiantes."</tr>";
                   $cont++;

                  }
              } else{
                $Estudiantes=$Estudiantes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Estudiantes;
              }
              $conn->close();
              return $Estudiantes;
    }

    public function verOrdenarAnioEstudiante($ser,$user) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');

              $Estudiantes = "";

      $result = $conn->query("CALL verOrdenarAnioEstudiante ('$ser')");


                    $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                    $Estudiantes=$Estudiantes."<tr>";
                    $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabinaestudiante']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                    $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                    if($row['confirmacuetaestudiante']==1){
                 $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

               }else{
                  $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
               }


                    $id = '"'.$row['idestudiante'].'"';
                    if($user=="administrador"){
                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                    $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                        <td><input type="hidden" id="idEstudiante"></td>

                    ';}




                    $Estudiantes=$Estudiantes."</tr>";
                   $cont++;

                  }
              } else{
                $Estudiantes=$Estudiantes.'<h1>NO SE ENCONTRARON RESULTADOS</h1>';
                echo $Estudiantes;
              }
              $conn->close();
              return $Estudiantes;
    }
    public function verEstudiantes($rol) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $Estudiantes= "";
              $result = $conn->query("CALL verEstudiantes()");
                $cont=1;
              if ($result) {

                  while ($row = $result->fetch_assoc()) {
                      $Estudiantes=$Estudiantes."<tr>";
                      $Estudiantes=$Estudiantes.'<td id="cedulaEstudiante'.$cont.'">'.$row['cedulaestudiante']."</td>";
                      $Estudiantes=$Estudiantes.'<td id="nombreEstudiante'.$cont.'">'.$row['nombreestudiante']."</td>";
                      $Estudiantes=$Estudiantes.'<td id="primerApellidoEstudiante'.$cont.'" >'.$row['primerapellidoestudiante']."</td>";
                      $Estudiantes=$Estudiantes.'<td id="segundoApellidoEstudiante'.$cont.'"> '.$row['segundoapellidoestudiante']."</td>";
                      $Estudiantes=$Estudiantes.'<td id="sexoEstudiante'.$cont.'">'.$row['sexo']."</td>";
                      $Estudiantes=$Estudiantes.'<td id="cabinaEstudiante'.$cont.'">'.$row['cabina']."</td>";
                      $Estudiantes=$Estudiantes.'<td id="anoIngreso'.$cont.'">'.$row['fechaingreso']."</td>";
                      $Estudiantes=$Estudiantes.'<td id="carreraEstudiante'.$cont.'">'.$row['carreraestudiante']."</td>";

                      if($row['estadocuenta']==1){
                   $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">SI</td>';

                 }else{
                    $Estudiantes=$Estudiantes.'<td id="estadoCuenta'.$cont.'">NO</td>';
                 }

                 if($rol=="administrador"){

                   $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarEstudiante" onclick="editarEstudiante('.$cont.')" ><span class="glyphicon glyphicon-pencil"></span></button></p>';

                   $Estudiantes=$Estudiantes.'<td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargarEliminarResidente('.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p> </td>
                       <td style="display:none;"><input type="hidden" id="idEstudiante"></td>

                   ';
                 }
                       $id = '"'.$row['idestudiante'].'"';



                      $Estudiantes=$Estudiantes."</tr>";
                     $cont++;
                  }
              } else {
                  echo 'no se pudo acceder';
              }
              $conn->close();
              return $Estudiantes;
    }

    public function cargarPerfilUsuario($ced,$rol) {



              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');

              $Estudiantes = "";


  $cont=1;
if($rol=="administrador"){
  $result = $conn->query("CALL verAdministrador('$ced')");

if ($result) {

  while ($row = $result->fetch_assoc()) {
       $Estudiantes='<div class="col-md-4"></div>
                      <div class="col-md-5">  <img src="../imagenes/chico.png" class="imgRedonda" alt="30" heigth="30"  ></div>
                      <div class="col-md-12"></div>
                      <div class="col-md-12"></div>
                      <div class="col-md-12"></div>
                      <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon"> CEDULA</span>
     <input type="text" id="cedulaPerfil" class="form-control" value="'.$ced.'" disabled>

   </div>

                   </div>


                     </div>
                     <div class="col-md-12"></div>
                     <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon">APELLIDO 1</span>
     <input type="text" class="form-control" value="'.$row['primerapellidoadministrador'].'" id="primerAperfil"disabled>

   </div>

                   </div>


                     </div>
                     <div class="col-md-12"></div>
                     <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon">APELLIDO 2</span>
     <input type="text" class="form-control" value="'.$row['segundoapellidoadministrador'].'" id="segundoAperfil" disabled>

   </div>

                   </div>


                     </div>
                     <div class="col-md-12"></div>
                     <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon"> NOMBRE</span>
     <input type="text" class="form-control" value="'.$row['nombreadministrador'].'" id="nombrePerfil" disabled>

   </div>

                   </div>


                     </div>

                              <div class="col-md-12"></div>
                              <div class="col-md-4"></div>

                              <div class="col-md-2"><br><button class="boton" href="#" data-toggle="modal" data-target="#actualizarPerfil" onclick="editarAdministrador()"
         >EDITAR</button></div>

                                <div class="col-md-12"></div>





                        ';



   $cont++;

  }
}

}else if($rol=="asistente"){
  $result = $conn->query("CALL verAsistente('$ced')");


if ($result) {

  while ($row = $result->fetch_assoc()) {
       $Estudiantes='<div class="col-md-4"></div>
                      <div class="col-md-5">';
                      if($row['sexo']=="F"){
 $Estudiantes= $Estudiantes.'<img src="../imagenes/chica.png" class="imgRedonda" alt="30" heigth="30"  ></div>';

                  }else{
                    $Estudiantes= $Estudiantes.'<img src="../imagenes/chico.png" class="imgRedonda" alt="30"  heigth="30"  ></div>';
                  }

                  $Estudiantes= $Estudiantes.'<div class="col-md-12"></div>
                      <div class="col-md-12"></div>
                      <div class="col-md-12"></div>
                      <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon"> CEDULA</span>
     <input type="text" id="cedulaAsistente1" class="form-control" value="'.$ced.'" disabled>

   </div>

                   </div>


                     </div>
                     <div class="col-md-12"></div>
                     <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon">APELLIDO 1</span>
     <input type="text" class="form-control" value="'.$row['primerapellidoasistente'].'" id="primerApellidoAsistente1"disabled>

   </div>

                   </div>


                     </div>
                     <div class="col-md-12"></div>
                     <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon">APELLIDO 2</span>
     <input type="text" class="form-control" value="'.$row['segundoapellidoasistente'].'" id="segundoApellidoAsistente1" disabled>

   </div>

                   </div>


                     </div>
                     <div class="col-md-12"></div>
                     <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon"> NOMBRE</span>
     <input type="text" class="form-control" value="'.$row['nombreasistente'].'" id="nombreAsistente1" disabled>

   </div>

                   </div>


                     </div>
                     <div class="col-md-12"></div>
                     <div class="col-md-2"></div>
                     <div class="col-md-9">

                     <div class="input-group">
<span class="input-group-addon"> SEXO</span>
     <input type="text" class="form-control" value="'.$row['sexo'].'" id="sexoAsistente1" disabled>

   </div>

                   </div>


                     </div>

                              <div class="col-md-12"></div>
                              <div class="col-md-4"></div>

                              <div class="col-md-2"><br><button class="boton" href="#" data-toggle="modal" data-target="#actualizarPerfil" onclick="editarAsistentePerfil('.$cont.')"
         >EDITAR</button></div>

                                <div class="col-md-12"></div>





                        ';



   $cont++;

  }
}


}else if($rol=="estudiante"){
  $result = $conn->query("CALL verEstudiante('$ced')");

  if ($result) {

    while ($row = $result->fetch_assoc()) {
         $Estudiantes='<div class="col-md-4"></div>
                        <div class="col-md-5">';
                        if($row['sexo']=="F"){
   $Estudiantes= $Estudiantes.'<img src="../imagenes/chica.png" class="imgRedonda" alt="30" heigth="30"  ></div>';

                    }else{
                      $Estudiantes= $Estudiantes.'<img src="../imagenes/chico.png" class="imgRedonda" alt="30"  heigth="30"  ></div>';
                    }

                    $Estudiantes= $Estudiantes.'<div class="col-md-12"></div>
                        <div class="col-md-12"></div>
                        <div class="col-md-12"></div>
                        <div class="col-md-2"></div>
                       <div class="col-md-9">

                       <div class="input-group">
  <span class="input-group-addon"> CEDULA</span>
       <input type="text" id="cedulaEstudiante1" class="form-control" value="'.$ced.'" disabled>

     </div>

                     </div>


                       </div>
                       <div class="col-md-12"></div>
                       <div class="col-md-2"></div>
                       <div class="col-md-9">

                       <div class="input-group">
  <span class="input-group-addon">APELLIDO 1</span>
       <input type="text" class="form-control" value="'.$row['primerapellidoestudiante'].'" id="primerApellidoEstudiante1"disabled>

     </div>

                     </div>


                       </div>
                       <div class="col-md-12"></div>
                       <div class="col-md-2"></div>
                       <div class="col-md-9">

                       <div class="input-group">
  <span class="input-group-addon">APELLIDO 2</span>
       <input type="text" class="form-control" value="'.$row['segundoapellidoestudiante'].'" id="segundoApellidoEstudiante1" disabled>

     </div>

                     </div>


                       </div>
                       <div class="col-md-12"></div>
                       <div class="col-md-2"></div>
                       <div class="col-md-9">

                       <div class="input-group">
  <span class="input-group-addon"> NOMBRE</span>
       <input type="text" class="form-control" value="'.$row['nombreestudiante'].'" id="nombreEstudiante1" disabled>

     </div>

                     </div>


                       </div>
                       <div class="col-md-12"></div>
                       <div class="col-md-2"></div>
                       <div class="col-md-9">

                       <div class="input-group">
  <span class="input-group-addon"> SEXO</span>
       <input type="text" class="form-control" value="'.$row['sexo'].'" id="sexoEstudiante1" disabled>

     </div>

                     </div>


                       </div>
                       <div class="col-md-12"></div>
                       <div class="col-md-2"></div>
                       <div class="col-md-9">

                       <div class="input-group">
  <span class="input-group-addon"> CABINA</span>
       <input type="text" class="form-control" value="'.$row['cabinaestudiante'].'" id="cabinaEstudiante1" disabled>

     </div>

                     </div>


                       </div>
                       <div class="col-md-12"></div>
                       <div class="col-md-2"></div>
                       <div class="col-md-9">

                       <div class="input-group">
  <span class="input-group-addon"> INGRESO</span>
       <input type="text" class="form-control" value="'.$row['fechaingreso'].'" id="anoIngreso1" disabled>

     </div>

                     </div>


                       </div>
                       <div class="col-md-12"></div>
                       <div class="col-md-2"></div>
                       <div class="col-md-9">

                       <div class="input-group">
  <span class="input-group-addon"> CARRERA</span>
       <input type="text" class="form-control" value="'.$row['carreraestudiante'].'" id="carreraEstudiante1" disabled>
 <input type="hidden" class="form-control" value="1" id="estadoCuenta1" disabled>
     </div>

                     </div>


                       </div>


                                <div class="col-md-12"></div>
                                <div class="col-md-4"></div>

                                <div class="col-md-2"><br><button class="boton" href="#" data-toggle="modal" data-target="#actualizarPerfil" onclick="editarEstudiantePerfil('.$cont.')"()"
           >EDITAR</button></div>

                                  <div class="col-md-12"></div>





                          ';



     $cont++;

    }
  }


}





    $conn->close();
    return $Estudiantes;
}
function cargarDisponibilidadCorreo($correo) {
   $mensaje = "";

   $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   $result = $conn->query("CALL verficarCorreo('$correo')");
   if ($result) {
     $row = $result->fetch_assoc();
   if($row['userlogin']!=null){

     echo "true";
    } else {
        echo "false";
    }
  }





   $conn->close();

}







    ///////////////////Datos administrador Reporte/////////////////////
function verDatosReporte($cedula,$rol) {
  $result ="";
  $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  $conn->set_charset('utf8');
  $Datos ="";
  if($rol=="administrador"){
    $result = $conn->query("CALL datosAdministradorReporte(".$cedula.")");
  }else if($rol=="estudiante") {
    $result = $conn->query("CALL datosEstudianteReporte(".$cedula.")");
  }else if($rol=="asistente"){
    $result = $conn->query("CALL datosAsistenteReporte(".$cedula.")");
  }

   if ($result) {

       while ($row = $result->fetch_assoc()) {

         $nombreCompleto = " ".$row['nombre'] . " " . $row['apellido'] ;

       }
    } else {
       echo 'Error';
    }
    $conn->close();
    return $nombreCompleto;
}


}
