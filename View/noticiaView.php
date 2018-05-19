<?php
   session_start();
   
   if (!isset($_SESSION["usuario"])) {
       header("Location: ../index.php?error=needlogin");
   }
   ?>

 <button id="cerrarNoticia" type="button" onclick="volverNoticias()" class="btn btn-primary btn-lg" style="display: none;">CERRAR NOTICIA</button>
<div  class="container">
   <header>
      <h2>NOTICIAS RESIDENCIALES</h2>
      <p>Eventos que te podr&iacutean interesar.</p>
   </header>

  

   <div id="noticiasResidenciales" >
   </div>

   <div id="contenidoNoticia" style="display: none;">
   </div>
</div>
 