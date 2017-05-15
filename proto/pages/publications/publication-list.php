<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

if (!$_GET['subcat']) {
	$default_cat_name = 'nada';
}
else {
$default_cat_name = $_GET['subcat'];
}

$all_publications = getAllPublications();

$subcategory = getAllSubCategorys();

$category = getAllCategorys();

$smarty->assign('publication', $all_publications[0]);

$smarty->assign('subcategory', $subcategory);

$smarty->assign('category', $category);

$smarty->assign('def_cat', $default_cat_name);

$smarty->display('publications/publication-list.tpl');
?>