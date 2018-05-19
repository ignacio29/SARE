$(document).ready(main);

var contador = 1;

function main () {
	$('.menu_bar').click(function(){
		if (contador == 1) {
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}
	});

	// Mostramos y ocultamos submenus
	$('.submenu').click(function(){
		$(this).children('.children').slideToggle();
	});
}

 function ocultarCarrusel(input){
 	if(input== 1){
		document.getElementById("top").style.display="none";
						
 	}else if (input==2) {
 		document.getElementById("top").style.display="block";
 	}
 }