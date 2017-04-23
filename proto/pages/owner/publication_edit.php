<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

$publicationid = $_GET['id'];
$publicationData = getPublicationData($publicationid);

$smarty->assign('publicationData',$publicationData[0]);
$smarty->display('owner/publication_edit.tpl');
?>