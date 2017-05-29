<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');
include_once($BASE_DIR .'database/publications.php');
include_once($BASE_DIR .'database/comments.php');

if (!$_GET['id']) {
	$_SESSION['error_messages'][] = 'Não foi possível identificar a publicação';
	header("Location: $BASE_URL");
	exit;
}

$username = $_SESSION['username'];

$userdata = getUserAllData($username);
$smarty->assign('USER_DATA', $userdata[0]);

$publicationid = $_GET['id'];
$clientid = $_SESSION['userid'];

$publicationdata = getPublicationData($publicationid);
$publicationscart = getUserPublicationsCart($clientid);

$smarty->assign('publication', $publicationdata);

$recomendations = getRandomRecomendationPublications($publicationdata[0]['nome_subcategoria'], $publicationdata[0]['nome_categoria'], 5, $publicationdata[0]['publicacaoid']);

$smarty->assign('recomendations', $recomendations);

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

$smarty->assign('publicationscart', $publicationscart);
$smarty->assign('PUBLICATIONSUSERCART', $publicationscart);

$smarty->assign('ratingvalues', array(1,2,3,4,5));
$smarty->assign('rating_names', array(
	' 1 Estrela',
	' 2 Estrelas',
	' 3 Estrelas',
	' 4 Estrelas',
	' 5 Estrelas')
);

$bought = checkIfUserBoughtPublication($clientid, $publicationdata[0]['publicacaoid']);
$smarty->assign('bought', $bought);

$havecommented = checkIfUserCommentedPublication($clientid, $publicationdata[0]['publicacaoid']);
$smarty->assign('havecommented', $havecommented);

$smarty->display('publications/publication.tpl');
?>