
</body>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>SARE</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fonts.css">

	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/Jquery.js"></script>


	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	<script scr="js/jsContenido.js"></script> 
	<script src="js/sesiones.js"></script>
	<script src="js/usuarios.js"></script>
	<script src="js/cargarContenido.js" type="text/javascript"></script>
	<script src="js/validacionesFormularios.js" type="text/javascript"></script>
	<script src="js/jquery-latest.js"></script>
	<script src="js/main.js"></script>
</head>

<body>
	<header>
		
		<div class="menu_bar"> 
			<a href="#" class="btn-menu"><span class="icon-menu"></span>MENU</a>
		</div>
		<nav>
		<div class="logo">
			<img src="imagenes/logoSare4.png" WIDTH=180 HEIGHT=110 alt=""> 
		</div>
			<ul>
				<li><a href="index.php"><span class="icon-home"></span>INICIO</a></li>
				
				<li><a href="#mision" onclick="verificarSeccion('mision')"><span class="icon-leaf"></span>MISI&OacuteN</a></li>
				
				<li><a href="#vision" onclick="verificarSeccion('vision')" ><span class="icon-eye"></span>VISI&OacuteN</a></li>
				
				<li>
					<a href="#historia" onclick="verificarSeccion('historia')"><span class="icon-library"></span>HISTORIA</a>
				</li>
				
				<li>
					<a href="#contactenos"  onclick="verificarSeccion('contactenos')" ><span class="icon-address-book"></span>CONTACTENOS</a>
				</li>
				
				<li class="submenu dropdown" >
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-enter"></span>INICIAR SESI&OacuteN</a>

                   <ul class="dropdown-menu" style="padding: 50px;min-width: 400px;" ID="menuLogin">
 
                         <div class="row">
						  
								<header>
									<center><h2>SARE</h2></center>
								</header> 

								<form class="form">
									<label>CORREO</label>
									<input type="email" class="form-control" id="user" placeholder="Email address" required> 
									<br>
									<label>CONTRASEÑA</label>
									<input type="password" class="form-control" id="pass" placeholder="Password" required>	
								</form> 
								<br>
								<div class="form-group">
									 
									<li>
										<button id="ingresar" onclick="VerificarLogin()"  name="registarNoticia" >Ingresar</button>

									</li>
									<li> 
										<a id="linkRegistro"  href="#FormRegistro" onclick="verificarSeccion('registrarme')"style="display: none;"></a>
										 <button id="registrarme" onclick="cargaContenido()"  name="registarNoticia" >Registrarme</button>
									</li>	
								</div> 
								
								<a href="#" onclick="" >¿Olvido su contraseña?</a> 
							 
							 </div> 
                   </ul>
                </li>

				 
			</ul>
		</nav>

	</header>

