/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 function registarEstudianteAdmin(){


     $(document).ready(function () {
       var resultado="";
            if(document.getElementsByName("gender1")[0].checked){

              resultado=document.getElementsByName("gender1")[0].value;
            }
            else if(document.getElementsByName("gender1")[1].checked){

              resultado=document.getElementsByName("gender1")[1].value;
            }else if( document.getElementsByName("gender1")[2].checked){
                  resultado=document.getElementsByName("gender1")[2].value;
            }
console.log(resultado);

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "registrarEstudiante",
            cedula:document.getElementById("cedulaEstudiante").value,
            nombre:document.getElementById("nombreEstudiante").value,
            primerA:document.getElementById("primerAEstudiante").value,
            segundoA:document.getElementById("segundoAEstudiante").value,
            cabina:document.getElementById("numeroCuartoEstudiante").value,
            carrera:document.getElementById("carreraEstudiante").value,
            correo:document.getElementById("correoEstudiante").value,
            password: document.getElementById("passEstudiante2").value,
            sexo:resultado,
            fechaIngreso:document.getElementById("fechaIngreso").value

        },
                function (responseText)
                {

   var cerr=document.getElementById("cerrarRegistro");
   cerr.click();
                verEstudiante();
                if(responseText!=null){
                  accionExitosa('REGISTRO ESTUDIANTE');
                }else{
                 accionNoExitosa('REGISTRO ESTUDIANTE');

                }}

);

});
};


 function verEstudiante(){

      $(document).ready(function () {
        $('#contenidoResidentes2').html("");
         $.post('../Business/Estudiante/usuariosAction.php', {
             accion: "verEstudiante",


         },
                 function (responseText)
                 {


                   if(responseText==0){

                   }else{
                $('#contenidoResidentes').html(responseText);
                $('#contenidoResidentes2').html(responseText);
                   }
                   $("#mytable").paginationTdA({
                     elemPerPage: 8
                   });

                         }
                                 );
                             });
 }


  function verAsistente(){

       $(document).ready(function () {
           $('#contenidoAsistentes2').html("");
          $.post('../Business/Estudiante/usuariosAction.php', {
              accion: "verAsistente",

          },
                  function (responseText)
                  {
                    if(responseText==0){



                    }else{
                  $('#contenidoAsistenetes').html(responseText);
                  $('#contenidoAsistentes2').html(responseText);

                    }
                    $("#mytable").paginationTdA({
                      elemPerPage: 8
                    });
                          }
                                  );
                              });
  }


function registarEstudiante(){

     $(document).ready(function () {

        $.post('Business/Estudiante/usuariosAction.php', {
            accion: "registrarEstudiante",
            cedula:document.getElementById("cedulaEstudiante").value,
            nombre:document.getElementById("nombreEstudiante").value,
            primerA:document.getElementById("primerAEstudiante").value,
            segundoA:document.getElementById("segundoAEstudiante").value,
            cabina:document.getElementById("numeroCuartoEstudiante").value,
            carrera:document.getElementById("carreraEstudiante").value,
            correo:document.getElementById("correoEstudiante").value,
            password: document.getElementById("passEstudiante2").value,
            sexo: document.getElementById("sexo").value,
            fechaIngreso:document.getElementById("fechaIngreso").value

        },
                function (responseText) {

                    var url = "index.php";
                    var url2="index.php";
                    if(responseText!=null){
                      accionExitosa('REGISTRO ');
                    }else{
                     accionNoExitosa('REGISTRO ESTUDIANTE');

                    }
                        }
                                );
                            });
}

