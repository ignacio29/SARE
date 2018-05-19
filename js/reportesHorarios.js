//----------------FUNCIONES PARA REPORTES DE HORARIOS DE CLASES------------------------------



function verReporteHorarioClases(){
  $(document).ready(function () {
    $('#contenidoReporteHorarioClases').html("");
    $('#contenidoReporteHorarioClases2').html("");
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "verReporteHorarioClases"
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
         // $('#contenidoReporteHorarioClases').html(responseText);
           $('#contenidoReporteHorarioClases').html(responseText);
          $('#contenidoReporteHorarioClases2').html(responseText);

        }else {
          //$('#contenidoReporteHorarioClases').html("");
          $('#contenidoReporteHorarioClases').html("");
          accionValoresNulos('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });

      }
    );
  });
}


function reporteHorariosClasesCarrera(valorClases){
 // var carreras=document.getElementById("carreras").value;
  $(document).ready(function () {
    $('#contenidoReporteHorarioClases').html("");
    $('#contenidoReporteHorarioClases2').html("");
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "reporteHorariosClasesCarrera",
        carrera: valorClases
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#contenidoReporteHorarioClases').html(responseText);
          $('#contenidoReporteHorarioClases2').html(responseText);
        }else {
          $('#contenidoReporteHorarioClases').html("");
          $('#contenidoReporteHorarioClases2').html("");
          accionValoresNulos('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });
}

function reportarHorarioEstuPalabra(){

  var ced=document.getElementById("buscarCedula").value;
  $(document).ready(function () {
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "reportarHorarioEstuPalabra",
        cedula: ced
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#contenidoReporteHorarioClases').html(responseText);
        }else {
          $('#contenidoReporteHorarioClases').html("");
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });
}



//----------------FUNCIONES PARA REPORTES DE HORARIOS DE LIMPIEZA-----------------------------


function verReporteHorarioLimpieza(){ 
    $('#reporteHorariosLimpieza2').html("");
     $('#reporteHorariosLimpieza').html("");
  $(document).ready(function () {
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "verReporteHorarioLimpieza"
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#reporteHorariosLimpieza').html(responseText);
          $('#reporteHorariosLimpieza2').html(responseText);
        }else {
          $('#reporteHorariosLimpieza').html("");
          accionNoExitosa('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });
}

 


function reporteHorarioLimpiezaAreas(valorLimpieza){
    $('#reporteHorariosLimpieza').html("");
  //var areas=document.getElementById("areas").value;
  $(document).ready(function () {
     $('#reporteHorariosLimpieza2').html("");
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "reporteHorarioLimpiezaAreas",
        area: valorLimpieza
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#reporteHorariosLimpieza').html(responseText);
           $('#reporteHorariosLimpieza2').html(responseText);
        }else {
         $('#reporteHorariosLimpieza').html("");
          $('#reporteHorariosLimpieza2').html("");
          accionValoresNulos('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });

}

function reporteHorarioLimpiezaDias(valorLimpieza){
   $('#reporteHorariosLimpieza').html("");
  //var dias=document.getElementById("diasLimpieza").value;
  //alert(dias);
  $(document).ready(function () {
     $('#reporteHorariosLimpieza2').html("");
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "reporteHorarioLimpiezaDias",
        dias: valorLimpieza
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#reporteHorariosLimpieza').html(responseText);
           $('#reporteHorariosLimpieza2').html(responseText);
        }else {
         $('#reporteHorariosLimpieza').html("");
          $('#reporteHorariosLimpieza2').html("");
          accionValoresNulos('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });

}


function reporteHorarioLimpiezaJornadas(valorLimpieza){
    $('#reporteHorariosLimpieza').html("");
  //var jornadas=document.getElementById("jornadasLimpieza").value;
  //alert(jornadas);
  $(document).ready(function () {
     $('#reporteHorariosLimpieza2').html("");
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "reporteHorarioLimpiezaJornadas",
        jornadas: valorLimpieza
      },
      function (responseText){
        //alert(responseText);
        if(responseText!="Error" && responseText !=""){
           $('#reporteHorariosLimpieza2').html(responseText);
          $('#reporteHorariosLimpieza').html(responseText);
        }else {
          $('#reporteHorariosLimpieza').html("");
           $('#reporteHorariosLimpieza2').html("");
          accionValoresNulos('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });

}



//----------------FUNCIONES PARA REPORTES DE HORARIOS DE LAVANDERIA------------------------------


function verReporteHorarioLavanderia(){
  $(document).ready(function () {
     $('#reporteHorariosLavanderia2').html("");
    $('#reporteHorariosLavanderia').html("");
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "verReporteHorarioLavanderia"
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#reporteHorariosLavanderia').html(responseText);
           $('#reporteHorariosLavanderia2').html(responseText);
        }else {
          $('#reporteHorariosLavanderia').html("");
          $('#reporteHorariosLavanderia2').html("");
          accionNoExitosa('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });
}
 
 
function reporteHorarioLavanderiaDias(valor){

 // var dias=document.getElementById("dias").value;
  $(document).ready(function () {
     $('#reporteHorariosLavanderia').html("");
    $('#reporteHorariosLavanderia2').html("");
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "reporteHorarioLavanderiaDias",
        dias: valor
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
          $('#reporteHorariosLavanderia').html(responseText);
          $('#reporteHorariosLavanderia2').html(responseText);
        }else {
         $('#reporteHorariosLavanderia').html("");
         $('#reporteHorariosLavanderia2').html("");
          accionNoExitosa('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });

}


function reporteHorarioLavanderiaJornada(valor){
  
 // var jornadas=document.getElementById("jornadas").value;
  $(document).ready(function () {
     $('#reporteHorariosLavanderia').html("");
     $('#reporteHorariosLavanderia2').html("");
      $.post('../Business/ReporteHorarios/reporteHorariosAction.php', {
        accion: "reporteHorarioLavanderiaJornadas",
        jornadas: valor
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
         $('#reporteHorariosLavanderia').html(responseText);
         $('#reporteHorariosLavanderia2').html(responseText);
        }else {
          $('#reporteHorariosLavanderia').html("");
          $('#reporteHorariosLavanderia2').html("");
          accionNoExitosa('ENCONTRARON REGISTROS');
        }

          $("#mytable").paginationTdA({
            elemPerPage: 8
          });
      }
    );
  });

}


//----------------Ver datos DE uSUARIO-----------------------------
var datosUsuario;

function verDatosReporte(){
  $(document).ready(function () {
      $.post('../Business/Estudiante/usuariosAction.php', {
        accion: "verDatosReporte"
      },
      function (responseText){
        if(responseText!="Error" && responseText !=""){
         // alert(responseText);
          //document.getElementById('datosUsuario').value=responseText;
        //  $('#datosUsuario').html(responseText);
        datosUsuario=responseText;
        }else { 

        }

      }
    );
  });
}
//----------------funcion imprime reporte------------------------------
function imprimirReportePdf(reporte){
var f = new Date();
var doc = new jsPDF('landscape');

var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
  if(reporte=='Limpieza'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General Horario de Limpieza');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170, 'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Lavanderia'){

doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General Horario de Lavander\u00EDa');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Clases'){

doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General Horario de Clases');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Articulos'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General de Art\u00EDculos');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Danado'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General de Art\u00EDculos Da\u00F1ado');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Personales'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General de Art\u00EDculos Personales');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Institucional'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General de Art\u00EDculos Intitucionales');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Deficiente'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General de Art\u00EDculos Deficientes');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Noticia'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General de Noticias');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Residente'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General de Estudiantes');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por:'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";

}else if(reporte=='Asistente'){
doc.text(120,20, 'Universidad Nacional');
doc.text(80,30, 'Sistema de Administraci\u00F3n de Residencias Estudiantiles');
doc.text(110,40, 'Reporte General de Asistentes');
doc.text(5, 60, 'Sede:Sarapiqu\u00ED');
doc.text(230, 60, 'Fecha:'+f.getDate() + "/" + (f.getMonth()+1) + "/" + f.getFullYear());
doc.text(5, 70, 'Solicitado Por'+datosUsuario);
document.getElementById('testDiv').style="display:block";
doc.fromHTML($('#testDiv').html(), 40,75,{'width':170,'elementHandlers': specialElementHandlers});
document.getElementById('testDiv').style="display:none";
}


doc.save('Reporte');

}
