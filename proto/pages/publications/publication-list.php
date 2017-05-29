<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

if (!$_GET['subcat']) {
	$_SESSION['error_messages'][] = 'Undefined filter identifier';
	header("Location: $BASE_URL");
	exit;
}
else {
	$default_subcat_name = $_GET['subcat'];

	if (!$_GET['cat']) {
		$_SESSION['error_messages'][] = 'Undefined filter identifier';
		header("Location: $BASE_URL");
		exit;
	}
	else {
		$default_cat_name = $_GET['cat'];

		$def_pubs = getPublicationsBySubcategory($default_subcat_name, $default_cat_name);

		$def_subcat_array = getAllSubCategorysByCategoryName($default_cat_name);

		$smarty->assign('def_cat', $default_cat_name);

		$smarty->assign('def_subcat', $default_subcat_name);

		$smarty->assign('def_pubs', $def_pubs);

		$smarty->assign('def_subcat_array', $def_subcat_array);
	}
}


$all_publications = getAllPublications();

$subcategory = getAllSubCategorys();

$category = getAllCategorys();

$smarty->assign('publication', $all_publications[0]);

$smarty->assign('subcategory', $subcategory);

$smarty->assign('category', $category);

$eightnewpublications = getNewPublications(8);
$smarty->assign('eightnewpublications', $eightnewpublications);

$subcategoriasLivros = getAllSubCategorysByCategoryName('Livros');
$subcategoriasLivrosEscolares = getAllSubCategorysByCategoryName('Livros Escolares');
$subcategoriasApoioEscolar = getAllSubCategorysByCategoryName('Apoio Escolar');
$subcategoriasRevistas = getAllSubCategorysByCategoryName('Revistas');
$subcategoriasDicionarios = getAllSubCategorysByCategoryName('Dicionarios e Enciclopedias');
$subcategoriasGuiasEMapas = getAllSubCategorysByCategoryName('Guias Turisticos e Mapas');

$smarty->assign('subcategoriasLivros', $subcategoriasLivros);
$smarty->assign('subcategoriasLivrosEscolares', $subcategoriasLivrosEscolares);
$smarty->assign('subcategoriasApoioEscolar', $subcategoriasApoioEscolar);
$smarty->assign('subcategoriasRevistas', $subcategoriasRevistas);
$smarty->assign('subcategoriasDicionarios', $subcategoriasDicionarios);
$smarty->assign('subcategoriasGuiasEMapas', $subcategoriasGuiasEMapas);

$smarty->display('publications/publication-list.tpl');
?>