$(document).ready(function() {
	updateFilter();
});

function updateFilter() {
	$.getJSON("../../api/users/get_by_category.php", function(data) {
		//TODO
	});
}