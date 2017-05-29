<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

if (!$_GET['id']) {
	$_SESSION['error_messages'][] = 'Undefined publication identifier';
	header("Location: $BASE_URL");
	exit;
}

$publicationid = $_GET['id'];

$publicationdata = getPublicationData($publicationid);

$smarty->assign('publication', $publicationdata[0]);

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

$smarty->display('publications/publication.tpl');
?>