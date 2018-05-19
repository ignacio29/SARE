var idModificar;

function agregarArticulo() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'agregarArticulo',
            nombre:document.getElementById('nombre').value,
            serie: document.getElementById('serie').value,
            tipo:  document.getElementById('tipo').value,
            descripcion: document.getElementById('descripcion').value,
            estado: document.getElementById('estado').value,

        },
          function (responseText) {
            var cerr=document.getElementById("cerrarRegistro1").click();
            mostrarArticulos();
            if(responseText==1){
               accionExitosa("REGISTRÓ EL ARTICULO");
             }else {
               accionNoExitosa("REGISTRÓ EL ARTICULO");
             }
        });
          });
}


function limpiarModalArtiIns(){
  document.getElementById('nombre').value="";
  document.getElementById('serie').value="";
  document.getElementById('tipo').selectedIndex=0;
  document.getElementById('descripcion').value="";
  estado: document.getElementById('estado').selectedIndex=0;
}

function limpiarModalMisArt(){
  document.getElementById('nombre').value="";
  document.getElementById('serie').value="";
  document.getElementById('tipo').selectedIndex=0;
  document.getElementById('descripcion').value="";
  estado: document.getElementById('estado').selectedIndex=0;
}


function agregarArticuloInstitucional() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'agregarArticulo',
            nombre:document.getElementById('nombre').value,
            serie: document.getElementById('serie').value,
            tipo:  document.getElementById('tipo').value,
            descripcion: document.getElementById('descripcion').value,
            estado: document.getElementById('estado').value,

        },
                function (datos) {

                    var cerr=document.getElementById("cerrarRegistroArticuloInstitucional").click();
                          if(datos==1){
                            mostrarArticulosInstitucionales();
                            accionExitosa('REGISTRO EL ARTICULO');
                          }else {
                            accionNoExitosa('REGISTRO EL ARTICULO');
                          }
                    });
                });
}

function mostrarArticulos() {
   
    $(document).ready(function() {
      $('#contenidoArticulosE2').html("");
      $('#contenidoArticulosE').html("");
        $.post('../Business/Articulos/articulosAction.php', {
            accion: 'mostrarArticulo'
        },
        function (responseText) {
            if(responseText=== 'Error'){
               $('#contenidoArticulosE').html("");
            }else{
                $('#contenidoArticulosE').append(responseText);
                $('#contenidoArticulosE2').html(responseText);
            }
            $("#mytable").paginationTdA({
              elemPerPage: 8
            });
        });
    });
}

function mostrarArticulosInstitucionales() {
    $(document).ready(function() {
        $('#contenidoArticulos2').html("");
        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'mostrarArticuloInstitucional',
        },
                function (responseText) {
                    //alert(responseText);
                      $('#contenidoArticulos').html(responseText);
                      $('#contenidoArticulos2').html(responseText);
                      $("#mytable").paginationTdA({
                        elemPerPage: 8
                      });

                });
    });
}

function mostrarArticulosPersonales() {
    $(document).ready(function() {
      $('#contenidoArticulos2').html("");
        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'mostrarArticuloPersonal',
        },
                function (responseText) {
                    //alert(responseText);
                      $('#contenidoArticulos').html(responseText);
                      $('#contenidoArticulos2').html(responseText);
                      $("#mytable").paginationTdA({
                        elemPerPage: 8
                      });

                });
    });
}



var idarticuloEliminarInst;
function eliminarArticulo(input){
  idarticuloEliminarInst=input;
}

var idarticuloEliminarEst;
function eliminarArticuloEst(input){
  idarticuloEliminarEst=input;
}




function eliminarArticuloEstudiante() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'eliminarArticulo',
            id:idarticuloEliminarEst
        },
                function (responseText) {
                    document.getElementById("cerrar3").click();
                    mostrarArticulos();
                  if(responseText==1){
                    accionExitosa("ELIMINO EL ARTICULO");
                  }else {
                      accionNoExitosa("ELIMINO EL ARTICULO");
                  }


                });
    });
}

function eliminarArticuloInstitucional() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'eliminarArticulo',
            id:idarticuloEliminarInst,
        },
                function (responseText) {
                  document.getElementById("cerrar3").click();
                    mostrarArticulosInstitucionales();
                  if(responseText==1){
                    accionExitosa("ELIMINO EL ARTICULO");
                  }else {
                      accionNoExitosa("ELIMINO EL ARTICULO");
                  }

                });
    });
}

