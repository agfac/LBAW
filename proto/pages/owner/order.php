<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/orders.php');
include_once('userInfo.php');

$orderid = $_GET['id'];

$orderData = getOrderData($orderid);
$orderFactAddData = getOrderFactAddData($orderid);

$smarty->assign('orderData',$orderData);
$smarty->assign('orderFactAddData',$orderFactAddData);
$smarty->display('owner/order.tpl');
?>