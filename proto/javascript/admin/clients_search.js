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
		            
		            $('.clients_content').append('<p>Clientes da loja</p><table class="table table-striped projects" id="myTable"><thead><tr><th style="width: 2%"><button type="button" class="btn btn-default btn-xs" id="id">ID <span class="glyphicon glyphicon-sort"></span></button></th><th style="width: 55%"><button type="button" class="btn btn-default btn-xs btn-block" id="nome">Nome do cliente <span class="glyphicon glyphicon-sort"></span></button> </th><th style="width: 13%"><button type="button" class="btn btn-default btn-xs btn-block" id="estado">Estado <span class="glyphicon glyphicon-sort"></span></button></th><th style="width: 20%"><button type="button" class="btn  btn-default btn-xs btn-block disabled">Ações </button></th></tr></thead><tbody>');
		            
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


  $(document).on('click', '#id', function () {
		console.log("Ordena pelo id, flag = " + sortByIdFlag);
		sortTable(0, "INTEGER", sortByIdFlag); 
    sortByIdFlag = !sortByIdFlag;
	});


  $(document).on('click', '#nome', function () {
		console.log("Ordena pelo nome, flag = " + sortByNameFlag);
  	sortTable(1, "OUTRO", sortByNameFlag);
    sortByNameFlag = !sortByNameFlag; 
	});


	$(document).on('click', '#estado', function () {
		console.log("Ordena pelo estado, flag = " + sortByStatusFlag);
    sortTable(2, "OUTRO", sortByStatusFlag); 
    sortByStatusFlag = !sortByStatusFlag;
	});



 function sortTable(index, tipe, sortFlag) {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    /*Make a loop that will continue until no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.getElementsByTagName("TR");
      /*Loop through all table rows (except the first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare, one from current row and one from the next:*/
       
           if( tipe === "INTEGER") {
              x = parseFloat( (rows[i].getElementsByTagName("TD")[index]).innerHTML );
              y = parseFloat( (rows[i + 1].getElementsByTagName("TD")[index]).innerHTML );
           }
           else{
             x = rows[i].getElementsByTagName("TD")[index].innerHTML.toLowerCase();
             y = rows[i + 1].getElementsByTagName("TD")[index].innerHTML.toLowerCase();
           }
            
          if (x > y && !sortFlag) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
          else if (x < y && sortFlag) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
      }

      if (shouldSwitch) {
        /*If a switch has been marked, make the switch and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
      }

    } 

  }



});