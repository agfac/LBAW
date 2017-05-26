flag = true;
sortByIdFlag = true;
sortByNameFlag = false;
sortByDateFlag = false;

$(document).ready(function() {
    $(document).on('click', '#search', function (){
    	
    	if (flag){
            flag = false;
	    	var nome_utilizador = $('#nome_utilizador').val();
	        var username_utilizador = $('#username_utilizador').val();
	        var data_login = $('#single_cal4').val();
	        var ordenar = $('#ordenar').val();

	        if(data_login){
	            var arr = data_login.split('/');
	            data_login = arr[2] +'/'+ arr[0] +'/'+ arr[1];
			}


	        $('.logs_content').empty();

	        $.getJSON("../../api/admin/logs_search.php", {nome_utilizador: nome_utilizador, username_utilizador: username_utilizador, data_login: data_login, ordenar: ordenar}, function(data){

		        if(data.length === 0 || data == "NULL"){
		            $('.logs_content').append('<p>Sem logins com os dados de entrada</p>');

		        }else{		           
		            console.log(data);

		            $('.logs_content').append('<table class="table table-striped projects" id="myTable"><thead><tr><th style="width: 6%" id="orderById">ID <span class="glyphicon glyphicon-sort"></th><th style="width: 48%" id="orderByName">Nome do Utilizador <span class="glyphicon glyphicon-sort"></th><th style="width: 46%" id="orderByDate">Data <span class="glyphicon glyphicon-sort"></th></tr></thead><tbody>');

		            for (var i in data){

		            	var dataRes = data[i].data;

                        var arr = dataRes.split(' ');
                        
                        var arr1 = arr[1].split('.');
                        split = arr[0].split('-');
			            arr = (split[2] + "-" + split[1] + "-" + split[0]);
                        dataRes = arr + " " + arr1[0];

                        nome = data[i].nome.replace(/[^a-zA-Z 0-9]+/g,'');
                        
		                $('.logs_content').find('tbody').append('<tr><td>'+data[i].loginid+'</td><td><a>'+nome+'</a></td><td><a>'+dataRes+'</a></td></tr>');
					}
 
		        	$('.logs_content').append('</tbody></table>');
		        }

		        flag = true;
	        });
        }
	});


	$('#clean').on('click', function(){
    	$('#nome_utilizador').val("");
        $('#email_utilizador').val("");
        $('#single_cal4').val("");
        $('#ordenar').val("Escolha uma opção");
    });

   	$(document).on('click', '#orderById', function () {
		sortTable(0, "INTEGER", sortByIdFlag); 
    	sortByIdFlag = !sortByIdFlag;
	});


  	$(document).on('click', '#orderByName', function () {
  		sortTable(1, "STRING", sortByNameFlag);
    	sortByNameFlag = !sortByNameFlag; 
	});

	$(document).on('click', '#orderByDate', function () {
		//console.log("Ordena pelo nome, flag = " + sortByDateFlag);
  		//sortTable(2, "DATE", sortByDateFlag);
   		//sortByDateFlag = !sortByDateFlag; 
   		console.log("FALTA FAZER, DÁ ERRO PQ ALGUNS ELEMETOS A NULL");
	});
	
});