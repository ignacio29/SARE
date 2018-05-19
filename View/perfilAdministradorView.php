    <?php
    session_start();

//Si la variable sesión está vacía admnistrador
    if (!isset($_SESSION['administrador']) && !isset($_SESSION['usuario'])) {

        header("location: ../index.php");
    } else {
        if( $_SESSION['administrador']=='administrador'){
//        echo $_SESSION['administrador'];
//        echo $_SESSION['usuario'];
        } else {
               header("location: ../index.php");
        }
        
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/estiloNavs.css">
        <link rel="stylesheet" href="../css/modales.css">
        <script src="../js/jquery.min.js"></script>
        <script src="../js/cargarPagina.js"></script>
        <script src="../js/agregarAdministrador.js"></script>
    </head>
    <body>
        <script type="text/javascript">

            var idadministrador;
            function guardarIdAdministrador(idAdministrador) {
                idadministrador = idAdministrador;
            }
        </script>
        <div style="display:none;"  id="idAdministrador"></div>
        <br>
        <div class="container" id="dihorario" >
            <div class="row">
                <div class="col-sm-1"></div>   
                <!--<div class="col-md-9">-->
                <div class="datagrid">
                    <form method="post" enctype="multipart/form-data">
                        <?php
                        $administradorId = $_SESSION['usuario'];
                        include'../Data/administradorData.php';
                        $administradorBusiness = new administradorData();
                        $administradores = $administradorBusiness->consultTBAdministrador($administradorId);
                        $arreglo = array();
                        if ($administradores != null) {
                            foreach ($administradores as $administradorTemporal) {
                                $arreglo[] = array(
                                    'idAdministrador' => $administradorTemporal->getIdAdministrador(),
                                    'cedulaAdministrador' => $administradorTemporal->getCedulaAdministrador(),
                                    'nombreAdministrador' => $administradorTemporal->getNombreAdministrador(),
                                    'primerApellidoAdministrador' => $administradorTemporal->getPrimerApellidoAdministrador(),
                                    'segundoApellidoAdministrador' => $administradorTemporal->getSegundoApellidoAdministrador()
                                );
                            }
                        }
                        $arrayJsonAdministrador = json_encode($arreglo);
                        ?>
                        <table >
                            <caption style="color:black;">Datos Administrador</caption>
                            <thead> 
                                <tr>
                                    <td>Cedula</td>
                                    <td>Nombre</td>
                                    <td>Primer Apellido</td>
                                    <td>SegundoApellido</td>
                                    <td colspan="2">Acciones</td> 
                                </tr>     
                            </thead>
                            <tbody> 
                                <?php
                                foreach ($administradores as $current) {
                                    echo '<tr>';
                                    echo $current->getCedulaAdministrador();
                                    echo '<input type="hidden" name="idhorario" id="idhorario" value="' . $current->getIdAdministrador() . '">';
                                    echo '<td>  ' . $current->getCedulaAdministrador() . ' </td>';
                                    echo '<td> ' . $current->getNombreAdministrador() . '</td>';
                                    echo '<td> ' . $current->getPrimerApellidoAdministrador() . ' </td>';
                                    echo '<td> ' . $current->getSegundoApellidoAdministrador() . ' </td>';
                                    echo '<td> <a idModificar name="' . $current->getIdAdministrador() . '" onclick="actualizarAdministrador(' . $current->getIdAdministrador() . ');guardarIdHorario(' . $current->getIdAdministrador() . ');mostrarModalModificar()" href="#popup2" class="popup-link" > <input type="button" value="Modificar" id="idModificar"></a> </td>';


                                    echo '</tr>';
                                }
                                ?>

                                </form>   
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>


                </div>
            </div>   


        </div>
    </div>
    
    <!-- segundo popup-->
    <a href="#popup2" class="popup-link"></a>
    <div class="modal-wrapper" id="popup2">
        <div class="popup2-contenedor" >
            <h2>Datos del Perfil</h2>
            <input type="hidden" name="idAdministradorModificar" id="idAdministradorModificar">
            <div>
                cedula:
               <input type="text" class="cedula" id="cedula">
                <br>
                <br>
            </div>


             Nombre:
             <input type="text" class="nombre" id="nombre">  
            <br>
            <br>  
            Primer Apellido:
            <input type="text" class="primerApellido" id="primerApellido">
            <br>
            <br>
            Profesor:
            <input type="text" class="segundoApellido" id="segundoApellido">
            <br>
            <br>
            <button type="button" onclick="actualizar()">ACTUALIZAR</button>

            <a class="popup2-cerrar" href="#">X</a>

        </div>
    </div>
</body>

<script type="text/javascript">

    function mostrarModalModificar() {


        var lAdministrador = eval(<?php echo $arrayJsonAdministrador ?>);
        for (i = 0; i < lAdministrador.length; i++) {
            if (lAdministrador[i].idAdministrador == idadministrador) {
                document.getElementById("idAdministradorModificar").value = lAdministrador[i].idAdministrador;

                document.getElementById("cedula").value = lAdministrador[i].cedulaAdministrador[i];
                document.getElementById("nombre").value = lAdministrador[i].nombreAdministrador[i];
                document.getElementById("primerApellido").value = lAdministrador[i].PrimerApellidoAdministrador[i];
                document.getElementById("segundoApellido").value = lAdministrador[i].segundoApellidoAdministrador[i];
            }
        }


    }


</script>
</html>
