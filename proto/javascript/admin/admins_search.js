flag = true;
$(document).ready(function() {
    $('#search').on('click', function(){

    	if (flag){
            flag = false;
	    	var nome_administrador = $('#nome_administrador').val();
	        var username_administrador = $('#username_administrador').val();
	        var data_cessacao = $('#single_cal4').val(); 
	        var estado_administrador = $('#estado_administrador').val();

			if(data_cessacao){
	            var arr = data_cessacao.split('/');
	            data_cessacao = arr[2] +'/'+ arr[0] +'/'+ arr[1];
			}

	        $('.admins_content').empty();

	        $.getJSON("../../api/admin/admins_search.php", {nome_administrador: nome_administrador, username_administrador: username_administrador, data_cessacao: data_cessacao, estado_administrador: estado_administrador}, function(data){

		        if(data.length === 0 || data == "NULL"){
		            $('.admins_content').append('<p>Sem administradores com os dados de entrada</p>');

		        }else{		
		            console.log(data);

		            $('.admins_content').append('<p>Administradores da loja</p><table class="table table-striped projects"><thead><tr><th style="width: 2%">ID</th><th style="width: 40%">Nome do Administrador</th><th style="width: 18%">Data de Cessação</th><th style="width: 10%">Estado</th><th style="width: 20%">#Editar</th></tr></thead> <tbody>');
		            
		            for (var i in data){

		            	var estado_administrador;
		            	var estado;
		            	var data_cessacao;

		            	if(data[i].ativo){
		            		estado_administrador = '<button type="button" class="btn btn-success btn-xs">Ativo</button>';
		            		estado = ' btn-danger btn-xs"><i class="fa fa-warning"></i> Banir ';
		            	}
		            	else{
		            		estado_administrador = ' <button type="button" class="btn btn-warning btn-xs">Inativo</button>';
		            		estado = ' btn-success btn-xs"><i class="fa fa-warning"></i> Ativar ';
		            	}

		            	if (data[i].datacessacao)
		            		data_cessacao = data[i].datacessacao;
		            	else 
		            		data_cessacao = "N/A";

		                $('.admins_content').find('tbody').append('<tr><td>'+data[i].administradorid+'</td><td><a>'+data[i].nome+'</a></td><td>'+data_cessacao+'</td><td>'+estado_administrador+'</td><td><a href="admin_edit.php?username='+data[i].username+'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver / Editar </a><a href="../../actions/admin/admin_status.php?username='+data[i].username+'" class="btn'+estado+'</a></td></tr>');
					
					}

		            $('.admins_content').append('</tbody></table>');
		        }

		        flag = true;
	        });
        }
	});


	$('#clean').on('click', function(){
    	$('#nome_administrador').val("");
        $('#email_administrador').val("");
        $('#single_cal4').val("");
        $('#estado_administrador').val("Escolha uma opção");
    });
});