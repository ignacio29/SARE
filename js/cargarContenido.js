
function cargaContenido() {
  $('#FormRegistro').load('view/Estudiante/registroEstudiante.php');
  document.getElementById("linkRegistro").click(); 
  }



function verificarSeccion(input) { 
  var divRegistro= document.getElementById("FormRegistro");
  var divMision= document.getElementById("mision");
  var divVision= document.getElementById("vision");
  var divHistoria= document.getElementById("historia");
  var divContactenos= document.getElementById("contactenos");

  if(input==='vision'){
    if(divMision.style.display==='block' || divContactenos.style.display==='block' ||
      divHistoria.style.display==='block' || divRegistro.style.display==='block' ) {

        divMision.style.display='none';
        divContactenos.style.display='none';
        divHistoria.style.display='none';
        divRegistro.style.display='none';
    }
    
    
    divVision.style.display='block';
  }
  else if(input==='mision'){
     if(divVision.style.display==='block' || divContactenos.style.display==='block' ||
      divHistoria.style.display==='block' || divRegistro.style.display==='block') {

        divVision.style.display='none';
        divContactenos.style.display='none';
        divHistoria.style.display='none';
        divRegistro.style.display='none';
    }


    divMision.style.display='block';
  }
  else if(input==='contactenos'){
     if(divVision.style.display==='block' || divMision.style.display==='block' ||
      divHistoria.style.display==='block' || divRegistro.style.display==='block') {

        divVision.style.display='none';
        divHistoria.style.display='none';
        divRegistro.style.display='none';
        divMision.style.display='none';
    }

    

    divContactenos.style.display='block';
  }
  else if(input==='historia'){
     if(divVision.style.display==='block' || divMision.style.display==='block' ||
      divContactenos.style.display==='block' || divRegistro.style.display==='block') {

        divVision.style.display='none';
        divContactenos.style.display='none';
        divRegistro.style.display='none';
        divMision.style.display='none';
    }

    

    divHistoria.style.display='block';
  }
  else if(input==='registrarme'){
     if(divVision.style.display==='block' || divMision.style.display==='block' ||
      divHistoria.style.display==='block' || divContactenos.style.display==='block') {

        divVision.style.display='none';
        divHistoria.style.display='none';
        divMision.style.display='none';
        divContactenos.style.display='none';

    }

    divRegistro.style.display='block';
  }
}
function cargaRegistroEstAdmin() {
    $('#contenido').load('Estudiante/registroEstudianteAdmin.php');
  }
function cargaRegistroAsisAdmin() {
    $('#contenido').load('Estudiante/registroAsistenteAdmin.php');
  }


function cargarInicioIndex() {
    $('#contenido').load('index.php');
  }

function cargarResidentes() {
  $('#contenido').load('../View/mostrarResidentes.php');
      verEstudiante();
  }
function cargarAsistentes() {
  $('#contenido').load('../View/mostrarAsistentes.php');
    verAsistente();
  }


function cargaContenidoVerArticulos() {
  $('#contenido').load('verArticulosViewEstudiante.php');
    mostrarArticulos();
  }

  function cargaContenidoVerArticulosDanados() {
  $('#contenido').load('verArticulosViewDanado.php');
    reportarArticuloDanado();
  }

function cargaContenidoVerArticulosPersonales() {
  $('#contenido').load('verArticulosViewAdministrador.php');
    mostrarArticulosPersonales();
  }

  function cargaContenidoVerArticulosDeficientes() {
  $('#contenido').load('verArticulosViewAdministradorDeficiente.php');
    verArticulosDeficientes();
  }

function cargaContenidoVerArticulosInstitucionales() {
  $('#contenido').load('verArticulosView.php');
    mostrarArticulosInstitucionales();
  }

//Parra Cargar Mensajes
function cargarMensajes(input){
  var asunto= input;
  $('#contenido').load('permisosAdministradorView.php');
  //document.getElementById("asuntoOculto").value=asunto;
  verTodosMensajes(asunto);

}
function cargarMensajesEstudiante(){
    $('#contenido').load('misPermisosEstudianteView.php');
    verMisMensajesEstudiante();
}

//Para cargarReporteHorarios
function cargarReporteHorariosClasesView(){
  $('#contenido').load('../View/reporteHorariosClasesView.php');
  verReporteHorarioClases();
}

function cargarReporteHorariosLimpiezaView(){
  $('#contenido').load('../View/reporteHorarioLimpiezaView.php');
  verReporteHorarioLimpieza();
}

function cargarReporteHorariosLavanderiaView(){
  $('#contenido').load('../View/reporteHorarioLavanderiaView.php');
  verReporteHorarioLavanderia();
}

//Parra Noticias
function cargarMisNoticias() {
  $('#contenido').load('../View/misNoticiasView.php');
      verMisNoticias();
      verMisNoticiasReporte();
  }
  function cargarTodasNoticias() {
    $('#contenido').load('../View/noticiaView.php');
    verTodasNoticias();

  }

//-------------------------------------
  function cargarHorarios() {

   $('#contenido').load('../View/mostrarHorarioClases.php');
   consultTBHhorario();
 }

   function cargarHorarioLimpieza() {

   $('#contenido').load('../View/mostrarHorarioLimpieza.php');
   consultTBHhorarioLimpieza();
 }

   function cargarHorarioLavanderia() {

   $('#contenido').load('../View/mostrarHorarioLavanderia.php');
   consultTBHhorarioLavanderia();
 }
 
