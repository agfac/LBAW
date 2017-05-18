flag = true;
$(document).ready(function() {
    $('#search').on('click', function(){

    	if (flag){
            flag = false;
	    	var nome_funcionario = $('#nome_funcionario').val();
	        var email_funcionario = $('#email_funcionario').val();
	        var data_admissao = $('#single_cal4').val(); //TODO, se alterar o id o calendario não funciona 
	        var estado_funcionario = $('#estado_funcionario').val();

	        console.log(data_admissao);
	        
	        $('.workers_content').empty();

	        $.getJSON("../../api/admin/workers_search.php", {nome_funcionario: nome_funcionario, email_funcionario: email_funcionario, data_admissao: data_admissao, estado_funcionario: estado_funcionario}, function(data){

		        if(data.length === 0 || data == "NULL"){
		            $('.workers_content').append('<p>Sem funcionários com os dados de entrada</p>');
		        
		        }else{		           
		            console.log(data);
		            
		            $('.workers_content').append('<p>Funcionários da loja</p><table class="table table-striped projects"><thead><tr><th style="width: 2%">ID</th><th style="width: 40%">Nome do Funcionário</th><th style="width: 18%">Data de Admissão</th><th style="width: 10%">Estado</th><th style="width: 20%">#Editar</th></tr></thead><tbody>');
		            
		            for (var i in data){

		            	var estado_funcionario;
		            	var estado;

		            	if(data[i].ativo){
		            		estado_funcionario = '<button type="button" class="btn btn-success btn-xs">Ativo</button>';
		            		estado = ' btn-danger btn-xs"><i class="fa fa-warning"></i> Banir ';
		            	}
		            	else{
		            		estado_funcionario = ' <button type="button" class="btn btn-warning btn-xs">Inativo</button>';
		            		estado = ' btn-success btn-xs"><i class="fa fa-warning"></i> Ativar ';
		            	}

		                $('.workers_content').find('tbody').append('<tr><td>'+data[i].funcionarioid+'</td><td><a>'+data[i].nome+'</a></td><td><a>'+data[i].dataadmissao+'</a></td><td>'+estado_funcionario+'</td><td><a href="worker_edit.php?username='+data[i].username+'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver / Editar </a><a href="../../actions/admin/worker_status.php?username='+data[i].username+'" class="btn'+estado+'</a></td></tr>');
					}
		            $('.workers_content').append('</tbody></table>');
		        }

		        flag = true;
	        });
        }
	});

	$('#clean').on('click', function(){
    	$('#nome_funcionario').val("");
        $('#email_funcionario').val("");
        $('#single_cal4').val("");
        $('#estado_funcionario').val("Escolha uma opção");
    });
});