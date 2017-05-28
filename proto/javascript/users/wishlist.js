$(document).ready(function() {
	updateWishListNumberItems();
});

function updateWishListNumberItems() {

	$('.btn').on('click', function (){

		var tableBody = $(this).closest('tbody');
		var itemSelected = this.closest('tr');
		var idSelected = itemSelected.getAttribute('data-id');

		$.getJSON("../../api/users/move_item_wishlist_to_cart.php", {id: idSelected}, function(data) {

			if(data.Success){   	  	

				itemSelected.remove();

				$.confirm({
					title: 'Sucesso!',
					content: data.Success,
					type: 'green',
					typeAnimated: true,
					autoClose: 'success|3000',
					buttons: {
						success: {
							text: 'ok',
							btnClass: 'btn-success',
						}
					}
				});

				$.getJSON("../../api/users/get_cart_items.php", function(data) {
					if (data > 0) {
						$('.fa-shopping-cart').parent().find('span').text("(" + data + ")");
						$('.fa-shopping-basket').parent().find('span .text-primary').text("(" + data + ")");
					}
				});

				$.getJSON("../../api/users/get_wishlist_items.php", function(data) {
					if (data > 0) {
						$('.fa-heart').parent().find('span').text("(" + data + ")");
						$(".middleBar a[data-original-title='Wishlist'] sub").text(data);
					}
					else if(data == 0){
						$('.fa-heart').parent().find('span').remove();
						$(".middleBar a[data-original-title='Wishlist'] sub").text(data);
						tableBody.append("<tr></tr>");
						tableBody.find('tr').append('<span>Não existem produtos na sua lista de desejos</span>');
					}
				});
			}
			else{
				$.confirm({
					title: 'Erro!',
					content: data.Error,
					type: 'red',
					typeAnimated: true,
					buttons: {
						error: {
							text: 'ok',
							btnClass: 'btn-red',
						}
					}
				});
			}
		});
	});

	$('.close').on('click', function (){

		var tableBody = $(this).closest('tbody');
		var itemSelected = this.closest('tr');
		var idSelected = itemSelected.getAttribute('data-id');

		$.getJSON("../../api/users/remove_wishlist_item.php", {id: idSelected}, function(data) {

			if(data.Success){   	

				itemSelected.remove();

				$.confirm({
					title: 'Sucesso!',
					content: data.Success,
					type: 'green',
					typeAnimated: true,
					autoClose: 'success|3000',
					buttons: {
						success: {
							text: 'ok',
							btnClass: 'btn-success',
						}
					}
				});

				$.getJSON("../../api/users/get_wishlist_items.php", function(data) {
					if (data > 0) {
						$('.fa-heart').parent().find('span').text("(" + data + ")");
						$(".middleBar a[data-original-title='Wishlist'] sub").text(data);
					}
					else if(data == 0){
						$('.fa-heart').parent().find('span').remove();
						$(".middleBar a[data-original-title='Wishlist'] sub").text(data);
						tableBody.append("<tr></tr>");
						tableBody.find('tr').append('<span>Não existem produtos na sua lista de desejos</span>');
					}
				});
			}
			else{
				$.confirm({
					title: 'Erro!',
					content: data.Error,
					type: 'red',
					typeAnimated: true,
					buttons: {
						error: {
							text: 'ok',
							btnClass: 'btn-red',
						}
					}
				});
			}
		});
	});
}