function consultarArticulo() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'consultarArticuloId',
            id: idModificar,

        },
                function (responseText) {
                    //alert(idModificar);
                    //alert(responseText);
                    json = JSON.parse(responseText);
                    document.getElementById("nombre").value=json[0].nombrearticulo;
        	          document.getElementById("serie").value=json[0].seriearticulo;
                    document.getElementById("tipo").value=json[0].tipoarticulo;
                    document.getElementById("descripcion").value=json[0].descripcionarticulo;
                    document.getElementById("estado").value=json[0].estadoarticulo;
                    document.getElementById("aprobar").value=json[0].aprobararticulo
                });
    });
}



function cargarVistaModificarArticulo(id) {
              idModificar=id;
             var  nombrearticulo = document.getElementById("nombrearticulo"+id).innerHTML;
             var seriearticulo = document.getElementById("seriearticulo"+id).innerHTML;
             var tipoarticulo = document.getElementById("tipoarticulo"+id).innerHTML;
             var descripcionarticulo = document.getElementById("descripcionarticulo"+id).innerHTML;
             var estadoarticulo = document.getElementById("estadoarticulo"+id).innerHTML;

             //alert(estadoarticulo);

             document.getElementById("nombre2").value = nombrearticulo;
             document.getElementById("serie2").value = seriearticulo;

             var selectTipo = document.getElementById("tipo2");//llamo al select

                if (tipoarticulo === "ELECTRONICO") {
                    //selectTipo.options[1].setAttribute("selected", "true");
                    document.getElementById("tipo2").selectedIndex=0;

                } else if (tipoarticulo === "COCINA") {
                    //selectTipo.options[2].setAttribute("selected", "true");
                    document.getElementById("tipo2").selectedIndex=1;

                } else if (tipoarticulo === "TECNOLOGICO") {
                    //selectTipo.options[3].setAttribute("selected", "true");
                    document.getElementById("tipo2").selectedIndex=2;

                }

                document.getElementById("descripcion2").value = descripcionarticulo;

                var selectEstado = document.getElementById("estado2");//llamo al select

                if (estadoarticulo === "BUENO") {
                    //selectEstado.options[0].setAttribute("selected", "true");
                    document.getElementById("estado2").selectedIndex=0;

                } else if (estadoarticulo === "REGULAR") {
                   // selectEstado.options[1].setAttribute("selected", "true");
                    document.getElementById("estado2").selectedIndex=1;

                } else if (estadoarticulo === "DEFICIENTE") {
                    //selectEstado.options[2].setAttribute("selected", "true");
                    document.getElementById("estado2").selectedIndex=2;

                }

}

function modificarArticulo() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'modificarArticulo',
            id:idModificar,
            nombre:document.getElementById('nombre2').value,
            serie: document.getElementById('serie2').value,
            tipo:  document.getElementById('tipo2').value,
            descripcion: document.getElementById('descripcion2').value,
            estado: document.getElementById('estado2').value,
            //aprobar: document.getElementById('aprobar').value,
        },
                function (responseText) { 
                    var cerr=document.getElementById("cerrarRegistro2").click();
                    mostrarArticulos();
                    if (responseText==1) {
                      accionExitosa("ACTUALIZÓ EL ARTICULO");
                    }else {
                      accionNoExitosa("ACTUALIZÓ EL ARTICULO");
                    }

                });
    });
}

function modificarArticuloInstitucional() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'modificarArticuloInstitucional',
            id:idModificar,
            nombre:document.getElementById('nombre2').value,
            serie: document.getElementById('serie2').value,
            tipo:  document.getElementById('tipo2').value,
            descripcion: document.getElementById('descripcion2').value,
            estado: document.getElementById('estado2').value,
            
        },
                function (responseText) {
                    var cerr=document.getElementById("cerrarModificarArticuloInstitucional").click();
                    mostrarArticulosInstitucionales(); 
                    if (responseText==1) {
                      accionExitosa("ACTUALIZÓ EL ARTICULO");
                    }else {
                      accionNoExitosa("ACTUALIZÓ EL ARTICULO");
                    }

                });
    });
}

