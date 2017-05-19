// JavaScript Document
$(document).ready(function(e) {
	
	$('html,body').animate({scrollTop:'0px'}, 0); 
	submenu = $('.submenu');		
	cerrarSubmenu();
	
});


function mostrarSubmenu(){
	submenu.removeClass("ocultarsubmenu").addClass("versubmenu");
}

function cerrarSubmenu(){
	submenu.removeClass("versubmenu").addClass("ocultarsubmenu");
}

