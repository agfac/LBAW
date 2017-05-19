flag = true;
$(document).ready(function() {
    $('#search').on('click', function(){
        if (flag){
            flag = false;
            var nome_cliente = $('#nome_cliente').val();
            var email_cliente = $('#email_cliente').val();
            var id_encomenda = $('#id_encomenda').val();
            var estadoencomenda = $('#estadoencomenda').find('option:selected').val();

            $('.order_content').empty();

            $.getJSON("../../api/owner/orders_search.php", {nome_cliente: nome_cliente, email_cliente: email_cliente, id_encomenda: id_encomenda, estadoencomenda: estadoencomenda}, function(data){
                console.log(data);
                if(data.length === 0 || data == "NULL"){
                    $('.order_content').append('<p>Sem encomendas com os dados de entrada</p>');

                }else{
                    $('.order_content').append('<p>Encomendas listadas da loja</p><table class="table table-striped projects"><thead><tr><th style="width: 1%">ID</th><th style="width: 30%">Nome cliente</th><th>Preço Total</th><th>Estado</th><th>Data</th><th style="width: 15%">#Editar</th></tr></thead><tbody>');
                    
                    for (var i in data){
                        var estado_encomenda;

                        if (data[i].estado == "Em processamento")
                            estado_encomenda = '<button class="btn btn-info btn-xs">Em processamento</button>';

                        else if (data[i].estado == "Processada")
                            estado_encomenda = '<button class="btn btn-primary btn-xs">Processada</button>';

                        else if (data[i].estado == "Enviada")
                            estado_encomenda = '<button class="btn btn-success btn-xs">Enviada</button>';
                        
                        else if (data[i].estado == "Devolvida")
                            estado_encomenda = '<button class="btn btn-warning btn-xs">Devolvida</button>';
                        
                        else
                            estado_encomenda = '<button class="btn btn-danger btn-xs">Cancelada</button>';

                        var dataRes = data[i].data;
                        var arr = dataRes.split(' ');
                        var arr1 = arr[1].split('.');
                        dataRes = arr[0] + " " + arr1[0];

                        $('.order_content').find('tbody').append('<tr><td>'+parseFloat(data[i].encomendaid)+'</td><td><a>'+data[i].nomecliente+'</a></td><td><a>'+parseFloat(data[i].total).toFixed(2)+' €</a></td><td>'+estado_encomenda+'</td><td><a>'+dataRes+'</a></td><td><a href="order.php?id='+data[i].encomendaid+'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver/Editar </a></td></tr>');
                    }

                $('.order_content').append('</tbody></table>');
                }

                flag = true;
            });
        }
    });


    $('#clean').on('click', function(){
        $('#nome_cliente').val("");
        $('#email_cliente').val("");
        $('#id_encomenda').val("");
        $('#estadoencomenda').val("Escolha uma opção");
    });
});