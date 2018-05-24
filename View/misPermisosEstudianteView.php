<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php?error=needlogin");
}
?>
<div class="container"> 
    <header>
        <h2>MENSAJES</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead>
            <th>
              <button data-toggle="modal" data-target="#crearMensaje"></span>AGREGAR</button>
            </th>
            <th style="width:50%">
               <input type="text"  class="form-control" onkeyup="busquedaTablas(this)" maxlength="64" size="20" placeholder="Busqueda General" >
            </th>

            <th>
              <div class="dropdown">
                 <a id="dLabel" role="button" data-toggle="dropdown"  >
                 <button>FILTRAR POR <span class="caret"></span></button>
                 </a>
                 <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    <li class="dropdownMenu"><a href="#mensajes" onclick="reporteMensajesEstudiante('TODOS')">TODOS</a></li>
                    <li class="divider"></li>
                    <li class="dropdownMenu"><a href="#mensajesAvisos"  onclick="reporteMensajesEstudiante('AVISO')">AVISOS</a></li>
                    <li class="divider"></li>
                    <li class="dropdownMenu"><a href="#mensajesPermisos" onclick="reporteMensajesEstudiante('PERMISO')">PERMISOS</a>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdownMenu">
                       <a tabindex="-1" href="#mensajesQuejas" onclick="reporteMensajesEstudiante('QUEJA')">QUEJAS</a>
                    </li>
                    </li>
                 </ul>
              </div>
            </th> 

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
              <thead>
                 <th >ASUNTO</th>
                 <th >FECHA</th>
                 <th >ESTADO</th>
                 <th style="width:5%">VER</th>
                 <th style="width:5%">ELIMINAR</th>
              </thead>
              <tbody id="contenidoMensajes">
              </tbody>
         </table>
      </div>
      </div>
      <center>
         <div class=" contenedor_paginacion">
            <div class="clearfix paginacion"  id="paginacion"></div>
         </div>
      </center>

 
      <div class="modal fade" id="crearMensaje" tabinde="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" id="cerrar1" class="close" data-dismiss="modal" aria-hidden="true">
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  <center>
                     <h4 class="modal-title custom_align" id="Heading">REGISTRO DE SARE MENSAJES</h4>
                  </center>
               </div>
               <div class="modal-body">
                  <form  id="formulario"  enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-md-1"> </div>
                        <div class="col-md-9"  >
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-md-3">ASUNTO:</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-8">
                              <select id="asunto"  class="FORM-CONTROL" >
                                 <option value="AVISO" selected>AVISO</option>
                                 <option value="PERMISO" >PERMISO</option>
                                 <option value="QUEJA" >QUEJA</option>
                              </select>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-s-3">DETALLE:</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-8">
                              <textarea rows="4"  cols="30"  class="txtArea form-control" onkeyup="validarInputDetalles(this);habilitarRegistroMensajes();" onfocusout="habilitarRegistroMensajes()"
                                 placeholder="Ingrese un detalle del mensaje" type="text" id="detalle"></textarea><span id="detalles"></span>
                              <br>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer ">
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="button1id"></label>
                     <div class="col-md-8">
                        <button id="crearMensaje1"  onclick="crearMensaje()" disabled>ENVIAR</button>
                     </div>
                  </div>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
      </div>
      <!-- /.fin -->



      <div class="modal fade" id="cargarMensaje" tabinde="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" id="cerrar2" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  <center>
                     <h4 class="modal-title custom_align" id="Heading">REGISTRO DE SARE MENSAJES</h4>
                  </center>
               </div>
               <div class="modal-body">
                  <form  id="formulario2"  enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-md-1"> </div>
                        <div class="col-md-9"  >
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-md-3">ASUNTO:</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <select id="asunt2"name="FILTRAR POR:" class="FORM-CONTROL" disabled>
                                 <option value="AVISO" selected >AVISO</option>
                                 <option value="PERMISO" >PERMISO</option>
                                 <option value="QUEJA" >QUEJA</option>
                              </select>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-s-3">DETALLE:</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <textarea rows="4"  cols="30" class="txtArea form-control"  type="text" id="detall2" disabled></textarea>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-s-3">FECHA:</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <input type="date" class="form-control" id="fech2" disabled>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-s-3">ESTADO:</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <select  id="estad2" name="estad2" class="FORM-CONTROL" disabled>
                                 <option value="NUEVO">NUEVO</option>
                                 <option value="PROCESO" >EN PROCESO</option>
                                 <option value="CONFIRMADO">CONFIRMADO</option>
                                 <option value="RECHAZADO">RECHAZADO</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer ">
                  <div class="form-group">
                     <label class="col-md-4 control-label" for="button1id"></label>
                     <div class="col-md-8">
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
                     <h4 class="modal-title custom_align" id="Heading">SE ELMINARA&Aacute ESTE REGISTRO!</h4>
                  </center>
               </div>
               <div class="modal-body">
                  <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿EST&AacuteS SEGURO?</div>
               </div>
               <div class="modal-footer ">
                  <button type="button" onclick="eliminarMensaje();" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>


</div>