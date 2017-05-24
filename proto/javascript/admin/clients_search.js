flag = true;
sortByIdFlag = true;
sortByNameFlag = false;
sortByStatusFlag = false;

$(document).ready(function() {

$(document).on('click', '#search', function () {
    //$('#search').on('click', function(){
    	if (flag){
          flag = false;
	    	  var nome_cliente = $('#nome_cliente').val();
	        var email_cliente = $('#email_cliente').val();
	        var estado_cliente = $('#estado_cliente').val();

	        $('.clients_content').empty();

	        $.getJSON("../../api/admin/clients_search.php", {nome_cliente: nome_cliente, email_cliente: email_cliente, estado_cliente: estado_cliente}, function(data){

		        if(data.length === 0 || data == "NULL"){
		            $('.clients_content').append('<p>Sem clientes com os dados de entrada</p>');
		        
		        }else{		            
		            console.log(data);
		            
		            $('.clients_content').append('<p>Clientes da loja</p><table class="table table-striped projects" id="myTable"><thead><tr><th style="width: 2%"><button type="button" class="btn btn-default btn-xs" id="orderById">ID <span class="glyphicon glyphicon-sort"></span></button></th><th style="width: 55%"><button type="button" class="btn btn-default btn-xs btn-block" id="orderByClientName">Nome do cliente <span class="glyphicon glyphicon-sort"></span></button> </th><th style="width: 13%"><button type="button" class="btn btn-default btn-xs btn-block" id="orderByStatus">Estado <span class="glyphicon glyphicon-sort"></span></button></th><th style="width: 20%"><button type="button" class="btn  btn-default btn-xs btn-block disabled">Ações </button></th></tr></thead><tbody>');
		            
		            for (var i in data){

		            	var estado_cliente;
		            	var estado;
		            	
		            	if(data[i].ativo){
		            		estado_cliente = '<button type="button" class="btn btn-success btn-xs">Ativo</button>';
		            		estado = ' btn-danger btn-xs"><i class="fa fa-warning"></i> Banir ';
		            	}
		            	else{
		            		estado_cliente = ' <button type="button" class="btn btn-warning btn-xs">Inativo</button>';
		            		estado = ' btn-success btn-xs"><i class="fa fa-warning"></i> Ativar ';
		            	}

		                $('.clients_content').find('tbody').append('<tr><td>'+data[i].clienteid+'</td><td><a>'+data[i].nome+'</a></td><td>'+estado_cliente+'</td><td><a href="client_edit.php?username='+data[i].username+'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver/Editar </a><a href="../../actions/admin/client_status.php?username='+data[i].username+'" class="btn'+estado+'</a></td></tr>');

					}
		 
		            $('.clients_content').append('</tbody></table>');
		        }

		        flag = true;
	        });
        }
	});


	$('#clean').on('click', function(){
    	$('#nome_cliente').val("");
        $('#email_cliente').val("");
        $('#estado_cliente').val("Escolha uma opção");
    });


  $(document).on('click', '#orderById', function () {
		sortTable(0, "INTEGER", sortByIdFlag); 
    sortByIdFlag = !sortByIdFlag;
	});


  $(document).on('click', '#orderByClientName', function () {
  	sortTable(1, "STRING", sortByNameFlag);
    sortByNameFlag = !sortByNameFlag; 
	});


	$(document).on('click', '#orderByStatus', function () {
    sortTable(2, "STRING", sortByStatusFlag); 
    sortByStatusFlag = !sortByStatusFlag;
	});

});