<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/admins.php');

  $allAdmins = getAllAdmins();

  $smarty->assign('allAdmins', $allAdmins);
  $smarty->display('admin/admins.tpl');
?>