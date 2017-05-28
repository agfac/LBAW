$(document).ready(function() {

	$("#password").on('change input', function(){
		var passwordLenght = ($(this).val()).length;
		var div = ($(this).closest('div'));

		if (passwordLenght >= 6){
			div.addClass("has-success");
			div.removeClass("has-error");
			$("#submit").prop("disabled", false);
			$("#submit").removeAttr( "title" );
		}
		else{
			div.addClass("has-error");
			$("#submit").prop("disabled", true);
			$(this).prop("title", "A password tem que ter mais de 6 carateres");	
			$("#submit").prop("title", "Verifique a password");
		}
		
	});

});		