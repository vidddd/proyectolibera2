var seccionActual="";
var colorActual="rojo";

function verFormulario(seccion){	
	
	if(seccionActual==""){
		
		if(seccion=="organiza"){
			
			seccionActual="form_organiza";
			$("#btn1").css("display","none");
			$(".amarillo").addClass("marcado1");
			$(".destacado ").removeClass(colorActual).addClass('amarillo');
			$(".destacadomobile ").removeClass(colorActual).addClass('amarillo');
			colorActual="amarillo";
			
		}else if(seccion=="unete"){
			
			seccionActual="form_unete";
			$("#btn2").css("display","none");
			$(".verde").addClass("marcado2");
			$(".destacado ").removeClass(colorActual).addClass('verde');
			$(".destacadomobile ").removeClass(colorActual).addClass('verde');
			colorActual="verde";
			
		}else{
			
			seccionActual="portucuenta";
			$("#btn3").css("display","none");
			$(".azul").addClass("marcado3");
			$("#portucuentaform").removeClass("cerrado").addClass("abierto");
			$(".destacado ").removeClass(colorActual).addClass('azul');
			$(".destacadomobile ").removeClass(colorActual).addClass('azul');
			colorActual="azul";
			
		}
		
		$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
		$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 50 + 'px'}, 1000);
		
	}	else	{
		
		/*$('html, body').animate({scrollTop:$('.seleccion').position().top - 50 + 'px'}, 1000);*/
		
		$("#"+seccionActual).removeClass("abierto").addClass("cerrado");
		if(seccionActual=="portucuenta"){
				$("#portucuentaform").removeClass("abierto").addClass("cerrado");
		}
		setTimeout(function(){ 
			$("#btn1").css("display","block");
			$("#btn2").css("display","block");
			$("#btn3").css("display","block");
			$(".amarillo").removeClass("marcado1");
			$(".verde").removeClass("marcado2");
			$(".azul").removeClass("marcado3");
			
			
			
			
			if(seccion=="organiza"){
				if(seccion=="portucuenta"){
						$("#portucuentaform").removeClass("abierto").addClass("cerrado");
				}
				seccionActual="form_organiza";
				$("#btn1").css("display","none");
				$(".amarillo").addClass("marcado1");
				$(".destacado ").removeClass(colorActual).addClass('amarillo');
				$(".destacadomobile ").removeClass(colorActual).addClass('amarillo');
				colorActual="amarillo";
				
			}else if(seccion=="unete"){
				if(seccion=="portucuenta"){
						$("#portucuentaform").removeClass("abierto").addClass("cerrado");
				}
				seccionActual="form_unete";
				$("#btn2").css("display","none");
				$(".verde").addClass("marcado2");
				$(".destacado ").removeClass(colorActual).addClass('verde');
				$(".destacadomobile ").removeClass(colorActual).addClass('verde');
				colorActual="verde";
				
			}else{			
				seccionActual="portucuenta";
				$("#btn3").css("display","none");
				$(".azul").addClass("marcado3");
				$(".destacado ").removeClass(colorActual).addClass('azul');
				$(".destacadomobile ").removeClass(colorActual).addClass('azul');
				colorActual="azul";
				
			}
			
			setTimeout(function(){ 
					$("#"+seccionActual).addClass("marcado");
					$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
					$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 50 + 'px'}, 1000);
					if(seccion=="portucuenta"){
						$("#portucuentaform").removeClass("cerrado").addClass("abierto");
					}
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
		$(".amarillo").addClass("amarillomobile");
		$(".verde").addClass("verdemobile");
		$(".azul").addClass("azulmobile");	
	}
});
