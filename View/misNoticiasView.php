<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>MIS NOTICIAS</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead>
            <th >
               <button data-toggle="modal" onclick="limpiarModal();ocultarSubir()" data-target="#registrarNoticia">AGREGAR</button>
            </th>

            <th>
               <input type="text"  class="form-control" onkeyup="busquedaTablas(this)" maxlength="64" size="20" placeholder="Busqueda General" >
            </th>

            <th>
              <div class="dropdown">
                 <a id="dLabel" role="button" data-toggle="dropdown"  >
                 <button>FILTRAR POR <span class="caret"></span></button>
                 </a>
                 <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    <li class="dropdownMenu"><a href="#mensajes" onclick="reporteNoticias('todos')">TODAS</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu"><a href="#mensajesAvisos"  onclick="reporteNoticias('fecha')">FECHA</a></li>
                    </li>
                 </ul>
              </div>
            </th>

            <th>
               <button onclick="imprimirReportePdf('Noticia')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  

      <div id="fechas" class="col-md-3"  style="display:none">
          <input type="date" id="fechaBuscar" class=" input-md" maxlength="64" size="20" placeholder="BUSCAR" >
          <button type="button" onclick="buscarFehaNoticia(); buscarFechaNoticiaReporte();" ><span class="glyphicon glyphicon-search"></span></button>
      </div>
     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
          <thead>
            <tr>
              <th>TEMA</th>
              <th>DESCRIPCI&OacuteN</th>
              <th>FECHA</th>
              <th style="width:5%">ACTUALIZAR</th>
              <th style="width:5%">ELIMINAR</th>
            </tr>
          </thead>

        <tbody id="contenidoNoticias">

        </tbody>

         </table>
      </div>
      </div>
      <center>
         <div class=" contenedor_paginacion">
            <div class="clearfix paginacion"  id="paginacion"></div>
         </div>
      </center>


<div id="testDiv" style="display: none">
   <div class="col-md-12">
      <div class="table-responsive">
         <table id="mytable" class="table table-bordred table-striped">
            <thead>
              <tr>
                <th>TEMA</th>
                <th>DESCRIPCI&OacuteN</th>
                <th>FECHA</th>
              </tr>
            </thead>

            <tbody id="contenidoNoticias2">
            </tbody>

         </table>
      </div>
   </div>
</div>



<div class="modal fade" id="registrarNoticia" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button id="cerrar" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <center>
               <h4 class="modal-title custom_align" id="Heading">REGISTRO DE SARE NOTICIAS</h4>
            </center>
         </div>
         <div class="modal-body">
            <form  id="formulario"  enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-1"> </div>
                  <div class="col-md-9"  >
                     <div class="col-sm-1"></div>
                     <div class="col-sm-2">
                        <label class="control-label col-md-3">T&IacuteTULO:</label>
                     </div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-8">
                        <textarea rows="2"  cols="30" class="txtArea form-control"  type="text" id="temaAnuncio1"  placeholder="Ingrese el titulo de la noticia" onkeyup="validarInputTitulo(this);habilitarRegistroNoticia();" onfocusout="habilitarRegistroNoticia()"  ></textarea><span id="titulo1"></span>
                     </div>
                     <div class="col-sm-12"><br></div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-2">
                        <label class="control-label col-s-3">NOTICIA:  </label>
                     </div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-8">
                        <textarea rows="4"  cols="30" class="txtArea form-control"  type="text" id="detalleAnuncio1" placeholder="Ingrese un detalla de noticia" onkeyup="validarInputNoticia(this);habilitarRegistroNoticia();" onfocusout="habilitarRegistroNoticia()"  ></textarea> <span id="noticia1"></span>
                     </div>
                     <div class="col-sm-12"><br></div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-2">
                        <label class="control-label col-s-3">SUBIR:</label>
                     </div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-8">
                        <button id="btnSubir" type="button" onclick="Subir()" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-picture">Subir Foto</span>
                        </button>
                        <div id="subir" style="display:none">
                           <input id="imagen1" name="imagen1" onchange="validarInputFile(this);habilitarRegistroNoticia()" class="form-control" type="file"  ><span id="foto1"></span>
                        </div>
                     </div>
                     <div class="col-sm-12"><br></div>
                     <?php
                        if (isset($_SESSION["asistente"])) {
                            echo '<input type = "hidden" id="rol1" name = "rol" value = "' . $_SESSION['asistente'] . '">';
                        } else if (isset($_SESSION["administrador"])) {
                            echo '<input type = "hidden" id="rol1"  name = "rol" value = "' . $_SESSION['administrador'] . '">';
                        }
                        ?>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer ">
            <div class="form-group">
               <label class="col-md-4 control-label" for="button1id"></label>
               <div class="col-md-8">
                  <button id="registarNoticia1" onclick="registarNoticia()" name="registarNoticia" disabled>GUARDAR</button>
               </div>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
