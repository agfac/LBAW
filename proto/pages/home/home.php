<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (isset($_SESSION['userid'])) {
  	$clientid = $_SESSION['userid'];
  
  	$publicationsusercart = getUserPublicationsCart($clientid);

  	$smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);
  }
  
  $smarty->display('home/home.tpl');
?>
