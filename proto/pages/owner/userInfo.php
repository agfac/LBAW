<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/workers.php');

$username = 'ruivarela';

$workerData = getWorkerData($username);

if(!$workerData)
	include_once('../../actions/users/logout.php');

$smarty->assign('workerData', $workerData[0]);
?>