<?php
include 'noticiaBusiness.php';
require_once '../../Domain/noticia.php';
require_once '../../Domain/comentario.php';

//Método con str_shuffle()
function generateRandomString($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function redimensionar_imagen($nombreimg, $rutaimg, $xmax, $ymax){
    $ext = explode(".", $nombreimg);
    $ext = $ext[count($ext)-1];

    if($ext == "jpg" || $ext == "jpeg")
        $imagen = imagecreatefromjpeg($rutaimg);
    elseif($ext == "png")
        $imagen = imagecreatefrompng($rutaimg);
    elseif($ext == "gif")
        $imagen = imagecreatefromgif($rutaimg);

    $x = imagesx($imagen);
    $y = imagesy($imagen);

    if($x <= $xmax && $y <= $ymax){
        return $imagen;
    }

    if($x >= $y) {
        $nuevax = $xmax;
        $nuevay = $nuevax * $y / $x;
    }
    else {
        $nuevay = $ymax;
        $nuevax = $x / $y * $nuevay;
    }

    $img2 = imagecreatetruecolor($nuevax, $nuevay);
    imagecopyresized($img2, $imagen, 0, 0, 0, 0, floor($nuevax), floor($nuevay), $x, $y);
    return $img2;
}

if (isset($_POST['accion'])) {

$accion = $_POST['accion'];
if($accion == "consultarNoticiaResidencial"){
  $noticiaBusiness = new NoticiaBusiness();
  if (isset($_POST['idnoticia'])){
    $idNoticia=$_POST['idnoticia'];
    $MostrarNoticiaResidencial="";
//----RECOLECTAMOS LOS DATOS DE LA NOTICIAS-------------------------------------
    $resultNotcia=$noticiaBusiness->consultarNoticiaResidencial($idNoticia);
    $titulo=$resultNotcia->getTema();
    $noticia=$resultNotcia->getDescripcion();
    $foto=$resultNotcia->getFotoNoticia();
    $fecha=$resultNotcia->getFechaCreacion();
    $cedulaCreador=$resultNotcia->getCreador();




//--RECOLECTAMOS LOS DATOS DEL CREADOR DE LA NOTCIA-------------------------
    $datosCreador="";
    $ResultCreadorAsi=$noticiaBusiness->consultarCreadorNoticiaAsi($cedulaCreador);
    if($ResultCreadorAsi==""){
      $datosCreador=$noticiaBusiness->consultarCreadorNoticiaAdm($cedulaCreador);
    }else {
      $datosCreador=$ResultCreadorAsi;
    }


//---------RECOLECTAMOS LOS COMENTARIOS DE LA NOTICIA
          $comentariosNoticia=$noticiaBusiness->mostrarComentarioAviso($idNoticia);



//--------DAMOS FORMA A LA NOCTICIA RESIDENCIAL CON TODOS SUS DATOS-------------
  $MostrarNoticiaResidencial=$MostrarNoticiaResidencial. '
  <!--NOTICIA-->
   <center><div class="">
      <div class="4u 12u$(mobile)">
         <article class="item">
            <a href="#" class="image fit"><img src="../uploads/Noticias/'.$foto.'" alt="" /></a>
            <header>
               <h3>'.$titulo.'</h3>
               <h4>Por:'.$datosCreador.'</h4>
               <h5>Fecha:'.$fecha.'</h5>
            </header>
            <label class="control-label ">DESCRIPCI&OacuteN:
            <textarea rows="5"  cols="70" class="txtArea"  type="text" id="detalleAnuncio" value="'.$noticia.'" disabled >'.$noticia.'</textarea></label>
         </article>
      </div>
   </div></center>
      

   <!--COMENTARIOS-->
    <aside>
       <header>
         <h3>COMENTARIOS</h3>
       </header>
      <div id="contenidoComentarios">
        '.$comentariosNoticia.'
      </div> 
    </aside> 

   <!--COMENTAR-->
   <div class="row">
      <div class="col-75">
         <input id="comentarioN"  onkeyup=" validarInputComentario(this)"  onchange="habilitarRegistroComentario()"
            mouseleave="habilitarRegistroComentario()" onfocusout="habilitarRegistroComentario()"
            type="text" class="form-control" placeholder="PUBLICAR COMENTARIO">
         <span id="comentarioSpan"></span>
      </div>
      <div class="col-25">
         <button  id="publicarComentario1"
            onclick="publicarComentario('.$idNoticia.')" disabled >
         <span class="glyphicon glyphicon-comment"></span> COMENTAR
         </button>
      </div>
   </div>'
   ;
    
   echo $MostrarNoticiaResidencial;

  }
}

if ($accion == "registarNoticia") {

    $noticiaBusiness = new NoticiaBusiness();
    session_start();
    $directorio = '../uploads/Noticias/';
    if (isset($_POST['temaAnuncio']) && !empty($_POST['temaAnuncio']) && isset($_POST['detalleAnuncio']) && !empty($_POST['detalleAnuncio']) && isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])) {
      $titulo = $_POST['temaAnuncio'];
      $detalle = $_POST['detalleAnuncio'];
      $nombre_img = $_FILES['imagen']['name'];
      $tipo = $_FILES['imagen']['type'];
      $rol = $_POST['rol'];
      $tipo = explode('/', $_FILES['imagen']['type']);

        $indice = $noticiaBusiness->getIndiceImagen($_SESSION['usuario']) + 1;
        $consecutivo=generateRandomString();
        $aviso = new Noticia('', $_SESSION['usuario'], $titulo, $detalle, $_SESSION['usuario'] . '-' . $indice .$consecutivo.'-op.png', date("Y-m-d"));
        $noticiaBusiness = new NoticiaBusiness();

        if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 3145728)) {
            //indicamos los formatos que permitimos subir a nuestro servidor
            if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")) {
                $directorio = '../../uploads/Noticias/';
                move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1]);
                $imagen_optimizada = redimensionar_imagen($_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1], $directorio . $_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1],350,400);
                imagejpeg($imagen_optimizada, $directorio.$_SESSION['usuario'] . '-' . $indice .$consecutivo.'-op'. '.png');
                if (file_exists($directorio . $_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1])) {
                  unlink( $directorio . $_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1]);
                }
                $result = $noticiaBusiness->insertarNoticia($aviso);
                if ($result == 1) {
                  echo $result;
                } else {
                    echo "No se pudo registrar la noticia";
                }

            } else {
                //si no cumple con el formato
                echo "No se puede subir una imagen con ese formato ";
            }
        } else {
              echo "La imagen es demasiado grande";
        }
    } else {
          echo "Campos vacios";
    }
}


