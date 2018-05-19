<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>ARTICULOS ESTUDIANTILES</h2>
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
                    <li class="dropdownMenu"><a href="#" onclick="filtrarComboArticulosPersonales('TODOS')">NO APROBADOS</a></li>
                    <li class="divider"></li>
                    <li class="dropdownMenu"><a href="#" onclick="filtrarComboArticulosPersonales('APROBADOS')">APROBADOS</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                       <a href="#">TIPO</a>
                       <ul class="dropdown-menu">
                          <li><a href="#" onclick="filtrarComboArticulosPersonales('ELECTRONICO')">ELECTRONICO </a></li>
                          <li class="divider"></li>
                          <li><a href="#" onclick="filtrarComboArticulosPersonales('COCINA')">COCINA</a></li>
                          <li class="divider"></li>
                          <li><a href="#" onclick="filtrarComboArticulosPersonales('TECNOLOGICO')">TECNOLOGICO</a></li>
                       </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-submenu">
                       <a href="#">ESTADO</a>
                       <ul class="dropdown-menu">
                          <li><a href="#" onclick="filtrarComboArticulosPersonales('BUENO')">BUENO</a></li>
                          <li class="divider"></li>
                          <li><a href="#" onclick="filtrarComboArticulosPersonales('REGULAR')">REGULAR</a></li>
                          <li class="divider"></li>
                          <li><a href="#" onclick="filtrarComboArticulosPersonales('DEFICIENTE')">DEFICIENTE</a></li>
                       </ul>
                    </li>
                 </ul>
              </div>
            </th>

            <th>
               <button onclick="imprimirReportePdf('Personales')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
            <thead>
               <th>C&EacuteDULA</th>
               <th>PROPIETARIO</th>
               <th>NOMBRE</th>
               <th>SERIE</th>
               <th>TIPO</th>
               <th>DETALLEs</th>
               <th>ESTADO</th>
               <th style="width:5%">APROBAR</th>
            </thead>
            <tbody id="contenidoArticulos">
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
               <th>PROPIETARIO</th>
               <th>NOMBRE</th>
               <th>SERIE</th>
               <th>TIPO</th>
               <th>DETALLE</th>
               <th>ESTADO</th>
            </thead>
            <tbody id="contenidoArticulos2">
            </tbody>
         </table>
      </div>
   </div>
</div>
 
</div>
 