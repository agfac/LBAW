<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/workers.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/admins.php');

// if (!($_SESSION['username']) || !checkIfWorkerExists($_SESSION['username'])) {
// 	error_log('if');
//     $_SESSION['error_messages'][] = 'Erro com a autenticação do funcionário';
//     if(checkIfAdminExists($_SESSION['username']))
//     	header("Location: $BASE_URL" . 'pages/admin/home.php');
//     else
//     	header("Location: $BASE_URL" . 'pages/home/home.php');
//     exit;
// }

$username = 'ruivarela'; //Change to: $username = $_SESSION['username'];

$workerData = getWorkerData($username);

$smarty->assign('workerData', $workerData[0]);
?>