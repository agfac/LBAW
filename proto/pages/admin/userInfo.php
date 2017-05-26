<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/workers.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/admins.php');

// if (!($_SESSION['username']) || !checkIfAdminExists($_SESSION['username'])) {
// 	error_log('if');
//     $_SESSION['error_messages'][] = 'Erro com a autenticação do funcionário';
//     if(checkIfWorkerExists($_SESSION['username']))
//     	header("Location: $BASE_URL" . 'pages/owner/home.php');
//     else
//     	header("Location: $BASE_URL" . 'pages/home/home.php');
//     exit;
// }

$username = 'carlabotelho'; //Change to: $username = $_SESSION['username'];

$adminData = getAdminData($username);

$smarty->assign('adminData', $adminData[0]);
?>