function modificarArticuloPersonal() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'modificarArticuloPersonal',
            id:idModificar,
            nombre:document.getElementById('nombre2').value,
            serie: document.getElementById('serie2').value,
            tipo:  document.getElementById('tipo2').value,
            descripcion: document.getElementById('descripcion2').value,
            estado: document.getElementById('estado2').value,
            aprobar: $('input[name=gender]:checked').val(),
        },
                function (responseText) {
                    var cerr=document.getElementById("botonCerrarModalPersonal").click();
                    mostrarArticulosPersonales();
                    if (responseText==1) {
                      accionExitosa("ACTUALIZÓ EL ARTICULO");
                    }else {
                      accionNoExitosa("ACTUALIZÓ EL ARTICULO");
                    }

                });
    });
}


function aprobarArticulo(input){
  $(document).ready(function () {
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'aprobarArticulo',
          id:input
      },
        function (responseText) {
          mostrarArticulosPersonales();
          if (responseText==1) {
            accionExitosa("APROBÓ EL ARTICULO");
          }else {
            accionNoExitosa("APROBÓ EL ARTICULO");
          }

        });
  });
}


//---------------------------------------FILTRO ARTICULOS INSTITUCIONALES VISTA ADMINISTRATIVA----------------------------------------

function filtrarComboArticulosInstitucionales(input){
  if(input==='TODOS'){
    mostrarArticulosInstitucionales();
  }else if (input==='ELECTRONICO' || input==='COCINA' || input==='TECNOLOGICO') {
    buscarTipoArticulos(input);
  }else if (input==='BUENO' || input==='REGULAR' || input==='DEFICIENTE') {
    buscarEstadoArticulos(input);
  }

}




function buscarTipoArticulos(input){
  $(document).ready(function () {
     $('#contenidoArticulos2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarPorTipoArticulos',
          tipo:input
      },
        function (responseText) {
          if (responseText=== 'Error') {
            $('#contenidoArticulos').html("");
             $('#contenidoArticulos2').html("");
          }else {
            $('#contenidoArticulos').html(responseText);
             $('#contenidoArticulos2').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });

        });
  });
}

function buscarEstadoArticulos(input){
  $(document).ready(function () {
     $('#contenidoArticulos2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarPorEstadoArticulos',
          estado:input
      },
        function (responseText) {
          if (responseText=== 'Error') {
            $('#contenidoArticulos').html("");
             $('#contenidoArticulos2').html("");
          }else {
            $('#contenidoArticulos').html(responseText);
             $('#contenidoArticulos2').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
        });
  });
}


function buscarPalabra(){
  $(document).ready(function () {
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarPalabra',
          cedula: document.getElementById("palabraBuscar").value,
      },
              function (responseText) {
                if(responseText==='Error'){
                    $('#contenidoArticulos').html("");
                }else {
                  $('#contenidoArticulos').html(responseText);
                }
                $("#mytable").paginationTdA({
                  elemPerPage: 8
                });
              });
  });
}



//---------------------------------------FILTRO ARTICULOS PERSONALES VISTA ADMINISTRATIVA----------------------------------------
function filtrarComboArticulosPersonales(input){
  if(input==='TODOS'){
    mostrarArticulosPersonales();
  }else if (input==='ELECTRONICO' || input==='COCINA' || input==='TECNOLOGICO') {
    buscarTipoArticulosP(input);
  }else if (input==='BUENO' || input==='REGULAR' || input==='DEFICIENTE') {
    buscarEstadoArticulosP(input);
  }else if (input=== 'APROBADOS') {
    buscarAprobadosArticulosP(input);
  }

}




function buscarTipoArticulosP(input){
  $(document).ready(function () {
     $('#contenidoArticulos2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarPorTipoArticulosP',
          tipo:input
      },
        function (responseText) {
          if (responseText=== 'Error') {
            $('#contenidoArticulos').html("");
            $('#contenidoArticulos2').html("");
          }else {
            $('#contenidoArticulos').html(responseText);
            $('#contenidoArticulos2').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });

        });
  });
}

function buscarEstadoArticulosP(input){
  $(document).ready(function () {
    $('#contenidoArticulos2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarPorEstadoArticulosP',
          estado:input
      },
        function (responseText) {
          if (responseText=== 'Error') {
            $('#contenidoArticulos').html("");
            $('#contenidoArticulos2').html("");
          }else {
            $('#contenidoArticulos').html(responseText);
            $('#contenidoArticulos2').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
        });
  });
}

function buscarAprobadosArticulosP(input){
  $(document).ready(function () {
    $('#contenidoArticulos2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarAprobadosArticulosP'
      },
        function (responseText) {
          if (responseText=== 'Error') {
            $('#contenidoArticulos').html("");
            $('#contenidoArticulos2').html("");
          }else {
            $('#contenidoArticulos').html(responseText);
            $('#contenidoArticulos2').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
        });
  });
}



