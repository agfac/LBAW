$(document).ready(function() {
	updateWishListNumItemsTopBar();
});

function updateWishListNumItemsTopBar() {
  $.getJSON("../../api/users/get_wishlist_items.php", function(data) {
    if (data > 0) {
      $(".middleBar a[data-original-title='Wishlist'] sub").text(data);
    }
  });
}