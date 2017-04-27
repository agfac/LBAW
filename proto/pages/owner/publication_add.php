<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

$allSubCategories = getAllSubCategorys();
$allAutors = getAllAutors();

$smarty->assign('allAutors', $allAutors);
$smarty->assign('allSubCategories', $allSubCategories);
$smarty->display('owner/publication_add.tpl');
?>