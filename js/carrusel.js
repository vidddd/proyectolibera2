var controlCarrusel = 1;
var totalCarrusel=2;


function moverCarrusel(direccion){
	
	
	if(direccion=="izq"){
		controlCarrusel--;
		if(controlCarrusel<1){
			$("#carrusel").removeClass("posicion1").addClass("posicion2");
			 $(".izq").css("display","block");
			 $(".dch").css("display","none");
			controlCarrusel=2;
		}else{
			$("#carrusel").removeClass("posicion2").addClass("posicion1");
			$("#videoyoutube")[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
			 $(".izq").css("display","none");
			 $(".dch").css("display","block");
		}
	}else{
		controlCarrusel++;
		if(controlCarrusel>2){
			$("#carrusel").removeClass("posicion2").addClass("posicion1");
			controlCarrusel=1;
			$("#videoyoutube")[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*'); 
			$(".izq").css("display","none");
			$(".dch").css("display","block");
		}else{
			$("#carrusel").removeClass("posicion1").addClass("posicion2");
			$('#videoyoutube').each(function(){
			 $(".izq").css("display","block");
			 $(".dch").css("display","none"); 
			});
		}
	}

}

$(document).ready(function(e) {
	$("footer").addClass("footerfijo");
	 $(".izq").css("display","none");	
});