function actualizarAdministrador(){

console.log("entro al metodo");
     $(document).ready(function () {

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "actualizarAdministrador",
            cedulaN:document.getElementById("editarCedula").value,
            nombre:document.getElementById("editarNombre").value,
            primerA:document.getElementById("editarPrimerA").value,
            segundoA:document.getElementById("editarSegundoA").value,

        },
                function (responseText)
                {
                  console.log(responseText);
                  var cerr=document.getElementById("cerrarActualizar").click();


                if(responseText!="false"){
                  accionExitosa('ACTUALIZO ADMINISTRADOR');
                  cargarPerfil(document.getElementById("editarCedula").value,"administrador");
                }else{
                 accionNoExitosa('ACTUALIZO ADMINISTRADOR');

                }


                                            }



);

});
}
function actualizarEstudianteAdmin(){

console.log("entro al metodo");
     $(document).ready(function () {
 var resultado="";
      if(document.getElementsByName("gender")[0].checked){

        resultado=document.getElementsByName("gender")[0].value;
      }
      else if(document.getElementsByName("gender")[1].checked){

        resultado=document.getElementsByName("gender")[1].value;
      }else if( document.getElementsByName("gender")[2].checked){
            resultado=document.getElementsByName("gender")[2].value;
      }

      var resultado2="";
           if(document.getElementsByName("access")[0].checked){

             resultado2=document.getElementsByName("access")[0].value;
           }
           else if(document.getElementsByName("access")[1].checked){

             resultado2=document.getElementsByName("access")[1].value;
           }

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "actualizarEstudianteAdministrador",
            cedula:document.getElementById("editarCedula").value,
            nombre:document.getElementById("editarNombre").value,
            primerA:document.getElementById("editarPrimerA").value,
            segundoA:document.getElementById("editarSegundoA").value,
            cabina:document.getElementById("editarCabina").value,
            carrera:document.getElementById("editarCarrera").value,
            sexo: resultado,
            fechaIngreso:document.getElementById("editarAno").value,
            acceso:resultado2
        },
                function (responseText)
                {
                  console.log(responseText);
                  var cerr=document.getElementById("cerrarActualizar").click();

                verEstudiante();
                if(responseText!=null){
                  accionExitosa('ACTUALIZO ESTUDIANTE');
                }else{
                 accionNoExitosa('ACTUALIZO ESTUDIANTE');

                }


                                            }



);

});
}
function actualizarEstudiantePerfil(){

console.log("entro al metodo");
     $(document).ready(function () {
 var resultado="";
      if(document.getElementsByName("gender")[0].checked){

        resultado=document.getElementsByName("gender")[0].value;
      }
      else if(document.getElementsByName("gender")[1].checked){

        resultado=document.getElementsByName("gender")[1].value;
      }else if( document.getElementsByName("gender")[2].checked){
            resultado=document.getElementsByName("gender")[2].value;
      }

      var resultado2="1";


        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "actualizarEstudianteAdministrador",
            cedula:document.getElementById("editarCedula").value,
            nombre:document.getElementById("editarNombre").value,
            primerA:document.getElementById("editarPrimerA").value,
            segundoA:document.getElementById("editarSegundoA").value,
            cabina:document.getElementById("editarCabina").value,
            carrera:document.getElementById("editarCarrera").value,
            sexo: resultado,
            fechaIngreso:document.getElementById("editarAno").value,
            acceso:resultado2
        },
                function (responseText)
                {

                  console.log(responseText);
                  var cerr=document.getElementById("cerrarActualizar").click();


                if(responseText!="false"){
                  accionExitosa('ACTUALIZO SU PERFIL');
                  cargarPerfil(document.getElementById("editarCedula").value,"estudiante");
                }else{
                 accionNoExitosa('ACTUALIZO SU PERFIL');

                }


                                            }



);

});
}
function actualizarAsistenteAdmin(){

console.log("entro al metodo");
     $(document).ready(function () {
 var resultado="";
      if(document.getElementsByName("gender")[0].checked){

        resultado=document.getElementsByName("gender")[0].value;
      }
      else if(document.getElementsByName("gender")[1].checked){

        resultado=document.getElementsByName("gender")[1].value;
      }else if( document.getElementsByName("gender")[2].checked){
            resultado=document.getElementsByName("gender")[2].value;
      }





        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "actualizarAsistenteAdministrador",
            cedula:document.getElementById("editarCedula").value,
            nombre:document.getElementById("editarNombre").value,
            primerA:document.getElementById("editarPrimerA").value,
            segundoA:document.getElementById("editarSegundoA").value,

            sexo: resultado,

        },
                function (responseText)
                {
                  console.log(responseText);
document.getElementById("cerrarActualizar").click();
                verAsistente();
                if(responseText!=null){
                  accionExitosa('ACTALIZO ASISTENTE');
                }else{
                 accionNoExitosa('ACTUALIZO ASISTENTE');

                }


                                            }

);

});
}

