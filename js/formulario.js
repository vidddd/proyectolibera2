$(document).ready(function(e) {
    $("#formorganiza").validate({
          rules: {
            persona: {
              required: true, },
            email: {
              required: true, },
           telefono: {
              required: true, },
	   direccion: {
	      required: true, },
	   organiza: {
	      required: true, },
	   provincia: {
	      required: true, }
          }
      ,messages: {
        email: {
          required: 'Por favor, introduce este una direccion de email válida'
        }
      }
    });
    
    $("#formunete").validate({
	rules: {
            persona2: {
                 required: true, },
            email2: {
                  required: true, },
            telefono2: {
                  required: true, },
            lugar2: {
                  required: true, },
            numero2: {
                  required: true, }
		}
	,messages: {
            email: {
		required: 'Por favor, introduce este una direccion de email válida'
		}
	}
      });
});