function buscarPalabraP(){
  $(document).ready(function () {
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarPalabraP',
          cedula: document.getElementById("palabraBuscar").value,
      },
              function (responseText) {
                if(responseText==='Error'){
                    $('#contenidoArticulos').html("");
                }else {
                  $('#contenidoArticulos').html(responseText);
                }
                $("#mytable").paginationTdA({
                  elemPerPage: 8
                });
              });
  });
}





//---------------------------------------FILTRO ARTICULOS PERSONALES VISTA ESTUDIANTE----------------------------------------
function filtrarComboArticulosEstudiante(input){
  if(input==='TODOS'){
    mostrarArticulos();
  }else if (input==='ELECTRONICO' || input==='COCINA' || input==='TECNOLOGICO') {
    buscarTipoArticulosEs(input);
  }else if (input==='BUENO' || input==='REGULAR' || input==='DEFICIENTE') {
    buscarEstadoArticulosEs(input);
  }

}




function buscarTipoArticulosEs(input){
  $(document).ready(function () {
     $('#contenidoArticulosE2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarTipoArticulosEs',
          tipo:input
      },
        function (responseText) {
          if (responseText=== 'Error') {
            $('#contenidoArticulosE').html("");
             $('#contenidoArticulosE2').html("");
          }else {
            $('#contenidoArticulosE').html(responseText);
             $('#contenidoArticulosE2').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });

        });
  });
}

function buscarEstadoArticulosEs(input){
  $(document).ready(function () {
     $('#contenidoArticulosE2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarEstadoArticulosEs',
          estado:input
      },
        function (responseText) {
          if (responseText=== 'Error') {
            $('#contenidoArticulosE').html("");
             $('#contenidoArticulosE2').html("");
          }else {
            $('#contenidoArticulosE').html(responseText);
             $('#contenidoArticulosE2').html(responseText);
          }
          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
        });
  });
}


function buscarPalabraEs(){
  $(document).ready(function () {
      $.post('../Business/Articulos/articulosAction.php', {
          accion: 'buscarPalabraEs',
          cedula: document.getElementById("palabraBuscar").value,
      },
              function (responseText) {
                if(responseText==='Error'){
                    $('#contenidoArticulosE').html("");
                }else {
                  $('#contenidoArticulosE').html(responseText);
                }
                $("#mytable").paginationTdA({
                  elemPerPage: 8
                });
              });
  });
}



////////////////////Reportar Articulo Dandado////////////////
function reportarArticuloDanado() {
    $(document).ready(function() {
      $('#contenidoArticulos2').html("");
       $('#contenidoArticulos').html("");
        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'reportarArticuloDanado',
        },
        function (responseText) {
                    //alert(responseText);
        //  $('#contenidoArticulos').html(responseText);
            if(responseText!="Error" && responseText !=""){
          $('#contenidoArticulos').html(responseText);
          $('#contenidoArticulos2').html(responseText);
        }else {
          $('#contenidoArticulos').html("");
          $('#contenidoArticulos2').html("");
          accionValoresNulos("ENCONTRARON REGISTROS");

        }
        $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      });
    });
}
var id = 0;
function insertarArticulo(idarticulo) {

    id = idarticulo;

}
///////////////////////////////Agregar Articulo Danado////////////////////////////
 function insertarArticuloDanado() {
  //  $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'insertarArticuloDanado',
            descripcion: document.getElementById("descripcion").value,
             idarticulo: id,
        },
                function (responseText) {
                 if(responseText==1 ){

                     document.getElementById("cerrar1").click();

                    reportarArticuloDanado();
                    accionExitosa("REPORTO EL ARTÍCULO");
                }else{
                   accionNoExitosa("REPORTO EL ARTÍCULO");
                 }


                }
                );
   // });
}

///////////////////////////CAMBIAR ESTADO DEL ARTICULO////////////////////////////
function CambiarEstadoArticulo() {
    $(document).ready(function () {

        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'CambiarEstadoArticulo',
             idarticulo: id,
        },
                function (responseText) {
                    reportarArticuloDanado();
                });
    });
}



