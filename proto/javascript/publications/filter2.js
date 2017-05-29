flag = true;
$(document).ready(function() {
	
	var category = $('#categoria-form').find('option:selected').val();
	var subcategory = $('#subcategoria-form').find('option:selected').val();

	var products;
	$.getJSON("../../api/publications/get_by_category_promotion.php", {subcat_name: subcategory, cat_name: category}, function(data){
		products = data;
	});

/////////////////

$('#categoria-form').on('change', function(){
	if(flag) {
		flag = false;
		category = $(this).find('option:selected').val();

		$('#subcategoria-form').empty();

		if(category != "Escolha uma opção"){
			$.getJSON("../../api/owner/updateSubCategories.php", {categoria: category}, function(data){
				$('#subcategoria-form').append('<option value="Escolha uma opção">Escolha uma opção</option>');
				for (var i in data){
					$('#subcategoria-form').append('<option value="'+ data[i].subcategoriaid +'">'+data[i].nome+'</option>');
				}
			});
		}else
		$('#subcategoria-form').append('<option value="Escolha uma opção">Escolha uma opção</option>');
	}
	flag = true;
});

/////////////////

$('#subcategoria-form').on('change', function(){
	if(flag) {
		flag = false;
		subcategory = $(this).find('option:selected').val();

		$.getJSON("../../api/publications/get_by_category_promotion.php", {subcat_name: subcategory, cat_name: category}, function(data){



			$('.sub-products-listing').remove();

			$('#products-listing').append('<div class="sub-products-listing" >');

			if(data.length === 0 || data == "NULL") {
				$('.sub-products-listing').append('<p>Sem publicações para os dados introduzidos </p>');
			}
			
			else{
				products = data;

				$('.sub-products-listing').append('<table class="table" id="products-table"> <tbody>');

				for (var i in data){
					var autor;
					if(data[i].nome_autor != null)
						autor = data[i].nome_autor;
					else
						autor = 'Sem autor';

					$('.sub-products-listing').find('tbody').append('<tr> ' + '<td> <a href="../../pages/publications/publication.php?id=' + data[i].publicacaoid + '"></a> <img src="../../' + data[i].url +'" width="60px" /> </td> ' + '<td> <a href="../../pages/publications/publication.php?id=' + data[i].publicacaoid + '"> ' + data[i].titulo + '</a> </td>'+'<td> <h7> '+ autor +' </h7></td>'+' <td> <strike>' + data[i].preco+ '€' +'</strike> </td> <td> <h7>' + data[i].precopromocional + '€' +'</h7> </td>' + ' </tr>');
				}

				$('.sub-products-listing').append('</tbody>');
				$('.sub-products-listing').append('</table>');
				$('#products-listing').append('</div>');
			}

		});
	}
	flag = true;
});

/////////////////

$('#price-submit').click(function() {

	var min_price = $('.ui-range-values').find('#min-val').val();
	var max_price = $('.ui-range-values').find('#max-val').val();
	

	$('.sub-products-listing').remove();

	$('#products-listing').append('<div class="sub-products-listing" >');

	$('.sub-products-listing').append('<table class="table" id="products-table"> <tbody>');

	for (var i in products){
		console.log(i + '\nmin: ' + min_price);
		console.log('price: ' + products[i].precopromocional);
		console.log('max: ' + max_price);

		var autor;
		if(products[i].nome_autor != null)
			autor = products[i].nome_autor;
		else
			autor = 'Sem autor';

		if(products[i].precopromocional >= min_price) {
			if(products[i].precopromocional*2 <= max_price*2) {
				$('.sub-products-listing').find('tbody').append('<tr> ' + '<td> <a href="../../pages/publications/publication.php?id=' + products[i].publicacaoid + '"></a> <img src="../../' + products[i].url +'" width="60px" /> </td> ' + '<td> <a href="../../pages/publications/publication.php?id=' + products[i].publicacaoid + '"> ' + products[i].titulo + '</a> </td>'+'<td> <h7> '+ autor +' </h7></td>'+' <td> <strike>' + products[i].preco+ '€' +'</strike> </td> <td> <h7>' + products[i].precopromocional + '€' +'</h7> </td>' + ' </tr>');
			}
		}
	}

	$('#products-listing').append('</tbody>');
	$('#products-listing').append('</table>');
	$('#products-listing').append('</div>');

});

});