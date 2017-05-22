<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $username = $_SESSION['username'];
  
  $userdata = getUserData($username);

  $orders = getUserOrderList($userdata[0]['clienteid']);

  $clientid = $_SESSION['userid'];
  
  $publicationsusercart = getUserPublicationsCart($clientid);

  $days = array();
  
  $months = array();
  
  $years = array();
  
  foreach ($orders as $order) {
    $timestamp = $order['data'];
    $timestampparsed = explode(' ', $timestamp);
    $date = $timestampparsed[0];
    $dateparsed = explode('-', $date);
    $days[] = $dateparsed[2];
    $months[] = $dateparsed[1];
    $years[] = $dateparsed[0];
  }

  $smarty->assign('orders', $orders);
  $smarty->assign('days', $days);
  $smarty->assign('months', $months);
  $smarty->assign('years', $years);
  $smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);
  $smarty->display('users/order-list.tpl');
?>
