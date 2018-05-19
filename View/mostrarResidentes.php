<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
<div >



  <div class="form-control">
           <div class="row ">

               <div class="col-md-12">



                 <div class="col-md-1">
                   <?php
                   session_start();

                   //Si la variable sesión está vacía admnistrador
                   if (isset($_SESSION['administrador']) && isset($_SESSION['usuario'])) {
                    echo '  <button data-title="Edit" data-toggle="modal" data-target="#registrarEstudiante"  >Agregar</button>';
                   } else {

                   }
                   ?>

                </div>
                <div class="col-md-2"></div>
                   <div class="col-md-4">
                     <div class="input-group">

     <input type="text" class="form-control" onkeyup="busquedaTablas(this)" placeholder="Nombre de usuario">
       <span class="input-group-addon glyphicon glyphicon-search"></span>
   </div>
                   </div>
                   <div class="col-md-2">
                     <div class="container">
 	<div class="row">


         <div class="dropdown">
             <a id="dLabel" role="button" data-toggle="dropdown"  >
                 <button>FILTRAR POR:<span class="caret"></span></button>
             </a>

     		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
               <li class="dropdown-submenu"><a href="#">CEDULA</a>

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
               <li class="dropdown-submenu"><a href="#">SEXO</a>
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
                     <!--<li><a tabindex="-1" href="#"  onclick="verOrdenarApellidoAsistente('A')">2014</a></li>
                     <li>  <a href="#"  onclick="verOrdenarApellidoAsistente('B')">2015</a></LI>
                             <li>  <a href="#"  onclick="verOrdenarApellidoAsistente('B')">2016</a></LI>
                                  <li>  <a href="#"  onclick="verOrdenarApellidoAsistente('B')">2017</a></LI>
                                       <li>  <a href="#"  onclick="verOrdenarApellidoAsistente('B')">2018</a></LI>
                                            <li>  <a href="#"  onclick="verOrdenarApellidoAsistente('B')">2019</a></LI>-->

                   </ul>
                 </li>
             </ul>
         </div>
 	</div>
 </div>
                   </div>
                   <div class="col-md-2">
                       <button type="button" onclick="imprimirReportePdf('Residente')" ><span class="glyphicon glyphicon-print"></button>
                   </div>
               </div>
               <div class="col-md-12">
                   <h4>ESTUDIANTES RESIDENTES</h4>
                   <div class="table-responsive">


                       <table id="mytable" class="table table-bordred table-striped">

                           <thead>


                           <th>CEDULA</th>
                           <th>NOMBRE</th>
                           <th>PRIMER A</th>
                           <th>SEGUNDO A</th>
                            <th>SEXO</th>
                           <th>CABINA</th>
                             <th>AÑO ING</th>
                             <th>CARRERA</th>
                              <th>ACCESO</th>




 <?php

  if (isset($_SESSION['administrador'])) {
    echo '<th>ACTUALIZAR</th>
    <th>ELIMINAR</th>';
  };


  ?>



                           </thead>



                           <tbody id="contenidoResidentes">









                           </tbody>


                       </table>

                   </div>
                   <center>
                       <div id="" class="contenedor_paginacion">
                         <div id="paginacion" class="clearfix paginacion"></div>
                       </div>
                   </center>
               </div>

               <div id="testDiv" style="display: none">
                   <div class="col-md-12">

                   <div class="table-responsive">


                       <table id="mytable" class="table table-bordred table-striped">

                           <thead>


                           <th>CEDULA</th>
                           <th>NOMBRE</th>
                           <th>1°APELLIDO</th>
                           <th>2°AEPLLIDO</th>
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

