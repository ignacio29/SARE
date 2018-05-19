<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>ARTICULOS REPORTADOS DEFICIENTES</h2>
    </header>
    <br> 
      <table class="default table table-bordered table-striped"  content="width=device-width" >
         <thead>

            <th>
               <input type="text"  class="form-control" onkeyup="busquedaTablas(this)" maxlength="64" size="20" placeholder="Busqueda General" >
            </th>

            <th>
                <div class="dropdown">
                   <a id="dLabel" role="button" data-toggle="dropdown"  >
                   <button>FILTRAR POR <span class="caret"></span></button>
                   </a>
                   <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                   <li class="dropdown-submenu">
                      <a href="#" onclick="verArticulosDeficientes()">TODOS</a>
                      <!--<ul class="dropdown-menu">
                         </ul>-->
                   </li>
                   <li class="divider"></li>
                   <li class="dropdown-submenu">
                      <a href="#">CLASE</a>
                      <ul class="dropdown-menu">
                         <li><a href="#" onclick="filtroClaseArticuloDeficiente('INSTITUCIONAL')">INSTITUCIONAL </a></li>
                         <li><a href="#" onclick="filtroClaseArticuloDeficiente('PERSONAL')">PERSONAL</a></li>
                      </ul>
                   </li>
                   <li class="divider"></li>
                   <li class="dropdown-submenu">
                      <a tabindex="-1" href="#">TIPO</a>
                      <ul class="dropdown-menu">
                         <li><a tabindex="-1" href="#" onclick="filtroTipoArticuloDeficienteAd('CUIDADO PERSONAL')">CUIDADO PERSONAL</a></li>
                         <li>  <a href="#" onclick="filtroTipoArticuloDeficienteAd('ELECTRONICO')">ELECTRONICO</a></li>
                         <li> <a href="#" onclick="filtroTipoArticuloDeficienteAd('COCINA')">COCINA</a></li>
                         <li> <a href="#" onclick="filtroTipoArticuloDeficienteAd('TECNOLOGICO')">TECNOLOGICO</a></li>
                         </li>
                      </ul>
                </div>
            </th>

            <th>
               <button onclick="imprimirReportePdf('Deficiente')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
            <thead>
               <th>C&EacuteDULA</th>
               <th>REPORTADO POR:</th>
               <th>NOMBRE ART&IacuteCULO</th>
               <th>SERIE</th>
               <th>TIPO</th>
               <th>CLASE</th>
               <th>DESCRIPCI&OacuteN DE DAÑO</th>
               <th>FECHA</th>
               <th style="width:5%">RESTAURAR</th>
               <th style="width:5%">ELIMINAR</th>
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
                     <th>GENERADO</th>
                     <th>NOMBRE</th>
                     <th>SERIE</th>
                     <th>TIPO</th>
                     <th>CLASE</th>
                     <th>DETALLE</th>
                     <th>FECHA</th>
                  </thead>
                  <tbody id="contenidoArticulos2">
                  </tbody>
               </table>
            </div>
         </div>
      </div>

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
           <div class="modal-dialog">
              <div class="modal-content">
                 <div class="modal-header">
                    <button type="button" id="cerrar3" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                     <center>
                      <h4 class="modal-title custom_align" id="Heading">SE ELMINAR&Aacute ESTE REGISTRO!</h4>
                     </center>
                 </div>
                 <div class="modal-body">
                    <div class="alert alert-danger">
                      <center><span class="glyphicon glyphicon-warning-sign"></span> ¿EST&AacuteS SEGURO?</center>
                    </div>
                 </div>
                 <div class="modal-footer ">
                    <button type="button" onclick="eliminarArticuloDeficiente();"><span class="glyphicon glyphicon-ok-sign"></span>SI</button>
                    <button type="button"  data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>NO</button>    
                 </div>                 
                 
              </div>
              <!-- /.modal-content -->
           </div>
           <!-- /.modal-dialog -->
        </div>
 
</div>