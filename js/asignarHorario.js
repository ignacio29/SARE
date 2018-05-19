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

function asignarHorarioLimpieza() {
    $(document).ready(function () {
        $.post('../Business/Horario/horarioAction.php', {

            accionHorario: 'asignarHorario',
            
        },
        function (responseText) {
          if(responseText==1){
                $('#contenidoHorarioClases').html(responseText);
                document.getElementById("cerrar4").click();
                consultTBHhorario();
                getIdConfirmarHorario();
                accionExitosa('GENERO EL HORARIO DE LIMPIEZA Y LAVANDERÍA');
            }else {
                 $('#contenidoHorarioClases').html("");
               accionValoresNulos('ENCONTRARON ESPACIOS');

            }

        });
    });
}


function getIdConfirmarHorario() {
    $(document).ready(function () {

        $.post('../Business/Horario/horarioAction.php', {

            accionHorario: 'getIdConfirmarHorario',
           
            
        },
                function (responseText) {
                var estado = responseText;
                if(estado==1){
                        document.getElementById('agregar').style="display:none";
                        var x = document.getElementsByName("idModificar");
                        var i;
                        for (i = 0; i < x.length; i++) {
                                
                                         x[i].disabled = true;
                                
                        }

                        var y = document.getElementsByName("btnEliminar");
                        var a;
                        for (a = 0; a < y.length; a++) {
                                
                                         y[a].disabled = true;
                                
                        }
                         
                        
                }else{
                     //alert('estado 0');
                }

                });
    });
}

