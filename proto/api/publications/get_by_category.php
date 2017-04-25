<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/publications.php');

  $publications_by_cat = getPublicationBySubcategory($_SESSION['subcategory']); // TO FIX
  
  echo json_encode($publications_by_cat);
?>
