<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>ESTUDIANTES ASISTENTES</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead>
           <th >
               <button data-toggle="modal" data-target="#registrarAsistente">AGREGAR</button>
            </th>

            <th >
               <input type="text"  class="form-control" onkeyup="busquedaTablas(this)" maxlength="64" size="20" placeholder="Busqueda General" >
            </th>

            <th>

               <div class="dropdown">
                 <a id="dLabel" role="button" data-toggle="dropdown"  >
                 <button>FILTRAR POR<span class="caret"></span></button>
                 </a>
                 <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    <li class="dropdownMenu"><a href="#" onclick="verAsistente();">TODOS</a></li>
                    <li class="divider"></li>                 
                    <li class="dropdown-submenu">
                       <a href="#">CEDULA</a>
                       <ul class="dropdown-menu">
                          <li  onclick="verProvinciaAsistente('1')"><a href="#">SAN JOSE</a></li>
                          <li><a href="#" onclick="verProvinciaAsistente('2')">ALAJUELA</a></li>
                          <li><a href="#" onclick="verProvinciaAsistente('3')">CARTAGO</a></li>
                          <li><a href="#" onclick="verProvinciaAsistente('4')">HEREDIA</a></li>
                          <li><a href="#" onclick="verProvinciaAsistente('5')">GUANACASTE</a></li>
                          <li><a href="#" onclick="verProvinciaAsistente('6')">PUNTARENAS</a></li>
                          <li><a href="#" onclick="verProvinciaAsistente('7')">LIMON</a></li>
                          <li><a href="#" onclick="verProvinciaAsistente('8')">NACIONALIZADO</a></li>
                          <li><a href="#" onclick="verProvinciaAsistente('9')">CASOS ESPECIALES</a></li>
                       </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                       <a href="#">SEXO</a>
                       <ul class="dropdown-menu">
                          <li><a href="#" onclick="verSexoAsistente('M')">MASCULINO </a></li>
                          <li><a href="#" onclick="verSexoAsistente('F')">FEMENINO</a></li>
                       </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                       <a tabindex="-1" href="#">NOMBRE</a>
                       <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="#" onclick="verOrdenarNombreAsistente('A')">A-G</a></li>
                          <li>  <a href="#" onclick="verOrdenarNombreAsistente('B')">H-L</a></LI>
                          <li> <a href="#" onclick="verOrdenarNombreAsistente('C')">M-P</a></LI>
                          <li> <a href="#" onclick="verOrdenarNombreAsistente('D')">Q-U</a></LI>
                          <li> <a href="#" onclick="verOrdenarNombreAsistente('E')">V-Z</a>
                          </li>
                       </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                       <a tabindex="-1" href="#">APELLIDO</a>
                       <ul class="dropdown-menu">
                          <li><a tabindex="-1" href="#"  onclick="verOrdenarApellidoAsistente('A')">A-G</a></li>
                          <li>  <a href="#"  onclick="verOrdenarApellidoAsistente('B')">H-L</a></LI>
                          <li> <a href="#"  onclick="verOrdenarApellidoAsistente('C')">M-P</a></LI>
                          <li> <a href="#"  onclick="verOrdenarApellidoAsistente('D')">Q-U</a></LI>
                          <li> <a href="#"  onclick="verOrdenarApellidoAsistente('E')">V-Z</a>
                          </li>
                       </ul>
                    </li>
                 </ul>
              </div>
            </th>

            <th>
               <button onclick="imprimirReportePdf('Asistente')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
              <thead>
                 <th>CEDULA</th>
                 <th>NOMBRE</th>
                 <th>PRIMER A</th>
                 <th>SEGUNDO A</th>
                 <th>SEXO</th>
                 <th style="width:5%">ACTUALIZAR</th>
                 <th style="width:5%">ELIMINAR</th>
              </thead>
              <tbody id="contenidoAsistenetes">
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
               <th>CEDULA</th>
               <th>NOMBRE</th>
               <th>PRIMER A</th>
               <th>SEGUNDO A</th>
               <th>SEXO</th>
            </thead>
            <tbody id="contenidoAsistentes2">
            </tbody>
         </table>
      </div>
   </div>
</div>





