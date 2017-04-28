$(document).ready(function() {
    var conta = 0;
    $('#autor').on('change', function(){
        if(($(this).find('option:selected').val() == "novoAutor") && conta == 0){
            conta = 1;
            $(this).closest('.form-group').after('<div class="divNovoAutor"><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Nome Autor <span class="required">*</span></label><div class="col-md-10 col-sm-3 col-xs-12"><input type="text" class="form-control" required="required" name="nomeAutor" {if $FORM_VALUES}value="{$FORM_VALUES.nomeAutor}"{/if} placeholder="Nome do Autor"></div></div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Biografia </span></label><div class="col-md-10 col-sm-9 col-xs-12"><textarea class="form-control" rows="3" name="biografia" placeholder="Biografia do Autor"></textarea></div></div><div class="form-group"><label class="col-md-2 col-sm-9 col-xs-12 control-label">Genero</span></label><div class="col-md-4 col-sm-9 col-xs-12"><div class="radio"><label><input type="radio" checked="" value="Masculino" name="genero"> Masculino</label><label><input type="radio" value="Feminino" name="genero"> Feminino</label></div></div><label class="control-label col-md-2 col-sm-3 col-xs-12">Data de Nascimento <span class="required">*</span></label><div class="col-md-4 col-sm-6 col-xs-12 has-feedback"><input type="text" class="form-control has-feedback-left" id="single_cal2" name="datanascimento" required="required" placeholder="MM/DD/YYYY" aria-describedby="inputSuccess2Status4"><span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span><span id="inputSuccess2Status4" class="sr-only">(success)</span></div></div><div class="form-group"><label class="control-label col-md-2 col-sm-3 col-xs-12">Pais <span class="required">*</span></label><div class="col-md-10 col-sm-3 col-xs-12"><input type="text" class="form-control" required="required" name="paisAutor" {if $FORM_VALUES}value="{$FORM_VALUES.paisAutor}"{/if} placeholder="Pais do Autor"></div></div></div>');
    	}else if(conta == 1){
			$(".divNovoAutor").remove();
			conta = 0;
        }
    });
});