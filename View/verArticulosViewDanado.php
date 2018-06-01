<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>REPORTAR ARTICULOS DEFICIENTES</h2>
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
                 <button>FILTRAR POR<span class="caret"></span></button>
                 </a>
                 <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                 <li class="dropdown-submenu">
                    <a href="#" onclick="reportarArticuloDanado()">TODOS</a>
                    <!--<ul class="dropdown-menu">
                       </ul>-->
                 </li>
                 <li class="divider"></li>
                 <li class="dropdown-submenu">
                    <a href="#">CLASE</a>
                    <ul class="dropdown-menu">
                       <li><a href="#" onclick="filtroClaseInstitucionalArticulo('INSTITUCIONAL')">INSTITUCIONAL </a></li>
                       <li><a href="#" onclick="filtroClasePersonalArticulo('PERSONAL')">PERSONAL</a></li>
                    </ul>
                 </li>
                 <li class="divider"></li>
                 <li class="dropdown-submenu">
                    <a tabindex="-1" href="#">TIPO</a>
                    <ul class="dropdown-menu">
                       <li><a tabindex="-1" href="#" onclick="filtroTipoArticuloDeficiente('CUIDADO PERSONAL')">CUIDADO PERSONAL</a></li>
                       <li>  <a href="#" onclick="filtroTipoArticuloDeficiente('ELECTRONICO')">ELECTRONICO</a></li>
                       <li> <a href="#" onclick="filtroTipoArticuloDeficiente('COCINA')">COCINA</a></li>
                       <li> <a href="#" onclick="filtroTipoArticuloDeficiente('TECNOLOGICO')">TECNOLOGICO</a></li>
                       </li>
                    </ul>
              </div>
            </th>

            <th>
               <button onclick="imprimirReportePdf('Danado')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
            <thead>
               <th>NOMBRE</th>
               <th>SERIE</th>
               <th>TIPO</th>
               <th>CLASE</th>
               <th style="width:5%">REPORTAR</th>
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
                      <thead>
                         <th>NOMBRE</th>
                         <th>SERIE</th>
                         <th>TIPO</th>
                         <th>CLASE</th>
                      </thead>
                      <tbody id="contenidoArticulos2">
                      </tbody>
               </table>
            </div>
         </div>
      </div>


     <div class="modal fade" id="actualizarArticulo" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <button id="cerrar1" type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">REPORTAR ART&IacuteCULO DEFICIENTE</h4>
             </div>
             <div class="modal-body">
                <form >
                   <div class="row">
                      <div class="col-md-1"> </div>
                      <div class="col-md-9 "  >
                         <div class="col-sm-1"></div>
                         <div class="col-sm-4">
                            <label class="control-label col-xs-3">DESCRIPCI&OacuteN</label>
                         </div>
                         <div class="col-sm-1"></div>
                         <div class="col-sm-6">
                            <input type="text" class="form-control" id="descripcion" onkeyup="validarDescripcion(this);" onfocusout="habilitarReportarArticulo();"><span id="descripcionok"></span>
                         </div>
                      </div>
                   </div>
                </form>
             </div>
             <div class="modal-footer ">
                <button type="button" id="registrarArticulo" onclick="insertarArticuloDanado();" disabled >REPORTAR</button>
             </div>
          </div>
          <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
    </div>
 
</div>


 