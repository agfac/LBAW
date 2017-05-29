<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  
  include_once($BASE_DIR .'database/publications.php');  

  if ($_SESSION['userid']) {
  	$clientid = $_SESSION['userid'];
 
  	$publicationsusercart = getUserPublicationsCart($clientid);

  	$smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);
  }

  $eightnewpublications = getNewPublications(8);
  $fivenewpublications = getNewPublications(5);
  $fivemostsellpublications = getMostSellPublications(5);
  
  $smarty->assign('eightnewpublications', $eightnewpublications);
  $smarty->assign('fivenewpublications', $fivenewpublications);
  $smarty->assign('fivemostsellpublications', $fivemostsellpublications);
  $smarty->display('home/home.tpl');
?>
