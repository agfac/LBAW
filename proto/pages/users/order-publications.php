<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/orders.php');

if (!$_SESSION['username']) {
	$_SESSION['error_messages'][] = 'Deverá efetuar login para aceder à página solicitada';
	header("Location: $BASE_URL");
	exit;
}

$clientid = $_SESSION['userid'];

$publicationsusercart = getUserPublicationsCart($clientid);

$orderid = $_GET['id'];

$orderpublications = getOrderPublications($orderid);

$smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);
$smarty->assign('orderpublications', $orderpublications);
$smarty->assign('orderid', $orderid);
$smarty->display('users/order-publications.tpl');
?>
