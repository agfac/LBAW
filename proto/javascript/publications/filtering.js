$(document).ready(function() {
	/*
	$('#categoria').ready(function(){
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
	});
	*/

	$('#categoria').on('change', function(){

		var subcat = $(this).find('option:selected').val();

		$.getJSON("../../api/publications/get_by_category.php", {subcat_name: subcat}, function(data){
			$('#sub-products-listing').remove();
			$('#products-listing').append('<div class="row" id="sub-products-listing">');

			for (var i in data){
				var n = i*1+1;
				$('#sub-products-listing').append('<div class="col-sm-6 col-md-3">');
				$('#sub-products-listing').append('<div class="thumbnail store style1">');
				$('#sub-products-listing').append('<div class="header">');
				$('#sub-products-listing').append('<figure class="layer">');
				$('#sub-products-listing').append('<a href="{BASE_URL}pages/publications/single-product?id=1">');
				$('#sub-products-listing').append('<img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">');
				$('#sub-products-listing').append('</a>');
				$('#sub-products-listing').append('</figure>');
				$('#sub-products-listing').append('<div class="icons">');
				$('#sub-products-listing').append('<a class="icon semi-circle" href="{BASE_URL}pages/publications/single-product?id=1"><i class="fa fa-heart-o"></i></a>              <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a><a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>');
				$('#sub-products-listing').append('</div>');
				$('#sub-products-listing').append('</div>');
				$('#sub-products-listing').append('<div class="caption">');
				$('#sub-products-listing').append('<h6 class="regular"><a href="{BASE_URL}pages/publications/single-product?id=1">Lorem Ipsum dolor sit</a></h6>');
				$('#sub-products-listing').append('<div class="price">');
				$('#sub-products-listing').append('<small class="amount off">â‚¬68.99</small>');
				$('#sub-products-listing').append('<span class="amount text-primary">â‚¬59.99</span>');
				$('#sub-products-listing').append('</div>');
				$('#sub-products-listing').append('<a href="{BASE_URL}pages/publications/single-product?id=1"><i class="fa fa-cart-plus mr-5"></i>Adcionar ao carrinho</a>');
				$('#sub-products-listing').append('</div>');
				$('#sub-products-listing').append('</div>');
				$('#sub-products-listing').append('</div>');
			}

			$('#products-listing').append('</div>');
		});
	});

});