<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/workers.php');
  include_once('userInfo.php');
  
  $username = $_GET['username'];
  $userdata = getWorkersAllData($username);

  $smarty->assign('workerdata',$userdata[0]);
  $smarty->display('admin/worker_edit.tpl');
?>