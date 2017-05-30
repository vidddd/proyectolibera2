var seccionActual="";
var colorActual="rojo";

function cerrarFormulario(){
	$("#btn1").css("display","block");
	$("#btn2").css("display","block");
	$("#btn3").css("display","block");
	$(".azul").removeClass("marcado1");
	$(".rosa").removeClass("marcado2");
	$(".naranja").removeClass("marcado3");
	$("#"+seccionActual).removeClass("abierto").addClass("cerrado");
	$(".destacado").removeClass(colorActual);
	$(".destacadomobile").removeClass(colorActual);
	seccionActual="";
	colorActual="verde";
	$(".destacado").addClass(colorActual);
	$(".destacadomobile").addClass(colorActual);
}

function verFormulario(seccion){	
	
	if(seccionActual==""){
		
		if(seccion=="redes"){
			
			seccionActual="redes";
			$("#btn1").css("display","none");
			$(".azul").addClass("marcado1");
			$(".destacado").removeClass(colorActual).addClass('azul');
			$(".destacadomobile").removeClass(colorActual).addClass('azul');
			colorActual="azul";

			
		}else if(seccion=="banners"){
			
			seccionActual="banners";
			$("#btn2").css("display","none");
			$(".rosa").addClass("marcado2");
			$(".destacado").removeClass(colorActual).addClass('rosa');
			$(".destacadomobile").removeClass(colorActual).addClass('rosa');
			colorActual="rosa";
			
		}else{
			
			seccionActual="manifiesto";
			$("#btn3").css("display","none");
			$(".naranja").addClass("marcado3");
			$(".destacado ").removeClass(colorActual).addClass('naranja');
			$(".destacadomobile ").removeClass(colorActual).addClass('naranja');
			colorActual="naranja";
			
		}
		
		$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
		$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 100 + 'px'}, 1000);
		
	}	else	{
		
		$("#"+seccionActual).removeClass("abierto").addClass("cerrado");
		setTimeout(function(){ 
			$("#btn1").css("display","block");
			$("#btn2").css("display","block");
			$("#btn3").css("display","block");
			$(".azul").removeClass("marcado1");
			$(".rosa").removeClass("marcado2");
			$(".naranja").removeClass("marcado3");
			
			if(seccion=="redes"){				
				seccionActual="redes";
				$("#btn1").css("display","none");
				$(".azul").addClass("marcado1");
				$(".destacado").removeClass(colorActual).addClass('azul');
				$(".destacadomobile").removeClass(colorActual).addClass('azul');
				colorActual="azul";
				
			}else if(seccion=="banners"){				
				seccionActual="banners";
				$("#btn2").css("display","none");
				$(".rosa").addClass("marcado2");
				$(".destacado").removeClass(colorActual).addClass('rosa');
				$(".destacadomobile").removeClass(colorActual).addClass('rosa');
				colorActual="rosa";		
						
			}else{				
				seccionActual="manifiesto";
				$("#btn3").css("display","none");
				$(".naranja").addClass("marcado3");
				$(".destacado").removeClass(colorActual).addClass('naranja');
				$(".destacadomobile").removeClass(colorActual).addClass('naranja');
				colorActual="naranja";			
			}
			
			setTimeout(function(){ 
					$("#"+seccionActual).addClass("marcado");
					$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
					$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 100 + 'px'}, 1000);
			},200);
		
		},1000);
	}	
}

var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
};


$(document).ready(function(e) {
	if( isMobile.any() ) {
		$(".rosa").addClass("rosamobile");
		$(".naranja").addClass("naranjamobile");
		$(".azul").addClass("azulmobile");				
	}
	$(".destacado").removeClass("rojo").addClass("verde");
	$(".destacadomobile").removeClass("rojo").addClass("verde");
});
