$(document).ready(function() {
	updateCartNumberItems();
});

function updateCartNumberItems() {
	
	$('select').on('change', function (){
		var valueSelected = this.value;
		var itemSelected = this.closest('tr');
		var idSelected = itemSelected.getAttribute('data-id');

		$.getJSON("../../api/users/update_cart_items.php", {id: idSelected, value: valueSelected}, function(data) {

			if(data){   	

				var price = itemSelected.getAttribute('data-price');
				
				$(itemSelected).find('td[data-column="total"]').children().text("€" + price*valueSelected);
				
				$('.cart-items').find("li[data-id='"+idSelected+"'] strong[data-type='quantidade']").text(valueSelected);
			}
		});
	});

	$('.close').on('click', function (){
		console.log("Entrei");
		var itemSelected = this.closest('tr');
		var idSelected = itemSelected.getAttribute('data-id');

		$.getJSON("../../api/users/update_cart_items.php", {id: idSelected, value: 0}, function(data) {
			
			if(data){   	

				itemSelected.remove();

				$.getJSON("../../api/users/get_cart_items.php", function(data) {
					if (data > 0) {
						$('.fa-shopping-cart').parent().find('span').text("(" + data + ")");
						$('.fa-shopping-basket').parent().find('span .text-primary').text("(" + data + ")");
						$('.cart-items').find("li[data-id='"+idSelected+"']").remove();
					}
					else if(data == 0){
						$('.fa-shopping-cart').parent().find('span').remove();
						$('.fa-shopping-basket').parent().find('span .text-primary').remove();
						$('.cart-items').find("li[data-id='"+idSelected+"']").remove();
					}
				});
			}
		});
	});
}