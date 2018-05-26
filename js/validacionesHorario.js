  function validarCurso(input){
    var contenido=input.value;
  var  emailRegex =  /^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\_\-\.\s\xF1\xD1]+$/;
  var espacios= /^[+|\s]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(!espacios.test(contenido) && emailRegex.test(contenido) ) {

    //mala
  with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }

  //document.getElementById('cursook').innerHTML="Valores invalidos";
    document.getElementById('cursook').innerHTML="";

  } else {

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }

 document.getElementById('cursook').innerHTML="Valores invalidos";
 //document.getElementById('cursook').innerHTML="";
  }

  }

  function validarProfesor(input){
    var contenido=input.value;
  var  emailRegex =  /^[A-Za-zÁÉÍÓÚáéíóúñÑ\_\-\.\s\xF1\xD1]+$/;
     var espacios= /^[+|\s]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(!espacios.test(contenido)  && emailRegex.test(contenido) ) {
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
    document.getElementById('profesorok').innerHTML="";

  } else {

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('profesorok').innerHTML="Valores invalidos";
  }

  }

  function habilitarRegistroHorario(){

    var curso=document.getElementById('curso').style;
    var profesor=document.getElementById('profesor').style;
    
    var correcto="rgb(129, 247, 159)";

    if(curso.borderColor==correcto&&profesor.borderColor==correcto){


document.getElementById('registrar').disabled=false;
}else{

  document.getElementById('registrar').disabled=true;

}


}

/////////////////////////////////////////////////////////////VALIDAR FORMULARIO DE MODIFICAR ///////////////////////////////////////////////////////////////////////
function validarCurso2(input){
    var contenido=input.value;
    var  emailRegex =  /^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\_\-\.\s\\xF1\xD1]+$/;
      var espacios= /^[+|\s]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(!espacios.test(contenido) && emailRegex.test(contenido) ) {
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
    document.getElementById('curso2ok').innerHTML="";

  } else {

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('curso2ok').innerHTML="Valores invalidos";
  }

  }

  function validarProfesor2(input){
    var contenido=input.value;
    var  emailRegex =  /^[A-Za-zÁÉÍÓÚáéíóúñÑ\_\-\.\s\xF1\xD1]+$/;
     var espacios= /^[+|\s]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(!espacios.test(contenido) && emailRegex.test(contenido) ) {
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
    document.getElementById('profesor2ok').innerHTML="";

  } else {

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('profesor2ok').innerHTML="Valores invalidos";
  }

  }

  function habilitarModificarHorario(){

    var curso=document.getElementById('curso2').style;
    var profesor=document.getElementById('profesor2').style;
    
    var correcto="rgb(129, 247, 159)";

    if(curso.borderColor==correcto&&profesor.borderColor==correcto){

document.getElementById('modificar').disabled=false;

}else{

  document.getElementById('modificar').disabled=true;

}


}


function validarDescripcion(input){
    var contenido=input.value;
    var  emailRegex =  /^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\_\-\.\s\\xF1\xD1]/;
      var espacios= /^[+|\s]+$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(!espacios.test(contenido) && emailRegex.test(contenido)) {
    with (input.style) {
   borderColor="#81F79F";
   borderWidth = "3px";
   borderStyle = "solid";
  }
    document.getElementById('descripcionok').innerHTML="";

  } else {

    with (input.style) {
   borderColor="#FA5858";
   borderWidth = "3px";
   borderStyle = "solid";
  }
  document.getElementById('descripcionok').innerHTML="Valores invalidos";
  }

  }

  function habilitarReportarArticulo(){

    var descripcion=document.getElementById('descripcion').style;

    
    var correcto="rgb(129, 247, 159)";

    if(descripcion.borderColor==correcto){


document.getElementById('registrarArticulo').disabled=false;

}else{

  document.getElementById('registrarArticulo').disabled=true;

}


}