function actualizarAsistentePerfil(){

console.log("entro al metodo");
     $(document).ready(function () {
 var resultado="";
      if(document.getElementsByName("gender")[0].checked){

        resultado=document.getElementsByName("gender")[0].value;
      }
      else if(document.getElementsByName("gender")[1].checked){

        resultado=document.getElementsByName("gender")[1].value;
      }else if( document.getElementsByName("gender")[2].checked){
            resultado=document.getElementsByName("gender")[2].value;
      }





        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "actualizarAsistenteAdministrador",
            cedula:document.getElementById("editarCedula").value,
            nombre:document.getElementById("editarNombre").value,
            primerA:document.getElementById("editarPrimerA").value,
            segundoA:document.getElementById("editarSegundoA").value,

            sexo: resultado,

        },
                function (responseText)
                {
                  console.log(responseText);
document.getElementById("cerrarActualizar").click();

                if(responseText!=null){
                  accionExitosa('ACTALIZO SU PERFIL');
                  cargarPerfil(document.getElementById("editarCedula").value,"asistente")
                }else{
                 accionNoExitosa('ACTUALIZO SU PERFIL');

                }


                                            }

);

});
}



function registarAsistenteAdmin(){


  var resultado="";
       if(document.getElementsByName("gender1")[0].checked){

         resultado=document.getElementsByName("gender1")[0].value;
       }
       else if(document.getElementsByName("gender1")[1].checked){

         resultado=document.getElementsByName("gender1")[1].value;
       }else if( document.getElementsByName("gender1")[2].checked){
             resultado=document.getElementsByName("gender1")[2].value;
       }


     $(document).ready(function () {

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "registrarAsistente",
            cedula:document.getElementById("cedulaEstudiante").value,
            nombre:document.getElementById("nombreEstudiante").value,
            primerA:document.getElementById("primerAEstudiante").value,
            segundoA:document.getElementById("segundoAEstudiante").value,
            correo:document.getElementById("correoEstudiante").value,
            password: document.getElementById("passEstudiante2").value,
            sexo: resultado

        },
                function (responseText)
                {



  document.getElementById("cerrarRegistro").click();
                    verAsistente();
                    document.getElementById('registrarAsistenteAdmi').disabled="true";
                    if(responseText!=null){
                      accionExitosa('AGREGO ASISTENTE');
                    }else{
                     accionNoExitosa('AGREGO ASISTENTE');

                    }
                        }
                                );
                            });
}

function eliminarEstudiante(){

ced=document.getElementById("cedulaEliminacion").innerHTML;

     $(document).ready(function () {

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "eliminarEstudiante",
            cedula: ced

        },
                function (responseText)
                {
  document.getElementById("cerrarEliminar").click();
                  verEstudiante();
                  if(responseText!=null){
                    accionExitosa('ELIMINO RESIDENTE');
                  }else{
                   accionNoExitosa('ELIMINO RESIDENTE');

                  }
                        }
                                );
                            });
}



function eliminarAsistente(){

ced=document.getElementById("cedulaEliminacion").innerHTML;
     $(document).ready(function () {

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "eliminarAsistente",
            cedula: ced

        },
                function (responseText)
                {
                    document.getElementById("cerrarEliminar").click();
                      verAsistente();
                      if(responseText!=null){
                        accionExitosa('ELIMINO ASISTENTE');
                      }else{
                       accionNoExitosa('ELIMINO ASISTENTE');

                      }
                        }
                                );
                            });
}

