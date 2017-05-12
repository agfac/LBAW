$(document).ready(function() {

	$('#categoria').on('change', function(){

		var subcat = $(this).find('option:selected').val();

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
});