if ($accion == "eliminarNoticia") {
      $idNoticia = $_POST['idNoticia'];
      $imagenV = $_POST['imagenV'];
      $directorio = '../../uploads/Noticias/';
      $noticiaBusiness = new NoticiaBusiness();
      $result1=$noticiaBusiness->eliminarNoticia($idNoticia);
      if($result1==1){
        if (file_exists($directorio.$imagenV)) {
          unlink($directorio.$imagenV);
        }
        echo $result1;
      }else {
        echo "Error";
      }

}

if ($accion == "verMisNoticias") {
      session_start();
      $id = $_SESSION['usuario'];
      $noticiaBusiness = new NoticiaBusiness();
      echo $noticiaBusiness->verMisNoticias($id);

}

if ($accion == "verMisNoticiasReporte") {
      session_start();
      $id = $_SESSION['usuario'];
      $noticiaBusiness = new NoticiaBusiness();
      echo $noticiaBusiness->verMisNoticiasReporte($id);

}


if ($accion == "editarNoticia") {
    $noticiaBusiness = new NoticiaBusiness();

    $titulo = $_POST['temaAnuncio'];
    $detalle = $_POST['detalleAnuncio'];
    $imagenV = $_POST['imagenV'];
    $rol = $_POST['rol'];
    $idNoticia = $_POST['idNoticia'];
    session_start();
    $directorio = '../../uploads/Noticias/';

    if (isset($titulo) && !empty($titulo) && isset($detalle) && !empty($detalle) && isset($imagenV) && !empty($imagenV)) {
        $indice = $noticiaBusiness->getIndiceImagen($_SESSION['usuario']) + 1;
        $consecutivo=generateRandomString();
        if(isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])){
          $nombre_img = $_FILES['imagen']['name'];
          $tipo = $_FILES['imagen']['type'];
          $tipo = explode('/', $_FILES['imagen']['type']);

          if (file_exists($directorio.$imagenV)) {
                unlink($directorio.$imagenV);
          }
          $aviso = new Noticia($idNoticia, $_SESSION['usuario'], $titulo, $detalle, $_SESSION['usuario'] . '-' . $indice .$consecutivo. '-op.png', date("Y-m-d"));

          if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 300000)) {
              //indicamos los formatos que permitimos subir a nuestro servidor
              if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png")) {
                //  $directorio = '../../uploads/Noticias/';
                  move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio . $_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1]);
                  $imagen_optimizada = redimensionar_imagen($_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1], $directorio . $_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1],350,400);
                  imagejpeg($imagen_optimizada, $directorio.$_SESSION['usuario'] . '-' . $indice .$consecutivo.'-op.png');
                  if (file_exists($directorio . $_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1])) {
                        unlink( $directorio . $_SESSION['usuario'] . '-' . $indice.$consecutivo . '.' . $tipo[1]);
                  }

              } else {
                  //si no cumple con el formato
                  echo "No se puede subir una imagen con ese formato ";
              }
          }else {
              if ($nombre_img == !NULL)
                  echo "La imagen es demasiado grande ";
          }
        }else{
          $aviso = new Noticia($idNoticia, $_SESSION['usuario'], $titulo, $detalle,$imagenV, date("Y-m-d"));

        }
        $noticiaBusiness = new NoticiaBusiness();
        $result = $noticiaBusiness->actualizarAviso($aviso);


        if ($result == 1) {
            echo $result;
        } else {
            echo "No se pudo registrar la noticia";
        }
    } else {
            echo "Campos vacios";
    }
}



