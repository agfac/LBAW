$(document).ready(function() {

	options();

	category_filter();

	//price_filter();

	//search_filter();



/*
	var subcat = 'Direito';

	$.getJSON("../../api/publications/get_by_category.php", {subcat_name: subcat}, function(data){
		$('#sub-products-listing').remove();
		$('#products-listing').append('<div class="row" id="sub-products-listing">');

		for (var i in data){
			var n = i*1+1;
			$('#sub-products-listing').append('<span class="text-primary"> Livro de ' + data[i].nome_subcategoria + ' numero ' + n + '</span> <br>');
		}

		$('#products-listing').append('</div>');
	});
	*/
});
/*
function search() {
	
}
*/

function options() {
	$('#categoria').on('change', function(){
		var category = $(this).find('option:selected').val();

		$('#subcategoria').empty();
		
		$.getJSON("../../api/owner/updateSubCategories.php", {categoria: category}, function(data){
			
			for (var i in data){
				$('#subcategoria').append('<option value="'+ data[i].subcategoriaid +'">'+data[i].nome+'</option>');
            }
        });

		
	});
}

function category_filter() {
	$('#subategoria').on('change', function(){

		var subcat = $(this).find('option:selected').val();

		var cat = $('#categoria').find('option:selected').val();

		$.getJSON("../../api/publications/get_by_category.php", {subcat_name: subcat, cat_name: cat}, function(data){

			$('#products-table').remove();

			$('#sub-products-listing').append('<table class="table" id="products-table"> <tbody>');

			for (var i in data){
				$('#sub-products-listing').append('<tr>');

				$('#sub-products-listing').append('<td> <a href="{$BASE_URL}pages/publications/publication.php?id=' + data[i].publicacaoid + '"></a> <img src="{$BASE_URL}' + data[i].url + '" width="60px" /> </td>');
				
				$('#sub-products-listing').append('<td> <a href="{$BASE_URL}pages/publications/publication.php?id=' + data[i].publicacaoid + '"> ' + data[i].titulo + '</a> </td>');

				$('#sub-products-listing').append('<td> {if '+ data[i].nome_autor+'} <h7>'+ data[i].nome_autor +'</h7> {else} <h7>Sem autor</h7> {/if} </td>');

				$('#sub-products-listing').append('<td> <h7>' + data[i].preco+'|string_format:"%.2f"' +€ '</h7> </td> <td> <h7>' + data[i].precopromocional +'|string_format:"%.2f"'+€'</h7> </td>');

				$('#sub-products-listing').append('</tr>');
			}

			$('#products-listing').append('</tbody>');
			$('#products-listing').append('</table>');
		});
	});
}

function price_filter() {
	var min_price = $('#price_filter').data(min);
	var max_price = $('#price_filter').data(max);

	$('#sub-products-listing').remove();
	$('#products-listing').append('<div class="row" id="sub-products-listing">');
	$('#sub-products-listing').append('<div class="col-sm-12">');
	$('#sub-products-listing').append('<div class="publication-table">');
	$('#sub-products-listing').append('<table class="table"> <tbody>');

	$('#price-filter').submit(function() {
		for (var i in products){
			if(products[i].price >= min_price) {
				if(products[i].price <= max_price) {
					$('#sub-products-listing').append('<tr> <td>');
					$('#sub-products-listing').append('<a href="{BASE_URL}pages/publications/single-product?id=1">');
					$('#sub-products-listing').append('<img width="90px" src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">');
					$('#sub-products-listing').append('</a>');
					$('#sub-products-listing').append('</td>');
					$('#sub-products-listing').append('<td>');
					$('#sub-products-listing').append('<h6 class="regular"><a href="{BASE_URL}pages/publications/single-product?id=1">Titulo</a></h6>');
					$('#sub-products-listing').append('</td>');
					$('#sub-products-listing').append('<td>');
					$('#sub-products-listing').append('<span class="amount text-primary">' + data[i].price + '</span>');
					$('#sub-products-listing').append('</td>');
					$('#sub-products-listing').append('<td>');
					$('#sub-products-listing').append('<a href="javascript:void(0)" class="btn btn-default round btn-sm"><i class="fa fa-cart-plus mr-5"></i>Adcionar ao carrinho</a>');
					$('#sub-products-listing').append('</td>');
					$('#sub-products-listing').append('</tr>');
					$('#products-listing').append('</tbody>');
					$('#products-listing').append('</table>');
					$('#products-listing').append('</div>');
					$('#products-listing').append('</div>');
				}
			}
		}
	});	

}