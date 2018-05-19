<?php

require_once 'data.php';

class NoticiaData {

    private $data;

    function NoticiaData() {
        $this->data = new Data();
    }

    public function insertarNoticia($noticia) {
        $booleano = 0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
          $conn->set_charset('utf8');

        $creador = $noticia->getCreador();
        $tema = $noticia->getTema();
        $detalle = $noticia->getDescripcion();
        $foto = $noticia->getFotoNoticia();
        $fecha = $noticia->getFechaCreacion();

        $statement = $conn->prepare("CALL insertarNoticia(?,?,?,?,?)");
        $statement->bind_param("sssss", $creador, $tema, $detalle, $foto, $fecha);
        $statement->execute();

        if ($statement == TRUE) {
            $booleano = 1;
        }
        $statement->close();
        $conn->close();

        return $booleano;
    }


    public function mostrarTodasNoticias() {
        $noticias ='<div  class="row">';
       
     


        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $conn->set_charset('utf8');
        $result = $conn->query("CALL mostrarTodasNoticias()");
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
              $foto=$row["fotonoticia"];

              $nombreCompleto = $row['n1'].$row['n2'] ." ". $row['p1'].$row['p2'] . " " . $row['pp1']. $row['pp2'];

              $noticias=$noticias.' 
              <div class="4u 12u$(mobile)">
                  <article class="item">
                    <a href="#" onclick="verNotica('.$row['idnoticia'].')" class="image fit"><img src="../uploads/Noticias/'.$foto.'" alt="" /></a>
                    <header>
                      <h3>'.$row["temanoticia"].'</h3>
                      <h4>Por:'.$nombreCompleto.'</h4>
                      <h5>Fecha:'.$row["fechanoticia"].'</h5>
                      <button id="verNoticia" onclick="verNotica('.$row['idnoticia'].')" class="btn">VER</button>
                    </header>
                  </article>
                </div>'
                ; 

            }
        }
        $conn->close();

        $noticias=$noticias.'</div>';

        return $noticias;
    }
 


    public function actualizarAviso($noticia) {
        $booleano = 0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $conn->set_charset('utf8');
        $creador = $noticia->getCreador();
        $tema = $noticia->getTema();
        $detalle = $noticia->getDescripcion();
        $foto = $noticia->getFotoNoticia();
        $idAviso = $noticia->getIdNoticia();

        $statement = $conn->prepare("CALL actualizarNoticia(?,?,?,?,?)");
        $statement->bind_param("ssssi", $creador, $tema, $detalle, $foto, $idAviso);
        $statement->execute();


        if ($statement == TRUE) {
            $booleano = 1;
        }
        $statement->close();
        $conn->close();
        return $booleano;

    }

    public function verMisNoticias($creador) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $misNoticias="";
        $conn->set_charset('utf8');
        $result = $conn->query("CALL mostrarMisAvisos('$creador')");
        if ($result) {
            $cont=1;
            while ($row = $result->fetch_assoc()) {

                $misNoticias=$misNoticias."<tr>";
                $misNoticias=$misNoticias.'<td id=tema'.$cont.'>'.$row['temanoticia']."</td>";
                $misNoticias=$misNoticias.'<td id=descripcionnoticia'.$cont.'>'.$row['descripcionnoticia']."</td>";
                $misNoticias=$misNoticias.'<td hidden id=fotonoticia'.$cont.'>'.$row['fotonoticia']."</td>";
                $misNoticias=$misNoticias.'<td id=fechanoticia'.$cont.'>'.$row['fechanoticia']."</td>";
                $id = $row['idnoticia'];
                $misNoticias=$misNoticias.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarNoticia" onclick="cargarEditarNoticia('.$id.','.$cont.');ocultarSubir2()"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
                $misNoticias=$misNoticias.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargaIdNoticiaEliminar('.$id.','.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

                $misNoticias=$misNoticias."</tr>";
                $cont=$cont+1;
            }
          } else {
              echo 'no se pudo acceder';
          }
          $conn->close();
        return $misNoticias;
    }


      public function verMisNoticiasReporte($creador) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $misNoticias="";
        $conn->set_charset('utf8');
        $result = $conn->query("CALL mostrarMisAvisos('$creador')");
        if ($result) {
            $cont=1;
            while ($row = $result->fetch_assoc()) {

                $misNoticias=$misNoticias."<tr>";
                $misNoticias=$misNoticias.'<td id=tema'.$cont.'>'.$row['temanoticia']."</td>";
                $misNoticias=$misNoticias.'<td id=descripcionnoticia'.$cont.'>'.$row['descripcionnoticia']."</td>";
                $misNoticias=$misNoticias.'<td id=fechanoticia'.$cont.'>'.$row['fechanoticia']."</td>";

                $misNoticias=$misNoticias."</tr>";
                $cont=$cont+1;
            }
          } else {
              echo 'no se pudo acceder';
          }
          $conn->close();
        return $misNoticias;
    }

    public function insertarComentario($comentario) {
        $booleano = 0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $conn->set_charset('utf8');
        $idAviso = $comentario->getIdAviso();
        $creador = $comentario->getCreador();
        $mensaje = $comentario->getMensaje();
        $statement = $conn->prepare("CALL insertarComentario(?,?,?)");
        $statement->bind_param("iss", $idAviso, $creador, $mensaje);
        $statement->execute();

        if ($statement == TRUE) {
            $booleano = 1;
        }
        $statement->close();
        $conn->close();
        return $booleano;
    }

    public function mostrarComentarioAviso($idaviso) {
        $comentario = "";
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $conn->set_charset('utf8');
        $result = $conn->query("CALL mostrarComentariosNotica('$idaviso')");
        if ($result->num_rows > 0) { 
            while ($row = $result->fetch_assoc()) {
                $creador = $row['n0'].$row['n1'].$row['n2']." ". $row['p0']. $row['p1'].$row['p2'] . " " .
                $row['pp0'].$row['pp1']. $row['pp2'];

                $comentario=$comentario.'
                <div class="row">
                   <div class="col-25">
                      <label for="lname">Por: '.$creador.'</label>
                   </div>
                   <div class="col-75">
                      <textarea rows="4"  cols="30" class="txtArea form-control"  type="text" value="'.$row["comentario"].'" disabled >'.$row["comentario"].'</textarea>
                   </div>
                </div>
                ';
            } 
        }
        $conn->close();
        
        if($comentario==''){
          $comentario='<span class="glyphicon glyphicon-info-sign"></span>Anuncio sin comentarios';
        }
        return $comentario;
    }

   

    public function getIndiceImagen($creador) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $conn->set_charset('utf8');
        $cont = 0;
        $result = $conn->query("CALL getIndiceImagen('$creador')");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cont++;
            }
        }
        $conn->close();
        return $cont;
    }

    public function eliminarNoticia($idNoticia) {
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $booleano = 0;
      // Check connection
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $conn->set_charset('utf8');
      $statement = $conn->prepare("CALL eliminarNoticia(?)");
      $statement->bind_param("i", $idNoticia);
      $statement->execute();
      if ($statement == TRUE) {
          $booleano = 1;
      }
      $statement->close();
      $conn->close();
      return $booleano;
    }

 //-----------------------------------------------------------------------------

    public function consultarCreadorNoticiaAsi($cedula){
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $conn->set_charset('utf8');
      $creadorAsi="";
      $result = $conn->query("SELECT nombreasistente, primerapellidoasistente FROM tbasistente WHERE cedulaasistente= '$cedula' ");
      if ($result) {
        while ($row = $result->fetch_assoc()) {
          $creadorAsi=$row['nombreasistente']. ' '.$row['primerapellidoasistente'];
          break;
        }

      }
      $conn->close();
      return $creadorAsi;
    }

    public function consultarCreadorNoticiaAdm($cedula){
      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $conn->set_charset('utf8');
      $creadorAdm="";
      $result = $conn->query("SELECT nombreadministrador, primerapellidoadministrador FROM tbadministrador WHERE cedulaadministrador= '$cedula' ");
      if ($result) {
          while ($row = $result->fetch_assoc()) {
              $creadorAdm=$row['nombreadministrador']. ' '.$row['primerapellidoadministrador'];
              break;
          }

      }
      $conn->close();
      return $creadorAdm;
    }



    public function consultarNoticiaResidencial($idNoticia){

      $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $conn->set_charset('utf8');
      $noticiaResidencial= array();;

      $result = $conn->query("SELECT * FROM tbnoticias WHERE idnoticia= '$idNoticia' ");
      if ($result) {
          while ($row = $result->fetch_assoc()) {
              $noticiaResidencial= new Noticia($row['idnoticia'],$row['idcreadornoticia'],$row['temanoticia'],
              $row['descripcionnoticia'], $row['fotonoticia'], $row['fechanoticia']);
           break;
          };

        } else {
            echo 'Error';
        }
        $conn->close();
        return $noticiaResidencial;
}




