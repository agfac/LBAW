<?php
include_once('../../config/init.php');
include_once('userInfo.php');
include_once($BASE_DIR .'database/orders.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/publications.php');

$publicationsNumber = count(getAllPublications());

$allOrders = getAllOrders();

$totalValueOfOrders = 0;

foreach ($allOrders as $key) {
	$totalValueOfOrders += $key['total'];
}

$totalNumberOfClients = count(getAllUsers());

$totalNumberOfOrders = count($allOrders);

$infoHome = array(
	'publicationsNumber' 	=> $publicationsNumber,
	'totalValueOfOrders' 	=> $totalValueOfOrders,
	'totalNumberOfClients' 	=> $totalNumberOfClients,
	'totalNumberOfOrders'	=> $totalNumberOfOrders
	);

$smarty->assign('infoHome',$infoHome);
$smarty->display('owner/home.tpl');
?>