<div class="modal fade" id="registrarAsistente" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button id="cerrarRegistro" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <center>
               <h4 class="modal-title custom_align" id="Heading">REGISTRO DE ASISTENTES</h4>
            </center>
         </div>
         <div class="modal-body">
            <form  id="formulario"  enctype="multipart/form-data">

              <div class="row">
                 <div class="col-25">
                    <label for="lname">C&EacuteDULA</label>
                 </div>
                 <div class="col-75">
                  <input class="form-control" type="text" id="cedulaEstudiante" onkeyup="caracteres()" onfocusout="habilitarRegistroAsistente();">   <span id="cedulaok"></span> 
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">NOMBRE</label>
                 </div>
                 <div class="col-75">
                     <input type="text" class="form-control" onkeyup="validarNombre(this)" onfocusout="habilitarRegistroAsistente();" id="nombreEstudiante"><span id="nombreok"></span>
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">APELLIDO 1</label>
                 </div>
                 <div class="col-75">
                     <input type="text" class="form-control" onkeyup="validarPrimerA(this);" onfocusout="habilitarRegistroAsistente();"  id="primerAEstudiante"><span id="primerAaok"></span>
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">APELLIDO 2</label>
                 </div>
                 <div class="col-75">
                     <input type="text" class="form-control"
                        onkeyup="validarSegundoA(this);" onfocusout="habilitarRegistroAsistente();" id="segundoAEstudiante"><span id="segundoAok"></span>
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">SEXO</label>
                 </div>
                 <div class="col-75">
                   <input type="radio"  name="gender1" value="M" checked> MASCULINO<br>
                    <input type="radio" name="gender1" value="F"> FEMENINO<br>
                    <input type="radio"  name="gender1" value="O"> OTRO
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">CONTRASEÑA</label>
                 </div>
                 <div class="col-75">
                   <input type="password"
                        onkeyup="validarPrimerCorreo(this);" onfocusout="habilitarRegistroAsistente();" class="form-control" id="passEstudiante1"><span id="passValid1"></span>
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">CONFIRMAR CONTRASEÑA</label>
                 </div>
                 <div class="col-75">
                    <input type="password" class="form-control" id="passEstudiante2" onkeyup="validarSEgundoCorreo();" onfocusout="habilitarRegistroAsistente();"><span id="passValid2"></span>
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">CORREO</label>
                 </div>
                 <div class="col-75">
                     <input type="text" onkeyup="validarCorreo(this);" onfocusout="habilitarRegistroAsistente();" class="form-control" id="correoEstudiante"  ><span id="estadoCorreo"></span>
                 </div>
              </div>

            </form>
         </div>
         <div class="modal-footer ">
            <button type="button" id="registrarAsistenteAdmi" name="registrarAsistenteAdmi" onclick="registarAsistenteAdmin()" disabled=true>GUARDAR</button>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
</div>
<!-- /.fin -->




<div class="modal fade" id="actualizarAsistente" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button id="cerrarActualizar" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <center>
               <h4 class="modal-title custom_align" id="Heading">REGISTRO DE ASISTENTES</h4>
            </center>
         </div>
         <div class="modal-body">
            <form  id="formulario"  enctype="multipart/form-data">

              <div class="row">
                 <div class="col-25">
                    <label for="lname">C&EacuteDULA</label>
                 </div>
                 <div class="col-75">
                 <input class="form-control" type="text" id="editarCedula" onkeyup="caracteres()" disabled=""><span id="cedulaok"></span> 
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">NOMBRE</label>
                 </div>
                 <div class="col-75">
                    <input type="text" class="form-control" id="editarNombre">
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">APELLIDO 1</label>
                 </div>
                 <div class="col-75">
                     <input type="text" class="form-control" id="editarPrimerA">
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">APELLIDO 2</label>
                 </div>
                 <div class="col-75">
                      <input type="text" class="form-control" id="editarSegundoA">
                 </div>
              </div>
              <div class="row">
                 <div class="col-25">
                    <label for="lname">SEXO</label>
                 </div>
                 <div class="col-75">
                   <input type="radio" name="gender" value="M"> MASCULINO<br>
                   <input type="radio" name="gender" value="F"> FEMENINO<br>
                   <input type="radio"  name="gender" value="O">  OTRO
                 </div>
              </div> 

            </form>
         </div>
        <div class="modal-footer "> 
          <button type="button" id="registrarEstudiante2" onclick="actualizarAsistenteAdmin()" >GUARDAR</button>
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
            <button type="button" id="cerrarEliminar" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <center>
               <h4 class="modal-title custom_align" id="Heading">SE ELMINAR&Aacute ESTE REGISTRO!</h4>
            </center>
         </div>
         <div class="modal-body">
            <div class="alert alert-danger">
            <SPAN ID="cedulaEliminacion" style="display: none;"></SPAN>
                <center><span class="glyphicon glyphicon-warning-sign"></span> ¿EST&AacuteS SEGURO?</center>
            </div>
         </div>
         <div class="modal-footer ">
            <button type="button" onclick="eliminarAsistente()" ><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
            <button type="button"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
 
</div>

 