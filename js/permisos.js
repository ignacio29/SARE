//------------------------------------variables globales-------------------------
var asuntoO;
var filtoGlobal;


//----------------------------ADMINISTRATIVOS-------------------------

//-----------mostrar mensajes.------------------------------
function verTodosMensajes(input) {
  var asun=input;
  asuntoO=input;
$(document).ready(function () {
$('#contenidoMensajes').html("");
  $.post('../Business/Permisos/permisosAction.php', {
    accion: "verTodosMensajes",
    asunto:asun
  },
  function (responseText){
    if(responseText==0){
  $('#contenidoMensajes').html("");
    }else if (responseText==="SinPrivilegio") {
      accionNoExitosa("TINE LOS PRIVILEGIOS NECESARIOS");
         window.location = "../View/asistenteView.php";
    } else{
    $('#contenidoMensajes').html(responseText);
    }
    $("#mytable").paginationTdA({
      elemPerPage: 8
    });
  }
  );
});
}

var idMensajeOcultar;
var idTdAsuntoOcultar;
function cargarIdOcultar(input,cont){
  idMensajeOcultar=input;
  idTdAsuntoOcultar=cont;
}

function ocultarMensaje(){
  var idMensaje=idMensajeOcultar;
  var contTD=idTdAsuntoOcultar;
  var asunto=document.getElementById("asunto"+contTD).innerHTML;
  $(document).ready(function () {

  $.post('../Business/Permisos/permisosAction.php', {
    accion: "ocultarMensaje",
    id:idMensaje
  },
  function (responseText){
    if(responseText==0){
      accionNoExitosa("PUDO OCULTAR EL MENSAJE");
    }else if(responseText==1){
      document.getElementById("cerrar3").click();

      if(filtoGlobal=="OCULTOS"){
        reporteMensajesOcultos();
        accionExitosa("OCULTO EL MENSAJE");
      }else if(filtoGlobal=="NUEVO" || filtoGlobal=="PROCESO" || filtoGlobal=="CONFIRMADO" || filtoGlobal=="RECHAZADO" ) {
        reporteMensajeEstado(filtoGlobal);
        accionExitosa("OCULTO EL MENSAJE");
      }else if (filtoGlobal=="FECHA") {
         reporteMensajeFecha();
         accionExitosa("OCULTO EL MENSAJE");
      }else {
         verTodosMensajes(asunto);
         accionExitosa("OCULTO EL MENSAJE");
      }



    }

  }
  );
});

}


function cargarVerMensaje(idMensajeVer,idContVer){
  var id=idMensajeVer;
  var idTD=idContVer;
  var asunto =document.getElementById("asunto"+idTD).innerHTML;
  var detalle=document.getElementById("detalle"+idTD).value;
  var fecha=document.getElementById("fecha"+idTD).innerHTML;
  var estado=document.getElementById("estado"+idTD).value;
  var visible=document.getElementById("visible"+idTD).value;
    //cargo los datos al modal
  document.getElementById("asunto").value=asunto;
  document.getElementById("detalle").value=detalle;
  document.getElementById("fech1").value=fecha;
  document.getElementById("idmensaje").value=id;

  if(estado=="NUEVO"){
    document.getElementById("estado").selectedIndex=0;
  }else if(estado=="PROCESO"){
    document.getElementById("estado").selectedIndex=1;
  }else if(estado=="CONFIRMADO"){
    document.getElementById("estado").selectedIndex=2;
  }else if (estado=="RECHAZADO") {
    document.getElementById("estado").selectedIndex=3;
  }

  if(visible==1){
      document.getElementsByName("visible")[0].checked=true;
  }else if (visible==0) {
      document.getElementsByName("visible")[1].checked=true;
  }
}


function actualizarDatosMensaje(){
  var idMensaje=document.getElementById("idmensaje").value;
  var asunto =document.getElementById("asunto").value;
  //var detalle=document.getElementById("detalle").value;
  //var fecha=document.getElementById("fecha").value;
  var estado1=document.getElementById("estado").value;
  var resultado="";
  if(document.getElementsByName("visible")[0].checked){
      resultado=document.getElementsByName("visible")[0].value;
   }else if(document.getElementsByName("visible")[1].checked){
      resultado=document.getElementsByName("visible")[1].value;
   }

   $(document).ready(function () {

     $.post('../Business/Permisos/permisosAction.php', {
       accion: "actualizarDatosMensaje",
       id:idMensaje,
       estado:estado1,
       visible:resultado
     },
     function (responseText){
       if(responseText==0){
         accionNoExitosa("ACTUALIZO EL MENSAJE");
       }else if(responseText==1){
         document.getElementById("cerrar2").click();
         if(filtoGlobal=="OCULTOS"){
           reporteMensajesOcultos();
           accionExitosa("ACTUALIZO EL MENSAJE");
         }else if(filtoGlobal=="NUEVO" || filtoGlobal=="PROCESO" || filtoGlobal=="CONFIRMADO" || filtoGlobal=="RECHAZADO" ) {
           reporteMensajeEstado(filtoGlobal);
           accionExitosa("ACTUALIZO EL MENSAJE");
         }else if (filtoGlobal=="FECHA") {
            reporteMensajeFecha();
            accionExitosa("ACTUALIZO EL MENSAJE");
         }else {
            verTodosMensajes(asunto);
            accionExitosa("ACTUALIZO EL MENSAJE");
         }

       }

     }
     );
   });
}




