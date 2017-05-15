<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/admins.php');

$username = 'carlabotelho';

$adminData = getAdminData($username);

if(!$adminData)
	include_once('../../actions/users/logout.php');

$smarty->assign('adminData', $adminData[0]);
?>