function editarEstudiante(input){
console.log(input);
var cedula=document.getElementById("cedulaEstudiante"+input).innerHTML;
var nombre=document.getElementById("nombreEstudiante"+input).innerHTML;
var primerA=document.getElementById("primerApellidoEstudiante"+input).innerHTML;
var segundoA=document.getElementById("segundoApellidoEstudiante"+input).innerHTML;
var sexo=document.getElementById("sexoEstudiante"+input).innerHTML;
var cabina=document.getElementById("cabinaEstudiante"+input).innerHTML;
var anoI=document.getElementById("anoIngreso"+input).innerHTML;
var carrera=document.getElementById("carreraEstudiante"+input).innerHTML;
var acceso=document.getElementById("estadoCuenta"+input).innerHTML;

document.getElementById("editarCedula").value=cedula;
with (document.getElementById("editarCedula").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}

document.getElementById("editarNombre").value=nombre;
with (document.getElementById("editarNombre").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}

document.getElementById("editarPrimerA").value=primerA;
with (document.getElementById("editarPrimerA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
document.getElementById("editarSegundoA").value=segundoA;
with (document.getElementById("editarSegundoA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
//document.getElementById("editarSexo").value=sexo;
document.getElementById("editarCabina").value=cabina;
with (document.getElementById("editarCabina").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}

document.getElementById("editarAno").value=anoI;
with (document.getElementById("editarAno").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}


if(sexo=="M"){

document.getElementsByName("gender")[0].checked=true;

}
else if(sexo=="F"){

document.getElementsByName("gender")[1].checked=true;

}else if(sexo=="O"){
  document.getElementsByName("gender")[2].checked=true;
}

document.getElementById("editarAno").value=anoI;


if(acceso=="SI"){
  document.getElementsByName("access")[0].checked=true;
}else{
  document.getElementsByName("access")[1].checked=true;
}

if(carrera=="Administracion de empresas"){
document.getElementById("editarCarrera").selectedIndex=0;

}
if(carrera=="Administracion de oficinas"){
document.getElementById("editarCarrera").selectedIndex=1;
}
if(carrera=="Educacion rural"){
document.getElementById("editarCarrera").selectedIndex=2;
}
if(carrera=="Recreacion turistica"){
document.getElementById("editarCarrera").selectedIndex=4;
}
if(carrera=="Ingenieria en sistemas"){
document.getElementById("editarCarrera").selectedIndex=3;
}


}
function editarEstudiantePerfil(input){
console.log(input);
var cedula=document.getElementById("cedulaEstudiante"+input).value;

var nombre=document.getElementById("nombreEstudiante"+input).value;
with (document.getElementById("nombreEstudiante"+input).style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
var primerA=document.getElementById("primerApellidoEstudiante"+input).value;
with (document.getElementById("primerApellidoEstudiante"+input).style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
var segundoA=document.getElementById("segundoApellidoEstudiante"+input).value;
with (document.getElementById("segundoApellidoEstudiante"+input).style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
var sexo=document.getElementById("sexoEstudiante"+input).value;
with (document.getElementById("sexoEstudiante"+input).style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}


var cabina=document.getElementById("cabinaEstudiante"+input).value;
with (document.getElementById("cabinaEstudiante"+input).style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
var anoI=document.getElementById("anoIngreso"+input).value;
with (document.getElementById("anoIngreso"+input).style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
var carrera=document.getElementById("carreraEstudiante"+input).value;


document.getElementById("editarCedula").value=cedula;
document.getElementById("editarNombre").value=nombre;
with (document.getElementById("editarNombre").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}

document.getElementById("editarPrimerA").value=primerA;

with (document.getElementById("editarPrimerA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}


document.getElementById("editarSegundoA").value=segundoA;
with (document.getElementById("editarSegundoA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}

//document.getElementById("editarSexo").value=sexo;
document.getElementById("editarCabina").value=cabina;
with (document.getElementById("editarCabina").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
document.getElementById("editarAno").value=anoI;

with (document.getElementById("editarAno").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}





if(sexo=="M"){

document.getElementsByName("gender")[0].checked=true;

}
else if(sexo=="F"){

document.getElementsByName("gender")[1].checked=true;

}else if(sexo=="O"){
  document.getElementsByName("gender")[2].checked=true;
}

document.getElementById("editarAno").value=anoI;




if(carrera=="Administracion de empresas"){
document.getElementById("editarCarrera").selectedIndex=0;

}
if(carrera=="Administracion de oficinas"){
document.getElementById("editarCarrera").selectedIndex=1;
}
if(carrera=="Educacion rural"){
document.getElementById("editarCarrera").selectedIndex=2;
}
if(carrera=="Recreacion turistica"){
document.getElementById("editarCarrera").selectedIndex=4;
}
if(carrera=="Ingenieria en sistemas"){
document.getElementById("editarCarrera").selectedIndex=3;
}


}

function editarAsistente(input){

var cedula=document.getElementById("cedulaAsistente"+input).innerHTML;
var nombre=document.getElementById("nombreAsistente"+input).innerHTML;
var primerA=document.getElementById("primerApellidoAsistente"+input).innerHTML;
var segundoA=document.getElementById("segundoApellidoAsistente"+input).innerHTML;
var sexo=document.getElementById("sexoAsistente"+input).innerHTML;


document.getElementById("editarCedula").value=cedula;
document.getElementById("editarNombre").value=nombre;
with (document.getElementById("editarNombre").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
document.getElementById("editarPrimerA").value=primerA;
with (document.getElementById("editarPrimerA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
document.getElementById("editarSegundoA").value=segundoA;
with (document.getElementById("editarSegundoA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
if(sexo=="M"){

document.getElementsByName("gender")[0].checked=true;

}
else if(sexo=="F"){

document.getElementsByName("gender")[1].checked=true;

}else if(sexo=="O"){
  document.getElementsByName("gender")[2].checked=true;
}

}

function editarAdministrador(){

var cedula=document.getElementById("cedulaPerfil").value;
var nombre=document.getElementById("nombrePerfil").value;
var primerA=document.getElementById("primerAperfil").value;
var segundoA=document.getElementById("segundoAperfil").value;




document.getElementById("editarCedula").value=cedula;



document.getElementById("editarNombre").value=nombre;
with (document.getElementById("editarNombre").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
document.getElementById("editarPrimerA").value=primerA;
with (document.getElementById("editarPrimerA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
document.getElementById("editarSegundoA").value=segundoA;
with (document.getElementById("editarSegundoA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}



}
function editarAsistentePerfil(input){

var cedula=document.getElementById("cedulaAsistente"+input).value;
var nombre=document.getElementById("nombreAsistente"+input).value;
var primerA=document.getElementById("primerApellidoAsistente"+input).value;
var segundoA=document.getElementById("segundoApellidoAsistente"+input).value;
var sexo=document.getElementById("sexoAsistente"+input).value;


document.getElementById("editarCedula").value=cedula;
document.getElementById("editarNombre").value=nombre;
with (document.getElementById("editarNombre").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}
document.getElementById("editarPrimerA").value=primerA;
with (document.getElementById("editarPrimerA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}


document.getElementById("editarSegundoA").value=segundoA;
with (document.getElementById("editarSegundoA").style) {
borderColor="#81F79F";
borderWidth = "3px";
borderStyle = "solid";
}

if(sexo=="M"){

document.getElementsByName("gender")[0].checked=true;

}
else if(sexo=="F"){

document.getElementsByName("gender")[1].checked=true;

}else if(sexo=="O"){
  document.getElementsByName("gender")[2].checked=true;
}

}

function editarAdministrador(){

var cedula=document.getElementById("cedulaPerfil").value;
var nombre=document.getElementById("nombrePerfil").value;
var primerA=document.getElementById("primerAperfil").value;
var segundoA=document.getElementById("segundoAperfil").value;



document.getElementById("editarCedula").value=cedula;
document.getElementById("editarNombre").value=nombre;
document.getElementById("editarPrimerA").value=primerA;
document.getElementById("editarSegundoA").value=segundoA;



}

function cargarEliminarResidente(input){


var cedula=document.getElementById("cedulaEstudiante"+input).innerHTML;

document.getElementById("cedulaEliminacion").innerHTML=cedula;


}
function cargarEliminarAsistente(input){


var cedula=document.getElementById("cedulaAsistente"+input).innerHTML;

document.getElementById("cedulaEliminacion").innerHTML=cedula;


}

function verProvinciaAsistente(valor){
console.log(valor);
     $(document).ready(function () {
        $('#contenidoAsistentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verProvinciaAsistente",
            provinvia:valor
        },
                function (responseText)
                {

                  if(responseText==""){
  $('#contenidoAsistenetes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoAsistenetes').html(responseText);
                $('#contenidoAsistentes2').html(responseText);


                  }
                        }
                                );
                            });
}

function verProvinciaEstudiante(valor){
console.log(valor);
     $(document).ready(function () {
      $('#contenidoResidentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verProvinciaEstudiante",
            provinvia:valor
        },
                function (responseText)
                {

                  if(responseText==""){
  $('#contenidoResidentes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoResidentes').html(responseText);
                $('#contenidoResidentes2').html(responseText);
                  }
                        }
                                );
                            });
}

function verSexoEstudiante(valor){
console.log(valor);

     $(document).ready(function () {
      $('#contenidoResidentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verSexoEstudiante",
            sexo:valor
        },
                function (responseText)
                {

                  if(responseText==""){
  $('#contenidoResidentes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoResidentes').html(responseText);
                $('#contenidoResidentes2').html(responseText);
                  }
                        }
                                );
                            });
}
function verSexoAsistente(valor){
console.log(valor);
     $(document).ready(function () {
$('#contenidoAsistentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verSexoAsistente",
            sexo:valor
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoAsistenetes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoAsistenetes').html(responseText);
                $('#contenidoAsistentes2').html(responseText);
                  }
                        }
                                );
                            });
}
function verBusquedaAsistente(valor){
console.log(valor.value);
     $(document).ready(function () {

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verbusquedaAsistente",
            buscar:valor.value
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoAsistenetes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoAsistenetes').html(responseText);
                  }
                        }
                                );
                            });
}
function verBusquedaEstudiante(valor){
console.log(valor.value);
     $(document).ready(function () {

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verbusquedaEstudiante",
            buscar:valor.value
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoResidentes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoResidentes').html(responseText);
                  }
                        }
                                );
                            });
}
function verOrdenarNombreAsistente(valor){
console.log(valor);
     $(document).ready(function () {
        $('#contenidoAsistentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verOrdenarNombreAsistente",
            buscar:valor
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoAsistenetes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoAsistenetes').html(responseText);
                $('#contenidoAsistentes2').html(responseText);
                  }
                        }
                                );
                            });
}
function verOrdenarNombreEstudiante(valor){
console.log(valor);
     $(document).ready(function () {
      $('#contenidoResidentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verOrdenarNombreEstudiante",
            buscar:valor
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoResidentes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoResidentes').html(responseText);
                $('#contenidoResidentes2').html(responseText);
                  }
                        }
                                );
                            });
}
function verOrdenarApellidoAsistente(valor){
console.log(valor);
     $(document).ready(function () {
        $('#contenidoAsistentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verOrdenarApellidoAsistente",
            buscar:valor
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoAsistenetes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoAsistenetes').html(responseText);
                $('#contenidoAsistentes2').html(responseText);
                  }
                        }
                                );
                            });
}
function verOrdenarApellidoEstudiante(valor){
console.log(valor);
     $(document).ready(function () {
        $('#contenidoResidentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verOrdenarApellidoEstudiante",
            buscar:valor
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoResidentes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoResidentes').html(responseText);
                $('#contenidoResidentes2').html(responseText);
                  }
                        }
                                );
                            });
}
function verOrdenarCarreraEstudiante(valor){
console.log(valor);
     $(document).ready(function () {
        $('#contenidoResidentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verOrdenarCarreraEstudiante",
            buscar:valor
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoResidentes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoResidentes').html(responseText);
                $('#contenidoResidentes2').html(responseText);
                  }
                        }
                                );
                            });
}
function verOrdenarAcesoEstudiante(valor){
console.log(valor);
     $(document).ready(function () {
        $('#contenidoResidentes2').html("");
        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verOrdenarAcesoEstudiante",
            buscar:valor
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoResidentes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoResidentes').html(responseText);
                $('#contenidoResidentes2').html(responseText);
                  }
                        }
                                );
                            });
}
function verOrdenarAnioEstudiante(valor){

     $(document).ready(function () {

        $.post('../Business/Estudiante/usuariosAction.php', {
            accion: "verOrdenarAnioEstudiante",
            buscar:valor.value
        },
                function (responseText)
                {
console.log(responseText);
                  if(responseText==""){
  $('#contenidoResidentes').html("<h1>NO SE ENCONTRARON RESULTADOS</h1>");


                  }else{

                $('#contenidoResidentes').html(responseText);
                  }
                        }
                                );
                            });
}

function cargarPerfil(cedula,rol){
  $(document).ready(function () {

;     $.post('../Business/Estudiante/usuariosAction.php', {
         accion: "cargarPerfil",
         valor:cedula,
         tipo:rol
     },
             function (responseText)
             {

               if(responseText==""){
 $('#contenidoPerfil').html("ERROR");


               }else{
                 console.log(responseText);

             $('#contenidoPerfil').html(responseText);
               }
                     }
                             );
                         });
}