////////////////////FILTRO CLASE INSTITUCIONAL///////////////////////////////
function filtroClaseInstitucionalArticulo(valor){
 // var carreras=document.getElementById("carreras").value;
  $(document).ready(function () {
     $('#contenidoArticulos').html("");
     $('#contenidoArticulos2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
        accion: "filtroClaseInstitucionalArticulo",
        clase: valor
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#contenidoArticulos').html(responseText);
          $('#contenidoArticulos2').html(responseText);
        }else {
           $('#contenidoArticulos').html("");
           $('#contenidoArticulos2').html("");
         accionValoresNulos("ENCONTRARON REGISTROS");
        }
         $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });
}


////////////////////FILTRO CLASE PERSONAL///////////////////////////////
function filtroClasePersonalArticulo(valorPersonal){
 // var carreras=document.getElementById("carreras").value;
  $(document).ready(function () {
     $('#contenidoArticulos').html("");
     $('#contenidoArticulos2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
        accion: "filtroClasePersonalArticulo",
        clase: valorPersonal
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
           $('#contenidoArticulos').html(responseText);
           $('#contenidoArticulos2').html(responseText);
        }else {
           $('#contenidoArticulos').html("");
           $('#contenidoArticulos2').html("");
          accionValoresNulos("ENCONTRARON REGISTROS");

        }
         $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });
}



////////////////////FILTRO tipo de articulo///////////////////////////////
function filtroTipoArticuloDeficiente(valor){
 // var carreras=document.getElementById("carreras").value;
  $(document).ready(function () {
     $('#contenidoArticulos').html("");
     $('#contenidoArticulos2').html("");
      $.post('../Business/Articulos/articulosAction.php', {
        accion: "filtroTipoArticuloDeficiente",
        tipo: valor
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
           $('#contenidoArticulos').html(responseText);
           $('#contenidoArticulos2').html(responseText);
        }else {
           $('#contenidoArticulos').html("");
           $('#contenidoArticulos2').html("");
          accionValoresNulos("ENCONTRARON REGISTROS");

        }
         $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });
}
////////////////////BUSQUEDA POR PALABRA///////////////////////////////
function busquedaReportarArticuloDeficiente(){
var palabraBuscar=document.getElementById("palabraBuscar").value;
    $(document).ready(function () {
      $.post('../Business/Articulos/articulosAction.php', {
        accion: "busquedaReportarArticuloDeficiente",
        palabra:palabraBuscar
      },
      function (responseText){
        if(responseText==0){
        //  alert(responseText);
        $('#contenidoArticulos').html(responseText);
        }else{
          $('#contenidoArticulos').html(responseText);
        }
         $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      });
    });
}



////////////////////ARticulos deficientes////////////////
function verArticulosDeficientes() {
 
    $(document).ready(function() {
       $('#contenidoArticulos2').html("");
       $('#contenidoArticulos').html("");
        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'verArticulosDeficientes',
        },
        function (responseText) {
                    //alert(responseText);
        //  $('#contenidoArticulos').html(responseText);
            if(responseText!="Error" && responseText !=""){
          $('#contenidoArticulos').html(responseText);
            $('#contenidoArticulos2').html(responseText);
        }else {
           $('#contenidoArticulos').html("");
           $('#contenidoArticulos2').html("");
         accionValoresNulos("ENCONTRARON REGISTROS");
        }
       $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      });
    });
}


////////////////////ARticulos deficientes filtro claSe////////////////
function filtroClaseArticuloDeficiente(valor) {

    $(document).ready(function() {
        $('#contenidoArticulos').html("");
        $('#contenidoArticulos2').html("");
        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'filtroClaseArticuloDeficiente',
            clase:valor
        },
        function (responseText) {
                    //alert(responseText);
        //  $('#contenidoArticulos').html(responseText);
            if(responseText!="Error" && responseText !=""){
          $('#contenidoArticulos').html(responseText);
          $('#contenidoArticulos2').html(responseText);
        }else {
        $('#contenidoArticulos').html("");
        $('#contenidoArticulos2').html("");
          accionValoresNulos("ENCONTRARON REGISTROS");
        }
         $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      });
    });
}


