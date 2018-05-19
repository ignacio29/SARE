function Subir2(){
  var subir= document.getElementById("subir2");
  var btnSubir= document.getElementById("btnSubir2");
  if(subir.style.display==='none'){
    subir.style.display='block';
    btnSubir.style.display='none';
  }
}

function ocultarSubir2(){
  var subir= document.getElementById("subir2").style.display='none';
  var btnSubir= document.getElementById("btnSubir2").style.display='block';
}

function Subir(){
  var subir= document.getElementById("subir");
  var btnSubir= document.getElementById("btnSubir");
  if(subir.style.display==='none'){
    subir.style.display='block';
    btnSubir.style.display='none';
  }
}

function ocultarSubir(){
  var subir= document.getElementById("subir").style.display='none';
  var btnSubir= document.getElementById("btnSubir").style.display='block';
}


function registarNoticia(){

  $(function(){
        var accion="registarNoticia";
        var titulo =document.getElementById("temaAnuncio1").value;
        var noticia = document.getElementById("detalleAnuncio1").value;
        var inputFileImage =document.getElementById('imagen1');   //Ya que utilizas jquery aprovechalo...
        var archivo = inputFileImage.files[0];       //el array pertenece al elemento
        // Crea un formData y lo envías
        var formData = new FormData(document.getElementById("formulario"));
        formData.append('temaAnuncio',titulo);
        formData.append('detalleAnuncio',noticia);
        formData.append('imagen',archivo);
        formData.append('accion',accion);

        $.ajax({
            url: "../Business/Noticias/noticiaAction.php",
            dataType:'html',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
          //  'accion':'registrarNoticia'
        })
        .done(function(respuesta){
          document.getElementById("cerrar").click();
            verMisNoticias();
          if(respuesta==1){
            accionExitosa('REGISTRO LA NOTICIA');
          }else {
              accionNoExitosaB(respuesta.toUpperCase());
          }

        })

     });

}

function limpiarModal(){
    document.getElementById("temaAnuncio1").value="";
    document.getElementById("detalleAnuncio1").value="";
    document.getElementById("imagen1").value="";

    document.getElementById("temaAnuncio1").style="";
    document.getElementById("detalleAnuncio1").style="";
    document.getElementById("imagen1").style="";

    document.getElementById("registarNoticia1").disabled=true;
}

function verMisNoticias(){

  $(document).ready(function () {
    $('#contenidoNoticias').html("");
    $.post('../Business/Noticias/noticiaAction.php', {
      accion: "verMisNoticias"
    },
    function (responseText){
      if(responseText==0){
        $('#contenidoNoticias').html("");
      }else{
        $('#contenidoNoticias').html(responseText);
      }
      $("#mytable").paginationTdA({
        elemPerPage: 8
      });
    });
  });
}

function verMisNoticiasReporte(){

  $(document).ready(function () {
       
    $('#contenidoNoticias2').html("");
    $.post('../Business/Noticias/noticiaAction.php', {
      accion: "verMisNoticiasReporte"
    },
    function (responseText){
      if(responseText==0){ 
        $('#contenidoNoticias2').html("");
      }else{
         
         $('#contenidoNoticias2').html(responseText);
      }
      $("#mytable").paginationTdA({
        elemPerPage: 8
      });
    });
  });
}


function verTodasNoticias() {
  $(document).ready(function () {
    $.post('../Business/Noticias/noticiaAction.php', {
      accion: "verTodasNoticias"
    },
    function (responseText){
      if(responseText=="Error" || responseText==""){
        $('#noticiasResidenciales').html("");
        accionNoExitosa("ENCONTRARON RESULTADOS");
      }else{
        $('#noticiasResidenciales').html(responseText);
      }
    });
  });

}

 function verNotica(idNoticia){
  $(document).ready(function () {
    $.post('../Business/Noticias/noticiaAction.php', {
      accion: "consultarNoticiaResidencial",
      idnoticia:idNoticia
    },
    function (responseText){
      if(responseText=="Error" || responseText==""){
        $('#contenidoNoticia').html("");
        accionNoExitosa("ENCONTRARON RESULTADOS");
      }else{
        document.getElementById("noticiasResidenciales").style.display='none';
        document.getElementById("contenidoNoticia").style.display='block';
        document.getElementById("cerrarNoticia").style.display='block';
        $('#contenidoNoticia').html(responseText);
      }
    });
  });

 }

 function publicarComentario(idNoticia){
   var comentario1=document.getElementById('comentarioN').value;

   $(document).ready(function () {
     $.post('../Business/Noticias/noticiaAction.php', {
       accion: "publicarComentario",
       comentario:comentario1,
       idnoticia:idNoticia
     },
     function (responseText){
       document.getElementById("publicarComentario1").disabled=true;
       verNotica(idNoticia)
       if(responseText==1){
          accionExitosa("PUDO PUBLICAR EL COMENTARIO");
       }else{
        accionNoExitosa("PUDO PUBLICAR EL COMENTARIO");
       }

     });
   });

 }

 function volverNoticias(){
   document.getElementById("noticiasResidenciales").style.display='block';
   document.getElementById("contenidoNoticia").style.display='none';
   document.getElementById("cerrarNoticia").style.display='none';
 }


