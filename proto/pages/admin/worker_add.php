<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/workers.php');
  
  $smarty->display('admin/worker_add.tpl');
?>