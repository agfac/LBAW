<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $username = $_SESSION['username'];
  
  $userdata = getUserData($username);

  $orders = getUserOrderList($userdata[0]['clienteid']);

  $clientid = $_SESSION['userid'];
  
  $publicationsusercart = getUserPublicationsCart($clientid);

  $smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);
  $smarty->assign('orders', $orders);
  $smarty->display('users/order-list.tpl');
?>
