
function mostrarSubmenu(){
	submenu.removeClass("ocultarsubmenu").addClass("versubmenu");
}

function cerrarSubmenu(){
	submenu.removeClass("versubmenu").addClass("ocultarsubmenu");
}



var controlMenu=0;


function vermenu(){

	menu = $('#menumobile');
       // ga('send', 'event','boton','Menu');
	if(controlMenu==0){
			//muestro menu
			controlMenu=1;
			menu.addClass('visible');
			menu.removeClass('oculto');

		}else{
			//oculto menu
			controlMenu=0;
			menu.addClass('oculto');
			menu.removeClass('visible');
		}

}

var controlSubMenuMobile=0;

function versub(){
	if(controlSubMenuMobile==0){
		controlSubMenuMobile=1;
		$('#sub1').removeClass("novisible").addClass("visible");
		$('#sub2').removeClass("novisible").addClass("visible");
		$('#sub3').removeClass("novisible").addClass("visible");
		$('#flecha_desplegable').addClass("girar");
	}else{
		controlSubMenuMobile=0;
		$('#sub1').removeClass("visible").addClass("novisible");
		$('#sub2').removeClass("visible").addClass("novisible");
		$('#sub3').removeClass("visible").addClass("novisible");
		$('#flecha_desplegable').removeClass("girar");
	}
}

$(document).ready(function(e) {
	$('html,body').animate({scrollTop:'0px'}, 0);
	submenu = $('.submenu');
	cerrarSubmenu();

	//OPEN/CLOSE MENU
		$('.icono_menu').click(function(){
			$('.cd-menu-icon').toggleClass('is-clicked');
			vermenu();
	});
	
	
});
