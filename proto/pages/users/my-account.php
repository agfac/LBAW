<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $clientid = $_SESSION['userid'];
  
  $publicationsusercart = getUserPublicationsCart($clientid);

  $smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);

  $smarty->display('users/my-account.tpl');
?>
