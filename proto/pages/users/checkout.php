<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');
include_once $BASE_DIR . 'database/publications.php';

if (!$_SESSION['username']) {
	$_SESSION['error_messages'][] = 'Deverá efetuar login para aceder à página solicitada';
	header("Location: $BASE_URL" . 'pages/users/login.php');
	exit;
}

if ($_SESSION['usertype'] != 'client') {
	$_SESSION['error_messages'][] = 'Deverá efetuar login com uma conta de cliente para aceder à página solicitada';
	header("Location: $BASE_URL");
	exit;
}

$clientid = $_SESSION['userid'];

$username = $_SESSION['username'];

$userdata = getUserAllData($username);
$smarty->assign('USER_DATA', $userdata[0]);

$carddate = explode('/', $userdata[0]['numero']);

$cardday = $carddate[0];
$str = $carddate[1];
$cardmonth = ltrim($str, '0');
$cardyear = $carddate[2];

$smarty->assign('cardday', $cardday);
$smarty->assign('cardmonth', $cardmonth);
$smarty->assign('cardyear', $cardyear);

$publicationscart = getUserPublicationsCart($clientid);
$cartsubtotal = getUserCartSubtotal($clientid);

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
$smarty->assign('qtOptions', array_combine(range(1,10),range(1,10)));
$smarty->assign('cartsubtotal', $cartsubtotal[0]['subtotal']);
$smarty->display('users/checkout.tpl');
?>