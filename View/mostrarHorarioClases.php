<?php
session_start();
?>

<script language="javascript">
      window.onload = getIdConfirmarHorario();
</script>
   </head>
<div class="container"> 
    <header>
        <h2>HORARIO DE CLASES</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead> 
         <th id="agregar" style="display: block">
             <button data-toggle="modal" onclick="limpiarModalClases()" id="btnAgregar" data-target="#registrarHorario">AGREGAR</button>
         </th>
            <th style="width:50%">
               <input type="text"  class="form-control" onkeyup="busquedaTablas(this)" maxlength="64" size="20" placeholder="Busqueda General" >
            </th>  
         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
            <thead>
               <th>D&IacuteA</th>
               <th>HORA INICIO</th>
               <th>HORA SALIDA</th>
               <th>DESCRIPCI&OacuteN</th>
               <th style="width:5%">ACTUALIZAR</th>
               <th style="width:5%">ELIMINAR</th>
            </thead>
            <tbody id="contenidoHorarioClases">
            </tbody>
         </table>
      </div>
      </div>
      <center>
         <div class=" contenedor_paginacion">
            <div class="clearfix paginacion"  id="paginacion"></div>
         </div>
      </center>

    <div  id="confirmar" style="display: none">
      <div class="col-md-6">
         <button type="button" id="btnConfirmar" data-toggle="modal" data-target="#confirmarHorario" class="">CONFIRMAR HORARIO</button>
      </div>
    </div>
 

<div class="modal fade" id="registrarHorario" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
   <button type="button" id="cerrar1" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
   <center>
      <h4 class="modal-title custom_align" id="Heading">REGISTRAR HORARIO DE CLASES</h4>
   </center>