//---------------------------------FILTRO REPORTES DE MENSAJES--------------------------------------------
function reporteMensajes(input){
  var filtro= input;
  filtoGlobal=filtro;
  var fecha=document.getElementById("inputFecha");
  $('#contenidoMensajesAdmin').html("");
   if(filtro=="NUEVO" || filtro=="PROCESO" || filtro=="CONFIRMADO" || filtro=="RECHAZADO" ){
    //Filtra por estados
    if(fecha.style.display==='block'){
      fecha.style.display='none';
    }
    reporteMensajeEstado(filtro);
  }else if (filtro=="FECHA") {
    fecha.style.display='block';
  }else if (filtro=="OCULTOS") {
    if(fecha.style.display==='block'){
      fecha.style.display='none';
    }
    reporteMensajesOcultos();
  }
  else if (filtro=="TODOS") {
    if(fecha.style.display==='block'){
      fecha.style.display='none';
    }
    verTodosMensajes(asuntoO);
  }
}


//---------------------REPORTES ADMINISTRATIVOS----------------------

function reporteMensajesOcultos(){
  var asuntoOculto=asuntoO;
  $(document).ready(function () {
    $('#contenidoMensajes').html("");
      $.post('../Business/Permisos/permisosAction.php', {
        accion: "reporteMensajesOcultos",
        asunto:asuntoOculto
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
        $('#contenidoMensajes').html(responseText);
        }else {
        $('#contenidoMensajes').html("");
        }
        $("#mytable").paginationTdA({
          elemPerPage: 8
        });
      }
    );
  });
}


function reporteMensajeBucar(){
  var cedulaMensaje= document.getElementById("cedulaMensaje").value;
  var asuntoOculto=asuntoO;
  var fecha=document.getElementById("inputFecha");
  if(fecha.style.display==='block'){
    fecha.style.display='none';
  }
  $(document).ready(function () {
    $('#contenidoMensajes').html("");
      $.post('../Business/Permisos/permisosAction.php', {
        accion: "reporteMensajeBucar",
        cedula: cedulaMensaje,
        asunto:asuntoOculto
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
        $('#contenidoMensajes').html(responseText);
        }else {
          $('#contenidoMensajes').html("");
        }
        $("#mytable").paginationTdA({
          elemPerPage: 8
        });
      }
    );
  });
}

function reporteMensajeEstado(input){
  var estados= input;
  var asuntoOculto=asuntoO;
  $(document).ready(function () {
    $('#contenidoMensajes').html("");
      $.post('../Business/Permisos/permisosAction.php', {
        accion: "reporteMensajeEstado",
        estado: estados,
        asunto:asuntoOculto
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#contenidoMensajes').html(responseText);
        }else {
          $('#contenidoMensajes').html("");
        }
        $("#mytable").paginationTdA({
          elemPerPage: 8
        });
      }
    );
  });
}

function reporteMensajeFecha(){
  var fechas= document.getElementById("fecha").value;
  var asuntoOculto=asuntoO;
  $(document).ready(function () {
    $('#contenidoMensajes').html("");
      $.post('../Business/Permisos/permisosAction.php', {
        accion: "reporteMensajeFecha",
        fecha: fechas,
        asunto:asuntoOculto
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
        $('#contenidoMensajes').html(responseText);
        }else {
          $('#contenidoMensajes').html("");

        }
        $("#mytable").paginationTdA({
          elemPerPage: 8
        });
      }
    );
  });
}


//--------------------------------ESTUDIANTES--------------------------------------

