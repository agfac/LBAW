<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/publications.php');

$oneRandomNewPublication = getNewPublications(1);
$smarty->assign('oneRandomNewPublication', $oneRandomNewPublication[0]);

$getNPromotionalPublications = getNPromotionalPublications(5);

foreach ($getNPromotionalPublications as &$publications) {
	if(!$publications['nome_autor'])
		$publications['nome_autor'] = "Sem autor";
}

$smarty->assign('def_pubs', $getNPromotionalPublications);

$smarty->display('publications/publication-list.tpl');
?>