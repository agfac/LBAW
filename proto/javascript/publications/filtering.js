$(document).ready(function() {

	var products; //lista de produtos que foram filtrados

	//category_filter();

	//price_filter();

	//search_filter();

	$('#categoria').on('change', function(){
		var category = $(this).find('option:selected').val();

		$('#subcategoria').empty();
		
		$.getJSON("../../api/owner/updateSubCategories.php", {categoria: category}, function(data){
			
			for (var i in data){
				$('#subcategoria').append('<option value="'+ data[i].subcategoriaid +'">'+data[i].nome+'</option>');
                // console.log(data[i].subcategoriaid + " " + data[i].nome);
            }
        });
	});

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

function category_filter() {
	$('#subategoria').on('change', function(){

		var subcat = $(this).find('option:selected').val();

		$.getJSON("../../api/publications/get_by_category.php", {subcat_name: subcat}, function(data){
			$('#sub-products-listing').remove();
			$('#products-listing').append('<div class="row" id="sub-products-listing">');
			$('#sub-products-listing').append('<div class="col-sm-12">');
			$('#sub-products-listing').append('<div class="publication-table">');
			$('#sub-products-listing').append('<table class="table"> <tbody>');
			
			products = data; //guarda-se a lista de livros da pagina

			for (var i in data){
				$('#sub-products-listing').append('<tr> <td>');
				$('#sub-products-listing').append('<a href="{BASE_URL}pages/publications/single-product?id=1">');
				$('#sub-products-listing').append('<img width="90px" src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">');
				$('#sub-products-listing').append('</a>');
				$('#sub-products-listing').append('</td>');
				$('#sub-products-listing').append('<td>');
				$('#sub-products-listing').append('<h6 class="regular"><a href="{BASE_URL}pages/publications/single-product?id=1">Titulo</a></h6>');
				$('#sub-products-listing').append('</td>');
				$('#sub-products-listing').append('<td>');
				$('#sub-products-listing').append('<span class="amount text-primary"> €56.99 </span>');
				$('#sub-products-listing').append('</td>');
				$('#sub-products-listing').append('<td>');
				$('#sub-products-listing').append('<a href="javascript:void(0)" class="btn btn-default round btn-sm"><i class="fa fa-cart-plus mr-5"></i>Adcionar ao carrinho</a>');
				$('#sub-products-listing').append('</td>');
				$('#sub-products-listing').append('</tr>');
			}

			$('#products-listing').append('</tbody>');
			$('#products-listing').append('</table>');
			$('#products-listing').append('</div>');
			$('#products-listing').append('</div>');
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