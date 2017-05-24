var seccionActual="";

function verFormulario(seccion){	
	
	if(seccionActual==""){
		
		if(seccion=="redes"){
			
			seccionActual="redes";
			$("#btn1").css("display","none");
			$(".azul").addClass("marcado1");
			$(".solapa_azul").css("display","block");
			
		}else if(seccion=="banners"){
			
			seccionActual="banners";
			$("#btn2").css("display","none");
			$(".rosa").addClass("marcado2");
			$(".solapa_rosa").css("display","block");
			
		}else{
			
			seccionActual="manifiesto";
			$("#btn3").css("display","none");
			$(".naranja").addClass("marcado3");
			
		}
		
		$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
		$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 50 + 'px'}, 1000);
		
	}	else	{
		
		$("#btn1").css("display","block");
		$("#btn2").css("display","block");
		$("#btn3").css("display","block");
		$(".azul").removeClass("marcado1");
		$(".rosa").removeClass("marcado2");
		$(".naranja").removeClass("marcado3");
		
		
		$("#"+seccionActual).removeClass("abierto").addClass("cerrado");
		
		if(seccion=="redes"){
			
			seccionActual="redes";
			$("#btn1").css("display","none");
			$(".azul").addClass("marcado1");
			$(".solapa_rosa").css("display","none");
			$(".solapa_azul").css("display","block");
			
		}else if(seccion=="banners"){
			
			seccionActual="banners";
			$("#btn2").css("display","none");
			$(".rosa").addClass("marcado2");
			$(".solapa_azul").css("display","none");
			$(".solapa_rosa").css("display","block");
			
		}else{
			
			seccionActual="manifiesto";
			$("#btn3").css("display","none");
			$(".naranja").addClass("marcado3");
			$(".solapa_azul").css("display","none");
			$(".solapa_rosa").css("display","none");
			
		}
		
		setTimeout(function(){ 
				$("#"+seccionActual).addClass("marcado");
				$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
				$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 50 + 'px'}, 1000);
		},1200);

	}
	
	
}
