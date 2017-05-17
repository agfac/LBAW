<?php
include_once('../../config/init.php');
include_once('userInfo.php');
include_once($BASE_DIR .'database/orders.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/publications.php');
include_once($BASE_DIR .'database/comments.php');
include_once($BASE_DIR .'database/logs.php');

$todayDate = date('Y-m-d');
$firstDate = strtotime($todayDate . '-7 day');
$firstDate = date('Y-m-d',$firstDate);

$nrOfLastClients = count(getUsersByDate($firstDate,$todayDate));

$nrOfLastComments = count(getCommentsByDate($firstDate,$todayDate));

$nrOfLastLogs = count(getlogsByDate($firstDate,$todayDate));

$infoHome = array(
	'nrOfLastClients' 	=> $nrOfLastClients,
	'nrOfLastComments' 	=> $nrOfLastComments,
	'nrOfLastLogs' 		=> $nrOfLastLogs,
	);

$smarty->assign('infoHome',$infoHome);
$smarty->display('admin/home.tpl');
?>