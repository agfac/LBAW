<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');
include_once('userInfo.php');

if (!isset($_GET['username']) || empty($_GET['username']) || !checkIfUserExists($_GET['username'])) {
	error_log('if');
	$_SESSION['error_messages'][] = 'Erro com o username do Cliente';
	header("Location: $BASE_URL" . 'pages/admin/clients.php');
	exit;
}

$username = $_GET['username'];
$userdata = getUserAllData($username);

$smarty->assign('clientdata',$userdata[0]);
$smarty->display('admin/client_edit.tpl');
?>