</div>
<div class="modal-body">
   <form >
      <div class="row">
         <div class="col-sm-1"></div>
         <div class="col-md-9 row"  >
            <div class="col-sm-1"></div>
            <div class="row">
               <div class="col-25">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2">
                     <label class="control-label col-xs-3">D&IacuteAS</label>
                  </div>
               </div>
               <div class="col-75">
                  <div class="col-sm-8">
                     <select class="form-control" id="dias">
                        <option>LUNES</option>
                        <option>MARTES</option>
                        <option>MIERCOLES</option>
                        <option>JUEVES</option>
                        <option>VIERNES</option>
                        <option>SABADO</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2">
                     <label class="control-label col-xs-3">INICIO</label>
                  </div>
               </div>
               <div class="col-75">
                  <div class="col-sm-4">
                     <input  type="button"   value="-" onclick="previous();cargarSelect();">
                  </div>
                  <div class="col-sm-6">
                     <select class="form-control"  name="horaInicio" id="horaInicio" disabled="true" onchange="cargarSelectSalida()">
                        <option value="08AM">08AM</option>
                        <option value="09AM">09AM</option>
                        <option value="10AM">10AM</option>
                        <option value="01PM">01PM</option>
                        <option value="02PM">02PM</option>
                        <option value="03PM">03PM</option>
                        <option value="04PM">04PM</option>
                        <option value="05PM">05PM</option>
                        <option value="06PM">06PM</option>
                        <option value="07PM">07PM</option>
                        <option value="08PM">08PM</option>
                     </select>
                  </div>
                  <div class="col-sm-2">
                     <input type="button"   value="+" onclick="next();cargarSelect();">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2">
                     <label class="control-label col-xs-3">SALIDA</label>
                  </div>
               </div>
               <div class="col-75">
                  <div class="col-sm-4">
                     <input type="button" value="-" onclick="previousSalida();">
                  </div>
                  <div class="col-sm-6">
                     <select class="form-control" name="horaSalida" id="horaSalida" disabled="true" >
                     </select>
                  </div>
                  <div class="col-sm-2">
                     <input type="button" value="+" onclick="nextSalida();">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2">
                     <label class="control-label col-xs-3">CURSO</label>
                  </div>
               </div>
               <div class="col-75">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" id="curso"  onkeyup="validarCurso(this);habilitarRegistroHorario();" onfocusout="habilitarRegistroHorario();"><span id="cursook"></span>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <div class="col-sm-1"></div>
                  <div class="col-sm-2">
                     <label class="control-label col-xs-3">PROFESOR</label>
                  </div>
               </div>
               <div class="col-75">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">
                     <input type="text" class="form-control" id="profesor" onkeyup="validarProfesor(this);habilitarRegistroHorario();"   onfocusout="habilitarRegistroHorario();"><span id="profesorok"></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
         
         <div class="modal-footer ">
            <button type="button" id="registrar"  onclick="insertarHorario();" disabled >GUARDAR</button>
         </div>
         
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="actualizarHorario" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" id="cerrar2" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <center>
               <h4 class="modal-title custom_align" id="Heading">ACTUALIZAR HORARIO DE CLASES</h4>
            </center>
         </div>
         <div class="modal-body">
            <form >
               <div class="row">
                  <div class="col-sm-1"></div>
                  <div class="col-md-9 row"  >
                     <div class="col-sm-1"></div>
                     <div class="row">
                        <div class="col-25">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-xs-3">D&IacuteAS</label>
                           </div>
                        </div>
                        <div class="col-75">
                           <div class="col-sm-8">
                              <select class="form-control" id="dias2">
                                 <option>LUNES</option>
                                 <option>MARTES</option>
                                 <option>MIERCOLES</option>
                                 <option>JUEVES</option>
                                 <option>VIERNES</option>
                                 <option>SABADO</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-xs-3">INICIO</label>
                           </div>
                        </div>
                        <div class="col-75">
                           <div class="col-sm-4">
                              <input type="button" value="-" onclick="previousModificar();cargarSelectModificar();">
                           </div>
                           <div class="col-sm-6">
                              <select class="form-control" name="horaInicio2" id="horaInicio2" disabled="true" onchange="cargarSelectSalida()">
                              </select>
                           </div>
                           <div class="col-sm-2">
                              <input type="button" value="+" onclick="nextModificar();cargarSelectModificar();">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-xs-3">SALIDA</label>
                           </div>
                        </div>
                        <div class="col-75">
                           <div class="col-sm-4">
                              <input type="button" value="-" onclick="previousSalidaModificar();">
                           </div>
                           <div class="col-sm-6">
                              <select class="form-control" name="horaSalida2" id="horaSalida2" disabled="true" >
                              </select>
                           </div>
                           <div class="col-sm-2">
                              <input type="button" value="+" onclick="nextSalidaModificar();">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-xs-3">CURSO</label>
                           </div>
                        </div>
                        <div class="col-75">
                           <div class="col-sm-2"></div>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" id="curso2" onkeyup="validarCurso2(this);habilitarModificarHorario();" onfocusout="habilitarModificarHorario();"><span id="curso2ok"></span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <div class="col-sm-1"></div>
                           <div class="col-sm-2">
                              <label class="control-label col-xs-3">PROFESOR</label>
                           </div>
                        </div>
                        <div class="col-75">
                           <div class="col-sm-2"></div>
                           <div class="col-sm-8">
                              <input type="text" class="form-control" id="profesor2" onkeyup="validarProfesor2(this);habilitarModificarHorario();" onfocusout="habilitarModificarHorario();"><span id="profesor2ok"></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer ">
            <button type="button" id="modificar" onclick="actualizar();"  disabled >GUARDAR</button>
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
               <h4 class="modal-title custom_align" id="Heading">!ELIMINAR HORARIO¡</h4>
            </center>
         </div>
         <div class="modal-body">
            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿ESTÁ SEGURO DE ELIMINAR EL HORARIO?</div>
         </div>
         <div class="modal-footer ">
            <button type="button"  onclick="eliminarHorario();" ><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
            <button type="button"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> NO</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- Confirmación de confirmar Horario-->
<div class="modal fade" id="confirmarHorario" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" id="cerrar4" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <center>
               <h4 class="modal-title custom_align" id="Heading">!CONFIRMAR HORARIO¡</h4>
            </center>
         </div>
         <div class="modal-body">
            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿ESTÁ SEGURO DE CONFIRMAR EL HORARIO? SI PRESIONA "SÍ" SE LE ASIGNARA EL HORARIO DE LIMPIEZA Y LAVANDERÍA, PERO NO PUEDE AGREGAR O EDITAR MÁS HORARIOS</div>
         </div>
         <div class="modal-footer ">
            <button type="button"  onclick="asignarHorarioLimpieza();"  ><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
            <button type="button"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> NO</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
 
</div>