function cargarEditarNoticia(idNoticia,idTd) {
  var id=idNoticia;
  var idTD=idTd;
  var titulo =document.getElementById("tema"+idTD).innerHTML;
  var noticia=document.getElementById("descripcionnoticia"+idTD).innerHTML;
  var foto=document.getElementById("fotonoticia"+idTD).innerHTML;

  document.getElementById("editarNoticia1").disabled=false;
//Los cargo con la validacion correcta
  document.getElementById("temaAnuncio2").style="border-color: rgb(129, 247, 159); border-width: 3px; border-style: solid;";
  document.getElementById("detalleAnuncio2").style="border-color: rgb(129, 247, 159); border-width: 3px; border-style: solid;";

    //cargo los datos al modal
  document.getElementById("imagen2").value="";
  document.getElementById("temaAnuncio2").value=titulo;
  document.getElementById("detalleAnuncio2").value=noticia;
  document.getElementById("idNoticia").value=idNoticia;
  document.getElementById("fotoNoticia").value=foto;
  document.getElementById("fotoAnterior").src="../uploads/Noticias/"+foto;

}


function editarNoticia(){
  var id=document.getElementById("idNoticia").value;
  var accion="editarNoticia";

  var titulo =document.getElementById("temaAnuncio2").value;
  var noticia = document.getElementById("detalleAnuncio2").value;
  var rutaV=document.getElementById("fotoNoticia").value;
  var inputFileImage =document.getElementById('imagen2');   //Ya que utilizas jquery aprovechalo...
  var archivo = inputFileImage.files[0];       //el array pertenece al elemento
  // Crea un formData y lo envías
  var formData = new FormData(document.getElementById("formulario2"));
  formData.append('idNoticia',id);
  formData.append('temaAnuncio',titulo);
  formData.append('detalleAnuncio',noticia);
  formData.append('imagenV',rutaV);
  formData.append('imagen',archivo);
  formData.append('accion',accion);

  $.ajax({
      url: "../Business/Noticias/noticiaAction.php",
      dataType:'html',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      type: 'POST',

  })
  .done(function(respuesta){
    document.getElementById("cerrar2").click();
    verMisNoticias();
    if(respuesta==1){
      accionExitosa('EDITO LA  NOTICIA');
    }else {
    accionNoExitosaB(respuesta.toUpperCase());
    }

  })


}

var idNoticiaEliminar;
var idcont;
function cargaIdNoticiaEliminar(input,cont){
  idNoticiaEliminar=input;
  idcont=cont;
}


function eliminarNoticia(){
  var id=idNoticiaEliminar;
  var contTD=idcont;
  var imagenV2=document.getElementById("fotonoticia"+contTD).innerHTML;

       $(document).ready(function () {

          $.post('../Business/Noticias/noticiaAction.php', {
              accion: "eliminarNoticia",
              idNoticia: id,
              imagenV:imagenV2
          },
              function (responseText){
                if(responseText==1){
                  document.getElementById("cerrar3").click();
                  verMisNoticias();
                  accionExitosa('ELIMINO LA NOTICIA');
                }else {
                  accionNoExitosa('ELIMINO LA NOTICIA');

                }

                  }
  );
  });

}

//-------------------------------------REPORTES----------------------------------

function reporteNoticias(input){
  var filtro= input;
  var fecha=document.getElementById("fechas");
  $('#contenidoNoticias').html("");

  if (filtro=="fecha") {
    //Filtra por fecha
    fecha.style.display='block';
  }else if (filtro=="todos") {
    if(fecha.style.display==='block'){
      fecha.style.display='none';
    }
    verMisNoticias();
    verMisNoticiasReporte();
  }
}
 
