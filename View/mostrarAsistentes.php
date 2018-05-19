
<html>
   <head>


   </head>
   <body>
<div >


 <div class="form-control">
          <div class="row ">

              <div class="col-md-12">



                <div class="col-md-1">
                  <button data-toggle="modal" data-target="#registrarAsistente">AGREGAR</button>


               </div>
               <div class="col-md-2"></div>
                  <div class="col-md-4">
                    <div class="input-group">

    <input type="text" class="form-control" onkeyup="verBusquedaAsistente(this)" placeholder="Nombre de usuario">
      <span class="input-group-addon glyphicon glyphicon-search"></span>
  </div>

                  </div>
                  <div class="col-md-3 " >
                    <div class="container">
	<div class="row">


        <div class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown"  >
                <button>FILTRAR POR:<span class="caret"></span></button>
            </a>

    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
              <li class="dropdown-submenu"><a href="#">CEDULA</a>

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
              <li class="dropdown-submenu"><a href="#">SEXO</a>
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
	</div>
</div>
                  </div>
                  <div class="col-md-2">
                      <button type="button" onclick="imprimirReportePdf('Asistente')" ><span class="glyphicon glyphicon-print"></button>
                  </div>
              </div>
              <div class="col-md-12">
                  <h4>ESTUDIANTES ASISTENTES</h4>
                  <div class="table-responsive">


                      <table id="mytable" class="table table-bordred table-striped">

                          <thead>


                          <th>CEDULA</th>
                          <th>NOMBRE</th>
                          <th>PRIMER A</th>
                          <th>SEGUNDO A</th>
                           <th>SEXO</th>

                            <th>ACTUALIZAR</th>
                          <th>ELIMINAR</th>

                          </thead>

                        <tbody id="contenidoAsistenetes">




                          </tbody>


                      </table>

                  </div>
                  <center>
                      <div id="" class="contenedor_paginacion">
                        <div id="paginacion" class="clearfix paginacion"></div>
                      </div>
                  </center>

              </div>
