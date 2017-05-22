flag = true;
$(document).ready(function() {
	
	var products;
	var category = $('#categoria-form').find('option:selected').val();
	var subcategory;

	/*
	var def_subcat = $('#subcategoria-form').find('option:selected').val();

	var def_cat = $('#categoria-form').find('option:selected').val();

	$.getJSON("../../api/publications/get_by_category.php", {subcat_name: def_subcat, cat_name: def_cat}, function(data){

		products = data;
	});
	*/

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

		$.getJSON("../../api/publications/get_by_category.php", {subcat_name: subcategory, cat_name: category}, function(data){
			
			$('.sub-products-listing').remove();

			if(data.length === 0 || data == "NULL"){
				$('.sub-products-listing').append('<p>Sem Publicações com os dados de entrada</p>');
			}

			else{
				products = data;

				$('#products-listing').append('<div class="sub-products-listing" >');

				$('.sub-products-listing').append('<table class="table" id="products-table"> <tbody>');

				for (var i in data){
					$('.sub-products-listing').append('<tr>');
					
					$('.sub-products-listing').append('<td> <a href="../../pages/publications/publication.php?id=' + data[i].publicacaoid + '"></a> <img src="../../' + data[i].url +'" width="60px" /> </td>');

					$('.sub-products-listing').append('<td> <a href="../../pages/publications/publication.php?id=' + data[i].publicacaoid + '"> ' + data[i].titulo + '</a> </td>');
					
					if(data[i].nome_autor != null)
						$('.sub-products-listing').append('<td> <h7>'+ data[i].nome_autor +' </h7></td>');
					else
						$('.sub-products-listing').append('<td> <h7> Sem autor </h7></td>');

					$('.sub-products-listing').append('<td> <h7>' + data[i].preco+ '€' +'</h7> </td> <td> <h7>' + data[i].precopromocional + '€' +'</h7> </td>');

					$('.sub-products-listing').append('</tr>');
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
/*
$('#price-submit').click(function() {

	var min_price = $('#price_filter').data(min);
	var max_price = $('#price_filter').data(max);

	$('#products-table').remove();

	$('#sub-products-listing').append('<table class="table" id="products-table"> <tbody>');

	for (var i in products){
		if(products[i].price >= min_price) {
			if(products[i].price <= max_price) {
				$('#sub-products-listing').append('<tr>');

				$('#sub-products-listing').append('<td> <a href="{$BASE_URL}pages/publications/publication.php?id=' + products[i].publicacaoid + '"></a> <img src="{$BASE_URL}' + products[i].url + '" width="60px" /> </td>');

				$('#sub-products-listing').append('<td> <a href="{$BASE_URL}pages/publications/publication.php?id=' + products[i].publicacaoid + '"> ' + products[i].titulo + '</a> </td>');

				$('#sub-products-listing').append('<td> {if '+ products[i].nome_autor+'} <h7>'+ products[i].nome_autor +'</h7> {else} <h7>Sem autor</h7> {/if} </td>');

				$('#sub-products-listing').append('<td> <h7>' + products[i].preco+'|string_format:"%.2f"' +€ '</h7> </td> <td> <h7>' + products[i].precopromocional +'|string_format:"%.2f"'+€'</h7> </td>');

				$('#sub-products-listing').append('</tr>');
			}
		}
	}

	$('#products-listing').append('</tbody>');
	$('#products-listing').append('</table>');
});
*/
});

