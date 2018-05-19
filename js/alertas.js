function alerta(){
				//un alert
				alertify.alert("<b>Accion exitosa", function () {

					 //location.href = '../Presentacion/administradorView.php';
				});
			}

			function confirmar(id){
				tipo=document.getElementById("tipousuario").value;
				alertify.confirm("<p>¿ESTA SEGURO QUE DESEA ELIMINAR EL ELEMENTO SELECCIONADO?.<br><b>", function (e) {
					if (e) {
            if(tipo=="administrador"){
                    eliminarAdministrador(id);
              alertify.success("Se ha eliminado correctamente el Administrator");
            }else if(tipo=="cliente"){
                      eliminarCliente(id);
                alertify.success("Se ha eliminado correctamente el cliente");
              }else   if(tipo=="colaborador"){
                        eliminarColaborador(id);
                  alertify.success("Se ha eliminado correctamente el colaborador");
                }

					} else { alertify.error("No se ha eliminado ninguno");
					}
				});
				return false
			}

			function datos(){
				//un prompt
				alertify.prompt("Esto es un <b>prompt</b>, introduce un valor:", function (e, str) {
					if (e){
						alertify.success("Has pulsado '" + alertify.labels.ok + "'' e introducido: " + str);
					}else{
						alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
					}
				});
				return false;
			}

			function notificacion(){
				alertify.log("Esto es una notificación cualquiera.");
				return false;
			}

			function ok(){
				alertify.success("Visita nuestro <a href=\"http://blog.reaccionestudio.com/\" style=\"color:white;\" target=\"_blank\"><b>BLOG.</b></a>");
				return false;
			}

function accionExitosa(mensaje){
	alertify.success("SE "+mensaje+" CON EXITO.");
}
function accionNoExitosa(mensaje){
		alertify.error("NO SE "+mensaje+" CON EXITO.");
}

function accionExitosaB(mensaje){
	alertify.success(mensaje);
}
function accionNoExitosaB(mensaje){
		alertify.error(mensaje);
}


function accionValoresNulos(mensaje){
		alertify.error("NO SE "+mensaje);
}

function accionValoresNulosB(mensaje){
		alertify.error(mensaje);
}


			function error(){
				alertify.error("No se realizo la accion/a.");
				return false;
			}
