<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

$publicationid = $_GET['id'];
$publicationData = getPublicationData($publicationid);
$allSubCategories = getAllSubCategorys();
$allAutors = getAllAutors();

$smarty->assign('allAutors', $allAutors);
$smarty->assign('allSubCategories', $allSubCategories);
$smarty->assign('publicationData',$publicationData[0]);
$smarty->display('owner/publication_edit.tpl');
?>