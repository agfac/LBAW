<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $publicationswishlist = getUserPublicationsWishList($_SESSION['userid']);  
  
  $count = count($publicationswishlist);
  
  echo json_encode($count);
?>
