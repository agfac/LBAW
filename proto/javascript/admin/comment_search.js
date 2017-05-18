flag = true;
$(document).ready(function() {
    $('#search').on('click', function(){

    	if (flag){
            flag = false;
	    	var nome_cliente = $('#nome_cliente').val();
	        var email_cliente = $('#email_cliente').val();
	        var nome_publicacao = $('#nome_publicacao').val();
	        var ordenar = $('#ordenar').val();

	        $('.comment_content').empty();

	        $.getJSON("../../api/admin/comment_search.php", {nome_cliente: nome_cliente, email_cliente: email_cliente, nome_publicacao: nome_publicacao, ordenar: ordenar}, function(data){

		        if(data.length === 0 || data == "NULL"){
		            $('.comment_content').append('<p>Sem comentários com os dados de entrada</p>');
		        
		        }else{		           
		            console.log(data);
		            
		            $('.comment_content').append('<p>Comentários das publicações na loja</p><table class="table table-striped projects"><thead><tr><th style="width: 2%">ID</th><th style="width: 15%">Nome da Publicação</th><th style="width: 15%">Nome do Cliente</th><th style="width: 10%">Classificação</th><th style="width: 20%">Comentário</th><th style="width: 15%">#Editar</th></tr></thead><tbody>');
		            
		            for (var i in data){
		                $('.comment_content').find('tbody').append('<tr><td>'+data[i].comentarioid+'</td><td><a>'+data[i].nome+'</a></td><td><a>'+data[i].titulo+'</a></td><td><a class="fa fa-star"> '+data[i].classificacao+'</a></td><td><a>'+data[i].texto+'</a></td><td><a href="publication.php?id='+data[i].publicacaoid+'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eleminar </a></td></tr>');
					}

		            $('.comment_content').append('</tbody></table>');
		        }

		        flag = true;
	        });
        }
	});


	$('#clean').on('click', function(){
    	$('#nome_cliente').val("");
        $('#email_cliente').val("");
        $('#nome_publicacao').val("");
        $('#ordenar').val("Escolha uma opção");
    });

});