function crearMensaje(){
  var asunto1 =document.getElementById("asunto").value;
  var detalle1=document.getElementById("detalle").value;
  $(document).ready(function () {
      $.post('../Business/Permisos/permisosAction.php', {
        accion: "crearMensaje",
        asunto:asunto1,
        detalle:detalle1
      },
      function (responseText){
        document.getElementById("detalle").style="";
        document.getElementById("detalle").value="";
        document.getElementById("asunto").selectedIndex=0;
        document.getElementById("cerrar1").click();
        verMisMensajesEstudiante();
        if(responseText==1){
          accionExitosa("ENVIO EL MENSAJE");
        }else if (responseText === 'camposNulos' || responseText==0 ) {
          accionNoExitosa("ENVIO EL MENSAJE");
        }
      }
    );
  });

}

function verMisMensajesEstudiante(){
  $(document).ready(function () {
    $('#contenidoMensajes').html("");
      $.post('../Business/Permisos/permisosAction.php', {
        accion: "verMisMensajesEstudiante",

      },
      function (responseText){

        document.getElementById("cerrar1").click();
        if(responseText!="Error" && responseText !=""){
          $('#contenidoMensajes').html(responseText);
        }else {
          $('#contenidoMensajes').html("");
        }
        $("#mytable").paginationTdA({
          elemPerPage: 8
        });
      }
    );
  });
}

var MensajeElminar;
function cargarEliminarMensaje(input){
   MensajeElminar=input;
}

function eliminarMensaje(){
  var idMensaje1=MensajeElminar;
  $(document).ready(function () {

      $.post('../Business/Permisos/permisosAction.php', {
        accion: "eliminarMensaje",
        idMensaje:idMensaje1
      },
      function (responseText){
        document.getElementById("cerrar3").click();
        verMisMensajesEstudiante();
        if(responseText==1){
          accionExitosa("ELIMINO EL MENSAJE");
        }else if (responseText === 'camposNulos' || responseText==0 ) {
          accionNoExitosa("ELIMINO EL MENSAJE");
        }
      }
    );
  });
}

function cargarVerMensajeEstudiante(idMensajeVer,idContVer){
  var id=idMensajeVer;
  var idTD=idContVer;
  var asunto =document.getElementById("asunto"+idTD).innerHTML;
  var detalle=document.getElementById("detalle"+idTD).value;
  var fecha=document.getElementById("fecha"+idTD).innerHTML;
  var estado=document.getElementById("estado"+idTD).value;
    //cargo los datos al modal
  document.getElementById("asunt2").value=asunto;
  document.getElementById("detall2").value=detalle;
  document.getElementById("fech2").value=fecha;


  if(estado=="NUEVO"){
    document.getElementById("estad2").selectedIndex=0;
  }else if(estado=="PROCESO"){
    document.getElementById("estad2").selectedIndex=1;
  }else if(estado=="CONFIRMADO"){
    document.getElementById("estad2").selectedIndex=2;
  }else if (estado=="RECHAZADO") {
    document.getElementById("estad2").selectedIndex=3;
  }

}



//---------------------------------REPORTE MENSAJES ESTUDIANTE----------------------------------

function reporteMensajesEstudiante(input){
  var filtro= input;
  if(filtro==='TODOS'){
      verMisMensajesEstudiante();
  }else if (filtro==='AVISO' || filtro==='PERMISO' || filtro==='QUEJA') {
    $(document).ready(function () {
      $('#contenidoMensajes').html("");
        $.post('../Business/Permisos/permisosAction.php', {
          accion: "reporteMensajesEstudiante",
          asunto:filtro
        },
        function (responseText){
          if(responseText!="Error" && responseText !=""){
          $('#contenidoMensajes').html(responseText);
          }else {
            $('#contenidoMensajes').html("");
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
        }
      );
    });
  }

}


//------------------------------------------------------------VALIDACION DEL FORMULARIO MENSAJES------------------------

function validarInputDetalles(input){
  var contenido=input.value;
  var  emailRegex =  /^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\_\-\.\s\xF1\xD1]/;
  var espacios= /^[+|\s]+$/;
//Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(!espacios.test(contenido) && emailRegex.test(contenido) ) {
    with (input.style) {
        borderColor="#81F79F";
        borderWidth = "3px";
        borderStyle = "solid";
    }
  document.getElementById("detalles").innerHTML="";

  } else {
      document.getElementById("detalles").innerHTML="Valores invalidos";
      with (input.style) {
      borderColor="#FA5858";
      borderWidth = "3px";
      borderStyle = "solid";
      }
  }
}

function habilitarRegistroMensajes(){
  var detalle=document.getElementById('detalle').style;
  var correcto="rgb(129, 247, 159)";

    if(detalle.borderColor == correcto){
        document.getElementById('crearMensaje1').disabled=false;
    }else{
      document.getElementById('crearMensaje1').disabled=true;
    }
}
