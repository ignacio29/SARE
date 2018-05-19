<?php
    require_once 'articulosBusiness.php';
    $actionArticulo=$_POST['accion'];
    $articulosBussiness= new articulosBusiness();

   if($actionArticulo=="agregarArticulo"){
      session_start();
      $nombre= $_POST['nombre'];
      $serie=  $_POST['serie'];
      $tipo=  $_POST['tipo'];
      $descripcion=  $_POST['descripcion'];
      $estado= $_POST['estado'];
      $propietario = $_SESSION['usuario'];
      $tipoArticulo;
      $aprobacion=0;

       if(isset($_SESSION['administrador'])){
         if($_SESSION['administrador']=="administrador"){
           $tipoArticulo="Institucional";
           $aprobacion=1;
         }
       }else if(isset($_SESSION['asistente'])){
           if($_SESSION['asistente']=="asistente"){
             $tipoArticulo="Institucional";
             $aprobacion=1;
           }
       }else if(isset($_SESSION['estudiante'])){
         if($_SESSION['estudiante']=="estudiante"){
           $tipoArticulo="Personal";
         }
       }else {
         echo "Error";
       }


      if(isset($nombre) && !empty($nombre)  && isset($serie) && !empty($serie)  && isset($estado) && !empty($estado)){
        echo $resultado = $articulosBussiness->insertarTBArticulos($nombre,$serie,$tipo,$descripcion,$estado,$propietario,$tipoArticulo,$aprobacion);
      }else{
          echo "Error";
      }
    }

    if($actionArticulo=="mostrarArticulo"){
        session_start();
        $propietario = $_SESSION['usuario'];
        echo $resultado = $articulosBussiness->consultarTBArticulos($propietario);
    }

    if($actionArticulo=="mostrarArticuloInstitucional"){
        echo $resultado = $articulosBussiness->consultarTBArticulosInstitucionales();

    }

    if($actionArticulo=="mostrarArticuloPersonal"){
      echo $resultado = $articulosBussiness->consultarTBArticulosPersonales();

    }


    if($actionArticulo=="eliminarArticulo"){
        $idArticulo = $_POST['id'];
        echo $resultado = $articulosBussiness->eliminarTBArticulos($idArticulo);
    }


    if($actionArticulo=="consultarArticuloId"){
        $idArticulo = $_POST['id'];
        echo $resultado = $articulosBussiness->consultarTBArticuloId($idArticulo);

    }


    if($actionArticulo=="modificarArticulo"){
        $idArticulo = $_POST['id'];
        $nombre= $_POST['nombre'];
        $serie=  $_POST['serie'];
        $tipo=  $_POST['tipo'];
        $descripcion=  $_POST['descripcion'];
        $estado= $_POST['estado'];

        if(isset($nombre) && !empty($nombre)  && isset($serie) && !empty($serie)  && isset($estado) && !empty($estado) ){
          echo $resultado = $articulosBussiness->actualizarTBArticulos($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado);
        }else{
            echo "Error";
        }

    }


    if($actionArticulo=="modificarArticuloInstitucional"){
        $idArticulo = $_POST['id'];
        $nombre= $_POST['nombre'];
        $serie=  $_POST['serie'];
        $tipo=  $_POST['tipo'];
        $descripcion=  $_POST['descripcion'];
        $estado= $_POST['estado']; 

        if(isset($nombre) && !empty($nombre)  && isset($serie) && !empty($serie)  && isset($estado) && !empty($estado) ){
          echo $resultado = $articulosBussiness->actualizarTBArticulosInstitucionales($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado,1);
        }else{
            echo "Error";
        }

    }


    if($actionArticulo=="modificarArticuloPersonal"){
        $idArticulo = $_POST['id'];
        $nombre= $_POST['nombre'];
        $serie=  $_POST['serie'];
        $tipo=  $_POST['tipo'];
        $descripcion=  $_POST['descripcion'];
        $estado= $_POST['estado'];
        $aprobar=$_POST['aprobar'];

        if(isset($nombre) && !empty($nombre)  && isset($serie) && !empty($serie)  && isset($estado) && !empty($estado) ){
          echo $resultado = $articulosBussiness->actualizarTBArticulosPersonales($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado,$aprobar);
        }else{
            echo "Error";
        }

    }


    if($actionArticulo=="buscarPorTipoArticulos"){
      $tipoArticulo= $_POST['tipo'];
      session_start();
      $propietario = $_SESSION['usuario'];
      if(isset($_SESSION['administrador'])){
        if($_SESSION['administrador']=="administrador"){
           echo $resultado = $articulosBussiness->consultarPorTipoArticuloInstitucional($tipoArticulo);
        }
      }else if(isset($_SESSION['asistente'])){
          if($_SESSION['asistente']=="asistente"){
             echo $resultado = $articulosBussiness->consultarPorTipoArticuloInstitucional($tipoArticulo);
          }
      }else if(isset($_SESSION['estudiante'])){
        if($_SESSION['estudiante']=="estudiante"){
          echo $resultado = $articulosBussiness->consultarPorTipoArticulo($tipoArticulo,$propietario);
        }
      }else {
        echo "Error";
      }

  }


  if($actionArticulo=="buscarPorEstadoArticulos"){
      $estadoArticulo= $_POST['estado'];
      session_start();
      $propietario = $_SESSION['usuario'];
      if(isset($_SESSION['administrador'])){
        if($_SESSION['administrador']=="administrador"){
           echo $resultado = $articulosBussiness->consultarPorEstadoArticuloInstitucional($estadoArticulo);
        }
      }else if(isset($_SESSION['asistente'])){
          if($_SESSION['asistente']=="asistente"){
             echo $resultado = $articulosBussiness->consultarPorEstadoArticuloInstitucional($estadoArticulo);
          }
      }else if(isset($_SESSION['estudiante'])){
        if($_SESSION['estudiante']=="estudiante"){
          echo $resultado = $articulosBussiness->consultarPorEstadoArticulo($estadoArticulo,$propietario);
        }
      }else {
        echo "Error";
      }


  }

  if($actionArticulo=="buscarPalabra"){
    $cedula= $_POST['cedula'];
    echo $resultado = $articulosBussiness->buscarPalabra($cedula);

  }

  if($actionArticulo=="buscarPalabraP"){
    $cedula= $_POST['cedula'];
    echo $resultado = $articulosBussiness->buscarPalabraP($cedula);

  }

  if($actionArticulo=="buscarPalabraEs"){
    $cedula= $_POST['cedula'];
    session_start();
    echo $resultado = $articulosBussiness->buscarPalabraEs($cedula,$_SESSION['usuario']);

  }

  if($actionArticulo=="aprobarArticulo"){
    if (isset($_POST['id'])) {
      $cedula= $_POST['id'];
      echo $resultado = $articulosBussiness->aprobarArticulo($cedula);

    }else {
      echo "Error";
    }
  }


    if($actionArticulo=="buscarPorTipoArticulosP"){
        if (isset($_POST['tipo'])) {
          $tipoArticulo= $_POST['tipo'];
          echo $resultado = $articulosBussiness->consultarPorTipoArticuloPersonal($tipoArticulo);

        }else {
          echo "Error";
        }

    }



    if($actionArticulo=="buscarPorEstadoArticulosP"){
        if (isset($_POST['estado'])) {
          $estadoArticulo= $_POST['estado'];
          echo $resultado = $articulosBussiness->consultarPorEstadoArticuloPersonal($estadoArticulo);


        }else {
          echo "Error";
        }

    }
    if($actionArticulo=="buscarTipoArticulosEs"){
        if (isset($_POST['tipo'])) {
          session_start();
          $tipoArticulo= $_POST['tipo'];
          echo $resultado = $articulosBussiness->consultarPorTipoArticuloEst($tipoArticulo,$_SESSION['usuario']);

        }else {
          echo "Error";
        }

    }



    if($actionArticulo=="buscarEstadoArticulosEs"){
        if (isset($_POST['estado'])) {
          session_start();
          $estadoArticulo= $_POST['estado'];
          echo $resultado = $articulosBussiness->consultarPorEstadoArticuloEst($estadoArticulo,$_SESSION['usuario']);


        }else {
          echo "Error";
        }

    }


    if($actionArticulo=="buscarAprobadosArticulosP"){
          echo $resultado = $articulosBussiness->buscarAprobadosArticulosP();
    }

