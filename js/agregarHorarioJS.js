function consultTBHhorario(){

    $(document).ready(function () {

        $.post('../Business/Horario/horarioAction.php', {
            accionHorario: "consultTBHhorario",

        },
        function (responseText){

        if(responseText!="Error" && responseText !=""){
          $('#contenidoHorarioClases').html(responseText);
          mostrarBotonConfirmar();
        }else {
          $('#contenidoHorarioClases').html("");
          accionValoresNulos('ENCONTRARON REGISTROS');
          mostrarBotonConfirmar();
        }

        });
    });
}


function consultTBHhorarioLimpieza(){

    $(document).ready(function () {

        $.post('../Business/Horario/horarioAction.php', {
            accionHorario: "consultTBHhorarioLimpieza",

        },
        function (responseText){
       /*     if(responseText==0){
        }else{
             $('#contenidoHorarioLimpieza').html(responseText);
        }*/
        if(responseText!="Error" && responseText !=""){
          $('#contenidoHorarioLimpieza').html(responseText);
        }else {
          $('#contenidoHorarioLimpieza').html("");
         accionValoresNulos('ENCONTRARON REGISTROS');

        }

        }
    );
    });
}

function consultTBHhorarioLavanderia(){

    $(document).ready(function () {

        $.post('../Business/Horario/horarioAction.php', {
            accionHorario: "consultTBHhorarioLavanderia",

        },
        function (responseText){

        if(responseText!="Error" && responseText !=""){
          $('#contenidoHorarioLavanderia').html(responseText);
        }else {
          $('#contenidoHorarioLavanderia').html("");
          accionValoresNulos('ENCONTRARON REGISTROS');
            }

        }
    );
    });
}


 function insertarHorario() {
    $(document).ready(function () {

        $.post('../Business/Horario/horarioAction.php', {

            accionHorario: 'insertarHorario',
            diahorario: document.getElementById("dias").value,
            horainicio: document.getElementById("horaInicio").value,
            horasalida: document.getElementById("horaSalida").value,
            curso: document.getElementById("curso").value,
            profesor: document.getElementById("profesor").value,
        },

                function (responseText) {
                 if(responseText==1){
                     document.getElementById("cerrar1").click();
                    consultTBHhorario();
                    accionExitosa('REGISTRÓ EL HORARIO');
                   }else{
                   accionNoExitosaB(responseText.toUpperCase());                 }


                }
                );
    });
}
var id = 0;
function actualizarHorario(idhorario) {

    id = idhorario;

}
function actualizar() {
    $(document).ready(function () {

        $.post('../Business/Horario/horarioAction.php', {

            accionHorario: 'actualizarHorario',
            diahorario: document.getElementById("dias2").value,
            horaInicio: document.getElementById("horaInicio2").value,
            horaSalida: document.getElementById("horaSalida2").value,
            curso: document.getElementById("curso2").value,
            profesor: document.getElementById("profesor2").value,
            idhorario: id,
        },
                function (responseText) {
                   //alert(responseText);
                 if(responseText=="exito"){
                    document.getElementById("cerrar2").click();
                    consultTBHhorario();
                    accionExitosa('EDITÓ EL HORARIO');
                   }else{
                   accionNoExitosaB(responseText.toUpperCase());
                   }

                    }
                    );
                });
}

var idEliminar = 0;
function eliminar(idhorario) {

    idEliminar = idhorario;

}
function eliminarHorario() {

    $.post('../Business/Horario/horarioAction.php', {

        accionHorario: 'eliminarHorario',
        idborrar: idEliminar,

    },
            function (responseText) {
                if(responseText==1){
                    document.getElementById("cerrar3").click();
                    consultTBHhorario();
                    accionExitosa('ELIMINÓ EL HORARIO');
                   }else{
                    accionNoExitosa('ELIMINÓEL HORARIO');
                   }
            });
}
/////////////////////////////////////MOSTRAR BOTON CONFIRMAR///////////////////////////////////////
function mostrarBotonConfirmar() {

        $.post('../Business/Horario/horarioAction.php', {

            accionHorario: 'mostrarBotonConfirmar',

        },
                function (responseText) {
                 if(responseText==1){
                    document.getElementById('confirmar').style="display:block";
                   }else{
                   document.getElementById('confirmar').style="display:none";
                   }

                    }
                    );
}
//////////////////////////Limpiando los datos/////////////////////////////////////
function limpiarModalClases(){
     document.getElementById("dias").selectedIndex=0;
     document.getElementById("horaSalida").value="";
     document.getElementById("curso").value="";
     document.getElementById("profesor").value="";
     document.getElementById("curso").style="";
     document.getElementById("profesor").style="";
     document.getElementById('cursook').innerHTML="";
     document.getElementById('profesorok').innerHTML="";
     document.getElementById('registrar').disabled=true;
     cargarSelect();
}

