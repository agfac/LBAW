<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $username = $_SESSION['username'];
  
  $userdata = getUserData($username);

  $orders = getUserOrderList($userdata[0]['clienteid']);
  
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
  print_r($orders);
  print_r($days);
  print_r($months);
  print_r($years);
  $smarty->assign('orders', $orders);
  $smarty->assign('days', $days);
  $smarty->assign('months', $months);
  $smarty->assign('years', $years);
  $smarty->display('users/order-list.tpl');
?>
