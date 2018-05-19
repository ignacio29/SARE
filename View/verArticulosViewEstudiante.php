<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>MIS ARTICULOS</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead>
            <th>
              <button data-toggle="modal" onclick="limpiarModalMisArt()" data-target="#registrarArticulo">AGREGAR</button>
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
                    <li class="dropdownMenu"><a href="#misArticulos" onclick="filtrarComboArticulosEstudiante('TODOS')">TODOS</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                       <a href="#misArticulos">TIPO</a>
                       <ul class="dropdown-menu">
                          <li><a href="#misArticulos" onclick="filtrarComboArticulosEstudiante('ELECTRONICO')">ELECTRONICO </a></li>
                          <li class="divider"></li>
                          <li><a href="#misArticulos" onclick="filtrarComboArticulosEstudiante('COCINA')">COCINA</a></li>
                          <li class="divider"></li>
                          <li><a href="#misArticulos" onclick="filtrarComboArticulosEstudiante('TECNOLOGICO')">TECNOLOGICO</a></li>
                       </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                       <a href="#misArticulos">ESTADO</a>
                       <ul class="dropdown-menu">
                          <li><a href="#misArticulos" onclick="filtrarComboArticulosEstudiante('BUENO')">BUENO</a></li>
                          <li class="divider"></li>
                          <li><a href="#misArticulos" onclick="filtrarComboArticulosEstudiante('REGULAR')">REGULAR</a></li>
                          <li class="divider"></li>
                          <li><a href="#misArticulos" onclick="filtrarComboArticulosEstudiante('DEFICIENTE')">DEFICIENTE</a></li>
                       </ul>
                    </li>
                 </ul>
              </div>
              
            </th>

            <th>
               <button onclick="imprimirReportePdf('Articulos')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
            <thead>
                <thead>
                   <th WIDTH="50">NOMBRE</th>
                   <th WIDTH="50">SERIE</th>
                   <th WIDTH="50">TIPO</th>
                   <th WIDTH="50">DETALLES</th>
                   <th WIDTH="50">ESTADO</th>
                   <th WIDTH="50">APROBADO</th>
                   <th style="width:5%">ACTUALIZAR</th>
                   <th style="width:5%">ELIMINAR</th>
                </thead>
                <tbody id="contenidoArticulosE">
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
                     <th>NOMBRE</th>
                     <th>SERIE</th>
                     <th>TIPO</th>
                     <th>DETALLES</th>
                     <th>ESTADO</th>
                     <th>APROBADO</th>
                  </thead>
                  <tbody id="contenidoArticulosE2">
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <div class="modal fade" id="registrarArticulo" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button  id="cerrarRegistro1" type="button" class="close"data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  <center>
                     <h4 class="modal-title custom_align" id="Heading">REGISTRO DE ARTICULOS SARE</h4>
                  </center>
               </div>
               <div class="modal-body">
                  <form >
                     <div class="row">
                        <div class="col-md-2"> </div>
                        <div class="col-md-9"  >
                           <div class="col-md-12"></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-md-3">NOMBRE</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <input class="form-control" type="text" id="nombre" onkeyup="validarInputNombre(this)" onfocusout="habilitarRegistroArticulo()"><span id="cedulaok"></span>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-xs-3">SERIE</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <input type="text" class="form-control" id="serie" onkeyup="validarInputNombre(this)" onfocusout="habilitarRegistroArticulo()">
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-xs-3">TIPO</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <select type="text" class="form-control" id="tipo">
                                 <option selected>ELECTRONICO</option>
                                 <option>COCINA</option>
                                 <option>TECNOLOGICO</option>
                              </select>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-xs-3">DETALLE</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <textarea rows="2"  cols="20" class="txtArea form-control"  type="text" id="descripcion" onkeyup="validarInputNombre(this)" onfocusout="habilitarRegistroArticulo()"></textarea>
                              <br>
                           </div>
                           <div class="col-sm-12"></div>
                           <div class="col-sm-12"></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-xs-3">ESTADO</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <select type="text" class="form-control" id="estado">
                                 <option selected>BUENO</option>
                                 <option>REGULAR</option>
                                 <option>DEFICIENTE</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer ">
                  <button type="button" id="registrarArticulo1" onclick="agregarArticulo()" >GUARDAR</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <div class="modal fade" id="actualizarArticulo" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button id="cerrarRegistro2"type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  <center>
                     <h4 class="modal-title custom_align" id="Heading">REGISTRO DE ARTICULOS SARE</h4>
                  </center>
               </div>
               <div class="modal-body">
                  <form >
                     <div class="row">
                        <div class="col-md-2"> </div>
                        <div class="col-md-9"  >
                           <div class="col-md-12">
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-md-3">NOMBRE</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <input class="form-control" type="text" id="nombre2" onkeyup=""><span id="cedulaok"></span>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-xs-3">SERIE</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <input class="form-control" type="text"  id="serie2" disabled="">
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-xs-3">TIPO</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6   ">
                              <select type="text" class="form-control" id="tipo2">
                                 <option>ELECTRONICO</option>
                                 <option>COCINA</option>
                                 <option>TECNOLOGICO</option>
                              </select>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-xs-3">DETALLE</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <textarea rows="2"  cols="20" class="txtArea form-control"  type="text" id="descripcion2"></textarea>
                              <br>
                           </div>
                           <div class="col-sm-12"><br></div>
                           <div class="col-sm-12"></div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-3">
                              <label class="control-label col-xs-3">ESTADO</label>
                           </div>
                           <div class="col-sm-1"></div>
                           <div class="col-sm-6">
                              <select type="text" class="form-control" id="estado2" disabled="">
                                 <option value="BUENO">BUENO</option>
                                 <option value="REGULAR">REGULAR</option>
                                 <option value="DEFICIENTE">DEFICIENTE</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="modal-footer ">
                  <button type="button" id="registrarArticulo" onclick="modificarArticulo()" >GUARDAR</button>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
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
                  <button type="button" onclick="eliminarArticuloEstudiante();"><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
                  <button type="button"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>    
               </div> 
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
       
</div> 