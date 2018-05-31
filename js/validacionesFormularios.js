
var correo="";

function asignarRespuestaCorreo(ajax){
  correo=ajax;
}
function validarCorreoIndex(input){
  var contenido=input.value;


var  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if (emailRegex.test(contenido)&&contenido!=null) {

      with (input.style) {
     borderColor="#81F79F";
     borderWidth = "3px";
     borderStyle = "solid";}


document.getElementById('estadoCorreo').innerHTML="";








}else{

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
document.getElementById('estadoCorreo').innerHTML="Formato incorrecto o incompleto";
}
}
function validarCorreoInstitucional(input){

campo = input.value;

valido = document.getElementById('estadoCorreo');

emailRegex = /^[-\w.%+]{1,64}@[una.ac.cr]$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono

    if (emailRegex.test(campo)) {
      valido.innerText = "valido";
    } else {
      valido.innerText = "incorrecto";


    }
}

function validarPassword(){
      var input1 = document.getElementById('passEstudiante1').value;
        var input2 = document.getElementById('passEstudiante2').value;
  var valido = document.getElementById('passValid');

    var password= /^[a-zA-ZÁáÀàÉéÈèÍíÌìÓóÒòÚúÙùÑñüÜ0-9!@#\$%\^&\*\?_~\/]{4,20}$/i;

  console.log(input1);
  console.log(input2);
        if(input1==input2&& password.test(input2)){
          valido.innerText = "valido";
        }else{
          valido.innerText = "Las contraseñas son diferentes";
        }
  }
  function dejarPasar(){
  	validoCedula=document.getElementById('cedulaok').innerHTML;
  	validoCorreo=document.getElementById('estadoCorreo').innerHTML;
         validopass=document.getElementById('passValid').innerHTML;

    console.log(validopass);
  if(validoCorreo=="valido"&&validoCedula=="valido"&&validopass=="valido"){
  					registarEstudiante();
  }else{
  }
  }
  function caracteres(){
  var input = document.getElementById('cedulaEstudiante');
  valido = document.getElementById('cedulaok');
  if(input.value.length < 9) {
  valido.innerText="tamano minimo 9 caracteres";
  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
  }else{
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
        document.getElementById('cedulaok').innerHTML="";

  }
  }
  function validarNombre(input){
    var contenido=input.value;
    console.log(contenido);
  var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(input.value.length > 0 &&emailRegex.test(contenido) ) {
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
    document.getElementById('nombreok').innerHTML="";

  } else {

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('nombreok').innerHTML="Valores invalidos";
  }

  }

  function validarPrimerA(input){
    var contenido=input.value;
    console.log(contenido);
  var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(input.value.length > 0 &&emailRegex.test(contenido) ) {
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
        document.getElementById('primerAaok').innerHTML="";


  } else {


  document.getElementById('primerAaok').innerHTML="Valores invalidos";
  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}



  }

  }
  function validarSegundoA(input){
    var contenido=input.value;
    console.log(contenido);
  var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(input.value.length > 0 &&emailRegex.test(contenido) ) {
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
        document.getElementById('segundoAok').innerHTML="";


  } else {


  document.getElementById('segundoAok').innerHTML="Valores invalidos";

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}


  }

  }
  function validarPrimerCorreo(input){
    var contenido=input.value;
    console.log(contenido);
  var  emailRegex =  /^[A-Za-z0-9\_\-\.\s\xF1\xD1]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(input.value.length>=6 &&emailRegex.test(contenido) ) {
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
        document.getElementById('passValid1').innerHTML="";


  } else {


  document.getElementById('passValid1').innerHTML="Tamaño minimo 6 y no se permiten caracteres especiales";

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}


  }

  }
  function validarSEgundoCorreo(){


    var input1 = document.getElementById('passEstudiante1').value;
      var input2 = document.getElementById('passEstudiante2').value;
    var  emailRegex =  /^[A-Za-z0-9\_\-\.\s\xF1\xD1]+$/;


  console.log("numero1:"+input1);
  console.log("numero2:"+input2);

      if(input1==input2&& emailRegex.test(input2)){
        with (document.getElementById('passEstudiante2').style) {
       borderColor="#81F79F";
       borderWidth = "3px";
       borderStyle = "solid";
      }
            document.getElementById('passValid2').innerHTML="";



      }else{
        with (document.getElementById('passEstudiante2').style) {
       borderColor="#FA5858";
       borderWidth = "3px";
       borderStyle = "solid";
      }
          document.getElementById('passValid2').innerHTML="Contraseñas diferentes";

      }



  }
  function validarCorreoDisponibilidad(input){
    console.log("entro a validar correo");
var estado="yes";


     $.post('../Business/Estudiante/usuariosAction.php',{

           accion: "disponibildadCorreo",
           correo:input

       },
               function (responseText)
               {
             asignarRespuestaCorreo(responseText);
               }


                               );

  }
  function validarCorreo(input){
    var contenido=input.value;


  var  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if (emailRegex.test(contenido)) {



validarCorreoDisponibilidad(contenido);
var disponibilidad;

 console.log("EL metodo retorno"+correo);
  if(correo=="false"){

    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";}
      document.getElementById('estadoCorreo').innerHTML="";
  }else{
    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('estadoCorreo').innerHTML="Correo ya utilizado en el sistema";

  }


  1



  }else{

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('estadoCorreo').innerHTML="Formato incorrecto o incompleto";
}
  }

  function validarFecha(input){
    var contenido=input.value;

 var ano= new Date();

  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if (contenido>=2010&&contenido<=ano.getFullYear()) {

    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
            document.getElementById('estadoFecha').innerHTML="";


  }else{

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('estadoFecha').innerHTML="Error formato incorrecto";
}
  }

  function validarCuarto(input){
    var contenido=input.value;



  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if (contenido>0&&contenido<=50) {

    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
            document.getElementById('estadoCuarto').innerHTML="";


  }else{

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('estadoCuarto').innerHTML="Error formato incorrecto";
  }
  }


