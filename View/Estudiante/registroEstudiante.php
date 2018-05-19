<div class="container"> 
    <header>
        <h2>BIENVENIDO AL REGISTRO EN SARE</h2>
    </header>
    <br>
    <form >

       <div class="row">
          <div class="col-25">
             <label for="fname">C&EacuteDULA</label>
          </div>
          <div class="col-75">
             <input type="text" id="cedulaEstudiante" onkeyup="caracteres()" onfocusout="habilitarRegistroEstudiante()"  ><span id="cedulaok"></span>
          </div>
       </div>

       <div class="row">
          <div class="col-25">
             <label for="lname">NOMBRE</label>
          </div>
          <div class="col-75">
             <input type="text" class="form-control" onkeyup="validarNombre(this)"  onfocusout="habilitarRegistroEstudiante();" id="nombreEstudiante" >
                        <span id="nombreok"></span>
          </div>
       </div>


       <div class="row">
          <div class="col-25">
             <label for="lname">APELLIDO 1</label>
          </div>
          <div class="col-75">
             <input type="text" class="form-control" id="primerAEstudiante" onkeyup="validarPrimerA(this);" onfocusout="habilitarRegistroEstudiante();">
             <span id="primerAaok"></span>
          </div>
       </div>

       <div class="row">
          <div class="col-25">
             <label for="lname">APELLIDO 2</label>
          </div>
          <div class="col-75">
             <input type="text" class="form-control" id="segundoAEstudiante"   onkeyup="validarSegundoA(this);" onfocusout="habilitarRegistroEstudiante();">
              <span id="segundoAok"></span>
          </div>
       </div>


       <div class="row">
          <div class="col-25">
             <label for="lname">SEXO</label>
          </div>
          <div class="col-75"> 
                <input type="radio" name="gender1" value="M" checked> MASCULINO<br>
                <input type="radio" name="gender1" value="F"> FEMENINO<br>
                <input type="radio"  name="gender1" value="O">  OTRO
           
          </div>
       </div>

       <div class="row">
          <div class="col-25">
             <label for="lname">AÑO INGRESO</label>
          </div>
          <div class="col-75">
              <input type="number" class="form-control" onkeyup="validarFecha(this);" onfocusout="habilitarRegistroEstudiante();"  id="fechaIngreso">
              <span id="estadoFecha"></span>
          </div>
       </div>

       <div class="row">
          <div class="col-25">
             <label for="lname">NUMERO  DE CUARTO</label>
          </div>
          <div class="col-75">
              <input type="number" onkeyup="validarCuarto(this);" onfocusout="habilitarRegistroEstudiante();" class="form-control" id="numeroCuartoEstudiante">
                <span id="estadoCuarto"></span>
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
              <input type="password" class="form-control"  onkeyup="validarPrimerCorreo(this);" onfocusout="habilitarRegistroEstudiante();" id="passEstudiante1">
                <span id="passValid1"></span>
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
             <label for="lname">CORREO ELECTRONICO</label>
          </div>
          <div class="col-75">
            <input type="email"  class="form-control" id="correoEstudiante" onkeyup="validarCorreo(this);" onfocusout="habilitarRegistroEstudiante();"  ><span id="estadoCorreo"></span>
          </div>
       </div>
  
       <div class="row">
       <div class="col-75">
            <button type="button" id="registrarEstudianteAdmi" disabled=true onclick="registarEstudiante()" >REGISTRAR</button>
          </div>
          
       </div>
    </form>    

 
</div>
