<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>HORARIOS DE CLASES</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead>

            <th style="width:50%">
               <input type="text"  class="form-control" onkeyup="busquedaTablas(this)" maxlength="64" size="20" placeholder="Busqueda General" >
            </th>

            <th>
             <div class="dropdown">
             <a id="dLabel" role="button" data-toggle="dropdown"  >
             <button>FILTRAR POR <span class="caret"></span></button>
             </a>
             <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                <li class="dropdownMenu">
                   <a href="#horarioClases" onclick="verReporteHorarioClases()">TODOS</a>
                   <!--<ul class="dropdown-menu">
                      </ul>-->
                </li>
                <li class="divider"></li>
                <li class="dropdown-submenu">
                   <a href="#horarioClases">CARRERA</a>
                   <ul class="dropdown-menu">
                      <li><a href="#horarioClases" onclick="reporteHorariosClasesCarrera('Administración de Empresas')">Administraci&oacuten de Empresas </a></li>
                      <li><a href="#horarioClases" onclick="reporteHorariosClasesCarrera('Administración de Oficinas')">Administraci&oacuten de Oficinas</a></li>
                      <li><a href="#horarioClases" onclick="reporteHorariosClasesCarrera('Educación Rural')">Educaci&oacuten Rural</a></li>
                      <li><a href="#horarioClases" onclick="reporteHorariosClasesCarrera('Ingeniería en Sistemas')">Ingenier&iacutea en Sistemas</a></li>
                      <li><a href="#horarioClases" onclick="reporteHorariosClasesCarrera('Recreación Turistica')">
                      Recreaci&oacuten Turistica</a></li>
                   </ul>
                </li>
                </li>
             </ul>
          </div>
            </th>

            <th>
               <button onclick="imprimirReportePdf('Clases')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
          <thead>
            <tr>
              <th>C&EacuteDULA</th>
              <th>ESTUDIANTE</th>
              <th>D&IacuteA</th>
              <th>HORA INICIO</th>
              <th>HORA SALIDA</th>
              <th>DESCRIPCI&OacuteN</th>
            </tr>
          </thead>
          <tbody id="contenidoReporteHorarioClases">

          </tbody>
         </table>
      </div>
      </div>
      <center>
         <div class=" contenedor_paginacion">
            <div class="clearfix paginacion"  id="paginacion"></div>
         </div>
      </center>


<div id="testDiv" style="display: none">
   <div class="col-md-12">
      <div class="table-responsive">
         <table id="mytable" class="table table-bordred table-striped">
           
          <thead>
          <th>C&EacuteDULA</th>
          <th>NOMBRE</th>
          <th>D&IacuteA</th>
          <th>INICIO</th>
          <th>SALIDA</th>
          <th>DETALLE</th>
          </thead>

          <tbody id="contenidoReporteHorarioClases2">

          </tbody>

        </table>
      </div>
   </div>
</div>

 
</div>