</div>
<!-- /.fin -->



<div class="modal fade" id="actualizarNoticia" tabinde="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" id="cerrar2" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <center>
               <h4 class="modal-title custom_align" id="Heading">REGISTRO DE SARE NOTICIAS</h4>
            </center>
         </div>
         <div class="modal-body">
            <form  id="formulario2"  enctype="multipart/form-data">
               <div class="row">
                  <div class="col-md-1"> </div>
                  <div class="col-md-9"  >
                     <div class="col-sm-1"></div>
                     <div class="col-sm-2">
                        <label class="control-label col-md-3">T&IacuteTULO:</label>
                     </div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-8">
                        <textarea rows="2"  cols="30" class="txtArea form-control"  type="text" id="temaAnuncio2" onkeyup="validarInputTitulo2(this);habilitarRegistroNoticia2();" autofocus="habilitarRegistroNoticia2()"  ></textarea><span id="titulo2"></span>
                     </div>
                     <div class="col-sm-12"><br></div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-2">
                        <label class="control-label col-s-3">NOTICIA:  </label>
                     </div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-8">
                        <textarea rows="4"  cols="30" class="txtArea form-control"  type="text" id="detalleAnuncio2" onkeyup="validarInputNoticia2(this);habilitarRegistroNoticia2();" autofocus="habilitarRegistroNoticia2()" ></textarea><span id="noticia2"></span>
                     </div>
                     <div class="col-sm-12"><br></div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-2">
                        <label class="control-label col-s-3">FOTO:</label>
                     </div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-8">
                        <img id="fotoAnterior" width="200" height="200">
                     </div>
                     <div class="col-sm-12"><br></div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-2">
                        <label class="control-label col-s-3">SUBIR:</label>
                     </div>
                     <div class="col-sm-1"></div>
                     <div class="col-sm-8">
                        <button id="btnSubir2" type="button" onclick="Subir2()" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-picture">Subir Foto</span>
                        </button>
                        <div id="subir2" style="display:none">
                           <input id="imagen2" name="imagen2" class="form-control" type="file"   onchange="validarInputFile2(this)"  ><span id="foto2"></span>
                        </div>
                     </div>
                     <div class="col-sm-12"><br></div>
                     <?php
                        if (isset($_SESSION["asistente"])) {
                            echo '<input type = "hidden" id="rol1" name = "rol" value = "' . $_SESSION['asistente'] . '">';
                        } else if (isset($_SESSION["administrador"])) {
                            echo '<input type = "hidden" id="rol1"  name = "rol" value = "' . $_SESSION['administrador'] . '">';
                        }
                        ?>
                     <input type = "hidden" id="idNoticia" name = "idNoticia">
                     <input type = "hidden" id="fotoNoticia" name = "fotoNoticia">
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer ">
            <div class="form-group">
               <label class="col-md-4 control-label" for="button1id"></label>
               <div class="col-md-8">
                  <button id="editarNoticia1"  onclick="editarNoticia()" disabled>GUARDAR</button>
               </div>
            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
</div>
<!-- /.fin -->


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" id="cerrar3" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <center>
               <h4 class="modal-title custom_align" id="Heading">SE ELMINAR&Aacute ESTE REGISTRO!</h4>
            </center>
         </div>
         <div class="modal-body">
            <div class="alert alert-danger">
               <center><span class="glyphicon glyphicon-warning-sign"></span> ¿EST&AacuteS SEGURO?</center>
            </div>
         </div>
         <div class="modal-footer ">
          <button type="button" onclick="eliminarNoticia();" ><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
          <button type="button"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
</div>