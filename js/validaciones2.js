
function validarCorreo2(input){
  var contenido=input.value;
  console.log(contenido);

var  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if (emailRegex.test(contenido)) {
  input.style.background = "#04B45F";
      document.getElementById('estadoCorreo').src="../images/check.png";
        document.getElementById('estadoCorreo').with="15";
          document.getElementById('estadoCorreo').height="15";
          document.getElementById('leyendaCorreo').innerHTML="CORRECTO";
            document.getElementById('leyendaCorreo').style.color="#000000";

}else{
  input.style.background = "#F78181";
  document.getElementById('estadoCorreo').src="../images/error.png";
document.getElementById('estadoCorreo').with="15";
document.getElementById('estadoCorreo').height="15";
document.getElementById('leyendaCorreo').innerHTML="Formato incorrecto";
document.getElementById('leyendaCorreo').style.color="#000000";}
}


function validarCedula2(input){
  var contenido=input.value;
  console.log(contenido);

//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if (contenido.length>=9) {
  input.style.background = "#04B45F";
  document.getElementById('estadoCedula').src="../images/check.png";
    document.getElementById('estadoCedula').with="15";
      document.getElementById('estadoCedula').height="15";
      document.getElementById('leyendaCedula').innerHTML="CORRECTO";
        document.getElementById('leyendaCedula').style.color="#000000";

} else {
  input.style.background = "#F78181";
  document.getElementById('estadoCedula').src="../images/error.png";
document.getElementById('estadoCedula').with="15";
document.getElementById('estadoCedula').height="15";
document.getElementById('leyendaCedula').innerHTML="Formato incorrecto";
document.getElementById('leyendaCedula').style.color="#000000";

}

}

function validarCedula22(input){
  var contenido=input.value;
  console.log(contenido);

//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if (contenido.length>=9) {
  input.style.background = "#04B45F";
  document.getElementById('estadoCedula2').src="../images/check.png";
    document.getElementById('estadoCedula2').with="15";
      document.getElementById('estadoCedula2').height="15";
      document.getElementById('leyendaCedula2').innerHTML="CORRECTO";
        document.getElementById('leyendaCedula2').style.color="#000000";

} else {
  input.style.background = "#F78181";
  document.getElementById('estadoCedula2').src="../images/error.png";
document.getElementById('estadoCedula2').with="15";
document.getElementById('estadoCedula2').height="15";
document.getElementById('leyendaCedula').innerHTML="Formato incorrecto";
document.getElementById('leyendaCedula2').style.color="#000000";

}

}

function soloLetras2(input){


  var contenido=input.value;
  console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if (emailRegex.test(contenido)) {
  input.style.background = "#04B45F";
} else {
  input.style.background = "#F78181";


}

}
function validarNombre2(input){
var contenido=input.value;
console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if (emailRegex.test(contenido)&&contenido.length>0) {
input.style.background = "#04B45F";
document.getElementById('estadoNombre').src="../images/check.png";
  document.getElementById('estadoNombre').with="15";
    document.getElementById('estadoNombre').height="15";
    document.getElementById('leyendaNombre').innerHTML="CORRECTO";
      document.getElementById('leyendaNombre').style.color="#000000";


} else {
input.style.background = "#F78181";
document.getElementById('estadoNombre').src="../images/error.png";
document.getElementById('estadoNombre').with="15";
document.getElementById('estadoNombre').height="15";
document.getElementById('leyendaNombre').innerHTML="valor vacio o caracter invalidos ";
document.getElementById('leyendaNombre').style.color="#000000";}


}
function validarNombre22(input){
var contenido=input.value;
console.log(contenido);
var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
if (emailRegex.test(contenido)&&contenido.length>0) {
input.style.background = "#04B45F";
document.getElementById('estadoNombre2').src="../images/check.png";
  document.getElementById('estadoNombre2').with="15";
    document.getElementById('estadoNombre2').height="15";
    document.getElementById('leyendaNombre2').innerHTML="CORRECTO";
      document.getElementById('leyendaNombre2').style.color="#000000";


} else {
input.style.background = "#F78181";
document.getElementById('estadoNombre2').src="../images/error.png";
document.getElementById('estadoNombre2').with="15";
document.getElementById('estadoNombre2').height="15";
document.getElementById('leyendaNombre2').innerHTML="valor vacio o caracter invalidos ";
document.getElementById('leyendaNombre2').style.color="#000000";}


}
function contrasenia2(input){
var contenido=input.value;
  var  emailRegex = /^[-\w.%+]{1,64}$/;

if(contenido.length>=6&&contenido.length<=9){

  if (emailRegex.test(contenido)) {
    input.style.background = "#04B45F";
    document.getElementById('estadoContra').src="../images/check.png";
      document.getElementById('estadoContra').with="15";
        document.getElementById('estadoContra').height="15";
      document.getElementById('leyendaContra').innerHTML="CORRECTO";
        document.getElementById('leyendaContra').style.color="#000000";
  } else {
    input.style.background = "#F78181";
    document.getElementById('estadoContra').src="../images/error.png";
  document.getElementById('estadoContra').with="15";
document.getElementById('estadoContra').height="15";
document.getElementById('leyendaContra').innerHTML="Formato incorrecto";
  document.getElementById('leyendaContra').style.color="#000000";


  }
}else{
  input.style.background = "#F78181";
  document.getElementById('estadoContra').src="../images/error.png";
document.getElementById('estadoContra').with="15";
document.getElementById('estadoContra').height="15";
document.getElementById('leyendaContra').innerHTML="tam min:6 max:9";
document.getElementById('leyendaContra').style.color="#000000";



  }
}

