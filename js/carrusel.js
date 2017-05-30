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
			$(".previewvideo").css("display","block");
			$("#videoyoutube").css("display","none");
			$("#videoyoutube")[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
			 $(".izq").css("display","none");
			 $(".dch").css("display","block");
		}
		$(".destacado").removeClass("rojo").addClass("rosa");
		$(".destacadomobile").removeClass("rojo").addClass("rosa");	
	}else{
		controlCarrusel++;
		if(controlCarrusel>2){
			$("#carrusel").removeClass("posicion2").addClass("posicion1");
			controlCarrusel=1;
			$(".previewvideo").css("display","block");
			$("#videoyoutube").css("display","none");
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
		$(".destacado").removeClass("rosa").addClass("rojo");
		$(".destacadomobile").removeClass("rosa").addClass("rojo");
	}

}

$(document).ready(function(e) {
	$("footer").addClass("footerfijo");
	$(".izq").css("display","none");
	$(".destacado").removeClass("rojo").addClass("rosa");
	$(".destacadomobile").removeClass("rojo").addClass("rosa");	
});

function clickvideo(){
	$(".previewvideo").css("display","none");
	$("#videoyoutube").css("display","block");
	$("#videoyoutube")[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
	
	ga('send', 'event', 'Botón', ' Home_Video ');
}