<!---NuEVO MODAL-------------------------------------------->
<div class="modal fade" id="registrarEstudiante" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="cerrarRegistro" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">BIENVENIDO AL SISTEMA DE REGISTRO SARE</h4>
            </div>
            <div class="modal-body">


                        <div class="row">
                          <div class="col-md-2"> </div>
                          <div class="col-md-8 form-control"  >
                              <div class="col-md-12">

                              </div>

                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-md-3">C&EacuteDULA:</label>
                              </div>
                              <div class="col-sm-1"></div>
                              <div class="col-sm-4">
                                  <input class="form-control" type="text" id="cedulaEstudiante" onkeyup="caracteres()" onfocusout="habilitarRegistroEstudiante(),caracteres()"><span id="cedulaok"></span>
                              </div>
                              <div class="col-sm-12"><br></div>



                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">NOMBRE:</label>
                              </div>
                              <div class="col-sm-1"></div>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" onkeyup="validarNombre(this)" onfocusout="habilitarRegistroEstudiante(),validarNombre(this)" id="nombreEstudiante">
                                  <span id="nombreok"></span>
                              </div>
                              <div class="col-sm-12"><br></div>



                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">PRIMER APELLIDO:</label>
                              </div>
                              <div class="col-sm-1"></div>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" id="primerAEstudiante" onkeyup="validarPrimerA(this);" onfocusout="habilitarRegistroEstudiante(),validarPrimerA(this)">
                                  <span id="primerAaok"></span>
                              </div>
                              <div class="col-sm-12"><br></div>


                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">SEGUNDO APELLIDO:</label>
                              </div>

                              <div class="col-sm-1"></div>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" id="segundoAEstudiante"   onkeyup="validarSegundoA(this);" onfocusout="habilitarRegistroEstudiante(),validarSegundoA(this)">
                                  <span id="segundoAok"></span>
                              </div>

                              <div class="col-sm-12"><br></div>


                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">SEXO:</label>
                              </div>

                              <div class="col-sm-1"></div>
                              <div class="col-sm-4">
                                <form action="">
                                 <input type="radio" name="gender1" value="M" checked> MASCULINO<br>
                                  <input type="radio" name="gender1" value="F"> FEMENINO<br>
                                  <input type="radio"  name="gender1" value="O">  OTRO
                                </form>
                              </div>

                              <div class="col-sm-12"><br></div>


                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">AÑO INGRESO:</label>
                              </div>

                              <div class="col-sm-1"></div>
                              <div class="col-sm-4">
                                  <input type="number" class="form-control" onkeyup="validarFecha(this);" onfocusout="habilitarRegistroEstudiante(),validarFecha(this)"  id="fechaIngreso">
                                  <span id="estadoFecha"></span>
                              </div>

                              <div class="col-sm-12"><br></div>

                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">  NUMERO  DE CUARTO:</label>
                              </div>
                              <div class="col-sm-1"></div>
                              <div class="col-sm-4">
                                  <input type="number" onkeyup="validarCuarto(this);" onfocusout="habilitarRegistroEstudiante(),validarCuarto(this)" class="form-control" id="numeroCuartoEstudiante">
                                    <span id="estadoCuarto"></span>
                              </div>
                              <div class="col-sm-12"><br></div>


                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">CARRERA:</label>
                              </div>
                              <div class="col-sm-1"></div>
                              <div class="col-sm-8">
                                  <select class="form-control" id="carreraEstudiante">
                                      <option class="form-control">Administracion de empresas</option>
                                      <option class="form-control">Administracion de oficinas</option>
                                      <option class="form-control">Educacion rural</option>
                                      <option class="form-control">Ingenieria en sistemas</option>
                                      <option class="form-control">Recreacion turistica</option>
                                  </select>
                              </div>
                              <div class="col-sm-12"><br></div>


                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">CONTRASEÑA:</label>
                              </div>
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">
                                  <input type="password" class="form-control"  onkeyup="validarPrimerCorreo(this);" onfocusout="habilitarRegistroEstudiante(),validarPrimerCorreo(this)" id="passEstudiante1">
                                  <span id="passValid1"></span>
                              </div>
                              <div class="col-sm-12"><br></div>





                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3">CONFIRMAR CONTRASEÑA:</label>
                              </div>
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">
                                  <input type="password" class="form-control" id="passEstudiante2" onkeyup="validarSEgundoCorreo();" onfocusout="habilitarRegistroEstudiante(),validarSEgundoCorreo()"><span id="passValid2"></span>
                              </div>

                              <div class="col-sm-12"><br></div>


                              <div class="col-sm-1"></div>
                              <div class="col-sm-2">
                                  <label class="control-label col-xs-3"> CORREO ELECTRONICO:</label>
                              </div>
                              <div class="col-sm-2"></div>
                              <div class="col-sm-4">
                                  <input type="text"  class="form-control" id="correoEstudiante" onkeyup="validarCorreo(this);" onfocusout="habilitarRegistroEstudiante(),validarCorreo(this)"  ><span id="estadoCorreo"></span>
                              </div>
                              <div class="col-sm-12"><br></div>
                              <div class="col-sm-12"></div>
                              <div class="col-sm-2"></div>
                              <div class="col-sm-1">

                              </div>
                              <div class="col-sm-2"></div>
                              <div class="col-sm-1">


                              </div>

                          </div>
                      </div>

              </div>




            <div class="modal-footer ">
              <button type="button">RESETEAR</button>
                  <button type="button" id="registrarEstudianteAdmi" onclick="registarEstudianteAdmin();" disabled=true >REGISTRAR</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>




               <div class="modal fade" id="actualizarEstudiante" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-header">
                               <button type="button" id="cerrarActualizar" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                               <h4 class="modal-title custom_align" id="Heading">BIENVENIDO AL SISTEMA DE REGISTRO SARE</h4>
                           </div>
                           <div class="modal-body">
                             <div  id="RegistroEstudiante" name="RegistroEstudiante" >
                                 <form >
                                     <div class="row">
                                         <div class="col-md-2"> </div>
                                         <div class="col-md-8 form-control "  >
                                             <div class="col-md-12 ">

                                             </div>

                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-md-3 ">C&EacuteDULA:</label>
                                             </div>
                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-4">
                                                 <input class="form-control" editable="false" type="text" id="editarCedula" onkeyup="caracteresA(this)"><span id="cedulaokA"></span>
                                             </div>
                                             <div class="col-sm-12"><br></div>



                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-xs-3">NOMBRE:</label>
                                             </div>
                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-4">
                                                 <input type="text" onkeyup="validarNombreA(this)" class="form-control" id="editarNombre">  <span id="nombreokA"></span>
                                             </div>
                                             <div class="col-sm-12"><br></div>



                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-xs-3">PRIMER APELLIDO:</label>
                                             </div>
                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-4">
                                                 <input type="text" class="form-control" id="editarPrimerA">
                                             </div>
                                             <div class="col-sm-12"><br></div>


                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-xs-3">SEGUNDO APELLIDO:</label>
                                             </div>

                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-4">
                                                 <input type="text" class="form-control" id="editarSegundoA">
                                             </div>

                                             <div class="col-sm-12"><br></div>


                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-xs-3">SEXO:</label>
                                             </div>

                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-4">
                                               <form action="">
 <input type="radio" name="gender" value="M"> MASCULINO<br>
 <input type="radio" name="gender" value="F"> FEMENINO<br>
 <input type="radio" name="gender" value="0"> OTRO
