<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

$all_publications = getAllPublications();

$smarty->assign('publication', $all_publications[0]);

$smarty->display('publications/publication-list.tpl');
?>