<!-- Main -->
			<div id="main">

				<!-- Intro -->
					<section id="top" class="one">
						<div class="container"> 
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="1"></li>
									<li data-target="#myCarousel" data-slide-to="2"></li>
								</ol>

								<!-- Wrapper for slides -->
								<div class="carousel-inner">
									<div class="item active">
										<a href="#" class="image fit"><img src="imagenes/inicioHorarios.JPG" alt="Horarios" style="width:100%;"></a>
									</div>

									<div class="item ">
										<a href="#" class="image fit"><img src="imagenes/inicioNoticias.JPG" alt="Noticias" style="width:100%;"></a>
									</div>

									<div class="item ">
										<a href="#" class="image fit"><img src="imagenes/inicioMensajes.JPG" alt="Mensajes" style="width:100%;"></a>
									</div>

									<div class="item">
										<a href="#" class="image fit"><img src="imagenes/inicioArticulos.JPG" alt="Articulos" style="width:100%;"></a>
									</div>		

									<div class="item">
										
										<a href="#" class="image fit"><img src="imagenes/inicioResidentes.JPG" alt="Estudiantes" style="width:100%;"></a>
									</div>

								</div>

								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</section>


					<section id="mision" class="two" style="display: none;">
						<div class="container">

						<header>
							<h2>Misi&oacuten</h2>
						</header> 
						<p>La Universidad Nacional genera, comparte y comunica conocimientos, y forma profesionales humanistas con actitud crítica y creativa, que contribuyen con la transformaci&oacuten democr&aacutetica y progresiva de las comunidades y la sociedad hacia planos superiores de bienestar. Con la acci&oacuten sustantiva contribuye a la sustentabilidad ecosocial y a una convivencia pac&iacutefica, mediante acciones pertinentes y solidarias, preferentemente, con los sectores sociales menos favorecidos o en riesgo de exclusi&oacuten.</p>

						</div>

					</section>

					<section id="vision" class="two" style="display: none;">
						<div class="container"> 
							<header>
								<h2>Visi&oacuten</h2>
							</header> 
							<p>La Universidad Nacional será referente por su excelencia académica, por el ejercicio de su autonom&iacutea, innovaci&oacuten y compromiso social en los &aacutembitos regional y nacional, con reconocimiento y proyecci&oacuten internacional, con énfasis en Am&eacuterica Latina y el Caribe. Su acci&oacuten sustantiva propiciar&aacute un desarrollo humano sustentable, integral e incluyente que se fundamentará en el ejercicio y la promoción del respeto de los derechos humanos, el diálogo de saberes, la interdisciplinariedad y un pensamiento cr&iacutetico. Su gesti&oacuten institucional se caracterizar&aacute por ser &aacutegil, flexible, desconcentrada, con participaci&oacuten democr&aacutetica, transparente, equitativa e inclusiva, que promociona estilos de vida saludable.</p>
	 
						</div>

					</section>


					<section id="historia" class="two" style="display: none;">
						<div class="container"> 
							<header>
								<h2>Historia</h2>
							</header> 
							<p>La creación de la Universidad Nacional (UNA) es uno de esos proyectos sobre los que se ha logrado el consenso en la Asamblea Legislativa, dado el interés que existía por dotar al país de instituciones que contribuyeran con la formación de su gente; de ahí que el trámite de aprobación se diera en forma expedita. Tras su remisión, en setiembre de 1972, por parte del Poder Ejecutivo, los 50 diputados presentes aprobaban, el 7 de febrero de 1973, y por unanimidad, la Ley No. 5182, con la que se daba origen a una de las instituciones más representativas de la Educación Superior costarricense de los últimos 50 años. El 15 de febrero de 1973 el presidente de la República, José Figueres Ferrer y el ministro de Educación, Uladislao Gámez Solano, sancionaban la ley; y solo un mes después, el 14 de marzo, la UNA inauguraba su primer curso lectivo, con un acto especial, en el parque central de Heredia, encomendado a su primer rector, Benjamín Núñez. La UNA es precedida por la Escuela Normal de Costa Rica (1914), dedicada a la formación de maestros y la Escuela Normal Superior (1968), cuyo compromiso fue la formación de profesores de enseñanza media. De ambas instituciones heredó no solo la infraestructura sino una cultura pedagógica que repercutiría luego en su vocación educativo-docente y humanística. Al crearse la UNA, las Escuelas Normales de Pérez Zeledón y de Liberia pasaron a ser secciones regionales de la nueva universidad estatal. Son frecuentes las referencias que se hacen en este período a la universidad necesaria que nace con la UNA. Pero más que un concepto, se trata de una filosofía que promulgó su primer rector y que ha marcado a esta institución. “En esta tarea hemos tenido la preocupación no tanto de concebir y construir simplemente una universidad más, sino de darle al país una Universidad Necesaria que, contrayendo un compromiso efectivo con su realidad nacional, pueda servirle para cumplir un destino histórico con prosperidad, justicia y libertad", enunció el presbítero Benjamín Núñez. La consigna de brindar una educación superior de calidad a todos los sectores que conforman la sociedad y mayores oportunidades a los grupos más necesitados de la población costarricense, sigue tan vigente como entonces. La UNA no solo ha logrado consolidar su imagen de Universidad Necesaria, con la que fue concebida y por la que siguen apostando sus dirigentes, sino que reafirma dicho compromiso al expandir sus fronteras a diferentes regiones del país, donde se hace necesaria su presencia.</p>
	 
						</div>
					</section>


					<section id="contactenos" class="two" style="display: none;">
						<div class="container"> 
							<header>
								<h2>Contactenos</h2>
							</header>
							<p>TELEFONOS-CORREOS-UBICACION</p>
	 
						</div>

					</section>

					<section id="FormRegistro" class="two" style="display: none;"> 

					</section>
		<!-- Footer -->
			<div id="footer">
 
				<!-- Copyright -->
				<ul class="copyright">
					<li><p id="textofinal">SISTEMA DE ADMINISTRACION DE RESIDENCIAS ESTUDIANTILES</p></li>
				</ul>

				<!-- Copyright -->
				<ul class="copyright">
					<li>&copy; Untitled. All rights reserved.</li>
					<li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
					

			</div>

</div>

			
</body>
</html>