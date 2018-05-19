<?php
session_start();
?>
<div class="container"> 
    <header>
        <h2>HORARIOS DE LAVANDERIA</h2>
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
                 <li class="dropdown-submenu">
                    <a href="#horarioLavanderia" onclick="verReporteHorarioLavanderia()">TODOS</a>
                    <!--<ul class="dropdown-menu">
                       </ul>-->
                 </li>
                 <li class="divider"></li>
                 <li class="dropdown-submenu">
                    <a href="#horarioLavanderia">D&IacuteAS</a>
                    <ul class="dropdown-menu">
                       <li><a href="#horarioLavanderia" onclick="reporteHorarioLavanderiaDias('LUNES')">LUNES </a></li>
                       <li><a href="#horarioLavanderia" onclick="reporteHorarioLavanderiaDias('MARTES')">MARTES</a></li>
                       <li><a href="#horarioLavanderia" onclick="reporteHorarioLavanderiaDias('MIERCOLES')">MI&EacuteRCOLES </a></li>
                       <li><a href="#horarioLavanderia" onclick="reporteHorarioLavanderiaDias('JUEVES')">JUEVES</a></li>
                       <li><a href="#horarioLavanderia" onclick="reporteHorarioLavanderiaDias('VIERNES')">VIERNES</a></li>
                       <li><a href="#horarioLavanderia" onclick="reporteHorarioLavanderiaDias('SABADO')">SABADO</a></li>
                    </ul>
                 </li>
                 <li class="divider"></li>
                 <li class="dropdown-submenu">
                    <a tabindex="-1" href="#horarioLavanderia">JORNADAS</a>
                    <ul class="dropdown-menu">
                       <li><a tabindex="-1" href="#horarioLavanderia" onclick="reporteHorarioLavanderiaJornada('MAÑANA')">MAÑANA</a></li>
                       <li>  <a href="#horarioLavanderia" onclick="reporteHorarioLavanderiaJornada('TARDE')">TARDE</a></li>
                       <li> <a href="#horarioLavanderia" onclick="reporteHorarioLavanderiaJornada('NOCHE')">NOCHE</a></li>
                       </li>
                    </ul>
              </div>
            </th>

            <th>
               <button onclick="imprimirReportePdf('Lavanderia')" type="button" ><span class="glyphicon glyphicon-print"></button>
            </th>

         </thead>
      </table>  


     
     <div class="col-md-12">
      <br>
      <div id="" class="table-responsive">
         <table id="mytable" class="default table table-bordered table-striped">
          <thead>
            <tr>
              <th>CEDULA</th>
              <th>ESTUDIANTE</th>
              <th>D&IacuteA</th>
              <th>JORNADA</th>
              <?php
              if(isset($_SESSION['administrador']) && $_SESSION['administrador'] == 'administrador' ){
              echo " <th style='width:5%'>EDITAR</th>";
              }
              ?>
            </tr>
          </thead>
          <tbody id="reporteHorariosLavanderia">

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
               <th>CEDULA</th>
               <th>ESTUDIANTE</th>
               <th>D&IacuteA</th>
               <th>JORNADA</th>
               <th>&AacuteREA</th>
            </thead>
            <tbody id="reporteHorariosLavanderia2">
            </tbody>
         </table>
      </div>
   </div>
</div>


<div class="modal fade" id="editarHorarioLavanderia" tabinde="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" id="cerrar1" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
               <h4 class="modal-title custom_align" id="Heading">REASIGNAR HORARIO LAVANDERIA </h4>
            </div>
            <div class="modal-body">
              <form  id="formulario"  enctype="multipart/form-data">
                 <div class="row">
                    <div class="col-md-1"> </div>
                    <div class="col-md-9"  >
                       <div class="col-sm-1"></div>
                       <div class="col-sm-2">
                          <label class="control-label col-md-3">D&iacutea:</label>
                       </div>
                       <div class="col-sm-1"></div>
                       <div class="col-sm-4">
                          <select class="dias" id="dias">
                             <option value="Lunes">LUNES</option>
                             <option value="Martes">MARTES</option>
                             <option value="Miercoles">MIERCOLES</option>
                             <option value="Jueves">JUEVES</option>
                             <option value="Viernes">VIERNES</option>
                             <option value="Sabado">SABADO</option>
                          </select>
                       </div>
                       <div class="col-sm-12"><br></div>
                       <div class="col-sm-1"></div>
                       <div class="col-sm-2">
                          <label class="control-label col-s-3">Jornada:  </label>
                       </div>
                       <div class="col-sm-1"></div>
                       <div class="col-sm-4">
                          <select class="jornadas" id="jornadas">
                             <option value="Mañana">Mañana</option>
                             <option value="Tarde">Tarde</option>
                             <option value="Noche">Noche</option>
                          </select>
                       </div>
                    </div>
                 </div>
              </form>
            </div>

            <div class="modal-footer ">
               <div class="form-group">
                  <label class="col-md-4 control-label" for="button1id"></label>
                  <div class="col-md-8">
                      <button id="ReasignarHorarioLavanderia"  onclick="ReasignarHorarioLavanderia()">Guardar</button>
                  </div>
               </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
</div>
<!-- /.fin -->
 
</div>