function editar(idhorario) {
         document.getElementById('curso2').style="border-color: rgb(129, 247, 159); border-width: 3px; border-style: solid;";
         document.getElementById('profesor2').style="border-color: rgb(129, 247, 159); border-width: 3px; border-style: solid;";  
         document.getElementById('curso2ok').innerHTML="";
         document.getElementById('profesor2ok').innerHTML="";
         document.getElementById('modificar').disabled=false;
             var diahorario = document.getElementById("diahorario"+idhorario).innerHTML;
             var  horaInicio = document.getElementById("horainiciohorario"+idhorario).innerHTML;
             var horaSalida = document.getElementById("horasalidahorario"+idhorario).innerHTML;
             var descripcion = document.getElementById("descripcionhorario"+idhorario).innerHTML;


                var selectDias = document.getElementById("dias2");//llamo al select

                if (diahorario === "LUNES") {
                    selectDias.options[0].setAttribute("selected", "true");

                } else if (diahorario === "MARTES") {
                    selectDias.options[1].setAttribute("selected", "true");

                } else if (diahorario === "MIERCOLES") {
                    selectDias.options[2].setAttribute("selected", "true");

                } else if (diahorario === "JUEVES") {
                    selectDias.options[3].setAttribute("selected", "true");

                } else if (diahorario === "VIERNES") {
                    selectDias.options[4].setAttribute("selected", "true");

                } else if (diahorario === "SABADO") {
                    selectDias.options[5].setAttribute("selected", "true");

                }

        var selectHoraInicio = document.getElementById("horaInicio2");//llamo al select

        var am8 = document.createElement("option");
        am8.setAttribute("value", "08AM");
        am8.setAttribute("label", "08AM");
        var am9 = document.createElement("option");
        am9.setAttribute("value", "09AM");
        am9.setAttribute("label", "09AM");
        var am10 = document.createElement("option");
        am10.setAttribute("value", "10AM");
        am10.setAttribute("label", "10AM");
        var pm1 = document.createElement("option");
        pm1.setAttribute("value", "01PM");
        pm1.setAttribute("label", "01PM");
        var pm2 = document.createElement("option");
        pm2.setAttribute("value", "02PM");
        pm2.setAttribute("label", "02PM");
        var pm3 = document.createElement("option");
        pm3.setAttribute("value", "03PM");
        pm3.setAttribute("label", "03PM");
        var pm4 = document.createElement("option");
        pm4.setAttribute("value", "04PM");
        pm4.setAttribute("label", "04PM");
        var pm5 = document.createElement("option");
        pm5.setAttribute("value", "05PM");
        pm5.setAttribute("label", "05PM");
        var pm6 = document.createElement("option");
        pm6.setAttribute("value", "06PM");
        pm6.setAttribute("label", "06PM");
        var pm7 = document.createElement("option");
        pm7.setAttribute("value", "07PM");
        pm7.setAttribute("label", "07PM");
        var pm8 = document.createElement("option");
        pm8.setAttribute("value", "08PM");
        pm8.setAttribute("label", "08PM");

        var selectHoraSalida = document.getElementById("horaSalida2");//llamo al select
        var am8s = document.createElement("option");
        am8s.setAttribute("value", "08AM");
        am8s.setAttribute("label", "08AM");
        var am9s = document.createElement("option");
        am9s.setAttribute("value", "09AM");
        am9s.setAttribute("label", "09AM");
        var am10s = document.createElement("option");
        am10s.setAttribute("value", "10AM");
        am10s.setAttribute("label", "10AM");
        var am11s = document.createElement("option");
        am11s.setAttribute("value", "11AM");
        am11s.setAttribute("label", "11AM");
        var md12s = document.createElement("option");
        md12s.setAttribute("value", "12MD");
        md12s.setAttribute("label", "12MD");
        var pm1s = document.createElement("option");
        pm1s.setAttribute("value", "01PM");
        pm1s.setAttribute("label", "01PM");
        var pm2s = document.createElement("option");
        pm2s.setAttribute("value", "02PM");
        pm2s.setAttribute("label", "02PM");
        var pm3s = document.createElement("option");
        pm3s.setAttribute("value", "03PM");
        pm3s.setAttribute("label", "03PM");
        var pm4s = document.createElement("option");
        pm4s.setAttribute("value", "04PM");
        pm4s.setAttribute("label", "04PM");
        var pm5s = document.createElement("option");
        pm5s.setAttribute("value", "05PM");
        pm5s.setAttribute("label", "05PM");
        var pm6s = document.createElement("option");
        pm6s.setAttribute("value", "06PM");
        pm6s.setAttribute("label", "06PM");
        var pm7s = document.createElement("option");
        pm7s.setAttribute("value", "07PM");
        pm7s.setAttribute("label", "07PM");
        var pm8s = document.createElement("option");
        pm8s.setAttribute("value", "08PM");
        pm8s.setAttribute("label", "08PM");
        var pm9s = document.createElement("option");
        pm9s.setAttribute("value", "09PM");
        pm9s.setAttribute("label", "09PM");




/*Horas de Inicio*/
if (horaInicio === "08:00 a.m." || horaInicio === "08AM") {
                    am8.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "09:00 a.m." || horaInicio === "09AM") {
                    am9.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "10:00 a.m." || horaInicio === "10AM") {
                    am10.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "01:00 p.m." || horaInicio === "01PM") {
                    pm1.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "02:00 p.m." || horaInicio === "02PM") {
                    pm2.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "03:00 p.m." || horaInicio === "03PM") {
                    pm3.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "04:00 p.m." || horaInicio === "04PM") {
                    pm4.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "05:00 p.m." || horaInicio === "05PM") {
                    pm5.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "06:00 p.m." || horaInicio === "06PM") {
                    pm6.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "07:00 p.m." || horaInicio === "07PM") {
                    pm7.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                } else if (horaInicio === "08:00 p.m." || horaInicio === "08PM") {
                    pm8.setAttribute("selected", "true");//defino que este seleccionada
                    selectHoraInicio.appendChild(am8);
                    selectHoraInicio.appendChild(am9);
                    selectHoraInicio.appendChild(am10);
                    selectHoraInicio.appendChild(pm1);
                    selectHoraInicio.appendChild(pm2);
                    selectHoraInicio.appendChild(pm3);
                    selectHoraInicio.appendChild(pm4);
                    selectHoraInicio.appendChild(pm5);
                    selectHoraInicio.appendChild(pm6);
                    selectHoraInicio.appendChild(pm7);
                    selectHoraInicio.appendChild(pm8);
                }



/*Horas de Salida*/
 if (horaInicio === "08AM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(am9s);
                    selectHoraSalida.appendChild(am10s);
                    selectHoraSalida.appendChild(am11s);
                    selectHoraSalida.appendChild(md12s);
                } else if (horaInicio === "09AM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(am10s);
                    selectHoraSalida.appendChild(am11s);
                    selectHoraSalida.appendChild(md12s);
                } else if (horaInicio === "10AM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(am11s);
                    selectHoraSalida.appendChild(md12s);

                } else if (horaInicio === "01PM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(pm2s);
                    selectHoraSalida.appendChild(pm3s);
                    selectHoraSalida.appendChild(pm4s);
                    selectHoraSalida.appendChild(pm5s);

                } else if (horaInicio === "02PM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(pm3s);
                    selectHoraSalida.appendChild(pm4s);
                    selectHoraSalida.appendChild(pm5s);
                    selectHoraSalida.appendChild(pm6s);


                } else if (horaInicio === "03PM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(pm4s);
                    selectHoraSalida.appendChild(pm5s);
                    selectHoraSalida.appendChild(pm6s);
                    selectHoraSalida.appendChild(pm7s);

                } else if (horaInicio === "04PM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(pm5s);
                    selectHoraSalida.appendChild(pm6s);
                    selectHoraSalida.appendChild(pm7s);
                    selectHoraSalida.appendChild(pm8s);

                } else if (horaInicio === "05PM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(pm6s);
                    selectHoraSalida.appendChild(pm7s);
                    selectHoraSalida.appendChild(pm8s);
                    selectHoraSalida.appendChild(pm9s);

                } else if (horaInicio === "06PM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(pm7s);
                    selectHoraSalida.appendChild(pm8s);
                    selectHoraSalida.appendChild(pm9s);

                } else if (horaInicio === "07PM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(pm8s);
                    selectHoraSalida.appendChild(pm9s);

                } else if (horaInicio === "08PM") {
                    selectHoraSalida.options.length = 0;
                    selectHoraSalida.appendChild(pm9s);

                }

                if (horaSalida === "08AM") {
                    am8s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "09AM") {
                    am9s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "10AM") {
                    am10s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "11AM") {
                    am11s.setAttribute("selected", "true");//defino que este seleccionada
                }else if (horaSalida === "12MD") {
                    md12s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "01PM") {
                    pm1s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "02PM") {
                    pm2s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "03PM") {
                    pm3s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "04PM") {
                    pm4s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "05PM") {
                    pm5s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "06PM") {
                    pm6s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "07PM") {
                    pm7s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "08PM") {
                    pm8s.setAttribute("selected", "true");//defino que este seleccionada
                } else if (horaSalida === "09PM") {
                    pm9s.setAttribute("selected", "true");//defino que este seleccionada
                }


                var descripcionHorario = descripcion.split("-");//divido por el separador

                for (var i = 0; i < descripcionHorario.length; i++) {
                    if (i == 0) {
                        document.getElementById("curso2").value = descripcionHorario[i];
                    } else {
                        document.getElementById("profesor2").value = descripcionHorario[i];
                    }

                }



 }