function habilitarRegistroAsistente(){
   console.log("entro al habilitar");
var gender="";
    var cedula=document.getElementById('cedulaEstudiante').style;
    var nombre=document.getElementById('nombreEstudiante').style;
    var pApellido=document.getElementById('primerAEstudiante').style;
    var sApellido=document.getElementById('segundoAEstudiante').style;
    if(document.getElementsByName("gender1")[0].checked){

    gender=document.getElementsByName("gender1")[0].value;
    }
    else if(document.getElementsByName("gender1")[1].checked){

      gender=document.getElementsByName("gender1")[1].value;
    }else if( document.getElementsByName("gender1")[2].checked){
          gender=document.getElementsByName("gender1")[2].value;
    }
    var contrasenia=document.getElementById('passEstudiante2').style;
    var correo=document.getElementById('correoEstudiante').style;

    var correcto="rgb(129, 247, 159)";
   console.log("el valor:"+correcto);
   console.log("Cedula:"+cedula.borderColor);
    console.log("Nombre:"+nombre.borderColor);
    console.log("PA:"+pApellido.borderColor);
    console.log("Segundo:"+sApellido.borderColor);
    console.log("Contra:"+contrasenia.borderColor);
    console.log("correo:"+correo.borderColor);

    if(cedula.borderColor==correcto&&nombre.borderColor==correcto&&pApellido.borderColor
  ==correcto&&sApellido.borderColor==correcto&&contrasenia.borderColor==correcto&&correo.borderColor==correcto){
console.log("se habilita el boton");

document.getElementById('registrarAsistenteAdmi').disabled=false;
console.log(  document.getElementById('registrarAsistenteAdmi'));
}else{
  console.log(" no se habilita el boton");
  document.getElementById('registrarAsistenteAdmi').disabled=true;
  console.log(  document.getElementById('registrarAsistenteAdmi'));
}


}

