<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');

if (!$_SESSION['username']) {
	$_SESSION['error_messages'][] = 'Deverá efetuar login para aceder à página solicitada';
	header("Location: $BASE_URL");
	exit;
}

$clientid = $_SESSION['userid'];

$publicationsusercart = getUserPublicationsCart($clientid);

$eightnewpublications = getNewPublications(8);
$smarty->assign('eightnewpublications', $eightnewpublications);

$smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);

$smarty->display('users/my-account.tpl');
?>