//---------------------------------------------PARRA------------------------------------------------------------------
  //-----------------------METODO PARA REASIGNAR HORARIO LAVANDERIA----------------------------------------------------
var cedulaEstudiante;
function editarHorarioLavanderia(input,cedula){
    cedulaEstudiante= cedula;
    var dia=document.getElementById("dia"+input).innerHTML;
    var jornada=document.getElementById("jornada"+input).innerHTML;
    if(dia==='Lunes'){
      document.getElementById("dias").selectedIndex=0;
    }else if (dia==='Martes') {
      document.getElementById("dias").selectedIndex=1;
    }else if (dia==='Miercoles') {
      document.getElementById("dias").selectedIndex=2;
    }else if (dia==='Jueves') {
      document.getElementById("dias").selectedIndex=3;
    }else if (dia==='Viernes') {
      document.getElementById("dias").selectedIndex=4;
    }else if (dia==='Sabado') {
      document.getElementById("dias").selectedIndex=5;
    }

    if(jornada==='Mañana'){
      document.getElementById("jornadas").selectedIndex=0;
    }else if (jornada==='Tarde') {
      document.getElementById("jornadas").selectedIndex=1;
    }else if (jornada==='Noche') {
      document.getElementById("jornadas").selectedIndex=2;
    }
}


