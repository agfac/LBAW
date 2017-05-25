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
	    }
	  });
	});
}