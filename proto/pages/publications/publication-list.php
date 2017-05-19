<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

if (!$_GET['subcat']) {
	$default_subcat_name = 'nada';
}
else {
$default_subcat_name = $_GET['subcat'];
}

if (!$_GET['cat']) {
	$default_cat_name = 'nada';
}
else {
$default_cat_name = $_GET['cat'];
}

$def_pubs = getPublicationsBySubcategory($default_subcat_name, $default_cat_name);

$def_subcat_array = getAllSubCategorysByCategoryName($default_cat_name);

$all_publications = getAllPublications();

$subcategory = getAllSubCategorys();

$category = getAllCategorys();

$smarty->assign('publication', $all_publications[0]);

$smarty->assign('subcategory', $subcategory);

$smarty->assign('category', $category);

$smarty->assign('def_cat', $default_cat_name);

$smarty->assign('def_subcat', $default_subcat_name);

$smarty->assign('def_pubs', $def_pubs);

$smarty->assign('def_subcat_array', $def_subcat_array);

$smarty->display('publications/publication-list.tpl');
?>