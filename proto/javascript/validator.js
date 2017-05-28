$(document).ready(function() {
	var passFlag = false;

	$("#password").on('change input', function(){
		var passwordLenght = ($(this).val()).length;
		var div = ($(this).closest('div'));

		if (passwordLenght >= 6){
			div.addClass("has-success");
			div.removeClass("has-error");
			$("#submit").prop("disabled", false);
			passFlag = true;
		}
		else{
			div.addClass("has-error");
			$("#submit").prop("disabled", true);
			$(this).prop("title", "A password tem que ter mais de 6 carateres");
			passFlag = false;
		}
		
	});

});		