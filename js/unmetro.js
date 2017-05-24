// JavaScript Document
$(document).ready(function(e) {
	/*Declaramos las variables para cada id dentro de la web*/
	boxverde = $('#boxverde');
	boxazul = $('#boxazul');
	boxamarillo = $('#boxamarillo');
	boxtransparente = $('#boxtransparente');
	unete = $('#unete');
	m2logo = $('#1m2logo');
	destacado = $('.destacado');

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