////////////////////ARticulos deficientes filtro Tipo////////////////
function filtroTipoArticuloDeficienteAd(valor) {
    $(document).ready(function() {
        $('#contenidoArticulos').html("");
        $('#contenidoArticulos2').html("");
        $.post('../Business/Articulos/articulosAction.php', {

            accion: 'filtroTipoArticuloDeficienteAd',
            tipo:valor
        },
        function (responseText) {
                    //alert(responseText);
        //  $('#contenidoArticulos').html(responseText);
            if(responseText!="Error" && responseText !=""){
          $('#contenidoArticulos').html(responseText);
          $('#contenidoArticulos2').html(responseText);

        }else {
         $('#contenidoArticulos').html("");
         $('#contenidoArticulos2').html("");
          accionValoresNulos("ENCONTRARON REGISTROS");
        }
        $("#mytable").paginationTdA({
            elemPerPage: 8
        });
      });
    });
}
////////////////////BUSQUEDA POR PALABRA///////////////////////////////
function busquedaArticulosDeficientesAd(){
var palabraBuscar=document.getElementById("palabraBuscar").value;
    $(document).ready(function () {
      $.post('../Business/Articulos/articulosAction.php', {
        accion: "busquedaArticulosDeficientesAd",
        palabra:palabraBuscar
      },
      function (responseText){
        if(responseText==0){
        //  alert(responseText);
        $('#contenidoArticulos').html(responseText);
        }else{
          $('#contenidoArticulos').html(responseText);
        }
       $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      });
    });
}

///////////////////ELIMINAR ARTICULO DEFICIENTE////////////////////
var idEliminar = 0;
function eliminar(idarticulo) {

    idEliminar = idarticulo;

}
function eliminarArticuloDeficiente() {

    $.post('../Business/Articulos/articulosAction.php', {

        accion: 'eliminarArticuloDeficiente',
        idborrar: idEliminar,

    },
            function (responseText) {
//alert(responseText);
                if(responseText==1){
                  //alert(responseText);
                    document.getElementById("cerrar3").click();
                    verArticulosDeficientes();
                    accionExitosa("ELIMINÓ EL ARTÍCULO");
                   }else{
                    accionNoExitosa("ELIMINÓ EL ARTÍCULO");
                   }
            });
}



/////////////////////Actualizar estado articulo////////////////
function updateEstadoArticuloDeficiente(valor,valor2) {

    $.post('../Business/Articulos/articulosAction.php', {

        accion: 'updateEstadoArticuloDeficiente',
        idactualizar: valor,
        idEliminar: valor2

    },
            function (responseText) {
                if(responseText==1){


                    verArticulosDeficientes();
                    accionExitosa("RESTAURO EL ARTÍCULO");
                   }else{
                    accionNoExitosa("RESTAURO EL ARTÍCULO");
                   }
            });
}


/////////////////////Eliminar articulo despues de actualizar////////////////
function deleteArticuloDeficiente() {

    $.post('../Business/Articulos/articulosAction.php', {

        accion: 'deleteArticuloDeficiente',


    },
            function (responseText) {
                if(responseText==1){


                    verArticulosDeficientes();
                   }else{

                   }
            });
}


function validarInputNombre(input){
  var contenido=input.value;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if(input.value.length > 0) {
    with (input.style) {
        borderColor="#81F79F";
        borderWidth = "3px";
        borderStyle = "solid";
    }
  document.getElementById("nombre").innerHTML="";

  } else {
      document.getElementById("nombre").innerHTML="campo vacio";
      with (input.style) {
      borderColor="#FA5858";
      borderWidth = "3px";
      borderStyle = "solid";
      }
  }
}

function validarInputSerie(input){
  var contenido=input.value;
  //Se muestra un texto a modo de ejemplo, luego va a ser un icono
  if (!/^([0-9])*$/.test(contenido)){
    with (input.style) {
      document.getElementById("serie").innerHTML="campo vacio";
      borderColor="#FA5858";
      borderWidth = "3px";
      borderStyle = "solid";
    }
  document.getElementById("serie").innerHTML="";

  } else {
     with (input.style) {
      borderColor="#81F79F";
      borderWidth = "3px";
      borderStyle = "solid";
      }
}
}

function habilitarRegistroArticulo(){
  var nombre;
  var serie;
  var descripcion;

    nombre=document.getElementById('nombre').style;
    serie=document.getElementById('serie').style;
    descripcion= document.getElementById('descripcion').style;

  var correcto="rgb(129, 247, 159)";
    if(nombre.borderColor == correcto && serie.borderColor == correcto && descripcion.borderColor == correcto){
        //if(correcto=="rgb(129, 247, 159)"){
        document.getElementById("registrarArticulo1").disabled=false;
    }else{
      document.getElementById("registrarArticulo1").disabled=true;
    }
}
