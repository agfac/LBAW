<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/workers.php');
include_once('userInfo.php');

if (!isset($_GET['username']) || empty($_GET['username']) || !checkIfWorkerExists($_GET['username'])) {
	error_log('if');
	$_SESSION['error_messages'][] = 'Erro com o username do Funcionário';
	header("Location: $BASE_URL" . 'pages/admin/workers.php');
	exit;
}

$username = $_GET['username'];
$userdata = getWorkersAllData($username);

$smarty->assign('workerdata',$userdata[0]);
$smarty->display('admin/worker_edit.tpl');
?>