function habilitarRegistroEstudiante(){
   console.log("entro al habilitar");
var gender="";
    var cedula=document.getElementById('cedulaEstudiante').style;
    var nombre=document.getElementById('nombreEstudiante').style;
    var pApellido=document.getElementById('primerAEstudiante').style;
    var sApellido=document.getElementById('segundoAEstudiante').style;
    var fecha=document.getElementById('fechaIngreso').style;
    var cuarto=document.getElementById('numeroCuartoEstudiante').style;
    if(document.getElementsByName("gender1")[0].checked){

    gender=document.getElementsByName("gender1")[0].value;
    }
    else if(document.getElementsByName("gender1")[1].checked){

      gender=document.getElementsByName("gender1")[1].value;
    }else if( document.getElementsByName("gender1")[2].checked){
          gender=document.getElementsByName("gender1")[2].value;
    }
    var contrasenia=document.getElementById('passEstudiante2').style;
    var correo=document.getElementById('correoEstudiante').style;

    var correcto="rgb(129, 247, 159)";
   console.log("el valor:"+correcto);
   console.log("Cedula:"+cedula.borderColor);
    console.log("Nombre:"+nombre.borderColor);
    console.log("PA:"+pApellido.borderColor);
    console.log("Segundo:"+sApellido.borderColor);
    console.log("Contra:"+contrasenia.borderColor);
    console.log("correo:"+correo.borderColor);

    if(cedula.borderColor==correcto&&nombre.borderColor==correcto&&pApellido.borderColor
  ==correcto&&sApellido.borderColor==correcto&&contrasenia.borderColor==correcto&&correo.borderColor==correcto&&cuarto.borderColor==correcto&&fecha.borderColor==correcto){
console.log("se habilita el boton");

document.getElementById('registrarEstudianteAdmi').disabled=false;
console.log(  document.getElementById('registrarEstudianteAdmi'));
}else{
  console.log(" no se habilita el boton");
  document.getElementById('registrarEstudianteAdmi').disabled=true;
  console.log(  document.getElementById('registrarEstudianteAdmi'));
}


}

function validarNombrePerfil(input){
  var contenido=input.value;
  console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if(input.value.length > 0 &&emailRegex.test(contenido) ) {
  with (input.style) {
 borderColor="#81F79F";
 borderWidth = "3px";
 borderStyle = "solid";
}
  document.getElementById('nombreokPerfil').innerHTML="";

} else {

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
document.getElementById('nombreokPerfil').innerHTML="Valores invalidos";
}


}
function validarPrimerAPerfil(input){
  var contenido=input.value;
  console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if(input.value.length > 0 &&emailRegex.test(contenido) ) {
  with (input.style) {
 borderColor="#81F79F";
 borderWidth = "3px";
 borderStyle = "solid";
}
  document.getElementById('primerAokPerfil').innerHTML="";

} else {

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
document.getElementById('primerAokPerfil').innerHTML="Valores invalidos";
}


}


function validarSegundoAPerfil(input){
  var contenido=input.value;
  console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if(input.value.length > 0 &&emailRegex.test(contenido) ) {
  with (input.style) {
 borderColor="#81F79F";
 borderWidth = "3px";
 borderStyle = "solid";
}
  document.getElementById('segundoAokPerfil').innerHTML="";

} else {

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
document.getElementById('segundoAokPerfil').innerHTML="Valores invalidos";
}


}
function habilitarActualizacionPerfilAsistente(){
   console.log("entro al habilitar");

    var nombre=document.getElementById('editarNombre').style;
    var pApellido=document.getElementById('editarPrimerA').style;
    var sApellido=document.getElementById('editarSegundoA').style;


    var correcto="rgb(129, 247, 159)";


    if(nombre.borderColor==correcto&&pApellido.borderColor
  ==correcto&&sApellido.borderColor==correcto){


document.getElementById('actualiPerfilAsis').disabled=false;
console.log(  document.getElementById('actualiPerfilAsis'));
}else{
  console.log(" no se habilita el boton");
  document.getElementById('actualiPerfilAsis').disabled=true;
  console.log(  document.getElementById('actualiPerfilAsis'));
}


}

function habilitarActualizacionAdministrador(){
   console.log("entro al habilitar");

    var nombre=document.getElementById('editarNombre').style;
    var pApellido=document.getElementById('editarPrimerA').style;
    var sApellido=document.getElementById('editarSegundoA').style;


    var correcto="rgb(129, 247, 159)";


    if(nombre.borderColor==correcto&&pApellido.borderColor
  ==correcto&&sApellido.borderColor==correcto){


document.getElementById('actualizarAdministrador').disabled=false;
console.log(  document.getElementById('actualizarAdministrador'));
}else{
  console.log(" no se habilita el boton");
  document.getElementById('actualizarAdministrador').disabled=true;
  console.log(  document.getElementById('actualizarAdministrador'));
}


}
function habilitarActualizacionEstudiante(){
   console.log("entro al habilitar");


    var nombre=document.getElementById('editarNombre').style;
    var pApellido=document.getElementById('editarPrimerA').style;
    var sApellido=document.getElementById('editarSegundoA').style;
    var fecha=document.getElementById('editarAno').style;
    var cuarto=document.getElementById('editarCabina').style;


    var correcto="rgb(129, 247, 159)";


    if(nombre.borderColor==correcto&&pApellido.borderColor
  ==correcto&&sApellido.borderColor==correcto&&cuarto.borderColor==correcto&&fecha.borderColor==correcto){


document.getElementById('actualizarEstudiante').disabled=false;
console.log(  document.getElementById('actualizarEstudiante'));
}else{
  console.log(" no se habilita el boton");
  document.getElementById('actualizarEstudiante').disabled=true;
  console.log(  document.getElementById('actualizarEstudiante'));
}


}