function ReasignarHorarioLavanderia() {
  var dias = document.getElementById("dias").value;
  var jornadas = document.getElementById("jornadas").value;
  var cedula1= cedulaEstudiante;
  $(document).ready(function () {
      $.post('../Business/Horario/horarioAction.php', {
        accionHorario: "ReasignarHorarioLavanderia",
        dia: dias,
        jornada:jornadas,
        cedula:cedula1
      },
      function (responseText){
          document.getElementById("cerrar1").click();
        if(responseText!="Error" && responseText !=0){
          verReporteHorarioLavanderia();
          accionExitosa('REASIGNO EL HORARIO LAVANDERÍA');
        }else {
          verReporteHorarioLavanderia();
          accionNoExitosa('REASIGNO EL HORARIO LAVANDERÍA');

        }


      }
    );
  });


}


//-----------------------METODO PARA REASIGNAR HORARIO LIMPIEZA----------------------------------------------------
var cedulaEstudianteLimpieza;

function editarHorarioLimpieza(input,cedula){
  cedulaEstudianteLimpieza= cedula;
  var dia=document.getElementById("dia"+input).innerHTML;
  var jornada=document.getElementById("jornada"+input).innerHTML;
  var area=document.getElementById("area"+input).innerHTML;
  if(dia==='Lunes'){
    document.getElementById("dias").selectedIndex=0;
  }else if (dia==='Martes') {
    document.getElementById("dias").selectedIndex=1;
  }else if (dia==='Miercoles') {
    document.getElementById("dias").selectedIndex=2;
  }else if (dia==='Jueves') {
    document.getElementById("dias").selectedIndex=3;
  }else if (dia==='Viernes') {
    document.getElementById("dias").selectedIndex=4;
  }else if (dia==='Sabado') {
    document.getElementById("dias").selectedIndex=5;
  }

  if(jornada==='Mañana'){
    document.getElementById("jornadas").selectedIndex=0;
  }else if (jornada==='Tarde') {
    document.getElementById("jornadas").selectedIndex=1;
  }else if (jornada==='Noche') {
    document.getElementById("jornadas").selectedIndex=2;
  }

  if(area==='Baños'){
    document.getElementById("areas").selectedIndex=0;
  }else if (area==='Cocina') {
    document.getElementById("areas").selectedIndex=1;
  }else if (area==='Jardin') {
    document.getElementById("areas").selectedIndex=2;
  }else if (area==='Pasillos') {
    document.getElementById("areas").selectedIndex=3;
  }
}


function ReasignarHorarioLimpieza() {
var dias = document.getElementById("dias").value;
var jornadas = document.getElementById("jornadas").value;
var areas = document.getElementById("areas").value;
var cedula1= cedulaEstudianteLimpieza;
$(document).ready(function () {
    $.post('../Business/Horario/horarioAction.php', {
      accionHorario: "ReasignarHorarioLimpieza",
      dia: dias,
      jornada:jornadas,
      area:areas,
      cedula:cedula1
    },
    function (responseText){
        document.getElementById("cerrar1").click();
      if(responseText!="Error" && responseText !=0){
        verReporteHorarioLimpieza();
        accionExitosa('REASIGNO EL HORARIO LIMPIEZA');
      }else {
        verReporteHorarioLimpieza();
        accionNoExitosa('REASIGNO EL HORARIO LIMPIEZA');

      }


    }
  );
});


}
