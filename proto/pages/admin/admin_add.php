<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/admins.php');
include_once('userInfo.php');

$smarty->display('admin/admin_add.tpl');
?>