//---------------------------------------ARTICULOS DEFICIENTES--------------------------------------------------------

    if($actionArticulo=="reportarArticuloDanado"){
      session_start();
      echo $result = $articulosBussiness->reportarArticuloDanado($_SESSION['usuario']);
    }

    if($actionArticulo=="insertarArticuloDanado"){
      session_start();

        if( isset($_POST['descripcion']) &&  isset($_POST['idarticulo'])){

                $idarticulo = $_POST['idarticulo'];
                $descripcion= $_POST['descripcion'];
                $cedula=$_SESSION['usuario'];
                $fecha=  date("Y-m-d");

              if(!empty($descripcion)){

                  $result = $articulosBussiness->insertarArticuloDanado($idarticulo,$cedula,$descripcion,$fecha);

                  if($result==1){
                    echo $result = $articulosBussiness->updateEstadoArticulo($idarticulo);
                  }

              }else {
                
              }
          }
    }


    if($actionArticulo=="filtroClaseInstitucionalArticulo"){
      session_start();
        $clase = $_POST['clase'];
      echo $result = $articulosBussiness->filtroClaseInstitucionalArticulo($clase);
    }

    if($actionArticulo=="filtroClasePersonalArticulo"){
      session_start();

        $clase = $_POST['clase'];
      echo $result = $articulosBussiness->filtroClasePersonalArticulo($_SESSION['usuario'],$clase);
    }


    if($actionArticulo=="filtroTipoArticuloDeficiente"){
      session_start();
      $tipo = $_POST['tipo'];
      echo $result = $articulosBussiness->filtroTipoArticuloDeficiente($_SESSION['usuario'],$tipo);

    }

  if ($actionArticulo == "busquedaReportarArticuloDeficiente") {
        session_start();
        if(isset($_POST['palabra'])){
            $palabra=$_POST['palabra'];
            echo  $articulosBussiness->busquedaReportarArticuloDeficiente($_SESSION['usuario'],$palabra);
        }else {
          echo "camposNulos";
      }

  }


  if($actionArticulo=="verArticulosDeficientes"){
      session_start();
      echo $result = $articulosBussiness->verArticulosDeficientes();
  }

  if($actionArticulo=="filtroClaseArticuloDeficiente"){
      session_start();
      $clase = $_POST['clase'];
      echo $result = $articulosBussiness->filtroClaseArticuloDeficiente($clase);
  }

  if($actionArticulo=="filtroTipoArticuloDeficienteAd"){
      session_start();
      $tipo = $_POST['tipo'];
      echo $result = $articulosBussiness->filtroTipoArticuloDeficienteAd($tipo);
  }

  if ($actionArticulo == "busquedaArticulosDeficientesAd") {
      session_start();
      if(isset($_POST['palabra'])){
        $palabra=$_POST['palabra'];
        echo  $articulosBussiness->busquedaArticulosDeficientesAd($palabra);
      }else {
        echo "camposNulos";
      }

  }

  if ($actionArticulo == "eliminarArticuloDeficiente") {
    session_start();
    if (isset($_POST['idborrar'])) {
        $articuloId=$_POST['idborrar'];
        echo  $result=$articulosBussiness->eliminarArticuloDeficiente($articuloId);

    }
  }


  if ($actionArticulo == "updateEstadoArticuloDeficiente") {
    session_start();


    if (isset($_POST['idactualizar']) && isset($_POST['idEliminar'])){
        $articuloId=$_POST['idactualizar'];
        $iddano=$_POST['idEliminar'];

         $result=$articulosBussiness->updateEstadoArticuloDeficiente($articuloId);

        if($result==1){

          echo $result2=$articulosBussiness->deleteArticuloDeficiente($iddano);


        }else{
          echo "Error";
        }
    }else{
      echo "Campos vacios";
    }
  }
