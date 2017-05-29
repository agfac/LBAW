<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');

if (!$_SESSION['username']) {
	$_SESSION['error_messages'][] = 'Deverá efetuar login para aceder à página solicitada';
	header("Location: $BASE_URL");
	exit;
}

$clientid = $_SESSION['userid'];

$publicationswishlist = getUserPublicationsWishList($clientid);
$publicationscart = getUserPublicationsCart($clientid);

$eightnewpublications = getNewPublications(8);
$smarty->assign('eightnewpublications', $eightnewpublications);

$smarty->assign('publicationswishlist', $publicationswishlist);
$smarty->assign('PUBLICATIONSUSERCART', $publicationscart);
$smarty->display('users/wishlist.tpl');
?>
