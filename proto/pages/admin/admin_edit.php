<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/admins.php');
include_once('userInfo.php');

if (!isset($_GET['username']) || empty($_GET['username']) || !checkIfAdminExists($_GET['username'])) {
	error_log('if');
    $_SESSION['error_messages'][] = 'Erro com o username do Administrador';
    header("Location: $BASE_URL" . 'pages/admin/admins.php');
    exit;
}

$username = $_GET['username'];
$userdata = getAdminAllData($username);

$smarty->assign('admindata',$userdata[0]);
$smarty->display('admin/admin_edit.tpl');
?>