//---------------------REPORTES NOTICIAS--------------------------------------------
function palabraBuscadaNoticia($palabra,$idCreador) {
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $conn->set_charset('utf8');
  $misNoticias="";
  $palabra='%'.$palabra.'%';
  $result = $conn->query("CALL palabraBuscadaNoticia('$palabra','$idCreador')");
  if ($result) {
      $cont=1;
      while ($row = $result->fetch_assoc()) {

          $misNoticias=$misNoticias."<tr>";
          $misNoticias=$misNoticias.'<td id=tema'.$cont.'>'.$row['temanoticia']."</td>";
          $misNoticias=$misNoticias.'<td id=descripcionnoticia'.$cont.'>'.$row['descripcionnoticia']."</td>";
          $misNoticias=$misNoticias.'<td hidden id=fotonoticia'.$cont.'>'.$row['fotonoticia']."</td>";
          $misNoticias=$misNoticias.'<td id=fechanoticia'.$cont.'>'.$row['fechanoticia']."</td>";
          $id = $row['idnoticia'];
          $misNoticias=$misNoticias.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarNoticia" onclick="cargarEditarNoticia('.$id.','.$cont.');ocultarSubir2()"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
          $misNoticias=$misNoticias.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargaIdNoticiaEliminar('.$id.','.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

          $misNoticias=$misNoticias."</tr>";
          $cont=$cont+1;
      }
    } else {
        echo 'no se pudo acceder';
    }
    $conn->close();
  return $misNoticias;
}

function buscarFehaNoticia($fecha,$idCreador) {
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $conn->set_charset('utf8');
  $misNoticias="";
  $result = $conn->query("CALL buscarFehaNoticia('$fecha','$idCreador')");
  if ($result) {
      $cont=1;
      while ($row = $result->fetch_assoc()) {

          $misNoticias=$misNoticias."<tr>";
          $misNoticias=$misNoticias.'<td id=tema'.$cont.'>'.$row['temanoticia']."</td>";
          $misNoticias=$misNoticias.'<td id=descripcionnoticia'.$cont.'>'.$row['descripcionnoticia']."</td>";
          $misNoticias=$misNoticias.'<td hidden id=fotonoticia'.$cont.'>'.$row['fotonoticia']."</td>";
          $misNoticias=$misNoticias.'<td id=fechanoticia'.$cont.'>'.$row['fechanoticia']."</td>";
          $id = $row['idnoticia'];
          $misNoticias=$misNoticias.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarNoticia" onclick="cargarEditarNoticia('.$id.','.$cont.');ocultarSubir2()"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
          $misNoticias=$misNoticias.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargaIdNoticiaEliminar('.$id.','.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

          $misNoticias=$misNoticias."</tr>";
          $cont=$cont+1;
      }
    } else {
        echo 'no se pudo acceder';
    }
    $conn->close();
  return $misNoticias;
}


function buscarFechaNoticiaReporte($fecha,$idCreador) {
  $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $conn->set_charset('utf8');
  $misNoticias="";
  $result = $conn->query("CALL buscarFehaNoticia('$fecha','$idCreador')");
  if ($result) {
      $cont=1;
      while ($row = $result->fetch_assoc()) {

          $misNoticias=$misNoticias."<tr>";
          $misNoticias=$misNoticias.'<td id=tema'.$cont.'>'.$row['temanoticia']."</td>";
          $misNoticias=$misNoticias.'<td id=descripcionnoticia'.$cont.'>'.$row['descripcionnoticia']."</td>";
          $misNoticias=$misNoticias.'<td id=fechanoticia'.$cont.'>'.$row['fechanoticia']."</td>";
          $id = $row['idnoticia'];
          $misNoticias=$misNoticias.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarNoticia" onclick="cargarEditarNoticia('.$id.','.$cont.');ocultarSubir2()"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
          $misNoticias=$misNoticias.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="cargaIdNoticiaEliminar('.$id.','.$cont.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

          $misNoticias=$misNoticias."</tr>";
          $cont=$cont+1;
      }
    } else {
        echo 'no se pudo acceder';
    }
    $conn->close();
  return $misNoticias;
}


}


?>
