<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/workers.php');

  $allWorkers = getAllWorkers();

  $smarty->assign('allWorkers', $allWorkers);
  $smarty->display('admin/workers.tpl');
?>