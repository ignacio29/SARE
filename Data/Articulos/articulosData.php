<?php
class articulosData {

    private $data;

    function __construct() {
        require_once '../../Data/data.php';
        $this->data = new Data();
    }

    function insertTBArticulos($nombre,$serie,$tipo,$descripcion,$estado,$propietario,$tipoArticulo,$aprobacion) {

        $nombreArticulo= $nombre;
        $serieArticulo= $serie;
        $tipoArt= $tipo;
        $descripcionArticulo= $descripcion;
        $estadoArticulo= $estado;
        $propietarioArticulo= $propietario;
        $articuloTipo=$tipoArticulo;
        $mensaje=0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $insertarArticulo = $conn->query("INSERT INTO tbarticulos(nombrearticulo,seriearticulo,idpropietario,tipoarticulo,descripcionarticulo,estadoarticulo,clasearticulo,aprobararticulo) VALUES('$nombreArticulo','$serieArticulo','$propietarioArticulo','$tipoArt','$descripcionArticulo','$estadoArticulo','$articuloTipo','$aprobacion')");

        if($insertarArticulo==TRUE){
            $mensaje= 1;

        }
        $conn->close();

        return $mensaje;
    }

    function deleteTBArticulos($idBorrar) {
      $mensaje=0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $eliminarArticulo = $conn->query("DELETE FROM tbarticulos WHERE idarticulo='$idBorrar'");
        if ($eliminarArticulo == true) {
            $mensaje=1;
        }

        $conn->close();
        return $mensaje;
    }

    function updateTBArticulos($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado) {

        $nombreArticulo= $nombre;
        $serieArticulo= $serie;
        $tipoArticulo= $tipo;
        $descripcionArticulo= $descripcion;
        $estadoArticulo= $estado;
        $id=$idArticulo;
        $mensaje=0;

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
          $result = $conn->query("UPDATE tbarticulos SET nombrearticulo='$nombreArticulo', seriearticulo='$serieArticulo',tipoarticulo='$tipoArticulo',descripcionarticulo='$descripcionArticulo',estadoarticulo='$estadoArticulo' WHERE idarticulo='$id'");
          if ($result == true) {
              $mensaje=1;
          } 
          $conn->close();
          return $mensaje;
    }

    function updateTBArticulosInstitucionales($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado,$aprobar) {

        $nombreArticulo= $nombre;
        $serieArticulo= $serie;
        $tipoArticulo= $tipo;
        $descripcionArticulo= $descripcion;
        $estadoArticulo= $estado;
        $id=$idArticulo;
        $articuloAprobar=$aprobar;
        $mensaje=0;

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
          $result = $conn->query("UPDATE tbarticulos SET nombrearticulo='$nombreArticulo', seriearticulo='$serieArticulo',tipoarticulo='$tipoArticulo',descripcionarticulo='$descripcionArticulo',estadoarticulo='$estadoArticulo',aprobararticulo='$articuloAprobar' WHERE idarticulo='$id'");
          if ($result == true) {
              $mensaje=1;
          } 
          $conn->close();
          return $mensaje;
    }

    public function obtenerSerie($serie){
        $booleano = 0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $result = $conn->query("SELECT * FROM tbarticulos WHERE seriearticulo='$serie'");

        if (mysqli_num_rows($result) > 0) {
            $booleano = 1;
        }
        mysqli_close($conn);
        return $booleano;
    }

    function updateTBArticulosPersonales($idArticulo,$nombre,$serie,$tipo,$descripcion,$estado,$aprobar) {

        $nombreArticulo= $nombre;
        $serieArticulo= $serie;
        $tipoArticulo= $tipo;
        $descripcionArticulo= $descripcion;
        $estadoArticulo= $estado;
        $id=$idArticulo;
        $articuloAprobar=$aprobar;
        $mensaje="";

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
          $result = $conn->query("UPDATE tbarticulos SET nombrearticulo='$nombreArticulo', seriearticulo='$serieArticulo',tipoarticulo='$tipoArticulo',descripcionarticulo='$descripcionArticulo',estadoarticulo='$estadoArticulo',aprobararticulo='$articuloAprobar' WHERE idarticulo='$id'");
          if ($result == true) {
              $mensaje="se modifico Correctamente";
          } else {
              $mensaje="Error al modificar el articulo";
          }
          $conn->close();
          return $mensaje;
    }

