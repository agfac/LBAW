flag = true;
sortByIdFlag = true;
sortByNameFlag = false;
sortByStatusFlag = false;

$(document).ready(function() {
    $(document).on('click', '#search', function (){

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

		            $('.admins_content').append('<p>Administradores da loja</p><table class="table table-striped projects" id="myTable"><thead><tr><th style="width: 6%" id="orderById">ID <span class="glyphicon glyphicon-sort"></span></th><th style="width: 36%" id="orderByAdminName">Nome do Administrador <span class="glyphicon glyphicon-sort"></span></th><th style="width: 18%" id="orderByDate">Data de Cessação <span class="glyphicon glyphicon-sort"></span></th><th style="width: 10%" id="orderByStatus">Estado <span class="glyphicon glyphicon-sort"></span></button></th><th style="width: 20%">Ações </th></tr></thead><tbody>');
		            
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

		            	if (data[i].datacessacao){
		            		data_cessacao = data[i].datacessacao;

			            	split = data_cessacao.split('-');
			            	data_cessacao = (split[2] + "-" + split[1] + "-" + split[0]);
		            	}
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


  	$(document).on('click', '#orderById', function () {
		sortTable(0, "INTEGER", sortByIdFlag); 
    	sortByIdFlag = !sortByIdFlag;
    	//sortResete();
	});


  	$(document).on('click', '#orderByAdminName', function () {
  		sortTable(1, "STRING", sortByNameFlag);
    	sortByNameFlag = !sortByNameFlag; 
	});

	$(document).on('click', '#orderByDate', function () {
		//console.log("Ordena pelo nome, flag = " + sortByDateFlag);
  		//sortTable(2, "DATE", sortByDateFlag);
   		//sortByDateFlag = !sortByDateFlag; 
   		console.log("FALTA FAZER, DÁ ERRO PQ ALGUNS ELEMETOS A NULL");
	});
	
	$(document).on('click', '#orderByStatus', function () {
    	sortTable(3, "STRING", sortByStatusFlag); 
   		sortByStatusFlag = !sortByStatusFlag;
	});

	function sortResete(){
		sortByIdFlag = false;
		sortByNameFlag = false;
		sortByDateFlag = false;
		sortByStatusFlag = false;

	}
});