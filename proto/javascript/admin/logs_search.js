flag = true;
$(document).ready(function() {
    $('#search').on('click', function(){
    	
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

console.log(data_login);


	        $('.logs_content').empty();

	        $.getJSON("../../api/admin/logs_search.php", {nome_utilizador: nome_utilizador, username_utilizador: username_utilizador, data_login: data_login, ordenar: ordenar}, function(data){

		        if(data.length === 0 || data == "NULL"){
		            $('.logs_content').append('<p>Sem comentários com os dados de entrada</p>');

		        }else{		           
		            console.log(data);

		            $('.logs_content').append('<table class="table table-striped projects"><thead><tr><th style="width: 2%">ID</th><th style="width: 50%">Nome do Utilizador</th><th style="width: 48%">Data</th></tr></thead><tbody>');

		            for (var i in data){

		            	var dataRes = data[i].data;
                        var arr = dataRes.split(' ');
                        var arr1 = arr[1].split('.');
                        dataRes = arr[0] + " " + arr1[0];

		                $('.logs_content').find('tbody').append('<tr><td>'+data[i].loginid+'</td><td><a>'+data[i].nome+'</a></td><td><a>'+dataRes+'</a></td></tr>');
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
});