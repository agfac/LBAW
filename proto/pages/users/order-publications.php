<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/orders.php');

$clientid = $_SESSION['userid'];

$publicationsusercart = getUserPublicationsCart($clientid);

$orderid = $_GET['id'];

$orderpublications = getOrderPublications($orderid);

$smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);
$smarty->assign('orderpublications', $orderpublications);
$smarty->assign('orderid', $orderid);
$smarty->display('users/order-publications.tpl');
?>
