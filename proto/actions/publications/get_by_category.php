<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/publications.php');

  $pubs;
  
  foreach($_POST['...'] as $subcat) {
  	array_push($pubs, getPublicationsBySubcategory($subcat));
  }
  
  // make table with publications
  
?>
