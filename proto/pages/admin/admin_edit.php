<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/admins.php');

  $username = $_GET['username'];
  $userdata = getAdminAllData($username);

  $smarty->assign('admindata',$userdata[0]);
  $smarty->display('admin/admin_edit.tpl');
?>