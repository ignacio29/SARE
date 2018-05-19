<?php
session_start();

//Si la variable sesión está vacía admnistrador
if (!isset($_SESSION['administrador']) && !isset($_SESSION['usuario'])) {
    header("location: ../index.php");
} else {
    if ($_SESSION['administrador'] == 'administrador') {
//        echo $_SESSION['administrador'];
//        echo $_SESSION['usuario'];
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
        <li><a href="administrador2View.php" onclick="ocultarCarrusel(2)"><span class="icon-home"></span>INICIO</a></li>

        <li class="submenu">
          <a href="#"><span class="icon-calendar"></span>HORARIOS<span class="caret icon-down"></span></a>
          <ul class="children">
            <li>
              <a href="#"  onclick="ocultarCarrusel(1);cargarReporteHorariosLimpiezaView()">LIMPIEZA<span class="icon-enter"></span></a>
            </li>

            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargarReporteHorariosLavanderiaView()">LAVANDER&IacuteA <span class="icon-enter"></span></a>
            </li>

            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargarReporteHorariosClasesView()" >CALSES<span class="icon-enter"></span></a>
            </li>

          </ul>
        </li>

        <li class="submenu">
          <a href="#"><span class="icon-newspaper"></span>NOTICIAS<span class="caret icon-down"></span></a>
          <ul class="children">
            <li><a href="#" onclick="ocultarCarrusel(1);cargarMisNoticias()">MIS NOTICIAS<span class="icon-enter"></span></a></li>
            <li><a href="#" onclick="ocultarCarrusel(1);cargarTodasNoticias()" >NOTICIAS<span class="icon-enter"></span></a></li>
          </ul>
        </li>

        <li class="submenu">
          <a href="#"><span class="icon-envelop"></span>MENSAJES<span class="caret icon-down"></span></a>
          <ul class="children">
            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargarMensajes('aviso')">AVISOS<span class="icon-enter"></span></a>
            </li>
            
            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargarMensajes('permiso')">PERMISOS<span class="icon-enter"></span></a>
            </li>
            
            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargarMensajes('queja')">QUEJAS<span class="icon-enter"></span></a>
            </li>

          </ul>
        </li>

        <li class="submenu">
          <a href="#"><span class="icon-stack"></span>ARTICULOS<span class="caret icon-down"></span></a>
          <ul class="children">
            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargaContenidoVerArticulosInstitucionales()">INSTITUCIONALES<span class="icon-enter"></span></a>
            </li>
            
            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargaContenidoVerArticulosPersonales()">PERSONALES<span class="icon-enter"></span></a>
            </li>
            
            <li>
              <a href="#" onclick="ocultarCarrusel(1);cargaContenidoVerArticulosDeficientes()">DEFICIENTES<span class="icon-enter"></span></a>
            </li>

          </ul>
        </li>

        <li class="submenu">
          <a href="#"><span class="icon-users"></span>ESTUDIANTES<span class="caret icon-down"></span></a>
          <ul class="children">
            <li><a href="#" onclick="ocultarCarrusel(1);cargarAsistentes()">ASISTENTES<span class="icon-enter"></span></a></li>
            <li><a href="#" onclick="ocultarCarrusel(1);cargarResidentes()">RESIDENTES<span class="icon-enter"></span></a></li>
          </ul>
        </li>

        <li class="submenu">
          <a href="#"  data-toggle="modal" data-target="#myModal2"    onclick="cargarPerfil('<?php echo $_SESSION['usuario']?>','<?php echo $_SESSION['administrador']?>')"><span class="icon-profile"></span>PERFIL</a>
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

                  <div class="item">
                    
                    <a href="#" class="image fit"><img src="../imagenes/inicioResidentes.JPG" alt="Estudiantes" style="width:100%;"></a>
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
            <h4 class="modal-title" id="myModalLabel2">ADMINISTRADOR</h4>
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
                     <input type="text" class="form-control"  id="editarPrimerA">
                  </div>
               </div>
               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">
                  <div class="input-group">
                     <span class="input-group-addon"> 2NDO APELLIDO</span>
                     <input type="text" class="form-control"  id="editarSegundoA" >
                  </div>
               </div>
               <div class="col-md-12"></div>
               <div class="col-md-2"></div>
               <div class="col-md-9">
                  <div class="input-group">
                     <span class="input-group-addon"> NOMBRE</span>
                     <input type="text" class="form-control"  id="editarNombre" >
                  </div>
               </div>
            </div>
            <div class="col-md-12"></div>
            <div class="col-md-4"></div>
            <div class="col-md-2"><br><button class="boton" onclick="actualizarAdministrador()">GUARDAR</button></div>
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