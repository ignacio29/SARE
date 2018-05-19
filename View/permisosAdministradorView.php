<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>MENSAJES</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead>

            <th style="width:50%">
               <input type="text"  class="form-control" onkeyup="busquedaTablas(this)" maxlength="64" size="20" placeholder="Busqueda General" >
            </th>

            <th>
              <div class="dropdown">
                 <a id="dLabel" role="button" data-toggle="dropdown"  >
                 <button>FILTRAR POR <span class="caret"></span></button>
                 </a>
                 <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    <li class="dropdownMenu"><a href="#" onclick="reporteMensajes('TODOS')">TODOS VISIBLES</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                       <a href="#">ESTADO</a>
                       <ul class="dropdown-menu">
                          <li><a href="#" onclick="reporteMensajes('NUEVO')">NUEVO </a></li>
                          <li class="divider"></li>
                          <li><a href="#" onclick="reporteMensajes('PROCESO')">EN PROCESO</a></li>
                          <li class="divider"></li>
                          <li><a href="#" onclick="reporteMensajes('CONFIRMADO')">CONFIRMADO</a></li>
                          <li class="divider"></li>
                          <li><a href="#" onclick="reporteMensajes('RECHAZADO')">RECHAZADO</a></li>
                       </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdownMenu"><a href="#" onclick="reporteMensajes('FECHA')">FECHA</a>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdownMenu">
                       <a tabindex="-1" href="#" onclick="reporteMensajes('OCULTOS')">OCULTOS</a>
                    </li>
                    </li>
                 </ul>
              </div>
            </th> 
         </thead>
      </table>   
        <div id="inputFecha" class="col-md-3" style="display:none" >
          <input type="date" id="fecha" class=" input-md" >
          <button type="button" onclick="reporteMensajeFecha()"><span class="glyphicon glyphicon-search"></span></button>
        </div> 

     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
          <thead>
            <th>C&EacuteDULA</th>
            <th>ESTUDIANTE</th>
            <th>ASUNTO</th>
            <th>FECHA</th>
            <th >ESTADO</th>
            <th style="width:5%">VER</th>
            <th style="width:5%">OCULTAR</th>

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
 

    <div class="modal fade" id="verMensaje" tabinde="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <button type="button" id="cerrar2" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
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
                            <input class="form-control" type="tet" id="asunto" disabled>
                         </div>
                         <div class="col-sm-12"><br></div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-2">
                            <label class="control-label col-s-3">DETALLE:</label>
                         </div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-8">
                            <textarea rows="4"  class="txtArea" cols="30" type="text"  id="detalle" disabled></textarea>
                         </div>
                         <div class="col-sm-12"><br></div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-2">
                            <label class="control-label col-s-3">FECHA:</label>
                         </div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-8">
                            <input type="date" class="form-control" id="fech1" disabled >
                         </div>
                         <div class="col-sm-12"><br></div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-2">
                            <label class="control-label col-s-3">ESTADO:</label>
                         </div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-8">
                            <select  id="estado" name="estado" class="FORM-CONTROL" >
                               <option value="NUEVO">NUEVO</option>
                               <option value="PROCESO" >EN PROCESO</option>
                               <option value="CONFIRMADO">CONFIRMADO</option>
                               <option value="RECHAZADO">RECHAZADO</option>
                            </select>
                         </div>
                         <div class="col-sm-12"><br></div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-3">
                            <label class="control-label col-xs-3">VISIBLE:</label>
                         </div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-4">
                <form action="">
                <input type="radio" name="visible" value="1">SI<br>
                <input type="radio" name="visible" value="0">NO<br>
                </form>
                </div>
                <div class="col-sm-12"><br></div>
                <?php
                   if (isset($_SESSION["asistente"])) {
                       echo '<input type = "hidden" id="rol1" name = "rol" value = "' . $_SESSION['asistente'] . '">';
                   } else if (isset($_SESSION["administrador"])) {
                       echo '<input type = "hidden" id="rol1"  name = "rol" value = "' . $_SESSION['administrador'] . '">';
                   }
                   ?>
                <input type = "hidden" id="idmensaje" name = "idmensaje">
                </div>
                </div>
                </form>
             </div>
             <div class="modal-footer ">
                <div class="form-group">
                   <label class="col-md-4 control-label" for="button1id"></label>
                   <div class="col-md-8">
                      <button id="editarMensaje"  onclick="actualizarDatosMensaje()">GUARDAR</button>
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
               <h4 class="modal-title custom_align" id="Heading">SE OCULTAR&Aacute ESTE REGISTRO!</h4>
            </center>
         </div>
         <div class="modal-body">
            <div class="alert alert-danger">
               <center><span class="glyphicon glyphicon-warning-sign"></span>¿EST&AacuteS SEGURO?</center>
            </div>
         </div>
         <div class="modal-footer ">
          <button type="button" onclick="ocultarMensaje();"><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
          <button type="button"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button> 
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
  
</div>
 