<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/logs.php');

  $allLogs = getAllLogs();

  $smarty->assign('allLogs', $allLogs);
  $smarty->display('admin/logs_clients.tpl');
?>