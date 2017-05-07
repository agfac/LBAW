flag = true;
$(document).ready(function() {
    $('#search').on('click', function(){
        if (flag){
            flag = false;
            var nome_livro = $('#nome_livro').val();
            var nome_autor = $('#nome_autor').val();
            var nome_editora = $('#nome_editora').val();
            //var estadoencomenda = $('#estadoencomenda').find('option:selected').val();

            $('.publications_content').empty(); 

            $.getJSON("../../api/owner/publications_search.php", {nome_livro: nome_livro, nome_autor: nome_autor, nome_editora: nome_editora}, function(data){
                console.log(data);
                if(data.length === 0 || data == "NULL"){
                    $('.publications_content').append('<p>Sem Publicações com os dados de entrada</p>');
                }else{
                    $('.publications_content').append('<p>Todos as publicações presentes na loja</p><table class="table table-striped projects"><thead><tr><th style="width: 1%">ID</th><th style="width: 30%">Nome do livro</th><th>Autor</th><th>Preço</th><th>Preço Promocional</th><th style="width: 24%">#Editar</th></tr></thead><tbody>');
                    for (var i in data){
                        var nome_autor

                        if (data[i].nome_autor)
                            nome_autor = data[i].nome_autor;
                        else 
                            nome_autor = "Sem Autor";

                        $('.publications_content').find('tbody').append('<tr><td>'+data[i].publicacaoid+'</td><td><a>'+data[i].titulo+'</a></td><td><a>'+nome_autor+'</a></td><td><a>'+data[i].preco+' €</a></td><td><a>'+data[i].precopromocional+' €</a></td><td><a href="../publications/publication.php?id='+data[i].publicacaoid+'" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a><a href="publication_edit.php?id='+data[i].publicacaoid+'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a><a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eleminar </a></td></tr>');
                    }
                    $('.publications_content').append('</tbody></table>');
                }
                flag = true;
            });
        }
    });
});