<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

$allPublications = getAllPublications();

$smarty->assign('allPublications', $allPublications);
$smarty->display('owner/publications.tpl');
?>