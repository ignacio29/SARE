<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/estiloNavs.css">
        <link rel="stylesheet" href="../css/modales.css">
        <script src="../js/cargarPagina.js"></script>
        <script src="../js/agregarHorarioJS.js"></script>
        <script src="../js/asignarHorario.js"></script>
        <script src="../js/validarHoras.js"></script>
        <title></title>
    </head>
    <body>
        <br>

        <div class="container" id="dihorario">
            <div class="row">
                <div class="col-sm-1"></div>   
                <div class="col-md-9">
                    <div class="datagrid">
                        <form method="post" enctype="multipart/form-data">
                            <?php
                            $estudianteId =1;
                            include'../Data/horarioData.php';
                            $horarioBusiness = new horarioData();
                            $horarios = $horarioBusiness->consultTBHhorarioDisponibleEstudiante($estudianteId);

                            echo '<table border=5 class="bordered"> <tr><td>D&iacutea</td>  <td>Jornada</td><td>Acciones</td><td colspan="2">Acciones</td> </tr>';
                            foreach ($horarios as $current) {
                                echo '<tr>';
                                echo '<td>  ' . $current->getDiaHorario() . ' </td>';
                                echo '<td> ' . $current->getJornadaHorario() . '</td>';
                                echo '<td> <a href="../Business/Horario/horarioAction.php?idDelete=' . $current->getIdHorario() . '"class=" "> <input type="button" value="Eliminar"></a> </td>';
                                echo '<td> <a name="' . $current->getIdHorario() . '" onclick="actualizarHorario(' . $current->getIdHorario() . ')" href="#popup2" class="popup-link" ><input type="button" value="Modificar"></a> </td>';


                                echo '</tr>';
                            }
                            echo '</table>';
                            ?>

                        </form>
                        <tfoot>
                            <tr> 
                               
                                <td></td>

                            </tr>
                        </tfoot>
                        </table>
                       
                    </div>
                </div>   


            </div>
        </div>
        <!-- <a href="#popup" class="popup-link">AGREGAR</a>-->

        <div class="modal-wrapper" id="popup">
            <div class="popup-contenedor" >

                <h2>Bienvenido al registro de su horario</h2>

                Dia:
                <select class="dias" id="dias">
                    <option>LUNES</option>
                    <option>MARTES</option>
                    <option>MIERCOLES</option>
                    <option>JUEVES</option>
                    <option>VIERNES</option>
                    <option>SABADO</option>
                </select>
                <br>
                <br>

                Hora de inicio:
                <select class="horaInicio" id="horaInicio" onchange="cambiarTurno()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <select class="turno" id="turno" onchange="validarHoras()">

                </select>
                <br>
                <br>

                Hora de finalizacion:
                <select class="horaSalida" id="horaSalida">
                    
                </select>>
                <select class="turno2" id="turno2">

                </select>
                <br>
                <br>
                <table>
                    <tr>
                        <td>
                            Curso:
                        </td>
                        <td>
                            Profesor:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="curso">
                        </td>    
                        <td>
                            <input type="text" id="profesor">
                        </td> 
                    </tr>
                </table>

                <br>
                <button type="button" onclick="insertarHorario()">REGISTRAR</button>

                <a class="popup-cerrar" href="#">X</a>

            </div>
        </div>

        <!-- segundo popup-->
        <a href="#popup2" class="popup-link"></a>
        <div class="modal-wrapper" id="popup2">
            <div class="popup2-contenedor" >

                <h2>Bienvenido al registro de su horario</h2>
 
                <div>
                      <label for="dia">DIA:</label>
                     <select class="dias2" id="dias2">
                    <option>LUNES</option>
                    <option>MARTES</option>
                    <option>MIERCOLES</option>
                    <option>JUEVES</option>
                    <option>VIERNES</option>
                    <option>SABADO</option>
                     </select>
                </div>
                
                <br>
                <br>
                <div>
                      <label for="horaI">Hora de inicio:</label>
                <select class="horaInicio2" id="horaInicio2" onchange="cambiarTurnoActualizar()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <select class="turno3" id="turno3" onchange="validarHorasActualizar()">

                </select>
                <br>
                <br>
                </div>
              
                <div>
                     <label for="horaF">Hora de finalizacion:</label>
                <select class="horaSalida2" id="horaSalida2">
                    
                </select>
                <select class="turno4" id="turno4">

                </select>
                <br>
                 <br>
                </div>

                <div>
                     <label for="horaF">Curso:</label>
                     <input type="text" class="curso2" id="curso2">
                  <br>
                         
                  <br>
                   </div>
                <div>
                     <label for="horaF">Profesor:</label>
                     <input type="text" class="profesor2" id="profesor2">
                     <br>
                     <br>
                </div>
                 
                         
                       
                           
                       
                          
               
               
                 
                <button type="button" onclick="actualizar()">ACTUALIZAR</button>

                <a class="popup2-cerrar" href="#">X</a>

            </div>
        </div>
    </body>
</html>

