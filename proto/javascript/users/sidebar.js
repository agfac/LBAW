$(document).ready(function() {
	addAtiveClass();
	updateCartNumItems();
	updateWishListNumItems();
});

function addAtiveClass() {
	$('a').each(function(){
		if ($(this).prop('href') == window.location.href) {
			$(this).parent().addClass('active');
		}
	});
}

function updateCartNumItems() {
	$.getJSON("../../api/users/get_cart_items.php", function(data) {
    if (data > 0) {
      $('.fa-shopping-cart').parent().append('<span class="text-primary">(' + data + ')</span>');
    }
  });
}