function habilitarActualizacionEstudianteAdmi(){
   console.log("entro al habilitar");


    var nombre=document.getElementById('editarNombre').style;
    var pApellido=document.getElementById('editarPrimerA').style;
    var sApellido=document.getElementById('editarSegundoA').style;
    var fecha=document.getElementById('editarAno').style;
    var cuarto=document.getElementById('editarCabina').style;


    var correcto="rgb(129, 247, 159)";


    if(nombre.borderColor==correcto&&pApellido.borderColor
  ==correcto&&sApellido.borderColor==correcto&&cuarto.borderColor==correcto&&fecha.borderColor==correcto){


document.getElementById('actualizarEstudianteAdmi').disabled=false;
console.log(  document.getElementById('actualizarEstudianteAdmi'));
}else{
  console.log(" no se habilita el boton");
  document.getElementById('actualizarEstudianteAdmi').disabled=true;
  console.log(  document.getElementById('actualizarEstudianteAdmi'));
}


}
function validarNombrePerfil(input){
  var contenido=input.value;
  console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if(input.value.length > 0 &&emailRegex.test(contenido) ) {
  with (input.style) {
 borderColor="#81F79F";
 borderWidth = "3px";
 borderStyle = "solid";
}
  document.getElementById('nombreokPerfil').innerHTML="";

} else {

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
document.getElementById('nombreokPerfil').innerHTML="Valores invalidos";
}


}

function validarNombreActualizar(input){
  var contenido=input.value;
  console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if(input.value.length > 0 &&emailRegex.test(contenido) ) {
  with (input.style) {
 borderColor="#81F79F";
 borderWidth = "3px";
 borderStyle = "solid";
}
  document.getElementById('nombreok').innerHTML="";

} else {

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
document.getElementById('nombreok').innerHTML="Valores invalidos";
}


}

function validarPrimerActualizar(input){
  var contenido=input.value;
  console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if(input.value.length > 0 &&emailRegex.test(contenido) ) {
  with (input.style) {
 borderColor="#81F79F";
 borderWidth = "3px";
 borderStyle = "solid";
}
  document.getElementById('primerAok').innerHTML="";

} else {

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
document.getElementById('primerAok').innerHTML="Valores invalidos";
}


}

function validarSegundoActualizar(input){
  var contenido=input.value;
  console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if(input.value.length > 0 &&emailRegex.test(contenido) ) {
  with (input.style) {
 borderColor="#81F79F";
 borderWidth = "3px";
 borderStyle = "solid";
}
  document.getElementById('segundoAok').innerHTML="";

} else {

  with (input.style) {
 borderColor="#FA5858";
 borderWidth = "3px";
 borderStyle = "solid";
}
document.getElementById('segundoAok').innerHTML="Valores invalidos";
}


}


function habilitarActualizacionAsistente(){
   console.log("entro al habilitar");


    var nombre=document.getElementById('editarNombre').style;
    var pApellido=document.getElementById('editarPrimerA').style;
    var sApellido=document.getElementById('editarSegundoA').style;




    var correcto="rgb(129, 247, 159)";


    if(nombre.borderColor==correcto&&pApellido.borderColor
  ==correcto&&sApellido.borderColor==correcto){


document.getElementById('registrarEstudiante2').disabled=false;
console.log(  document.getElementById('registrarEstudiante2'));
}else{
  console.log(" no se habilita el boton");
  document.getElementById('registrarEstudiante2').disabled=true;
  console.log(  document.getElementById('registrarEstudiante2'));
}


}

function permitirLogeo(){
  var email=document.getElementById('user').style;
  var pass=document.getElementById('pass').style;
    var correcto="rgb(129, 247, 159)";


    console.log(  document.getElementById('loGin').disabled);
      if(email.borderColor==correcto&&pass.borderColor==correcto){
        document.getElementById('loGin').disabled=false;
      }else {
            document.getElementById('loGin').disabled;
      }

}
