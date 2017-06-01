<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $username = $_GET['username'];
  $userdata = getUserAllData($username);

  $smarty->assign('clientdata',$userdata[0]);
  $smarty->display('admin/client_edit.tpl');
?>