<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');

$countries = getAllCountries();

$smarty->assign('countries', $countries);
$smarty->display('users/register.tpl');
?>