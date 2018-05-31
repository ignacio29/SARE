<?php
session_start();
if (!isset($_SESSION['estudiante']) && !isset($_SESSION['usuario'])) {

    header("location: ../index.php");
} else {
    if ($_SESSION['estudiante'] == 'estudiante') {
//            echo $_SESSION['estudiante'];
//            echo $_SESSION['usuario'];
    } else {
        header("location: ../index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>SARE</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="../css/estilos.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="../css/dropdow.css">
  <link rel="stylesheet" href="../css/alertify.core.css" />
  <link rel="stylesheet" href="../css/alertify.default.css" />
  <link rel="stylesheet" href="../css/perfil.css" />
  <link rel="stylesheet" href="../css/fonts.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/Jquery.js"></script>


  <script src="../js/main.js"></script>
  <script src="../js/sesiones.js"></script>

  <script src="../js/cargarContenido.js" type="text/javascript"></script>
  <script src="../js/usuarios.js"></script>
  <script src="../js/validacionesFormularios.js" type="text/javascript"></script>
  <script src="../js/jquery.js" type="text/javascript"></script>
  <script src="../js/asignarHorario.js" type="text/javascript"></script>
  <script src="../js/validarHoras.js" type="text/javascript"></script>
  <script src="../js/validacionesHorario.js" type="text/javascript"></script>

  <script src="../js/alertify.js" type="text/javascript"></script>
  <script src="../js/agregarHorarioJS.js" type="text/javascript"></script>
  <script src="../js/alertas.js" type="text/javascript"></script>
  <script src="../js/permisos.js" type="text/javascript"></script>
  <script src="../js/reportesHorarios.js" type="text/javascript"></script>
  <script src="../js/articulos.js" type="text/javascript"></script>
  <script src="../js/busquedaTablasJs.js" type="text/javascript"></script>
  <script src="../js/noticias.js"></script>
  <script src="../js/jspdf.js"></script>
  <script language="javascript">
  window.onload = verDatosReporte();
  </script>
  <script src="../js/paginationtda.js" type="text/javascript"></script>

</head>
<body>
  <header>

    <div class="menu_bar">
      <a href="#" class="btn-menu"><span class="icon-menu"></span>MENU</a>
    </div>
    <nav>
    <div class="logo">
      <img src="../imagenes/logoSare4.png" WIDTH=180 HEIGHT=110 alt="">
    </div>
      <ul>
        <li><a href="estudianteView.php" onclick="ocultarCarrusel(2)"><span class="icon-home"></span>INICIO</a></li>

        <li class="submenu">
          <a href="#"><span class="icon-calendar"></span>HORARIOS<span class="caret icon-down"></span></a>
          <ul class="children">
            <li>
              <a href="#"  onclick="ocultarCarrusel(1);cargarHorarioLimpieza()">LIMPIEZA<span class="icon-enter"></span></a>
            </li>

            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargarHorarioLavanderia()">LAVANDER&IacuteA <span class="icon-enter"></span></a>
            </li>

            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargarHorarios()" >CLASES<span class="icon-enter"></span></a>
            </li>

          </ul>
        </li>

        <li class="submenu">
          <a href="#"><span class="icon-newspaper"></span>NOTICIAS<span class="caret icon-down"></span></a>
          <ul class="children">
            <li><a href="#" onclick="ocultarCarrusel(1);cargarTodasNoticias()" >NOTICIAS<span class="icon-enter"></span></a></li>
          </ul>
        </li>

        <li class="submenu">
          <a href="#"><span class="icon-envelop"></span>MENSAJES<span class="caret icon-down"></span></a>
          <ul class="children">
            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargarMensajesEstudiante()">MIS MENSAJES<span class="icon-enter"></span></a>
            </li>

          </ul>
        </li>

        <li class="submenu">
          <a href="#"><span class="icon-stack"></span>ARTICULOS<span class="caret icon-down"></span></a>
          <ul class="children">
            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargaContenidoVerArticulos()">MIS ARTICULOS<span class="icon-enter"></span></a>
            </li>

            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargaContenidoVerArticulosDanados()">REPORTAR DAÑADOS<span class="icon-enter"></span></a>
            </li>

          </ul>
        </li>

        <li class="submenu">
          <a href="#"  data-toggle="modal" data-target="#myModal2"    onclick="cargarPerfil('<?php echo $_SESSION['usuario']?>','<?php echo $_SESSION['estudiante']?>')"><span class="icon-profile"></span>PERFIL</a>
        </li>

        <li class="submenu">
          <a href="cerrarSesion.php"><span class="icon-exit"></span>SALIR</a>
        </li>
      </ul>
    </nav>

  </header>

<!-- Main -->
      <div id="main">

        <!-- Intro -->
          <section id="top" class="one">
            <div class="container">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <a href="#" class="image fit"><img src="../imagenes/inicioHorarios.JPG" alt="Horarios" style="width:100%;"></a>
                  </div>

                  <div class="item ">
                    <a href="#" class="image fit"><img src="../imagenes/inicioNoticias.JPG" alt="Noticias" style="width:100%;"></a>
                  </div>

                  <div class="item ">
                    <a href="#" class="image fit"><img src="../imagenes/inicioMensajes.JPG" alt="Mensajes" style="width:100%;"></a>
                  </div>

                  <div class="item">
                    <a href="#" class="image fit"><img src="../imagenes/inicioArticulos.JPG" alt="Articulos" style="width:100%;"></a>
                  </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </section>

        <!-- Portfolio -->
          <section id="contenido" class="two">


          </section>

      </div>

<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel2">ESTUDIANTE</h4>
         </div>
         <div class="modal-body" id="contenidoPerfil">
         </div>
      </div>
   </div>
   <!-- modal-content -->
</div>

<!-- modal-dialog -->

<div class="modal right fade" id="actualizarPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" id="cerrarActualizar" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel2">ACTUALIZAR MI PERFIL</h4>
         </div>
         <div class="modal-body" id="contenidoPerfil">
            <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-5">  <img src="../imagenes/chico.png" class="imgRedonda" alt="30" heigth="30"  ></div>
               <div class="col-md-12"></div>
               <div class="col-md-12"></div>
               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">
                  <div class="input-group">
                     <span class="input-group-addon">CEDULA</span>
                     <input type="text" id="editarCedula" class="form-control" disabled >
                  </div>
               </div>
               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">
                  <div class="input-group">
                     <span class="input-group-addon">1ER APELLIDO</span>
                     <input type="text" onkeyup="validarPrimerAPerfil(this);habilitarActualizacionEstudiante()"    onfocusout="validarPrimerAPerfil(this);habilitarActualizacionEstudiante()" class="form-control"  id="editarPrimerA">
                      <span id="primerAokPerfil"></span>
                  </div>
               </div>
               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">
                  <div class="input-group">
                     <span class="input-group-addon"> 2NDO APELLIDO</span>
                     <input type="text" class="form-control"onkeyup="validarSegundoAPerfil(this);habilitarActualizacionEstudiante()" onfocusout="validarSegundoAPerfil(this);habilitarActualizacionEstudiante()"  id="editarSegundoA" >
                      <span id="segundoAokPerfil"></span>
                  </div>
               </div>
               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">
                  <div class="input-group">
                     <span class="input-group-addon"> NOMBRE</span>
                     <input type="text" class="form-control" onkeyup="validarNombrePerfil(this);habilitarActualizacionEstudiante()"  onfocusout="validarNombrePerfil(this);habilitarActualizacionEstudiante()" id="editarNombre"  >
                        <span id="nombreokPerfil"></span>
                  </div>
               </div>
               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">

               <div class="input-group">
<span class="input-group-addon"> SEX0</span>
<form action="">
<input type="radio" name="gender" value="M" checked> MASCULINO<br>
<input type="radio" name="gender" value="F"> FEMENINO<br>
<input type="radio"  name="gender" value="O">  OTRO
</form>

</div>

             </div>



               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">

               <div class="input-group">
<span class="input-group-addon"> CABINA</span>

<input type="number" class="form-control" onkeyup="validarCuarto(this),habilitarActualizacionEstudiante()" onfocusout="validarCuarto(this),habilitarActualizacionEstudiante()"  id="editarCabina" >
<span id="estadoCuarto"></span>
</div>

             </div>



               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">

               <div class="input-group">
<span class="input-group-addon"> INGRESO</span>

<input type="number" class="form-control" onkeyup="validarFecha(this),habilitarActualizacionEstudiante()" onfocusout="validarFecha(this),habilitarActualizacionEstudiante()" onchange="validarFecha(this),habilitarActualizacionEstudiante()" id="editarAno" >
<span id="estadoFecha"></span>
</div>

             </div>



               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">

               <div class="input-group">
<span class="input-group-addon"> CARRERA</span>

<select class="form-control" id="editarCarrera">
<option class="form-control" value="Administracion de empresas">Administracion de empresas</option>
<option class="form-control"  value="Administracion de oficinas">Administracion de oficinas</option>
<option class="form-control"  value="Educacion rural">Educacion rural</option>
<option  class="form-control"  value="Ingenieria en sistemas">Ingenieria en sistemas</option>
<option class="form-control"  value="Recreacion turistica">Recreacion turistica</option>
</select>

</div>

             </div>




                        <div class="col-md-12"></div>
                        <div class="col-md-4"></div>
            </div>
            <div class="col-md-12"></div>
            <div class="col-md-4"></div>
            <div class="col-md-2"><br><button class="boton" onclick="actualizarEstudiantePerfil()" id="actualizarEstudiante">GUARDAR</button></div>
            <div class="col-md-12"></div>
         </div>
      </div>
   </div>
</div>

<!-- modal-content -->
    <!-- Footer -->
      <div id="footer">

        <!-- Copyright -->
        <ul class="copyright">
          <li><p id="textofinal">SISTEMA DE ADMINISTRACION DE RESIDENCIAS ESTUDIANTILES</p></li>
        </ul>

        <!-- Copyright -->
        <ul class="copyright">
          <li>&copy; Untitled. All rights reserved.</li>
          <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>


      </div>

</div>


</body>
</html>
