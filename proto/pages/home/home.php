<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  
  include_once($BASE_DIR .'database/publications.php');  

  if (array_key_exists('userid',$_SESSION)) {

  	$clientid = $_SESSION['userid'];
 
  	$publicationsusercart = getUserPublicationsCart($clientid);

  	$smarty->assign('PUBLICATIONSUSERCART', $publicationsusercart);
  }

  $eightnewpublications = getNewPublications(8);
  $fivenewpublications = getNewPublications(5);
  $fivemostsellpublications = getMostSellPublications(5);
  $commentedpublications = getCommentedPublications(4);

  $arterandompublication = getRandomPublicationsBySubcategory('Arte', 'Livros', 1);
  $desportorandompublication = getRandomPublicationsBySubcategory('Desporto e Lazer', 'Livros', 1);
  $direitorandompublication = getRandomPublicationsBySubcategory('Direito', 'Livros', 1);
  $engenhariarandompublication = getRandomPublicationsBySubcategory('Engenharia', 'Livros', 1);
  $gestaorandompublication = getRandomPublicationsBySubcategory('Gestao', 'Livros', 1);
  $historiarandompublication = getRandomPublicationsBySubcategory('Historia', 'Livros', 1);

  $randompublications = getRandomPublications(2);

  $smarty->assign('eightnewpublications', $eightnewpublications);
  $smarty->assign('fivenewpublications', $fivenewpublications);
  $smarty->assign('fivemostsellpublications', $fivemostsellpublications);
  $smarty->assign('commentedpublications', $commentedpublications);

  $smarty->assign('arterandompublication', $arterandompublication[0]);
  $smarty->assign('desportorandompublication', $desportorandompublication[0]);
  $smarty->assign('direitorandompublication', $direitorandompublication[0]);
  $smarty->assign('engenhariarandompublication', $engenhariarandompublication[0]);
  $smarty->assign('gestaorandompublication', $gestaorandompublication[0]);
  $smarty->assign('historiarandompublication', $historiarandompublication[0]);

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

  $smarty->assign('randompublications', $randompublications);

  $smarty->display('home/home.tpl');
?>
