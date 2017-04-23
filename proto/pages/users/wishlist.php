<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $clientid = $_SESSION['userid'];

  $publicationswishlist = getUserPublicationsWishList($clientid);

  $smarty->assign('publicationswishlist', $publicationswishlist);
  $smarty->display('users/wishlist.tpl');
?>
