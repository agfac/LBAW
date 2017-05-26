<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/orders.php');

if (!$_SESSION['username']) {
  $_SESSION['error_messages'][] = 'Deverá efetuar login para aceder à página solicitada';
  header("Location: $BASE_URL");
  exit;
}

$username = $_SESSION['username'];

$userdata = getUserData($username);

$orders = getUserOrderList($userdata[0]['clienteid']);

$clientid = $_SESSION['userid'];

$publicationsusercart = getUserPublicationsCart($clientid);

$days = array();

$months = array();

$years = array();

$orderspublications = array();

foreach ($orders as $order) {
  $timestamp = $order['data'];
  $timestampparsed = explode(' ', $timestamp);
  $date = $timestampparsed[0];
  $dateparsed = explode('-', $date);
  $days[] = $dateparsed[2];
  $months[] = $dateparsed[1];
  $years[] = $dateparsed[0];

  $orderid = $order['encomendaid'];
  $orderpublications = getOrderPublications($orderid);
  $orderspublications[] = count($orderpublications);
}

$smarty->assign('orders', $orders);
$smarty->assign('days', $days);
$smarty->assign('months', $months);
$smarty->assign('years', $years);
$smarty->assign('orderspublications', $orderspublications);
$smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);
$smarty->display('users/order-list.tpl');
?>