<div id="testDiv" style="display: none;">
   <div class="col-md-12">
                  <div id="cargarTabla" class="table-responsive">


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
                              <button type="button"  id="cerrarRegistro" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              <h4 class="modal-title custom_align" id="Heading">BIENVENIDO AL SISTEMA DE REGISTRO SARE</h4>
                          </div>
                          <div class="modal-body">

                                      <div class="row">
                                          <div class="col-md-2"> </div>
                                          <div class="col-md-8 form-control">
                                              <div class="col-md-12">
                                              </div>

                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-2">
                                                  <label class="control-label col-md-3">C&EacuteDULA:</label>
                                              </div>
                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-6">
                                                  <input class="form-control" type="text" id="cedulaEstudiante" onkeyup="caracteres()" onfocusout="habilitarRegistroAsistente();">   <span id="cedulaok"></span>
                                              </div>
                                                <div class="col-sm-1">

                                                </diV>
                                              <div class="col-sm-12"><br></div>



                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-2">
                                                  <label class="control-label col-xs-3">NOMBRE:</label>
                                              </div>
                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-6">
                                                  <input type="text" class="form-control" onkeyup="validarNombre(this)" onfocusout="habilitarRegistroAsistente();" id="nombreEstudiante"><span id="nombreok"></span>
                                              </div>
                                                <div class="col-sm-1">

                                                </div>
                                              <div class="col-sm-12"><br></div>



                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-2">
                                                  <label class="control-label col-xs-3">PRIMER APELLIDO:</label>
                                              </div>
                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-6">
                                                  <input type="text" class="form-control" onkeyup="validarPrimerA(this);" onfocusout="habilitarRegistroAsistente();"  id="primerAEstudiante"><span id="primerAaok"></span>
                                              </div>
                                                <div class="col-sm-1">

                                                </div>
                                              <div class="col-sm-12"></div>


                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-2">
                                                  <label class="control-label col-xs-3">SEGUNDO APELLIDO:</label>
                                              </div>

                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-6">
                                                  <input type="text" class="form-control"
                                                  onkeyup="validarSegundoA(this);" onfocusout="habilitarRegistroAsistente();" id="segundoAEstudiante"><span id="segundoAok"></span>
                                              </div>

                                              <div class="col-sm-1">

                                              </div>



                                              <div class="col-sm-12"><br></div>


                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-2">
                                                  <label class="control-label col-xs-3">SEXO:</label>
                                              </div>

                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-6">
                                                <form>
                                                  <input type="radio"  name="gender1" value="M" checked> MASCULINO<br>
                                                   <input type="radio" name="gender1" value="F"> FEMENINO<br>
                                                    <input type="radio"  name="gender1" value="O"> OTRO
                                                </form>

                                              </div>

                                              <div class="col-sm-12"><br></div>


                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-2">
                                                  <label class="control-label col-xs-3">CONTRASEÑA:</label>
                                              </div>
                                              <div class="col-sm-2"></div>
                                              <div class="col-sm-5">
                                                  <input type="password"
                                                  onkeyup="validarPrimerCorreo(this);" onfocusout="habilitarRegistroAsistente();" class="form-control" id="passEstudiante1"><span id="passValid1"></span>
                                              </div><
                                              <div class="col-sm-1">

                                              </div>
                                              <div class="col-sm-12"><br></div>


                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-2">
                                                  <label class="control-label col-xs-3">CONFIRMAR CONTRASEÑA:</label>
                                              </div>
                                              <div class="col-sm-2"></div>
                                              <div class="col-sm-5">
                                                  <input type="password" class="form-control" id="passEstudiante2" onkeyup="validarSEgundoCorreo();" onfocusout="habilitarRegistroAsistente();"><span id="passValid2"></span>
                                              </div>
                                              <div class="col-sm-1">

                                              </div>

                                              <div class="col-sm-12"><br></div>


                                              <div class="col-sm-1"></div>
                                              <div class="col-sm-2">
                                                  <label class="control-label col-xs-3"> CORREO ELECTRONICO:</label>
                                              </div>
                                              <div class="col-sm-2"></div>
                                              <div class="col-sm-5">
                                                  <input type="text" onkeyup="validarCorreo(this);" onfocusout="habilitarRegistroAsistente();" class="form-control" id="correoEstudiante"  ><span id="estadoCorreo"></span>
                                              </div>
                                              <div class="col-sm-1">

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
                                    <button type="button" id="registrarAsistenteAdmi" name="registrarAsistenteAdmi" onclick="registarAsistenteAdmin()" disabled=true>REGISTRAR</button>
                          </div>
                      </div>
                      <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
              </div>
              <div class="modal fade" id="actualizarAsistente" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" id="cerrarActualizar" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              <h4 class="modal-title custom_align" id="Heading">BIENVENIDO AL SISTEMA DE REGISTRO SARE</h4>
                          </div>
                          <div class="modal-body">
                            <div   >
                              <div  >
                                  <form >
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
                                                  <input class="form-control" type="text" id="editarCedula" onkeyup="caracteresA(this)"><span id="cedulaokA"></span>
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
                <input type="radio"  name="gender" value="O">  OTRO
                </form>
                                              </div>

                                              <div class="col-sm-12"><br></div>



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



                          </div>
                          <div class="modal-footer ">
                            <button type="button">RESETEAR</button>
                                    <button type="button" id="registrarEstudiante2" onclick="actualizarAsistenteAdmin()" >ACTUALIZAR</button>
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
                              <button type="button" id="cerrarEliminar" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                              <h4 class="modal-title custom_align" id="Heading">ELIMINANCION DE ASISTENTES</h4>
                          </div>
                          <div class="modal-body">

                              <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> ¿ESTA SEGURO QUE DESEA ELIMINAR AL RESIDENTE:<SPAN ID="cedulaEliminacion"></SPAN></div>

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
      </div>
</div>

   </body>
   </html>
