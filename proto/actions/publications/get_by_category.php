<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/publications.php');

  /* as checkboxes devem ser
	<form method="post">
	<?php 
	foreach{
	echo'
	<input id="$subcategory.id" value="$subcategory.name"  name="subcategories[]" type="checkbox">
	<input type="submit">';
	}
	?>
	</form>
  */
  
  
  $pubs;
  
  foreach($_POST['...'] as $subcat) {
  	array_push($pubs, getPublicationsBySubcategory($subcat));
  }
  
  // make table with publications
  
?>
