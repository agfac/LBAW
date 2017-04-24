<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (isset($_SESSION['userid'])) {
  	$publicationscart = getUserPublicationsCart($_SESSION['userid']);
  
  	$smarty->assign('publicationsusercart', $publicationscart);
  }

  $smarty->display('home/home.tpl');
?>