function validarTelefono2(input){
      var campo=input.value;
      var emailRegex = "(+506) ";
      var signo="-"

          //Se muestra un texto a modo de ejemplo, luego va a ser un icono
          if (campo.indexOf(emailRegex)>-1&&campo.indexOf(signo)>-1&&campo.length==16) {
              input.style.background = "#04B45F";
              document.getElementById('estadoTelefono').src="../images/check.png";
                document.getElementById('estadoTelefono').with="15";
                  document.getElementById('estadoTelefono').height="15";
                  document.getElementById('leyendaTelefono').innerHTML="CORRECTO";
                    document.getElementById('leyendaTelefono').style.color="#000000";

          } else {
          input.style.background = "#F78181";

          document.getElementById('estadoTelefono').src="../images/error.png";
        document.getElementById('estadoTelefono').with="15";
      document.getElementById('estadoTelefono').height="15";
      document.getElementById('leyendaTelefono').innerHTML="valor vacio o caracter invalidos ";
        document.getElementById('leyendaTelefono').style.color="#000000";}




      }
      function validarTelefono22(input){
            var campo=input.value;
            var emailRegex = "(+506) ";
            var signo="-"

                //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                if (campo.indexOf(emailRegex)>-1&&campo.indexOf(signo)>-1&&campo.length==16) {
                    input.style.background = "#04B45F";
                    document.getElementById('estadoTelefono2').src="../images/check.png";
                      document.getElementById('estadoTelefono2').with="15";
                        document.getElementById('estadoTelefono2').height="15";
                        document.getElementById('leyendaTelefono2').innerHTML="CORRECTO";
                          document.getElementById('leyendaTelefono2').style.color="#000000";

                } else {
                input.style.background = "#F78181";

                document.getElementById('estadoTelefono2').src="../images/error.png";
              document.getElementById('estadoTelefono2').with="15";
            document.getElementById('estadoTelefono2').height="15";
            document.getElementById('leyendaTelefono2').innerHTML="valor vacio o caracter invalidos ";
              document.getElementById('leyendaTelefono2').style.color="#000000";}




            }
      function Habilitarlogin2(){
        var contra=document.getElementById('leyendaContra').innerHTML;
        var corre= document.getElementById('leyendaCorreo').innerHTML;
        if(corre=="CORRECTO"&&contra=="CORRECTO"){
          console.log("se habilito el registro");
          document.getElementById('loging').disabled=false;
        }
      }

      function validarPApellido2(input){
        var contenido=input.value;
        console.log(contenido);
      var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
      //Se muestra un texto a modo de ejemplo, luego va a ser un icono
      if (emailRegex.test(contenido)&&contenido.length>0) {
        input.style.background = "#04B45F";
        document.getElementById('estadoPApellido').src="../images/check.png";
          document.getElementById('estadoPApellido').with="15";
            document.getElementById('estadoPApellido').height="15";
            document.getElementById('leyendaPApellido').innerHTML="CORRECTO";
              document.getElementById('leyendaPApellido').style.color="#000000";


      } else {
        input.style.background = "#F78181";
        document.getElementById('estadoPApellido').src="../images/error.png";
      document.getElementById('estadoPApellido').with="15";
    document.getElementById('estadoPApellido').height="15";
    document.getElementById('leyendaPApellido').innerHTML="valor vacio o caracter invalidos ";
      document.getElementById('leyendaPApellido').style.color="#000000";}


      }
      function validarSApellido2(input){
        var contenido=input.value;
        console.log(contenido);
      var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
      //Se muestra un texto a modo de ejemplo, luego va a ser un icono
      if (emailRegex.test(contenido)&&contenido.length>0) {
        input.style.background = "#04B45F";
        document.getElementById('estadoSApellido').src="../images/check.png";
          document.getElementById('estadoSApellido').with="15";
            document.getElementById('estadoSApellido').height="15";
            document.getElementById('leyendaSApellido').innerHTML="CORRECTO";
              document.getElementById('leyendaSApellido').style.color="#000000";


      } else {
        input.style.background = "#F78181";
        document.getElementById('estadoSApellido').src="../images/error.png";
      document.getElementById('estadoSApellido').with="15";
    document.getElementById('estadoSApellido').height="15";
    document.getElementById('leyendaSApellido').innerHTML="valor vacio o caracter invalidos ";
      document.getElementById('leyendaSApellido').style.color="#000000";}


      }
      function validarTelefono2(input){
            var campo=input.value;
            var emailRegex = "(+506) ";
            var signo="-"

                //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                if (campo.indexOf(emailRegex)>-1&&campo.indexOf(signo)>-1&&campo.length==16) {
                    input.style.background = "#04B45F";
                    document.getElementById('estadoTelefono').src="../images/check.png";
                      document.getElementById('estadoTelefono').with="15";
                        document.getElementById('estadoTelefono').height="15";
                        document.getElementById('leyendaTelefono').innerHTML="CORRECTO";
                          document.getElementById('leyendaTelefono').style.color="#000000";

                } else {
                input.style.background = "#F78181";

                document.getElementById('estadoTelefono').src="../images/error.png";
              document.getElementById('estadoTelefono').with="15";
            document.getElementById('estadoTelefono').height="15";
            document.getElementById('leyendaTelefono').innerHTML="valor vacio o caracter invalidos ";
              document.getElementById('leyendaTelefono').style.color="#000000";}




            }
            function Habilitarlogin2(){
              var contra=document.getElementById('leyendaContra').innerHTML;
              var corre= document.getElementById('leyendaCorreo').innerHTML;
              if(corre=="CORRECTO"&&contra=="CORRECTO"){
                console.log("se habilito el registro");
                document.getElementById('loging').disabled=false;
              }
            }

            function validarPApellido2(input){
              var contenido=input.value;
              console.log(contenido);
            var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
            //Se muestra un texto a modo de ejemplo, luego va a ser un icono
            if (emailRegex.test(contenido)&&contenido.length>0) {
              input.style.background = "#04B45F";
              document.getElementById('estadoPApellido').src="../images/check.png";
                document.getElementById('estadoPApellido').with="15";
                  document.getElementById('estadoPApellido').height="15";
                  document.getElementById('leyendaPApellido').innerHTML="CORRECTO";
                    document.getElementById('leyendaPApellido').style.color="#000000";


            } else {
              input.style.background = "#F78181";
              document.getElementById('estadoPApellido').src="../images/error.png";
            document.getElementById('estadoPApellido').with="15";
          document.getElementById('estadoPApellido').height="15";
          document.getElementById('leyendaPApellido').innerHTML="valor vacio o caracter invalidos ";
            document.getElementById('leyendaPApellido').style.color="#000000";}


            }
            function validarPApellido22(input){
              var contenido=input.value;
              console.log(contenido);
            var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
            //Se muestra un texto a modo de ejemplo, luego va a ser un icono
            if (emailRegex.test(contenido)&&contenido.length>0) {
              input.style.background = "#04B45F";
              document.getElementById('estadoPApellido2').src="../images/check.png";
                document.getElementById('estadoPApellido2').with="15";
                  document.getElementById('estadoPApellido2').height="15";
                  document.getElementById('leyendaPApellido2').innerHTML="CORRECTO";
                    document.getElementById('leyendaPApellido2').style.color="#000000";


            } else {
              input.style.background = "#F78181";
              document.getElementById('estadoPApellido2').src="../images/error.png";
            document.getElementById('estadoPApellido2').with="15";
          document.getElementById('estadoPApellido2').height="15";
          document.getElementById('leyendaPApellido2').innerHTML="valor vacio o caracter invalidos ";
            document.getElementById('leyendaPApellido2').style.color="#000000";}


            }

            function validarSApellido2(input){
              var contenido=input.value;
              console.log(contenido);
            var  emailRegex =  /^[A-Za-z\_\-\.\s\xF1\xD1]+$/;
            //Se muestra un texto a modo de ejemplo, luego va a ser un icono
            if (emailRegex.test(contenido)&&contenido.length>0) {
              input.style.background = "#04B45F";
              document.getElementById('estadoSApellido').src="../images/check.png";
                document.getElementById('estadoSApellido').with="15";
                  document.getElementById('estadoSApellido').height="15";
                  document.getElementById('leyendaSApellido').innerHTML="CORRECTO";
                    document.getElementById('leyendaSApellido').style.color="#000000";


            } else {
              input.style.background = "#F78181";
              document.getElementById('estadoSApellido').src="../images/error.png";
            document.getElementById('estadoSApellido').with="15";
          document.getElementById('estadoSApellido').height="15";
          document.getElementById('leyendaSApellido').innerHTML="valor vacio o caracter invalidos ";
            document.getElementById('leyendaSApellido').style.color="#000000";}


            }

                      function validarDireccion2(input){
                        var contenido=input.value;
                        console.log(contenido);
                        var  emailRegex = /^[-\w.%+]{1,64}$/;
                      //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                      if (emailRegex.test(contenido)&&contenido.length>0) {
                        input.style.background = "#04B45F";
                        document.getElementById('estadoDireccion').src="../images/check.png";
                          document.getElementById('estadoDireccion').with="15";
                            document.getElementById('estadoDireccion').height="15";
                            document.getElementById('leyendaDireccion').innerHTML="CORRECTO";
                              document.getElementById('leyendaDireccion').style.color="#000000";


                      } else {
                        input.style.background = "#F78181";
                        document.getElementById('estadoDireccion').src="../images/error.png";
                      document.getElementById('estadoDireccion').with="15";
                    document.getElementById('estadoDireccion').height="15";
                    document.getElementById('leyendaDireccion').innerHTML="valor vacio o caracter invalidos ";
                      document.getElementById('leyendaDireccion').style.color="#000000";}


                      }
                      function validarPass12(input){
                        var contenido=input.value;
                        console.log(contenido);
                      var  emailRegex = /^[-\w.%+]{1,64}$/;
                      //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                      if (emailRegex.test(contenido)&&contenido.length>=6) {
                        input.style.background = "#04B45F";
                        document.getElementById('estadoPass1').src="../images/check.png";
                          document.getElementById('estadoPass1').with="15";
                            document.getElementById('estadoPass1').height="15";
                            document.getElementById('leyendaPass1').innerHTML="CORRECTO";
                              document.getElementById('leyendaPass1').style.color="#000000";


                      } else {
                        input.style.background = "#F78181";
                        document.getElementById('estadoPass1').src="../images/error.png";
                      document.getElementById('estadoPass1').with="15";
                    document.getElementById('estadoPass1').height="15";
                    document.getElementById('leyendaPass1').innerHTML="valor vacio o caracter invalidos, tam min=6 ";
                      document.getElementById('leyendaPass1').style.color="#000000";}


                      }

                                            function validarDireccion22(input){
                                              var contenido=input.value;
                                              console.log(contenido);
                                              var  emailRegex = /^[-\w.%+]{1,64}$/;
                                            //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                                            if (emailRegex.test(contenido)&&contenido.length>0) {
                                              input.style.background = "#04B45F";
                                              document.getElementById('estadoDireccion2').src="../images/check.png";
                                                document.getElementById('estadoDireccion2').with="15";
                                                  document.getElementById('estadoDireccion2').height="15";
                                                  document.getElementById('leyendaDireccion2').innerHTML="CORRECTO";
                                                    document.getElementById('leyendaDireccion2').style.color="#000000";


                                            } else {
                                              input.style.background = "#F78181";
                                              document.getElementById('estadoDireccion2').src="../images/error.png";
                                            document.getElementById('estadoDireccion2').with="15";
                                          document.getElementById('estadoDireccion2').height="15";
                                          document.getElementById('leyendaDireccion2').innerHTML="valor vacio o caracter invalidos ";
                                            document.getElementById('leyendaDireccion2').style.color="#000000";}


                                            }
                                            function validarPass12(input){
                                              var contenido=input.value;
                                              console.log(contenido);
                                            var  emailRegex = /^[-\w.%+]{1,64}$/;
                                            //Se muestra un texto a modo de ejemplo, luego va a ser un icono
                                            if (emailRegex.test(contenido)&&contenido.length>=6) {
                                              input.style.background = "#04B45F";
                                              document.getElementById('estadoPass1').src="../images/check.png";
                                                document.getElementById('estadoPass1').with="15";
                                                  document.getElementById('estadoPass1').height="15";
                                                  document.getElementById('leyendaPass1').innerHTML="CORRECTO";
                                                    document.getElementById('leyendaPass1').style.color="#000000";


                                            } else {
                                              input.style.background = "#F78181";
                                              document.getElementById('estadoPass1').src="../images/error.png";
                                            document.getElementById('estadoPass1').with="15";
                                          document.getElementById('estadoPass1').height="15";
                                          document.getElementById('leyendaPass1').innerHTML="valor vacio o caracter invalidos, tam min=6 ";
                                            document.getElementById('leyendaPass1').style.color="#000000";}


                                            }
    function confirmarContra2(){

      var primero=document.getElementById('passCliente1').value;
      var segundo=document.getElementById('passCliente2').value;

      if(primero==segundo){
        return true;
      }else{
        return false;
      }
    }
    function confirmarContraCola(){

      var primero=document.getElementById('passColaborador1').value;
      var segundo=document.getElementById('passColaborador2').value;

      if(primero==segundo){
        return true;
      }else{
        return false;
      }
    }
    function confirmarContraAdmi(){

      var primero=document.getElementById('passAdministrador1').value;
      var segundo=document.getElementById('passAdministrador2').value;

      if(primero==segundo){
        return true;
      }else{
        return false;
      }
    }
    function validarPass22(input){
      var contenido=input.value;
      console.log(contenido);
    var  emailRegex = /^[-\w.%+]{1,64}$/;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    var estado=confirmarContra();
    if (emailRegex.test(contenido)&&contenido.length>=6&&estado==true) {


      input.style.background = "#04B45F";
      document.getElementById('estadoPass2').src="../images/check.png";
        document.getElementById('estadoPass2').with="15";
          document.getElementById('estadoPass2').height="15";
          document.getElementById('leyendaPass2').innerHTML="CORRECTO";
            document.getElementById('leyendaPass2').style.color="#000000";


    } else {
      input.style.background = "#F78181";
      document.getElementById('estadoPass2').src="../images/error.png";
    document.getElementById('estadoPass2').with="15";
  document.getElementById('estadoPass2').height="15";

  document.getElementById('leyendaPass2').innerHTML="son diferentes o caracter invalidos,tam min=6";
    document.getElementById('leyendaPass2').style.color="#000000";}


    }
    function validarPassCola(input){
      var contenido=input.value;
      console.log(contenido);
    var  emailRegex = /^[-\w.%+]{1,64}$/;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    var estado=confirmarContraCola();
    if (emailRegex.test(contenido)&&contenido.length>=6&&estado==true) {


      input.style.background = "#04B45F";
      document.getElementById('estadoPass2').src="../images/check.png";
        document.getElementById('estadoPass2').with="15";
          document.getElementById('estadoPass2').height="15";
          document.getElementById('leyendaPass2').innerHTML="CORRECTO";
            document.getElementById('leyendaPass2').style.color="#000000";


    } else {
      input.style.background = "#F78181";
      document.getElementById('estadoPass2').src="../images/error.png";
    document.getElementById('estadoPass2').with="15";
  document.getElementById('estadoPass2').height="15";

  document.getElementById('leyendaPass2').innerHTML="son diferentes o caracter invalidos,tam min=6";
    document.getElementById('leyendaPass2').style.color="#000000";}


    }
    function validarPassAdmi(input){
      var contenido=input.value;
      console.log(contenido);
    var  emailRegex = /^[-\w.%+]{1,64}$/;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    var estado=confirmarContraAdmi();
    if (emailRegex.test(contenido)&&contenido.length>=6&&estado==true) {


      input.style.background = "#04B45F";
      document.getElementById('estadoPass2').src="../images/check.png";
        document.getElementById('estadoPass2').with="15";
          document.getElementById('estadoPass2').height="15";
          document.getElementById('leyendaPass2').innerHTML="CORRECTO";
            document.getElementById('leyendaPass2').style.color="#000000";


    } else {
      input.style.background = "#F78181";
      document.getElementById('estadoPass2').src="../images/error.png";
    document.getElementById('estadoPass2').with="15";
  document.getElementById('estadoPass2').height="15";

  document.getElementById('leyendaPass2').innerHTML="son diferentes o caracter invalidos,tam min=6";
    document.getElementById('leyendaPass2').style.color="#000000";}


    }
    function HabilitarRegistroColaborador(){

      var contra=document.getElementById('leyendaPass2').innerHTML;
      var corre= document.getElementById('leyendaCorreoF').innerHTML;
      var nombre=document.getElementById('leyendaNombre').innerHTML;
      var apellido1=document.getElementById('leyendaPApellido').innerHTML;
      var apellido2=document.getElementById('leyendaSApellido').innerHTML;
      var habilidad=document.getElementById('leyendaHabilidades').innerHTML;
      var telefono=document.getElementById('leyendaTelefono').innerHTML;
      var cedula=document.getElementById('leyendaCedula').innerHTML;
      if(corre=="CORRECTO"&&contra=="CORRECTO"&&nombre=="CORRECTO"&&apellido1=="CORRECTO"&&apellido2=="CORRECTO"&&habilidad=="CORRECTO"&&telefono=="CORRECTO"&&cedula=="CORRECTO"){
        console.log("se habilito el registro");
        document.getElementById('registrarColaborador').disabled=false;
      }else{
        console.log("no habilito el registro");
            document.getElementById('registrarColaborador').disabled=true;
      }
    }
    function HabilitarRegistroCliente2(){

      var contra=document.getElementById('leyendaPass2').innerHTML;
      var corre= document.getElementById('leyendaCorreoF').innerHTML;
      var nombre=document.getElementById('leyendaNombre').innerHTML;
      var apellido1=document.getElementById('leyendaPApellido').innerHTML;
      var apellido2=document.getElementById('leyendaSApellido').innerHTML;
      var direccion=document.getElementById('leyendaDireccion').innerHTML;
      var telefono=document.getElementById('leyendaTelefono').innerHTML;
      var cedula=document.getElementById('leyendaCedula').innerHTML;
      if(corre=="CORRECTO"&&contra=="CORRECTO"&&nombre=="CORRECTO"&&apellido1=="CORRECTO"&&apellido2=="CORRECTO"&&direccion=="CORRECTO"&&telefono=="CORRECTO"&&cedula=="CORRECTO"){
        console.log("se habilito el registro");
        document.getElementById('registroCliente').disabled=false;
      }else{
        console.log("no habilito el registro");
      }
    }
    function HabilitarRegistroColaborador(){

      var contra=document.getElementById('leyendaPass2').innerHTML;
      var corre= document.getElementById('leyendaCorreoF').innerHTML;
      var nombre=document.getElementById('leyendaNombre').innerHTML;
      var apellido1=document.getElementById('leyendaPApellido').innerHTML;
      var apellido2=document.getElementById('leyendaSApellido').innerHTML;
      var direccion=document.getElementById('leyendaDescrip').innerHTML;
      var telefono=document.getElementById('leyendaTelefono').innerHTML;
      var cedula=document.getElementById('leyendaCedula').innerHTML;
      if(corre=="CORRECTO"&&contra=="CORRECTO"&&nombre=="CORRECTO"&&apellido1=="CORRECTO"&&apellido2=="CORRECTO"&&direccion=="CORRECTO"&&telefono=="CORRECTO"&&cedula=="CORRECTO"){
        console.log("se habilito el registro");
        document.getElementById('registroAdmi').disabled=false;
      }else{
        console.log("no habilito el registro");
          document.getElementById('registroAdmi').disabled=true;
      }
    }

    function HabilitarActualizarCliente(){



      var nombre=document.getElementById('leyendaNombre2').innerHTML;
      var apellido1=document.getElementById('leyendaPApellido2').innerHTML;

      var direccion=document.getElementById('leyendaDireccion2').innerHTML;
      var telefono=document.getElementById('leyendaTelefono2').innerHTML;
      var cedula=document.getElementById('leyendaCedula2').innerHTML;
      if(nombre=="CORRECTO"&&apellido1=="CORRECTO"&&direccion=="CORRECTO"&&telefono=="CORRECTO"&&cedula=="CORRECTO"){
        console.log("se habilito el registro");
        document.getElementById('updateCliente').disabled=false;
      }else{
        console.log("no habilito el registro");
      }
    }
    function HabilitarActualizarColaborador(){



      var nombre=document.getElementById('leyendaNombre2').innerHTML;
      var apellido1=document.getElementById('leyendaPApellido2').innerHTML;

      var direccion=document.getElementById('leyendaHabilidades2').innerHTML;
      var telefono=document.getElementById('leyendaTelefono2').innerHTML;
      var cedula=document.getElementById('leyendaCedula2').innerHTML;
      if(nombre=="CORRECTO"&&apellido1=="CORRECTO"&&direccion=="CORRECTO"&&telefono=="CORRECTO"&&cedula=="CORRECTO"){
        console.log("se habilito el registro");
        document.getElementById('updateColaborador').disabled=false;
      }else{
        console.log("no habilito el registro");
            document.getElementById('updateColaborador').disabled=true;
      }
    }
    function validarCorreoF2(input){
      var contenido=input.value;
      console.log(contenido);

    var  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(contenido)) {
      input.style.background = "#04B45F";
          document.getElementById('estadoCorreoF').src="../images/check.png";
            document.getElementById('estadoCorreoF').with="15";
              document.getElementById('estadoCorreoF').height="15";
              document.getElementById('leyendaCorreoF').innerHTML="CORRECTO";
                document.getElementById('leyendaCorreoF').style.color="#000000";
  }else{
      input.style.background = "#F78181";
      document.getElementById('estadoCorreoF').src="../images/error.png";
    document.getElementById('estadoCorreoF').with="15";
  document.getElementById('estadoCorreoF').height="15";
  document.getElementById('leyendaCorreoF').innerHTML="Formato incorrecto";
    document.getElementById('leyendaCorreoF').style.color="#000000";}
  }
  function validarHabilidades(input){
    var contenido=input.value;
    console.log(contenido);
    var  emailRegex = /^[-\w.%+]{1,64}$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if (emailRegex.test(contenido)&&contenido.length>0) {
    input.style.background = "#04B45F";
    document.getElementById('estadoHabilidades').src="../images/check.png";
      document.getElementById('estadoHabilidades').with="15";
        document.getElementById('estadoHabilidades').height="15";
        document.getElementById('leyendaHabilidades').innerHTML="CORRECTO";
          document.getElementById('leyendaHabilidades').style.color="#000000";


  } else {
    input.style.background = "#F78181";
    document.getElementById('estadoHabilidades').src="../images/error.png";
  document.getElementById('estadoHabilidades').with="15";
document.getElementById('estadoHabilidades').height="15";
document.getElementById('leyendaHabilidades').innerHTML="valor vacio o caracter invalidos ";
  document.getElementById('leyendaHabilidades').style.color="#0000";}


  }
  function validarHabilidades2(input){
    var contenido=input.value;
    console.log(contenido);
    var  emailRegex = /^[-\w.%+]{1,64}$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if (emailRegex.test(contenido)&&contenido.length>0) {
    input.style.background = "#04B45F";
    document.getElementById('estadoHabilidades2').src="../images/check.png";
      document.getElementById('estadoHabilidades2').with="15";
        document.getElementById('estadoHabilidades2').height="15";
        document.getElementById('leyendaHabilidades2').innerHTML="CORRECTO";
          document.getElementById('leyendaHabilidades').style.color="#000000";


  } else {
    input.style.background = "#F78181";
    document.getElementById('estadoHabilidades2').src="../images/error.png";
  document.getElementById('estadoHabilidades2').with="15";
document.getElementById('estadoHabilidades2').height="15";
document.getElementById('leyendaHabilidades2').innerHTML="valor vacio o caracter invalidos ";
  document.getElementById('leyendaHabilidades2').style.color="#0000";}


  }
  function validarDescrip(input){
    var contenido=input.value;
    console.log(contenido);
    var  emailRegex = /^[-\w.%+]{1,64}$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if (contenido.length>0) {
    input.style.background = "#04B45F";
    document.getElementById('estadoDescrip').src="../images/check.png";
      document.getElementById('estadoDescrip').with="15";
        document.getElementById('estadoDescrip').height="15";
        document.getElementById('leyendaDescrip').innerHTML="CORRECTO";
          document.getElementById('leyendaDescrip').style.color="#000000";


  } else {
    input.style.background = "#F78181";
    document.getElementById('estadoDescrip').src="../images/error.png";
  document.getElementById('estadoDescrip').with="15";
document.getElementById('estadoDescrip').height="15";
document.getElementById('leyendaDescrip').innerHTML="valor vacio o caracter invalidos ";
  document.getElementById('leyendaDescrip').style.color="#0000";}


  }

  function validarDescrip2(input){
    var contenido=input.value;
    console.log(contenido);
    var  emailRegex = /^[-\w.%+]{1,200}$/;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if (contenido.length>0) {
    input.style.background = "#04B45F";
    document.getElementById('estadoDescrip2').src="../images/check.png";
      document.getElementById('estadoDescrip2').with="15";
        document.getElementById('estadoDescrip2').height="15";
        document.getElementById('leyendaDescrip2').innerHTML="CORRECTO";
          document.getElementById('leyendaDescrip2').style.color="#000000";
    console.log("valido");

  } else {
    input.style.background = "#F78181";
    document.getElementById('estadoDescrip2').src="../images/error.png";
  document.getElementById('estadoDescrip2').with="15";
document.getElementById('estadoDescrip2').height="15";
document.getElementById('leyendaDescrip2').innerHTML="valor vacio o caracter invalidos ";
  document.getElementById('leyendaDescrip2').style.color="#0000";}
  console.log(" no valido");

  }
  function HabilitarRegistroColaborador(){

    var contra=document.getElementById('leyendaPass2').innerHTML;
    var corre= document.getElementById('leyendaCorreoF').innerHTML;
    var nombre=document.getElementById('leyendaNombre').innerHTML;
    var apellido1=document.getElementById('leyendaPApellido').innerHTML;
    var apellido2=document.getElementById('leyendaSApellido').innerHTML;
    var habilidades=document.getElementById('leyendaHabilidades').innerHTML;

    var telefono=document.getElementById('leyendaTelefono').innerHTML;
    var cedula=document.getElementById('leyendaCedula').innerHTML;
    if(corre=="CORRECTO"&&contra=="CORRECTO"&&nombre=="CORRECTO"&&apellido1=="CORRECTO"&&apellido2=="CORRECTO"&&habilidades=="CORRECTO"&&telefono=="CORRECTO"&&cedula=="CORRECTO"){
      console.log("se habilito el registro");
      document.getElementById('registrarColaborador').disabled=false;
    }else{
      console.log("no habilito el registro");
          document.getElementById('registrarColaborador').disabled=true;
    }
  }
  function HabilitarRegistroAdmi(){



    var nombre=document.getElementById('leyendaNombre').innerHTML;
    var apellido1=document.getElementById('leyendaPApellido').innerHTML;
    var apellido2=document.getElementById('leyendaSApellido').innerHTML;
    var habilidades=document.getElementById('leyendaDescrip').innerHTML;

    var telefono=document.getElementById('leyendaTelefono').innerHTML;
    var cedula=document.getElementById('leyendaCedula').innerHTML;
    if(nombre=="CORRECTO"&&apellido1=="CORRECTO"&&apellido2=="CORRECTO"&&habilidades=="CORRECTO"&&telefono=="CORRECTO"&&cedula=="CORRECTO"){
      console.log("se habilito el registro");
      document.getElementById('registroAdmi').disabled=false;
    }else{
      console.log("no habilito el registro");
          document.getElementById('registroAdmi').disabled=true;
    }
  }
  function HabilitarteUpdaAdmi(){


    var nombre=document.getElementById('leyendaNombre2').innerHTML;
    var apellido1=document.getElementById('leyendaPApellido2').innerHTML;

    var habilidades=document.getElementById('leyendaDescrip2').innerHTML;

    var telefono=document.getElementById('leyendaTelefono2').innerHTML;
    var cedula=document.getElementById('leyendaCedula2').innerHTML;
    if(nombre=="CORRECTO"&&apellido1=="CORRECTO"&&habilidades=="CORRECTO"&&telefono=="CORRECTO"&&cedula=="CORRECTO"){
      console.log("se habilito el registro");
      document.getElementById('updateAdmi').disabled=false;
    }else{
      console.log("no habilito el registro");
          document.getElementById('updateAdmi').disabled=true;
    }
  }
