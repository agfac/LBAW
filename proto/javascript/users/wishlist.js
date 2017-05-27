$(document).ready(function() {
	updateWishListNumberItems();
});

function updateWishListNumberItems() {

	$('.btn').on('click', function (){

		var itemSelected = this.closest('tr');
		var idSelected = itemSelected.getAttribute('data-id');
		var quantity = 1;

		$.getJSON("../../api/users/add_cart_item.php", {id: idSelected, value: quantity}, function(data) {

			if(data){   	

				$.getJSON("../../api/users/remove_wishlist_item.php", {id: idSelected}, function(data) {
					
					if(data){   	

						itemSelected.remove();

						$.getJSON("../../api/users/get_wishlist_items.php", function(data) {
							if (data > 0) {
								$('.fa-heart').parent().find('span').text("(" + data + ")");
								$(".middleBar a[data-original-title='Wishlist'] sub").text(data);
							}
							else if(data == 0){
								$('.fa-heart').parent().find('span').remove();
								$(".middleBar a[data-original-title='Wishlist'] sub").text(data);
							}
						});
					}
				});

				$.getJSON("../../api/users/get_cart_items.php", function(data) {
					if (data > 0) {
						$('.fa-shopping-cart').parent().find('span').text("(" + data + ")");
						$('.fa-shopping-basket').parent().find('span .text-primary').text("(" + data + ")");
					}
				});
				
				if(data.Success){
					$('.pace-inactive').after('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+ data.Success + '</strong></div><!-- end alert -->');
				}
				else{
					$('.pace-inactive').after('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>'+ data.Error + '</strong></div><!-- end alert -->');
				}
			}
		});
	});

	$('.close').on('click', function (){

		var itemSelected = this.closest('tr');
		var idSelected = itemSelected.getAttribute('data-id');

		$.getJSON("../../api/users/remove_wishlist_item.php", {id: idSelected}, function(data) {
			
			if(data){   	

				itemSelected.remove();

				$.getJSON("../../api/users/get_wishlist_items.php", function(data) {
					if (data > 0) {
						$('.fa-heart').parent().find('span').text("(" + data + ")");
						$(".middleBar a[data-original-title='Wishlist'] sub").text(data);
					}
					else if(data == 0){
						$('.fa-heart').parent().find('span').remove();
						$(".middleBar a[data-original-title='Wishlist'] sub").text(data);
					}
				});
			}
		});
	});
}