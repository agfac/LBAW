$(document).ready(function() {

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

	
	$('#categoria').on('change', function(){

		var subcat = $(this).find('option:selected').val();

		$.getJSON("../../api/publications/get_by_category.php", {subcat_name: subcat}, function(data){
			$('#sub-products-listing').remove();
			$('#products-listing').append('<div class="row" id="sub-products-listing">');
			$('#sub-products-listing').append('<div class="col-sm-12">');
			$('#sub-products-listing').append('<div class="publication-table">');
			$('#sub-products-listing').append('<table class="table"> <tbody>');
			
			for (var i in data){
				var n = i*1+1;
				
				$('#sub-products-listing').append('<tr> <td>');
				$('#sub-products-listing').append('<a href="{BASE_URL}pages/publications/single-product?id=1">');
				$('#sub-products-listing').append('<img width="90px" src="{$BASE_URL}images/publications/books/books_5.jpg" >');
				$('#sub-products-listing').append('</a>');
				$('#sub-products-listing').append('</td>');
				$('#sub-products-listing').append('<td>');
				$('#sub-products-listing').append('<h6 class="regular"><a href="{BASE_URL}pages/publications/single-product?id=1">Titulo</a></h6>');
				$('#sub-products-listing').append('</td>');
				$('#sub-products-listing').append('<td>');
				$('#sub-products-listing').append('<small class="amount off">€68.99</small>');
				$('#sub-products-listing').append('<span class="amount text-primary">€59.99</span>');
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
	
});