// JavaScript Document
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


$('document').ready(function(){
	
	boxverde = $('#boxverde');
	boxazul = $('#boxazul');
	boxamarillo = $('#boxamarillo');
	boxtransparente = $('#boxtransparente');
	unete = $('#unete');
	m2logo = $('#1m2logo');
	destacado=$('.destacado');
	
	boxverde2 = $('#boxverde2');
	boxazul2 = $('#boxazul2');
	boxamarillo2 = $('#boxamarillo2');
	boxtransparente2 = $('#boxtransparente2');
	unete2 = $('#unete2');
	m2logo2 = $('#1m2logo2');
	destacado2=$('.destacadomobile');
	
	if( isMobile.any() ) {
		$('#dchdesktop').css("display","none");
		$('#dchmobile').css("display","block");
		$('#tabla').css("display","none");
		$('#tablamobile').css("display","block");
		 	TweenLite.to(boxverde2, 0, {alpha:0});
			TweenLite.to(boxazul2, 0, {alpha:0});
			TweenLite.to(boxamarillo2, 0, {alpha:0});
			TweenLite.to(boxtransparente2, 0, {alpha:0});
			TweenLite.to(unete2, 0, {alpha:0});
			TweenLite.to(m2logo2, 0, {alpha:0});
			TweenLite.to(m2logo2, 1, {alpha:1,delay:0.5});
			TweenLite.to(boxtransparente2, 1, {alpha:1,delay:1.5});
			TweenLite.to(unete2, 1, {alpha:1,delay:1.5});
			$('#boxamarillo2').css("display","none");
			setTimeout(function(){unete2.addClass('rojo'); },1500);
		
			setTimeout(function(){ animarUnMetro2(); },7500);
	 }else{
		 	$('#dchdesktop').css("display","block");
			$('#dchmobile').css("display","none");
		 	$('#tabla').css("display","block");
			$('#tablamobile').css("display","none");
			TweenLite.to(boxverde, 0, {alpha:0});
			TweenLite.to(boxazul, 0, {alpha:0});
			TweenLite.to(boxamarillo, 0, {alpha:0});
			TweenLite.to(boxtransparente, 0, {alpha:0});
			TweenLite.to(unete, 0, {alpha:0});
			TweenLite.to(m2logo, 0, {alpha:0});
			TweenLite.to(m2logo, 1, {alpha:1,delay:0.5});
			TweenLite.to(boxtransparente, 1, {alpha:1,delay:1.5});
			TweenLite.to(unete, 1, {alpha:1,delay:1.5});
			setTimeout(function(){unete.addClass('rojo'); },1500);
			
			setTimeout(function(){ animarUnMetro(); },7500);
	 }


	
	
	
	
});

function animarUnMetro(){
	TweenLite.to(boxamarillo, 0.5, {alpha:1});
	unete.removeClass('rojo'); destacado.removeClass('rojo');
	unete.addClass('naranja'); destacado.addClass('naranja');
	
	setTimeout(function(){ 
		TweenLite.to(boxamarillo, 0.5, {alpha:0});
		TweenLite.to(boxverde, 0.5, {alpha:1});
		unete.removeClass('naranja'); destacado.removeClass('naranja');
		unete.addClass('rosa'); destacado.addClass('rosa'); 
	
	},5000);
	
	setTimeout(function(){ 
		TweenLite.to(boxverde, 0.5, {alpha:0});
		TweenLite.to(boxazul, 0.5, {alpha:1});
		unete.removeClass('rosa'); destacado.removeClass('rosa');
		unete.addClass('amarillo'); destacado.addClass('amarillo'); 
	
	},10000);
	
	setTimeout(function(){ 
		TweenLite.to(boxazul, 0.5, {alpha:0});		
		unete.removeClass('amarillo'); destacado.removeClass('amarillo');
		unete.addClass('rojo'); destacado.addClass('rojo'); 
	
	},15000);
	
	setTimeout(function(){ 
	
		animarUnMetro();
	
	},20000);
	
}

function animarUnMetro2(){
	TweenLite.to(boxverde2, 0.5, {alpha:1});
	unete2.removeClass('rojo'); destacado2.removeClass('rojo');
	unete2.addClass('rosa'); destacado2.addClass('rosa');
	
	setTimeout(function(){ 
		TweenLite.to(boxverde2, 0.5, {alpha:0});
		TweenLite.to(boxazul2, 0.5, {alpha:1});
		unete2.removeClass('rosa'); destacado2.removeClass('rosa');
		unete2.addClass('amarillo'); destacado2.addClass('amarillo'); 
	
	},5000);
	
	setTimeout(function(){ 
		TweenLite.to(boxazul2, 0.5, {alpha:0});
		TweenLite.to(boxamarillo2, 0.5, {alpha:1});
		unete2.removeClass('amarillo'); destacado2.removeClass('amarillo');
		unete2.addClass('azul'); destacado2.addClass('azul'); 
	
	},10000);
	
	setTimeout(function(){ 
		TweenLite.to(boxamarillo2, 0.5, {alpha:0});
		$('#boxverde2').css("display","none");
		$('#boxamarillo2').css("display","block");
		unete2.removeClass('azul'); destacado2.removeClass('azul');
		unete2.addClass('rojo'); destacado2.addClass('rojo'); 
	
	},15000);
	
	setTimeout(function(){ 
	
		animarUnMetro2();
	
	},20000);
	
}

