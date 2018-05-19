next();
function next() {
  var nextElement = $('#horaInicio > option:selected').next('option');
  if (nextElement.length > 0) {
    $('#horaInicio > option:selected').removeAttr('selected').next('option').attr('selected', 'selected');
  }
}
previous();
function previous(){
    var nextElement = $('#horaInicio > option:selected').prev('option');
  if (nextElement.length > 0) {
    $('#horaInicio > option:selected').removeAttr('selected').prev('option').attr('selected', 'selected');
  }  
}

nextSalida();
function nextSalida() {
  var nextElement = $('#horaSalida > option:selected').next('option');
  if (nextElement.length > 0) {
    $('#horaSalida > option:selected').removeAttr('selected').next('option').attr('selected', 'selected');
  }
}
previousSalida();
function previousSalida(){
    var nextElement = $('#horaSalida > option:selected').prev('option');
  if (nextElement.length > 0) {
    $('#horaSalida > option:selected').removeAttr('selected').prev('option').attr('selected', 'selected');
  }  
}


////////////////////////////////////////////MODAL MODIFICAR//////////////////////////////////////////////
nextModificar();
function nextModificar() {
  var nextElement = $('#horaInicio2 > option:selected').next('option');
  if (nextElement.length > 0) {
    $('#horaInicio2 > option:selected').removeAttr('selected').next('option').attr('selected', 'selected');
  }
}
previousModificar();
function previousModificar(){
    var nextElement = $('#horaInicio2 > option:selected').prev('option');
  if (nextElement.length > 0) {
    $('#horaInicio2 > option:selected').removeAttr('selected').prev('option').attr('selected', 'selected');
  }  
}

nextSalidaModificar();
function nextSalidaModificar() {
  var nextElement = $('#horaSalida2 > option:selected').next('option');
  if (nextElement.length > 0) {
    $('#horaSalida2 > option:selected').removeAttr('selected').next('option').attr('selected', 'selected');
  }
}
previousSalidaModificar();
function previousSalidaModificar(){
    var nextElement = $('#horaSalida2 > option:selected').prev('option');
  if (nextElement.length > 0) {
    $('#horaSalida2 > option:selected').removeAttr('selected').prev('option').attr('selected', 'selected');
  }  
}