if ($accion == "verTodasNoticias") {
    $noticiaBusiness = new NoticiaBusiness();
    echo $noticiaBusiness->mostrarTodasNoticias();
}
//-------------------------------------REPORTES NOTICIAS----------------------------------

if ($accion == "palabraBuscadaNoticia") {
    session_start();
    $noticiaBusiness = new NoticiaBusiness();
    if(isset($_POST['palabra'])){
      $palabra=$_POST['palabra'];
      echo $noticiaBusiness->palabraBuscadaNoticia($palabra,$_SESSION['usuario']);
    }else {
      echo "camposNulos";
    }
}

if ($accion == "buscarFehaNoticia") {
    session_start();
    $noticiaBusiness = new NoticiaBusiness();
    if(isset($_POST['fecha'])){
      $fecha=$_POST['fecha'];
      echo $noticiaBusiness->buscarFehaNoticia($fecha,$_SESSION['usuario']);
    }else {
      echo "camposNulos";
    }
}

if ($accion == "buscarFechaNoticiaReporte") {
    session_start();
    $noticiaBusiness = new NoticiaBusiness();
    if(isset($_POST['fecha'])){
      $fecha=$_POST['fecha'];
      echo $noticiaBusiness->buscarFechaNoticiaReporte($fecha,$_SESSION['usuario']);
    }else {
      echo "camposNulos";
    }
}

if ($accion == "publicarComentario") {
    session_start();
    $noticiaBusiness = new NoticiaBusiness();
  if (isset($_POST['comentario']) && !empty($_POST['comentario']) && isset($_POST['idnoticia'])){
      $mensaje=$_POST['comentario'];
      $idaviso=$_POST['idnoticia'];
      $comentario = new comentarioAviso('', $idaviso, $_SESSION["usuario"], $mensaje);
      $noticiaBusiness = new NoticiaBusiness();
      echo $result = $noticiaBusiness->insertarComentario($comentario);

  }

}

}else {
  echo "Error";
}
?>
