<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/logs.php');

$allLogs = getAllLogs();

foreach ($allLogs as &$log) {
	$nomeparsed = trim($log['nome'], '(),"');
	$log['nome'] = $nomeparsed;
}

$smarty->assign('allLogs', $allLogs);
$smarty->display('admin/logs_clients.tpl');
?>