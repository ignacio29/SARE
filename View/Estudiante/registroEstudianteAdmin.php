<html>
    <head>
<!--        <script src="js/jquery.js"></script>
         <script src="js/usuarios.js"></script>
             <script src="js/validacionesFormularios.js"></script>-->


    </head>




    <body>
        <div  id="RegistroEstudiante" name="RegistroEstudiante" >
            <form >
                <div class="row">
                    <div class="col-md-2"> </div>
                    <div class="col-md-8"  >
                        <div class="col-md-12">
                            <h2>BIENVENIDO AL SISTEMA DE REGISTRO SARE</h2>
                        </div>

                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-md-3">C&EacuteDULA::</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="cedulaEstudianteVistaAdm" onkeyup="caracteres()"><span id="cedulaok"></span>
                        </div>
                        <div class="col-sm-12"><br></div>



                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">NOMBRE:</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nombreEstudianteVistaAdm">
                        </div>
                        <div class="col-sm-12"><br></div>



                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">PRIMER APELLIDO:</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="primerAEstudianteVistaAdm">
                        </div>
                        <div class="col-sm-12"><br></div>


                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">SEGUNDO APELLIDO:</label>
                        </div>

                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="segundoAEstudianteVistaAdm">
                        </div>

                        <div class="col-sm-12"><br></div>


                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">SEXO:</label>
                        </div>

                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="sexoVistaAdm">
                        </div>

                        <div class="col-sm-12"><br></div>


                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">AÑO INGRESO:</label>
                        </div>

                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="fechaIngresoVistaAdm">
                        </div>

                        <div class="col-sm-12"><br></div>

                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">  NUMERO  DE CUARTO:</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="numeroCuartoEstudianteVistaAdm">
                        </div>
                        <div class="col-sm-12"><br></div>


                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">CARRERA:</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <select class="form-control" id="carreraEstudianteVistaAdm">
                                <option>Administracion de empresas</option>
                                <option>Administracion de oficinas</option>
                                <option>Educacion rural</option>
                                <option>ingenieria en sistemas</option>
                                <option>Recreacion turistica</option>
                            </select>
                        </div>
                        <div class="col-sm-12"><br></div>


                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">CONTRASEÑA:</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="passEstudianteVistaAdm1">
                        </div>
                        <div class="col-sm-12"><br></div>





                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3">CONFIRMAR CONTRASEÑA:</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="passEstudianteVistaAdm2" onkeyup="validarPassword()"><span id="passValid"></span>
                        </div>

                        <div class="col-sm-12"><br></div>


                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                            <label class="control-label col-xs-3"> CORREO ELECTRONICO:</label>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <input type="text"  class="form-control" id="correoEstudianteVistaAdm"  ><span id="estadoCorreo"></span>
                        </div>
                        <div class="col-sm-12"><br></div>
                        <div class="col-sm-12"></div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-1">
                            <button type="button">RESETEAR</button>
                        </div>
                        <div class="col-sm-2"></div>
                        <div class="col-sm-1">
                            <button type="button" id="registrarEstudianteVistaAdm" onclick="registarEstudianteAdmin()" >REGISTRAR</button>

                        </div>









                    </div>
                </div>
            </form>
        </div>

    </body>

</html>
