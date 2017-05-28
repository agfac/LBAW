<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/admins.php');
include_once($BASE_DIR .'database/users.php');
include_once('userInfo.php');

$countries = getAllCountries();

$smarty->assign('countries',$countries);
$smarty->display('admin/admin_add.tpl');
?>