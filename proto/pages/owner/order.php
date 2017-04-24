<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/orders.php');

$orderid = $_GET['id'];
echo $orderid;
$orderData = getOrderData($orderid);
$orderFactAddData = getOrderFactAddData($orderid);

print_r($orderData);
print_r($orderFactAddData);

$smarty->assign('orderData',$orderData);
$smarty->assign('orderFactAddData',$orderFactAddData);
$smarty->display('owner/order.tpl');
?>