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
					console.log("DATA: " + JSON.parse(data));
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

				//$('body').append('<div class="modal fade myModalSmall in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: block; padding-right: 15px;"><div class="modal-dialog modal-sm" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button><h4 class="modal-title" id="myModalLabel">Modal title</h4></div><!-- end modal-header --><div class="modal-body"><p>Consectetur adipisicing elit. Nemo architecto debitis dolorum ullam in ut sint, odit maiores eaque explicabo, repellendus minima soluta sunt! Nisi minima blanditiis voluptate, ut atque.</p></div><!-- end modal-body --></div><!-- end modal-content --></div><!-- end modal-dialog --></div>');
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