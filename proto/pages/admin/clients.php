<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $allUseres = getAllUsers();

  $smarty->assign('allUseres', $allUseres);
  $smarty->display('admin/clients.tpl');
?>