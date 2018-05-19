<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>ESTUDIANTES RESIDENTES</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead>
            <?php
              if (isset($_SESSION['administrador']) && isset($_SESSION['usuario'])) {
               echo '<th>
           
                  <button data-title="Edit" data-toggle="modal" data-target="#registrarEstudiante"  >AGREGAR</button>
           
                  </th>';
            }
           ?>

            <th>
               <input type="text"  class="form-control" onkeyup="busquedaTablas(this)" maxlength="64" size="20" placeholder="Busqueda General" >
            </th>

            <th>
                <div class="dropdown">
                   <a id="dLabel" role="button" data-toggle="dropdown"  >
                   <button>FILTRAR POR<span class="caret"></span></button>
                   </a>
                   <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                    <li class="dropdownMenu"><a href="#" onclick="verEstudiante();">TODOS</a></li>
                    <li class="divider"></li>                    
                      <li class="dropdown-submenu">
                         <a href="#">CEDULA</a>
                         <ul class="dropdown-menu">
                            <li  onclick="verProvinciaEstudiante('1')"><a href="#">SAN JOSE</a></li>
                            <li><a href="#" onclick="verProvinciaEstudiante('2')">ALAJUELA</a></li>
                            <li><a href="#" onclick="verProvinciaEstudiante('3')">CARTAGO</a></li>
                            <li><a href="#" onclick="verProvinciaEstudiante('4')">HEREDIA</a></li>
                            <li><a href="#" onclick="verProvinciaEstudiante('5')">GUANACASTE</a></li>
                            <li><a href="#" onclick="verProvinciaEstudiante('6')">PUNTARENAS</a></li>
                            <li><a href="#" onclick="verProvinciaEstudiante('7')">LIMON</a></li>
                            <li><a href="#" onclick="verProvinciaEstudiante('8')">NACIONALIZADO</a></li>
                            <li><a href="#" onclick="verProvinciaEstudiante('9')">CASOS ESPECIALES</a></li>
                         </ul>
                      </li>
                      <li class="divider"></li>
                      <li class="dropdown-submenu">
                         <a href="#">SEXO</a>
                         <ul class="dropdown-menu">
                            <li><a href="#" onclick="verSexoEstudiante('M')">MASCULINO </a></li>
                            <li><a href="#" onclick="verSexoEstudiante('F')">FEMENINO</a></li>
                         </ul>
                      </li>
                      <li class="divider"></li>
                      <li class="dropdown-submenu">
                         <a tabindex="-1" href="#">NOMBRE</a>
                         <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#" onclick="verOrdenarNombreEstudiante('A')">A-G</a></li>
                            <li>  <a href="#" onclick="verOrdenarNombreEstudiante('B')">H-L</a></LI>
                            <li> <a href="#" onclick="verOrdenarNombreEstudiante('C')">M-P</a></LI>
                            <li> <a href="#" onclick="verOrdenarNombreEstudiante('D')">Q-U</a></LI>
                            <li> <a href="#" onclick="verOrdenarNombreEstudiante('E')">V-Z</a>
                            </li>
                         </ul>
                      </li>
                      <li class="divider"></li>
                      <li class="dropdown-submenu">
                         <a tabindex="-1" href="#">APELLIDO</a>
                         <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#"  onclick="verOrdenarApellidoEstudiante('A')">A-G</a></li>
                            <li>  <a href="#"  onclick="verOrdenarApellidoEstudiante('B')">H-L</a></LI>
                            <li> <a href="#"  onclick="verOrdenarApellidoEstudiante('C')">M-P</a></LI>
                            <li> <a href="#"  onclick="verOrdenarApellidoEstudiante('D')">Q-U</a></LI>
                            <li> <a href="#"  onclick="verOrdenarApellidoEstudiante('E')">V-Z</a>
                            </li>
                         </ul>
                      </li>
                      <li class="divider"></li>
                      <li class="dropdown-submenu">
                         <a tabindex="-1" href="#">CARRERA</a>
                         <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#"  onclick="verOrdenarCarreraEstudiante('A')">ADMINISTRACION DE EMPRESAS</a></li>
                            <li>  <a href="#"  onclick="verOrdenarCarreraEstudiante('B')">ADMINISTRACION DE OFICINAS</a></LI>
                            <li> <a href="#"  onclick="verOrdenarCarreraEstudiante('C')">EDUCACION RUAL</a></LI>
                            <li> <a href="#"  onclick="verOrdenarCarreraEstudiante('D')">ING EN SISTEMAS</a></LI>
                            <li> <a href="#"  onclick="verOrdenarCarreraEstudiante('E')">RECREACION TURISRICA</a>
                            </li>
                         </ul>
                      </li>
                      <li class="divider"></li>
                      <li>   <a tabindex="-1" href="#">CABINA</a></LI>
                      <li class="divider"></li>
                      <li class="dropdown-submenu">
                         <a tabindex="-1" href="#">ACESSO</a>
                         <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#"  onclick="verOrdenarAcesoEstudiante('1')">SI</a></li>
                            <li>  <a href="#"  onclick="verOrdenarAcesoEstudiante('0')">NO</a></LI>
                         </ul>
                      </li>
                      <li class="divider"></li>
                      <li class="dropdown-submenu">
                         <a tabindex="-1" href="#">AÑO</a>
                         <ul class="dropdown-menu">
                            <div class="input-group">
                               <input type="number" class="form-control" value="2014" onclick="verOrdenarAnioEstudiante(this)" placeholder="Año de ingreso">
                               <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                            </div>
                         </ul>
                      </li>
                   </ul>
                </div>

            </th>

            <th>
               <button onclick="imprimirReportePdf('Residente')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
            <thead>
               <th>C&EacuteDULA</th>
               <th>NOMBRE</th>
               <th>APELLIDO 1</th>
               <th>APELLIDO 2</th>
               <th>SEXO</th>
               <th>CABINA</th>
               <th>AÑO ING</th>
               <th>CARRERA</th>
               <th>ACCESO</th>
               <?php
                  if (isset($_SESSION['administrador'])) {
                    echo '<th style="width:5%">ACTUALIZAR</th>
                    <th style="width:5%">ELIMINAR</th>';
                  }; 
                  
                  
                  ?>
            </thead>
            <tbody id="contenidoResidentes">
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
                     <th>C&EacuteDULA</th>
                     <th>NOMBRE</th>
                     <th>APELLIDO 1</th>
                     <th>AEPLLIDO 2</th>
                     <th>SEXO</th>
                     <th>CABINA</th>
                     <th>AÑO</th>
                     <th>CARRERA</th>
                     <th>ACCESO</th>
                  </thead>
                  <tbody id="contenidoResidentes2">
                  </tbody>
             </table>
          </div>
       </div>
    </div>

     






  <div class="modal fade" id="registrarEstudiante" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
     <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
              <button id="cerrarRegistro" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
              <center>
                 <h4 class="modal-title custom_align" id="Heading">REGISTRO DE RESIDENTES</h4>
              </center>
           </div>
           <div class="modal-body">
              <form  id="formulario"  enctype="multipart/form-data">

                <div class="row">
                   <div class="col-25">
                      <label for="lname">C&EacuteDULA</label>
                   </div>
                   <div class="col-75">
                    <input class="form-control" type="text" id="cedulaEstudiante" onkeyup="caracteres()" onfocusout="habilitarRegistroEstudiante()"><span id="cedulaok"></span>
                   </div>
                </div>
                <div class="row">
                   <div class="col-25">
                      <label for="lname">NOMBRE</label>
                   </div>
                   <div class="col-75">
                     <input type="text" class="form-control" onkeyup="validarNombre(this)" onfocusout="habilitarRegistroEstudiante();" id="nombreEstudiante"> <span id="nombreok"></span>    
                   </div>
                </div>
                <div class="row">
                   <div class="col-25">
                      <label for="lname">APELLIDO 1</label>
                   </div>
                   <div class="col-75">
                      <input type="text" class="form-control" id="primerAEstudiante" onkeyup="validarPrimerA(this);" onfocusout="habilitarRegistroEstudiante();"><span id="primerAaok"></span>
                   </div>
                </div>
                <div class="row">
                   <div class="col-25">
                      <label for="lname">APELLIDO 2</label>
                   </div>
                   <div class="col-75">
                       <input type="text" class="form-control" id="segundoAEstudiante"   onkeyup="validarSegundoA(this);" onfocusout="habilitarRegistroEstudiante();"><span id="segundoAok"></span>
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
                      <label for="lname">AÑO INGRESO</label>
                   </div>
                   <div class="col-75">
                     <input type="number" class="form-control" onkeyup="validarFecha(this);" onfocusout="habilitarRegistroEstudiante();"  id="fechaIngreso"><span id="estadoFecha"></span>
                   </div>
                </div>

                <div class="row">
                   <div class="col-25">
                      <label for="lname">NUMERO  DE CUARTO</label>
                   </div>
                   <div class="col-75">
                     <input type="number" onkeyup="validarCuarto(this);" onfocusout="habilitarRegistroEstudiante();" class="form-control" id="numeroCuartoEstudiante"><span id="estadoCuarto"></span>
                   </div>
                </div>

                <div class="row">
                   <div class="col-25">
                      <label for="lname">CARRERA</label>
                   </div>
                   <div class="col-75">
                      <select class="form-control" id="carreraEstudiante">
                                  <option class="form-control">Administracion de empresas</option>
                                  <option class="form-control">Administracion de oficinas</option>
                                  <option class="form-control">Educacion rural</option>
                                  <option class="form-control">Ingenieria en sistemas</option>
                                  <option class="form-control">Recreacion turistica</option>
                      </select>
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
                     <input type="password" class="form-control" id="passEstudiante2" onkeyup="validarSEgundoCorreo();" onfocusout="habilitarRegistroEstudiante();"><span id="passValid2"></span>
                   </div>
                </div>
                <div class="row">
                   <div class="col-25">
                      <label for="lname">CORREO</label>
                   </div>
                   <div class="col-75">
                       <input type="text"  class="form-control" id="correoEstudiante" onkeyup="validarCorreo(this);" onfocusout="habilitarRegistroEstudiante();"  ><span id="estadoCorreo"></span>
                   </div>
                </div>

              </form>
           </div>

              <div class="modal-footer "> 
                    <button type="button" id="registrarEstudianteAdmi" onclick="registarEstudianteAdmin();" disabled >GUARDAR
                    </button>
              </div>
           <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
     </div>
  </div>
  <!-- /.fin -->


      <div class="modal fade" id="actualizarEstudiante" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button id="cerrarActualizar" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                  <center>
                     <h4 class="modal-title custom_align" id="Heading">REGISTRO DE RESIDENTES</h4>
                  </center>
               </div>
               <div class="modal-body">
                  <form  id="formulario"  enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-25">
                           <label for="lname">C&EacuteDULA</label>
                        </div>
                        <div class="col-75">
                            <input class="form-control" editable="false" type="text" id="editarCedula" 
                              onkeyup="caracteres()"><span id="cedulaok"></span>
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
                           <input type="radio"  name="gender" value="M" checked> MASCULINO<br>
                           <input type="radio" name="gender" value="F"> FEMENINO<br>
                           <input type="radio"  name="gender" value="O"> OTRO
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="lname">AÑO INGRESO</label>
                        </div>
                        <div class="col-75">
                          <input type="number" class="form-control" id="editarAno">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="lname">NUMERO  DE CUARTO</label>
                        </div>
                        <div class="col-75">
                            <input type="number" class="form-control" id="editarCabina">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="lname">CARRERA</label>
                        </div>
                        <div class="col-75">
                           <select class="form-control" id="editarCarrera">
                              <option class="form-control">Administracion de empresas</option>
                              <option class="form-control">Administracion de oficinas</option>
                              <option class="form-control">Educacion rural</option>
                              <option class="form-control">Ingenieria en sistemas</option>
                              <option class="form-control">Recreacion turistica</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-25">
                           <label for="lname">ACCESO</label>
                        </div>
                        <div class="col-75">
                          <input type="radio" name="access" id="editarAcesso1" value="1"> SI<br>
                          <input type="radio" name="access"  id="editarAcesso2" value="0"> NO<br>
                        </div>
                     </div>
                                            
                  </form>
               </div>
               <div class="modal-footer "> 
                   <button type="button" id="registrarEstudiante2" onclick="actualizarEstudianteAdmin();" >GUARDAR</button>
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
            <button type="button" onclick="eliminarEstudiante()" ><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
            <button type="button"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
 
</div>
