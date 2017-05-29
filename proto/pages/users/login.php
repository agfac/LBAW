<?php
include_once('../../config/init.php');

$eightnewpublications = getNewPublications(8);
$smarty->assign('eightnewpublications', $eightnewpublications);

$smarty->display('users/login.tpl');
?>