///////////////////////////////////CARGAR LOS SELECT////////////////////////////////////////////////
//cargarSelect();
function cargarSelect(){
    var horaInicio=document.getElementById("horaInicio");
    var horaSeleccionada=document.getElementById("horaInicio").value;
    var horaSalida = document.getElementById("horaSalida");
           // horaInicio.options[horaInicio.selectedIndex].text;
 if(horaSeleccionada=="08AM"){
    horaSalida.options.length = 0;
    var am9=document.createElement("option");
    var am10=document.createElement("option");
    var am11=document.createElement("option");
    var md12=document.createElement("option");
    am9.setAttribute("value","09AM");
    am9.setAttribute("label","09AM");
    am10.setAttribute("value","10AM");
    am10.setAttribute("label","10AM");
    am11.setAttribute("value","11AM");
    am11.setAttribute("label","11AM");
    md12.setAttribute("value","12MD");
    md12.setAttribute("label","12MD");
    horaSalida.appendChild(am9);
    horaSalida.appendChild(am10);
    horaSalida.appendChild(am11);
    horaSalida.appendChild(md12);
  }else if(horaSeleccionada=="09AM"){
    horaSalida.options.length = 0;
    var am10=document.createElement("option");
    var am11=document.createElement("option");
    var md12=document.createElement("option");
    am10.setAttribute("value","10AM");
    am10.setAttribute("label","10AM");
    am11.setAttribute("value","11AM");
    am11.setAttribute("label","11AM");
    md12.setAttribute("value","12MD");
    md12.setAttribute("label","12MD");
    horaSalida.appendChild(am10);
    horaSalida.appendChild(am11);
    horaSalida.appendChild(md12);
  }else if(horaSeleccionada=="10AM"){
    horaSalida.options.length = 0;
    var am11=document.createElement("option");
    var md12=document.createElement("option");
    am11.setAttribute("value","11AM");
    am11.setAttribute("label","11AM");
    md12.setAttribute("value","12MD");
    md12.setAttribute("label","12MD");
    horaSalida.appendChild(am11);
    horaSalida.appendChild(md12);
  }else if(horaSeleccionada=="01PM"){
    horaSalida.options.length = 0;
    var pm2=document.createElement("option");
    var pm3=document.createElement("option");
    var pm4=document.createElement("option");
    var pm5=document.createElement("option");
    pm2.setAttribute("value","02PM");
    pm2.setAttribute("label","02PM");
    pm3.setAttribute("value","03PM");
    pm3.setAttribute("label","03PM");
    pm4.setAttribute("value","04PM");
    pm4.setAttribute("label","04PM");
    pm5.setAttribute("value","05PM");
    pm5.setAttribute("label","05PM");
    horaSalida.appendChild(pm2);
    horaSalida.appendChild(pm3);
    horaSalida.appendChild(pm4);
    horaSalida.appendChild(pm5);
  }else if(horaSeleccionada=="02PM"){
    horaSalida.options.length = 0;
    var pm3=document.createElement("option");
    var pm4=document.createElement("option");
    var pm5=document.createElement("option");
    var pm6=document.createElement("option");
    pm3.setAttribute("value","03PM");
    pm3.setAttribute("label","03PM");
    pm4.setAttribute("value","04PM");
    pm4.setAttribute("label","04PM");
    pm5.setAttribute("value","05PM");
    pm5.setAttribute("label","05PM");
    pm6.setAttribute("value","06PM");
    pm6.setAttribute("label","06PM");
    horaSalida.appendChild(pm3);
    horaSalida.appendChild(pm4);
    horaSalida.appendChild(pm5);
    horaSalida.appendChild(pm6);
  }else if(horaSeleccionada=="03PM"){
    horaSalida.options.length = 0;
    var pm4=document.createElement("option");
    var pm5=document.createElement("option");
    var pm6=document.createElement("option");
    var pm7=document.createElement("option");
    pm4.setAttribute("value","04PM");
    pm4.setAttribute("label","04PM");
    pm5.setAttribute("value","05PM");
    pm5.setAttribute("label","05PM");
    pm6.setAttribute("value","06PM");
    pm6.setAttribute("label","06PM");
    pm7.setAttribute("value","07PM");
    pm7.setAttribute("label","07PM");
    horaSalida.appendChild(pm4);
    horaSalida.appendChild(pm5);
    horaSalida.appendChild(pm6);
    horaSalida.appendChild(pm7);
  }else if(horaSeleccionada=="04PM"){
    horaSalida.options.length = 0;
    var pm5=document.createElement("option");
    var pm6=document.createElement("option");
    var pm7=document.createElement("option");
    var pm8=document.createElement("option");
    pm5.setAttribute("value","05PM");
    pm5.setAttribute("label","05PM");
    pm6.setAttribute("value","06PM");
    pm6.setAttribute("label","06PM");
    pm7.setAttribute("value","07PM");
    pm7.setAttribute("label","07PM");
    pm8.setAttribute("value","08PM");
    pm8.setAttribute("label","08PM");
    horaSalida.appendChild(pm5);
    horaSalida.appendChild(pm6);
    horaSalida.appendChild(pm7);
    horaSalida.appendChild(pm8);
  }else if(horaSeleccionada=="05PM"){
    horaSalida.options.length = 0;
    var pm6=document.createElement("option");
    var pm7=document.createElement("option");
    var pm8=document.createElement("option");
    var pm9=document.createElement("option");
    pm6.setAttribute("value","06PM");
    pm6.setAttribute("label","06PM");
    pm7.setAttribute("value","07PM");
    pm7.setAttribute("label","07PM");
    pm8.setAttribute("value","08PM");
    pm8.setAttribute("label","08PM");
    pm9.setAttribute("value","09PM");
    pm9.setAttribute("label","09PM");
    horaSalida.appendChild(pm6);
    horaSalida.appendChild(pm7);
    horaSalida.appendChild(pm8);
    horaSalida.appendChild(pm9);
  }else if(horaSeleccionada=="06PM"){
    horaSalida.options.length = 0;
    var pm7=document.createElement("option");
    var pm8=document.createElement("option");
    var pm9=document.createElement("option");
    pm7.setAttribute("value","07PM");
    pm7.setAttribute("label","07PM");
    pm8.setAttribute("value","08PM");
    pm8.setAttribute("label","08PM");
    pm9.setAttribute("value","09PM");
    pm9.setAttribute("label","09PM");
    horaSalida.appendChild(pm7);
    horaSalida.appendChild(pm8);
    horaSalida.appendChild(pm9);
  }else if(horaSeleccionada=="07PM"){
    horaSalida.options.length = 0;
    var pm8=document.createElement("option");
    var pm9=document.createElement("option");
    pm8.setAttribute("value","08PM");
    pm8.setAttribute("label","08PM");
    pm9.setAttribute("value","09PM");
    pm9.setAttribute("label","09PM");
    horaSalida.appendChild(pm8);
    horaSalida.appendChild(pm9);
  }else if(horaSeleccionada=="08PM"){
    horaSalida.options.length = 0;
    var pm9=document.createElement("option");
    pm9.setAttribute("value","09PM");
    pm9.setAttribute("label","09PM");
    horaSalida.appendChild(pm9);
  }
 
}
//////////////////////////////////////////////CARGAR SELECT MODIFICAR ////////////////////////////////////////////////////////////
//cargarSelectModificar();
function cargarSelectModificar(){
    var horaInicio2=document.getElementById("horaInicio2");
    var horaSeleccionada2= document.getElementById("horaInicio2").value;
    //horaInicio2.options[horaInicio2.selectedIndex].value;
    var horaSalida2 = document.getElementById("horaSalida2");
  //alert(horaSeleccionada);
 if(horaSeleccionada2=="08AM"){
    horaSalida2.options.length = 0;
    var am9=document.createElement("option");
    var am10=document.createElement("option");
    var am11=document.createElement("option");
    var md12=document.createElement("option");
    am9.setAttribute("value","09AM");
    am9.setAttribute("label","09AM");
    am10.setAttribute("value","10AM");
    am10.setAttribute("label","10AM");
    am11.setAttribute("value","11AM");
    am11.setAttribute("label","11AM");
    md12.setAttribute("value","12MD");
    md12.setAttribute("label","12MD");
    horaSalida2.appendChild(am9);
    horaSalida2.appendChild(am10);
    horaSalida2.appendChild(am11);
    horaSalida2.appendChild(md12);
  }else if(horaSeleccionada2=="09AM"){
    horaSalida2.options.length = 0;
    var am10=document.createElement("option");
    var am11=document.createElement("option");
    var md12=document.createElement("option");
    am10.setAttribute("value","10AM");
    am10.setAttribute("label","10AM");
    am11.setAttribute("value","11AM");
    am11.setAttribute("label","11AM");
    md12.setAttribute("value","12MD");
    md12.setAttribute("label","12MD");
    horaSalida2.appendChild(am10);
    horaSalida2.appendChild(am11);
    horaSalida2.appendChild(md12);
  }else if(horaSeleccionada2=="10AM"){
    horaSalida2.options.length = 0;
    var am11=document.createElement("option");
    var md12=document.createElement("option");
    am11.setAttribute("value","11AM");
    am11.setAttribute("label","11AM");
    md12.setAttribute("value","12MD");
    md12.setAttribute("label","12MD");
    horaSalida2.appendChild(am11);
    horaSalida2.appendChild(md12);
  }else if(horaSeleccionada2=="01PM"){
    horaSalida2.options.length = 0;
    var pm2=document.createElement("option");
    var pm3=document.createElement("option");
    var pm4=document.createElement("option");
    var pm5=document.createElement("option");
    pm2.setAttribute("value","02PM");
    pm2.setAttribute("label","02PM");
    pm3.setAttribute("value","03PM");
    pm3.setAttribute("label","03PM");
    pm4.setAttribute("value","04PM");
    pm4.setAttribute("label","04PM");
    pm5.setAttribute("value","05PM");
    pm5.setAttribute("label","05PM");
    horaSalida2.appendChild(pm2);
    horaSalida2.appendChild(pm3);
    horaSalida2.appendChild(pm4);
    horaSalida2.appendChild(pm5);
  }else if(horaSeleccionada2=="02PM"){
    horaSalida2.options.length = 0;
    var pm3=document.createElement("option");
    var pm4=document.createElement("option");
    var pm5=document.createElement("option");
    var pm6=document.createElement("option");
    pm3.setAttribute("value","03PM");
    pm3.setAttribute("label","03PM");
    pm4.setAttribute("value","04PM");
    pm4.setAttribute("label","04PM");
    pm5.setAttribute("value","05PM");
    pm5.setAttribute("label","05PM");
    pm6.setAttribute("value","06PM");
    pm6.setAttribute("label","06PM");
    horaSalida2.appendChild(pm3);
    horaSalida2.appendChild(pm4);
    horaSalida2.appendChild(pm5);
    horaSalida2.appendChild(pm6);
  }else if(horaSeleccionada2=="3PM"){
    horaSalida2.options.length = 0;
    var pm4=document.createElement("option");
    var pm5=document.createElement("option");
    var pm6=document.createElement("option");
    var pm7=document.createElement("option");
    pm4.setAttribute("value","04PM");
    pm4.setAttribute("label","04PM");
    pm5.setAttribute("value","05PM");
    pm5.setAttribute("label","05PM");
    pm6.setAttribute("value","06PM");
    pm6.setAttribute("label","06PM");
    pm7.setAttribute("value","07PM");
    pm7.setAttribute("label","07PM");
    horaSalida2.appendChild(pm4);
    horaSalida2.appendChild(pm5);
    horaSalida2.appendChild(pm6);
    horaSalida2.appendChild(pm7);
  }else if(horaSeleccionada2=="04PM"){
    horaSalida2.options.length = 0;
    var pm5=document.createElement("option");
    var pm6=document.createElement("option");
    var pm7=document.createElement("option");
    var pm8=document.createElement("option");
    pm5.setAttribute("value","05PM");
    pm5.setAttribute("label","05PM");
    pm6.setAttribute("value","06PM");
    pm6.setAttribute("label","06PM");
    pm7.setAttribute("value","07PM");
    pm7.setAttribute("label","07PM");
    pm8.setAttribute("value","08PM");
    pm8.setAttribute("label","08PM");
    horaSalida2.appendChild(pm5);
    horaSalida2.appendChild(pm6);
    horaSalida2.appendChild(pm7);
    horaSalida2.appendChild(pm8);
  }else if(horaSeleccionada2=="05PM"){
    horaSalida2.options.length = 0;
    var pm6=document.createElement("option");
    var pm7=document.createElement("option");
    var pm8=document.createElement("option");
    var pm9=document.createElement("option");
    pm6.setAttribute("value","06PM");
    pm6.setAttribute("label","06PM");
    pm7.setAttribute("value","07PM");
    pm7.setAttribute("label","07PM");
    pm8.setAttribute("value","08PM");
    pm8.setAttribute("label","08PM");
    pm9.setAttribute("value","09PM");
    pm9.setAttribute("label","09PM");
    horaSalida2.appendChild(pm6);
    horaSalida2.appendChild(pm7);
    horaSalida2.appendChild(pm8);
    horaSalida2.appendChild(pm9);
  }else if(horaSeleccionada2=="06PM"){
    horaSalida2.options.length = 0;
    var pm7=document.createElement("option");
    var pm8=document.createElement("option");
    var pm9=document.createElement("option");
    pm7.setAttribute("value","07PM");
    pm7.setAttribute("label","07PM");
    pm8.setAttribute("value","08PM");
    pm8.setAttribute("label","08PM");
    pm9.setAttribute("value","09PM");
    pm9.setAttribute("label","09PM");
    horaSalida2.appendChild(pm7);
    horaSalida2.appendChild(pm8);
    horaSalida2.appendChild(pm9);
  }else if(horaSeleccionada2=="07PM"){
    horaSalida2.options.length = 0;
    var pm8=document.createElement("option");
    var pm9=document.createElement("option");
    pm8.setAttribute("value","08PM");
    pm8.setAttribute("label","08PM");
    pm9.setAttribute("value","09PM");
    pm9.setAttribute("label","09PM");
    horaSalida2.appendChild(pm8);
    horaSalida2.appendChild(pm9);
  }else if(horaSeleccionada2=="08PM"){
    horaSalida2.options.length = 0;
    var pm9=document.createElement("option");
    pm9.setAttribute("value","09PM");
    pm9.setAttribute("label","09PM");
    horaSalida2.appendChild(pm9);
  }
 
}
