<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $clientid = $_SESSION['userid'];

  $publicationscart = getUserPublicationsCart($clientid);

  $smarty->assign('publicationscart', $publicationscart);
  $smarty->assign('PUBLICATIONSUSERCART', $publicationscart);
  $smarty->assign('qtOptions', array_combine(range(1,10),range(1,10)));
  $smarty->display('users/cart.tpl');
?>