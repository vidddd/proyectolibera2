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

		}

		$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
		$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 50 + 'px'}, 1000);

	}	else	{

		$("#btn1").css("display","block");
		$("#btn2").css("display","block");
		$("#btn3").css("display","block");
		$(".amarillo").removeClass("marcado1");
		$(".verde").removeClass("marcado2");
		$(".azul").removeClass("marcado3");

		$("#"+seccionActual).removeClass("abierto").addClass("cerrado");

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

		}
		setTimeout(function(){
				$("#"+seccionActual).addClass("marcado");
				$("#"+seccionActual).removeClass("cerrado").addClass("abierto");
				$('html, body').animate({scrollTop:$('#'+seccionActual).position().top - 50 + 'px'}, 1000);
		},1200);
	}
}
function GetCookie(name) {
    var arg=name+"=";
    var alen=arg.length;
    var clen=document.cookie.length;
    var i=0;
    while (i<clen) {
        var j=i+alen;

        if (document.cookie.substring(i,j)==arg)
            return "1";
        i=document.cookie.indexOf(" ",i)+1;
        if (i==0)
             break;
     }
    return null;
}

function aceptar_cookies(){
    var expire=new Date();
    expire=new Date(expire.getTime()+7776000000);
    document.cookie="cookies_libera=aceptada; expires="+expire;

    var visit=GetCookie("cookies_libera");
    if (visit==1){
      $('#barraaceptacion').toggle();
    }
}

jQuery(function() {
    var visit=GetCookie("cookies_libera");
    if (visit==1){
        $('#barraaceptacion').toggle();
    } else {
        var expire=new Date();
        expire=new Date(expire.getTime()+7776000000);
        document.cookie="cookies_libera=aceptada; expires="+expire;
    }
});
function cerrar_cookies() {
    $('#barraaceptacion').toggle();
}

$(document).ready(function() {
	$("#formorganiza").validate({
				rules: {
					provincia: {
						required: true,
					},
					hora: {
						required: true,
					},
				 lugar: {
						required: true,
					}
				}
		,messages: {
			persona: {
				required: 'Por favor, introduce este campo'
			},
			email: {
				required: 'Por favor, introduce este campo'
			}
		}
	});
});