function buscarFehaNoticia(){
  var fecha1=document.getElementById("fechaBuscar").value;
  $('#contenidoNoticias').html("");
      $(document).ready(function () {
        $.post('../Business/Noticias/noticiaAction.php', {
          accion: "buscarFehaNoticia",
          fecha:fecha1
        },
        function (responseText){
          if(responseText==0){
            $('#contenidoNoticias').html("");
              accionNoExitosa("ENCONTRARON RESULTADOS");
          }else{
            $('#contenidoNoticias').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
        }
      );
      });

}

function buscarFechaNoticiaReporte(){
  var fecha1=document.getElementById("fechaBuscar").value;
  $('#contenidoNoticias').html("");
  $('#contenidoNoticias2').html("");
      $(document).ready(function () {
        $.post('../Business/Noticias/noticiaAction.php', {
          accion: "buscarFechaNoticiaReporte",
          fecha:fecha1
        },
        function (responseText){
          if(responseText==0){
            $('#contenidoNoticias').html("");
            $('#contenidoNoticias2').html("");
              accionNoExitosa("ENCONTRARON RESULTADOS");
          }else{
            $('#contenidoNoticias').html(responseText);
            $('#contenidoNoticias2').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
        }
      );
      });

}


//----------------------------------------------VALIDACION DE LOS FORMLARIOS DE NOTICIAS------------------------------------------------------
var fotoCargada=0;
var fotoCargada2=0;
function validarInputFile(f){
    var ext=['gif','jpg','jpeg','png'];
    var v=f.value.split('.').pop().toLowerCase();

    for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==v){
          document.getElementById("foto1").innerHTML="";
          fotoCargada=1;
          return

        }

    }

    var t=f.cloneNode(true);
    t.value='';
    f.parentNode.replaceChild(t,f);
    fotoCargada=0;
    document.getElementById("foto1").innerHTML="formato invalido"
}


function validarInputTitulo(input){
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
  document.getElementById("titulo1").innerHTML="";

  } else {
      document.getElementById("titulo1").innerHTML="Valores invalidos";
      with (input.style) {
      borderColor="#FA5858";
      borderWidth = "3px";
      borderStyle = "solid";
      }
  }
}




function validarInputNoticia(input){
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
  document.getElementById("noticia1").innerHTML="";

  } else {
      document.getElementById("noticia1").innerHTML="Valores invalidos";;
      with (input.style) {
      borderColor="#FA5858";
      borderWidth = "3px";
      borderStyle = "solid";
      }
  }
}


function habilitarRegistroNoticia(){
  var titilo;
  var noticia;

    titilo=document.getElementById('temaAnuncio1').style;
    noticia=document.getElementById('detalleAnuncio1').style;

  var correcto="rgb(129, 247, 159)";
    if(titilo.borderColor == correcto && noticia.borderColor == correcto){
      if(fotoCargada==1){
        document.getElementById("registarNoticia1").disabled=false;
        fotoCargada=0;
      }
    }else{
      document.getElementById("registarNoticia1").disabled=true;
    }
}


function validarInputFile2(f){
    var ext=['gif','jpg','jpeg','png'];
    var v=f.value.split('.').pop().toLowerCase();

    for(var i=0,n;n=ext[i];i++){
        if(n.toLowerCase()==v){
          document.getElementById("foto2").innerHTML="";
          fotoCargada2=1;
          return
        }

    }

    var t=f.cloneNode(true);
    t.value='';
    f.parentNode.replaceChild(t,f);
    fotoCargada2=0;
    document.getElementById("foto2").innerHTML="formato invalido"
}

function validarInputTitulo2(input){
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
  document.getElementById("titulo2").innerHTML="";

  } else {
      document.getElementById("titulo2").innerHTML="Valores invalidos";;
      with (input.style) {
      borderColor="#FA5858";
      borderWidth = "3px";
      borderStyle = "solid";
      }
  }
}


function validarInputNoticia2(input){
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
  document.getElementById("noticia2").innerHTML="";

  } else {
      document.getElementById("noticia2").innerHTML="Valores invalidos";;
      with (input.style) {
      borderColor="#FA5858";
      borderWidth = "3px";
      borderStyle = "solid";
      }
  }
}

function habilitarRegistroNoticia2(){
  var titilo;
  var noticia;

    titilo=document.getElementById('temaAnuncio2').style;
    noticia=document.getElementById('detalleAnuncio2').style;

  var correcto="rgb(129, 247, 159)";
    if(titilo.borderColor == correcto && noticia.borderColor == correcto){
        document.getElementById("editarNoticia1").disabled=false;
    }else{
      document.getElementById("editarNoticia1").disabled=true;
    }
}

function validarInputComentario(input){
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
  document.getElementById("comentarioSpan").innerHTML="";

  } else {
      document.getElementById("comentarioSpan").innerHTML="Valores invalidos";;
      with (input.style) {
      borderColor="#FA5858";
      borderWidth = "3px";
      borderStyle = "solid";
      }
  }
}



function habilitarRegistroComentario(){
  var comentario=document.getElementById('comentarioN').style;

  var correcto="rgb(129, 247, 159)";
    if(comentario.borderColor == correcto){
        document.getElementById("publicarComentario1").disabled=false;
    }else{
      document.getElementById("publicarComentario1").disabled=true;
    }
}
