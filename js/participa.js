var seccionActual="";

function verFormulario(seccion){	
	
	if(seccionActual==""){
		
		if(seccion=="organiza"){
			
			seccionActual="form_organiza";
			$("#btn1").css("display","none");
			$(".amarillo").addClass("marcado1");
			
		}else if(seccion=="unete"){
			
			seccionActual="form_unete";
			$("#btn2").css("display","none");
			$(".verde").addClass("marcado2");
			
			
		}else{
			
			seccionActual="portucuenta";
			$("#btn3").css("display","none");
			$(".azul").addClass("marcado3");
			$("#portucuentaform").removeClass("cerrado").addClass("abierto");
			
		}
		
		$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
		$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 50 + 'px'}, 1000);
		
	}	else	{
		
		$('html, body').animate({scrollTop:$('.seleccion').position().top - 50 + 'px'}, 1000);
		
		$("#btn1").css("display","block");
		$("#btn2").css("display","block");
		$("#btn3").css("display","block");
		$(".amarillo").removeClass("marcado1");
		$(".verde").removeClass("marcado2");
		$(".azul").removeClass("marcado3");
		
		if(seccion=="portucuenta"){
			$("#portucuentaform").removeClass("abierto").addClass("cerrado");
		}
		$("#"+seccionActual).removeClass("abierto").addClass("cerrado");
		
		if(seccion=="organiza"){
			$("#portucuentaform").removeClass("abierto").addClass("cerrado");
			seccionActual="form_organiza";
			$("#btn1").css("display","none");
			$(".amarillo").addClass("marcado1");
			
		}else if(seccion=="unete"){
			$("#portucuentaform").removeClass("abierto").addClass("cerrado");
			seccionActual="form_unete";
			$("#btn2").css("display","none");
			$(".verde").addClass("marcado2");
			
		}else{			
			seccionActual="portucuenta";
			$("#btn3").css("display","none");
			$(".azul").addClass("marcado3");
			
		}
		
		setTimeout(function(){ 
				$("#"+seccionActual).addClass("marcado");
				$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
				$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 50 + 'px'}, 1000);
				if(seccion=="portucuenta"){
					$("#portucuentaform").removeClass("cerrado").addClass("abierto");
				}
		},1200);

	}
	
	
}
