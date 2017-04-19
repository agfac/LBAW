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

$smarty->display('publications/publication.tpl');
?>