</form>
                                             </div>
                                             <div class="col-sm-12"><br></div>


                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-xs-3">CABINA:</label>
                                             </div>

                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-4">
                                                 <input type="number" class="form-control" id="editarCabina">
                                             </div>
                                             <div class="col-sm-12"><br></div>


                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-xs-3">AÑ0 INGRESO:</label>
                                             </div>

                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-4">
                                                 <input type="number" class="form-control" id="editarAno">
                                             </div>
                                             <div class="col-sm-12"><br></div>


                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-xs-3">CARRERA:</label>
                                             </div>

                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-8">
                                               <select class="form-control" id="editarCarrera">
                                                   <option value="Administracion de empresas">Administracion de empresas</option>
                                                   <option value="Administracion de oficinas">Administracion de oficinas</option>
                                                   <option value="Educacion rural">Educacion rural</option>
                                                   <option value="Ingenieria en sistemas">Ingenieria en sistemas</option>
                                                   <option  value="Recreacion turistica">Recreacion turistica</option>
                                               </select>
                                             </div>
                                             <div class="col-sm-12"><br></div>


                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-2">
                                                 <label class="control-label col-xs-3">ACCESO:</label>
                                             </div>

                                             <div class="col-sm-1"></div>
                                             <div class="col-sm-4">
                                               <form action="">
                                               <input type="radio" name="access" id="editarAcesso1" value="1"> SI<br>
                                               <input type="radio" name="access"  id="editarAcesso2" value="0"> NO<br>
                                             </form>
                                             </div>
                                             <div class="col-sm-12"><br></div>
                                             <div class="col-sm-12"></div>
                                             <div class="col-sm-2"></div>
                                             <div class="col-sm-1">

                                             </div>
                                             <div class="col-sm-2"></div>
                                             <div class="col-sm-1">

                                             </div>









                                         </div>
                                     </div>
                                 </form>
                             </div>



                           </div>
                           <div class="modal-footer ">
                             <button type="button" id="registrarEstudiante2" onclick="actualizarEstudianteAdmin();" >ACTUALIZAR</button>

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
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                               <h4 class="modal-title custom_align" id="Heading">ELIMINANCION DE RESIDENTES</h4>
                           </div>
                           <div class="modal-body">

                               <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>¿ESTA SEGURO QUE DESEA ELIMINAR AL RESIDENTE: <SPAN ID="cedulaEliminacion"></SPAN></div>

                           </div>
                           <div class="modal-footer ">
                               <button type="button" onclick="eliminarEstudiante()"  ><span class="glyphicon glyphicon-ok-sign"></span> SI</button>
                               <button type="button" id="cerrarEliminar"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> NO</button>
                           </div>
                       </div>
                       <!-- /.modal-content -->
                   </div>
                   <!-- /.modal-dialog -->
               </div>
           </div>
       </div>
</div>

    </body>
    </html>
