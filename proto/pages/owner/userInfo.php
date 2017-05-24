<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/workers.php');

// if (!isset($_GET['username']) || empty($_GET['username']) || !checkIfWorkerExists($_GET['username'])) {
// 	error_log('if');
//     $_SESSION['error_messages'][] = 'Erro com a autenticação do funcionário';
//     header("Location: $BASE_URL" . 'pages/home/home.php');
//     exit;
// }

$username = 'ruivarela';

$workerData = getWorkerData($username);

if(!$workerData)
	include_once('../../actions/users/logout.php');

$smarty->assign('workerData', $workerData[0]);
?>