    function consultTBArticulos($cedEstudiante) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";
         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT * FROM tbarticulos WHERE idpropietario='$cedEstudiante'");

        if($result){
        while ($row = $result->fetch_assoc()) {
              $aprovado="";
              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              if($row['aprobararticulo']==0){
                $aprovado="NO";
              }elseif ($row['aprobararticulo']==1) {
                  $aprovado="SI";
              }
              $articulos=$articulos.'<td id=aprobadoarticulo'.$row['idarticulo'].'>'.$aprovado."</td>";

              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete"  data-toggle="modal" data-target="#delete"  onclick="eliminarArticuloEst('.$id.')"><span class="glyphicon glyphicon-trash"></span></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $articulos;
    }

    function consultTBArticulosInstitucionales() {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT * FROM tbarticulos WHERE clasearticulo='Institucional' AND estadoarticulo != 'DEFICIENTE' ");

        if($result){
        while ($row = $result->fetch_assoc()) {

              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="eliminarArticulo('.$id.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $articulos;
    }



    function consultTBArticulosPersonales() {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT e.cedulaestudiante,e.nombreestudiante,e.primerapellidoestudiante,a.nombrearticulo,a.idarticulo,
          a.seriearticulo,a.tipoarticulo,a.descripcionarticulo,a.estadoarticulo
           FROM tbarticulos a INNER JOIN tbestudiante e
          ON a.idpropietario= e.cedulaestudiante
          WHERE a.clasearticulo='Personal'  AND a.aprobararticulo !=1
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1
        " );
        if($result){
        while ($row = $result->fetch_assoc()) {
          $nombreCompleto=$row["nombreestudiante"]." ".$row["primerapellidoestudiante"];
          $articulos=$articulos."<tr>";
          $articulos=$articulos.'<td id=cedulaestudiante'.$row['idarticulo'].'>'.$row['cedulaestudiante']."</td>";
          $articulos=$articulos.'<td id=nombre'.$row['idarticulo'].'>'.$nombreCompleto."</td>";
          $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
          $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
          $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
          $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
          $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
          $id = $row['idarticulo'];
          $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Aprobar"><button class="btn btn-primary btn-xs" data-title="Edit" onclick="aprobarArticulo('.$id.')" id="aprobarArticulo"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';

          $articulos=$articulos."</tr>";

        }


        }else{
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $articulos;
    }

    function consultTBArticuloId($id) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulo = array();

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT * FROM tbarticulos WHERE idarticulo='$id'");

        if($result){
        while ($row = $result->fetch_assoc()) {
            array_push($articulo,$row);

        }


        }else{
            echo 'no se pudo acceder';
        }
        $conn->close();
        return json_encode($articulo);
    }

    function consultarPorTipoArticulo($tipoArticulo,$propietario) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT * FROM tbarticulos WHERE tipoarticulo='$tipoArticulo' AND idpropietario='$propietario'");

        if($result){
        while ($row = $result->fetch_assoc()) {

              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
;
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="eliminarArticulo('.$id.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $articulos;
    }

    function consultarPorTipoArticuloInstitucional($tipoArticulo) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT * FROM tbarticulos WHERE tipoarticulo='$tipoArticulo' AND clasearticulo='Institucional' AND estadoarticulo != 'DEFICIENTE'");

        if($result){
        while ($row = $result->fetch_assoc()) {

              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
;
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="eliminarArticulo('.$id.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'Error';
        }
        $conn->close();
        return $articulos;
    }

    function consultarPorEstadoArticulo($estadoArticulo,$propietario) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT * FROM tbarticulos WHERE estadoarticulo='$estadoArticulo' AND idpropietario='$propietario'");

        if($result){
        while ($row = $result->fetch_assoc()) {

              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
;
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="eliminarArticulo('.$id.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $articulos;
    }

function consultarPorEstadoArticuloInstitucional($estadoArticulo) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT * FROM tbarticulos WHERE estadoarticulo='$estadoArticulo' AND clasearticulo='Institucional' ");

        if($result){
        while ($row = $result->fetch_assoc()) {

              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
;
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="eliminarArticulo('.$id.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'no se pudo acceder';
        }
        $conn->close();
        return $articulos;
    }

    function consultarPorTipoArticuloPersonal($tipoArticulo) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT e.cedulaestudiante,e.nombreestudiante,e.primerapellidoestudiante,a.nombrearticulo,a.idarticulo,
          a.seriearticulo,a.tipoarticulo,a.descripcionarticulo,a.estadoarticulo
           FROM tbarticulos a INNER JOIN tbestudiante e
          ON a.idpropietario= e.cedulaestudiante
          WHERE a.clasearticulo='Personal' AND a.estadoarticulo != 'DEFICIENTE' AND a.aprobararticulo !=1 AND a.tipoarticulo ='$tipoArticulo'
          OR a.clasearticulo='Personal' AND a.estadoarticulo != 'DEFICIENTE' AND a.aprobararticulo !=1 AND a.tipoarticulo ='$tipoArticulo'
          OR a.clasearticulo='Personal' AND a.estadoarticulo != 'DEFICIENTE' AND a.aprobararticulo !=1 AND a.tipoarticulo ='$tipoArticulo'
          OR a.clasearticulo='Personal' AND a.estadoarticulo != 'DEFICIENTE' AND a.aprobararticulo !=1 AND a.tipoarticulo ='$tipoArticulo'
          OR a.clasearticulo='Personal' AND a.estadoarticulo != 'DEFICIENTE' AND a.aprobararticulo !=1 AND a.tipoarticulo ='$tipoArticulo'
        " );

        if($result){
        while ($row = $result->fetch_assoc()) {
              $nombreCompleto=$row["nombreestudiante"]." ".$row["primerapellidoestudiante"];
              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=cedulaestudiante'.$row['idarticulo'].'>'.$row['cedulaestudiante']."</td>";
              $articulos=$articulos.'<td id=nombre'.$row['idarticulo'].'>'.$nombreCompleto."</td>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Aprobar"><button class="btn btn-primary btn-xs" data-title="Edit"  onclick="aprobarArticulo('.$id.')" id="aprobarArticulo"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'Error';
        }

        $conn->close();
        return $articulos;
    }

    function consultarPorEstadoArticuloPersonal($estadoArticulo) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT e.cedulaestudiante,e.nombreestudiante,e.primerapellidoestudiante,a.nombrearticulo,a.idarticulo,
          a.seriearticulo,a.tipoarticulo,a.descripcionarticulo,a.estadoarticulo
           FROM tbarticulos a INNER JOIN tbestudiante e
          ON a.idpropietario= e.cedulaestudiante
          WHERE a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.estadoarticulo ='$estadoArticulo'
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.estadoarticulo ='$estadoArticulo'
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.estadoarticulo ='$estadoArticulo'
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.estadoarticulo ='$estadoArticulo'
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.estadoarticulo ='$estadoArticulo'
        " );

        if($result){
        while ($row = $result->fetch_assoc()) {
              $nombreCompleto=$row["nombreestudiante"]." ".$row["primerapellidoestudiante"];
              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=cedulaestudiante'.$row['idarticulo'].'>'.$row['cedulaestudiante']."</td>";
              $articulos=$articulos.'<td id=nombre'.$row['idarticulo'].'>'.$nombreCompleto."</td>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Aprobar"><button class="btn btn-primary btn-xs" data-title="Edit"  onclick="aprobarArticulo('.$id.')" id="aprobarArticulo"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'Error';
        }

        $conn->close();
        return $articulos;
    }


    function buscarAprobadosArticulosP() {

              $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
              $conn->set_charset('utf8');
              $articulos = "";

               if (!$conn) {
                  echo 'Error de conexion';
              }
              $result = $conn->query("SELECT e.cedulaestudiante,e.nombreestudiante,e.primerapellidoestudiante,a.nombrearticulo,a.idarticulo,
                a.seriearticulo,a.tipoarticulo,a.descripcionarticulo,a.estadoarticulo
                 FROM tbarticulos a INNER JOIN tbestudiante e
                ON a.idpropietario= e.cedulaestudiante
                WHERE a.clasearticulo='Personal'  AND a.aprobararticulo =1
                OR a.clasearticulo='Personal'  AND a.aprobararticulo =1
                OR a.clasearticulo='Personal'  AND a.aprobararticulo =1
                OR a.clasearticulo='Personal'  AND a.aprobararticulo =1
                OR a.clasearticulo='Personal'  AND a.aprobararticulo =1
              " );

              if($result){
              while ($row = $result->fetch_assoc()) {
                    $nombreCompleto=$row["nombreestudiante"]." ".$row["primerapellidoestudiante"];
                    $articulos=$articulos."<tr>";
                    $articulos=$articulos.'<td id=cedulaestudiante'.$row['idarticulo'].'>'.$row['cedulaestudiante']."</td>";
                    $articulos=$articulos.'<td id=nombre'.$row['idarticulo'].'>'.$nombreCompleto."</td>";
                    $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
                    $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
                    $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
                    $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
                    $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
                    $id = $row['idarticulo'];
                    $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Aprobar"><button class="btn btn-primary btn-xs" data-title="Edit"  onclick="aprobarArticulo('.$id.')" id="aprobarArticulo" disabled><span class="glyphicon glyphicon-pencil"></span></button></p></td>';

                    $articulos=$articulos."</tr>";

              }


              }else{
                  echo 'Error';
              }

              $conn->close();
              return $articulos;
    }

    function buscarPalabra($palabra) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT * FROM tbarticulos WHERE clasearticulo='Institucional' AND estadoarticulo != 'DEFICIENTE' AND nombrearticulo LIKE '%$palabra%'
        OR  clasearticulo='Institucional' AND estadoarticulo != 'DEFICIENTE' AND seriearticulo LIKE '%$palabra%'
        OR  clasearticulo='Institucional' AND estadoarticulo != 'DEFICIENTE' AND tipoarticulo LIKE '%$palabra%'
        OR  clasearticulo='Institucional' AND estadoarticulo != 'DEFICIENTE' AND descripcionarticulo LIKE '%$palabra%'
        OR  clasearticulo='Institucional' AND estadoarticulo != 'DEFICIENTE' AND estadoarticulo LIKE '%$palabra%'
        " );

        if($result){
        while ($row = $result->fetch_assoc()) {

              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="eliminarArticulo('.$id.')"><span class="glyphicon glyphicon-trash"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'Error';
        }
        $conn->close();
        return $articulos;
    }


    function buscarPalabraP($palabra) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT e.cedulaestudiante,e.nombreestudiante,e.primerapellidoestudiante,a.nombrearticulo,a.idarticulo,
          a.seriearticulo,a.tipoarticulo,a.descripcionarticulo,a.estadoarticulo
           FROM tbarticulos a INNER JOIN tbestudiante e
          ON a.idpropietario= e.cedulaestudiante
          WHERE a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.nombrearticulo LIKE '%$palabra%'
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.seriearticulo LIKE '%$palabra%'
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.tipoarticulo LIKE '%$palabra%'
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.descripcionarticulo LIKE '%$palabra%'
          OR a.clasearticulo='Personal'  AND a.aprobararticulo !=1  AND a.estadoarticulo LIKE '%$palabra%'
        " );

        if($result){
        while ($row = $result->fetch_assoc()) {
              $nombreCompleto=$row["nombreestudiante"]." ".$row["primerapellidoestudiante"];
              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=cedulaestudiante'.$row['idarticulo'].'>'.$row['cedulaestudiante']."</td>";
              $articulos=$articulos.'<td id=nombre'.$row['idarticulo'].'>'.$nombreCompleto."</td>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Aprobar"><button class="btn btn-primary btn-xs" data-title="Edit"  onclick="aprobarArticulo('.$id.')" id="aprobarArticulo"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';

              $articulos=$articulos."</tr>";

        }


        }else{
            echo 'Error';
        }
        $conn->close();
        return $articulos;
    }


    function buscarPalabraEs($palabra,$cedula) {

        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $articulos = "";

         if (!$conn) {
            echo 'Error de conexion';
        }
        $result = $conn->query("SELECT *
           FROM tbarticulos a

          WHERE a.clasearticulo='Personal' AND a.idpropietario= '$cedula'  AND a.nombrearticulo LIKE '%$palabra%'
          OR a.clasearticulo='Personal' AND a.idpropietario= '$cedula'  AND a.seriearticulo LIKE '%$palabra%'
          OR a.clasearticulo='Personal' AND a.idpropietario= '$cedula'  AND a.tipoarticulo LIKE '%$palabra%'
          OR a.clasearticulo='Personal' AND a.idpropietario= '$cedula'  AND a.descripcionarticulo LIKE '%$palabra%'
          OR a.clasearticulo='Personal' AND a.idpropietario= '$cedula'  AND a.estadoarticulo LIKE '%$palabra%'
        " );

        if($result){
        while ($row = $result->fetch_assoc()) {
          $aprovado="";
          $articulos=$articulos."<tr>";
          $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
          $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
          $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
          $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
          $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
          if($row['aprobararticulo']==0){
            $aprovado="NO";
          }elseif ($row['aprobararticulo']==1) {
              $aprovado="SI";
          }
          $articulos=$articulos.'<td id=aprobadoarticulo'.$row['idarticulo'].'>'.$aprovado."</td>";

          $id = $row['idarticulo'];
          $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
          $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete"  data-toggle="modal" data-target="#delete"  onclick="eliminarArticuloEst('.$id.')"><span class="glyphicon glyphicon-trash"></span></span></button></p></td>';

          $articulos=$articulos."</tr>";

        }


        }else{
            echo 'Error';
        }
        $conn->close();
        return $articulos;
    }



        function consultarPorTipoArticuloEst($tipoArticulo,$cedula) {

            $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
            $conn->set_charset('utf8');
            $articulos = "";

             if (!$conn) {
                echo 'Error de conexion';
            }

            $result = $conn->query("SELECT * FROM tbarticulos a
              WHERE a.clasearticulo='Personal' AND a.idpropietario= '$cedula'  AND a.tipoarticulo ='$tipoArticulo'
            " );

            if($result){
            while ($row = $result->fetch_assoc()) {
              $aprovado="";
              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              if($row['aprobararticulo']==0){
                $aprovado="NO";
              }elseif ($row['aprobararticulo']==1) {
                  $aprovado="SI";
              }
              $articulos=$articulos.'<td id=aprobadoarticulo'.$row['idarticulo'].'>'.$aprovado."</td>";

              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete"  data-toggle="modal" data-target="#delete"  onclick="eliminarArticuloEst('.$id.')"><span class="glyphicon glyphicon-trash"></span></span></button></p></td>';

              $articulos=$articulos."</tr>";

            }


            }else{
                echo 'Error';
            }

            $conn->close();
            return $articulos;
        }

        function consultarPorEstadoArticuloEst($estadoArticulo,$cedula) {

            $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
            $conn->set_charset('utf8');
            $articulos = "";

             if (!$conn) {
                echo 'Error de conexion';
            }
            $result = $conn->query("SELECT * FROM tbarticulos a
              WHERE a.clasearticulo='Personal' AND a.idpropietario= '$cedula'  AND  a.estadoarticulo ='$estadoArticulo'
            " );
 
            if($result){
            while ($row = $result->fetch_assoc()) {
              $aprovado="";
              $articulos=$articulos."<tr>";
              $articulos=$articulos.'<td id=nombrearticulo'.$row['idarticulo'].'>'.$row['nombrearticulo']."</td>";
              $articulos=$articulos.'<td id=seriearticulo'.$row['idarticulo'].'>'.$row['seriearticulo']."</td>";
              $articulos=$articulos.'<td id=tipoarticulo'.$row['idarticulo'].'>'.$row['tipoarticulo']."</td>";
              $articulos=$articulos.'<td id=descripcionarticulo'.$row['idarticulo'].'>'.$row['descripcionarticulo']."</td>";
              $articulos=$articulos.'<td id=estadoarticulo'.$row['idarticulo'].'>'.$row['estadoarticulo']."</td>";
              if($row['aprobararticulo']==0){
                $aprovado="NO";
              }elseif ($row['aprobararticulo']==1) {
                  $aprovado="SI";
              }
              $articulos=$articulos.'<td id=aprobadoarticulo'.$row['idarticulo'].'>'.$aprovado."</td>";

              $id = $row['idarticulo'];
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  onclick="cargarVistaModificarArticulo('.$id.')" id="idModificar"><span class="glyphicon glyphicon-pencil"></span></button></p></td>';
              $articulos=$articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete"  data-toggle="modal" data-target="#delete"  onclick="eliminarArticuloEst('.$id.')"><span class="glyphicon glyphicon-trash"></span></span></button></p></td>';

              $articulos=$articulos."</tr>";

            }


            }else{
                echo 'Error';
            }

            $conn->close();
            return $articulos;
        }


    function aprobarArticulo($id) {
      $mensaje=0;
        $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        $conn->set_charset('utf8');
        $result = $conn->query("UPDATE tbarticulos SET aprobararticulo=1 WHERE idarticulo='$id'" );
        if($result==1){
          $mensaje=1;
        }
        return $mensaje;
    }

/////////////////////////Reportar Articulos Danados////////////////////////////////////////////
     function reportarArticuloDanado($cedula) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Articulos ="";

      $result = $conn->query("CALL reportarArticulosDeficientes(".$cedula.")");

            if ($result) {

                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $id = $row['idarticulo'];
                  $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  id="idModificar" onclick="insertarArticulo('.$id.')"><span class="glyphicon glyphicon-warning-sign"></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }

//////////////////////////////////////7FILTRO PARA LA CLASE INSTITUCIONAL////////////////////////////////////
     function filtroClaseInstitucionalArticulo($clase) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Articulos ="";

      $result = $conn->query("CALL filtroClaseInstitucionalArticulo('$clase')");

            if ($result) {

                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $id = $row['idarticulo'];
                  $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  id="idModificar" onclick="insertarArticulo('.$id.')"><span class="glyphicon glyphicon-warning-sign"></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }

    //////////////////////////////////////7FILTRO PARA LA CLASE PERSONAL////////////////////////////////////
     function filtroClasePersonalArticulo($cedula,$clase) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Articulos ="";

      $result = $conn->query("CALL filtroClasePersonalArticulo(".$cedula.",'$clase')");

            if ($result) {

                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $id = $row['idarticulo'];
                  $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  id="idModificar" onclick="insertarArticulo('.$id.')"><span class="glyphicon glyphicon-warning-sign"></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }

     //////////////////////////////////////7FILTRO PARA tipo articulo deficienteL////////////////////////////////////
     function filtroTipoArticuloDeficiente($cedula,$tipo) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Articulos ="";

      $result = $conn->query("CALL filtroTipoArticuloDeficiente(".$cedula.",'$tipo')");

            if ($result) {

                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $id = $row['idarticulo'];
                  $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  id="idModificar" onclick="insertarArticulo('.$id.')"><span class="glyphicon glyphicon-warning-sign"></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }



     //////////////////////////////////////7FILTRO Por palabra////////////////////////////////////
     function busquedaReportarArticuloDeficiente($cedula,$palabra) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');

      $Articulos ="";
      $palabra='%'.$palabra.'%';
      $result = $conn->query("CALL busquedaReportarArticuloDeficiente(".$cedula.",'$palabra')");

            if ($result) {
              
                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $id = $row['idarticulo'];
                    $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Editar"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#actualizarArticulo"  id="idModificar" onclick="insertarArticulo('.$id.')"><span class="glyphicon glyphicon-warning-sign""></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }


     function insertarArticuloDanado($id,$cedula,$descripcion,$fecha) {

        $booleano = 0;
        $idarticulo= $id;
        $cedulacreador = $cedula;
        $descripciondanado = $descripcion;
        $fecha = $fecha;

        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $statement = $conn->prepare("CALL insertArticuloDanado(?,?,?,?)");
        $statement->bind_param("isss", $idarticulo, $cedulacreador, $descripciondanado, $fecha);
        $statement->execute();

        if ($statement == TRUE) {
            $booleano = 1;
        } else {
            echo 'error';
        }
        $statement->close();
        $conn->close();

        return $booleano;
    }

    public function updateEstadoArticulo($id) {
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //   $conn_set_charset("utf8");
        $result = $conn->query("CALL updateEstadoArticulo('$id')");
        $conn->close();
        return $result;
    }

    /////////////////////////VER ARTICULOS DEFICIENTES////////////////////////////////////////////
     function verArticulosDeficientes() {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Articulos ="";

      $result = $conn->query("CALL verArticulosDeficientes()");

            if ($result) {

                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['cedula']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['descripcion']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['fecha']."</td>";
                    $id = $row['iddano'];
                   $idarticulo= $row['idarticulo'];
                  $Articulos=$Articulos.'<td><button class="btn btn-success btn-xs" id="idModificar" onclick="updateEstadoArticuloDeficiente('.$idarticulo.','.$id.')"><span class="glyphicon glyphicon-wrench"></span></button></td>';
                   $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="eliminar('.$id.')" id="btnEliminar"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }

      /////////////////////////VER ARTICULOS DEFICIENTES filtro clase////////////////////////////////////////////
     function filtroClaseArticuloDeficiente($clase) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Articulos ="";

      $result = $conn->query("CALL filtroClaseArticuloDeficiente('$clase')");

            if ($result) {

                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['cedula']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['descripcion']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['fecha']."</td>";
                    $id = $row['iddano'];
                    $idarticulo= $row['idarticulo'];
                  $Articulos=$Articulos.'<td><button class="btn btn-success btn-xs" id="idModificar" onclick="updateEstadoArticuloDeficiente('.$idarticulo.','.$id.')"><span class="glyphicon glyphicon-wrench"></span></button></td>';
                   $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="eliminar('.$id.')" id="btnEliminar"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }


      /////////////////////////VER ARTICULOS DEFICIENTES filtro tipo////////////////////////////////////////////
     function filtroTipoArticuloDeficienteAd($tipo) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Articulos ="";

      $result = $conn->query("CALL filtroTipoArticuloDeficienteAd('$tipo')");

            if ($result) {

                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['cedula']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['descripcion']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['fecha']."</td>";
                    $id = $row['iddano'];
                    $idarticulo= $row['idarticulo'];
                  $Articulos=$Articulos.'<td><button class="btn btn-success btn-xs" id="idModificar" onclick="updateEstadoArticuloDeficiente('.$idarticulo.','.$id.')"><span class="glyphicon glyphicon-wrench"></span></button></td>';
                   $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="eliminar('.$id.')" id="btnEliminar"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }



     /////////////////////////VER ARTICULOS DEFICIENTES filtro palabra////////////////////////////////////////////
     function busquedaArticulosDeficientesAd($palabra) {

      $conn = mysqli_connect($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
      $conn->set_charset('utf8');
      $Articulos ="";
      $palabra='%'.$palabra.'%';
      $result = $conn->query("CALL busquedaArticulosDeficientesAd('$palabra')");

            if ($result) {

                while ($row = $result->fetch_assoc()) {

                    $Articulos=$Articulos."<tr>";
                    $Articulos=$Articulos.'<td>'.$row['cedula']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['nombre'].' '.$row['apellido']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['nombreArti']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['serie']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['tipo']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['clase']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['descripcion']."</td>";
                    $Articulos=$Articulos.'<td>'.$row['fecha']."</td>";
                    $id = $row['iddano'];
                    $idarticulo= $row['idarticulo'];
                  $Articulos=$Articulos.'<td><button class="btn btn-success btn-xs" id="idModificar" onclick="updateEstadoArticuloDeficiente('.$idarticulo.','.$id.')"><span class="glyphicon glyphicon-wrench"></span></button></td>';
                   $Articulos=$Articulos.'<td><p data-placement="top" data-toggle="tooltip" title="Eliminar"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" onclick="eliminar('.$id.')" id="btnEliminar"><span class="glyphicon glyphicon-trash"></span></button></p></td>';
                    $Articulos=$Articulos."</tr>";


                }
            } else {
                echo 'Error';
            }
            $conn->close();
            return $Articulos;
    }

      function eliminarArticuloDeficiente($idBorrar) {
        $booleano=0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $statement = $conn->prepare("CALL eliminarArticuloDeficiente(?)");
        $statement->bind_param("i", $idBorrar);
        $statement->execute();
        if ($statement == true) {
            $booleano=1;
        }
        $statement->close();
        $conn->close();

        return $booleano;
    }


    /////////////UPDATE ESTADO ARTICULO///////////////////////
    function updateEstadoArticuloDeficiente($idActualizar) {
        $booleano=0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $statement = $conn->prepare("CALL updateEstadoArticuloDeficiente(?)");
        $statement->bind_param("i", $idActualizar);
        $statement->execute();
        if ($statement == true) {
            $booleano=1;
        }
        $statement->close();
        $conn->close();

        return $booleano;
    }

     function deleteArticuloDeficiente($idDano) {
        $booleano=0;
        $conn = new mysqli($this->data->getServer(), $this->data->getUser(), $this->data->getPass(), $this->data->getDbName());
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }


        $statement = $conn->prepare("CALL deleteArticuloDeficiente(?)");
        $statement->bind_param("i", $idDano);
        $statement->execute();
        if ($statement == true) {
            $booleano=1;
        }
        $statement->close();
        $conn->close();

        return $booleano;
    }


}
