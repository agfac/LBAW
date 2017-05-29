<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');  

$clienteid = $_SESSION['userid'];
$moradaf = $clienteid;
$moradae = $clienteid;
$publicationscart = getUserPublicationsCart($clientid);

try {

  $idencomenda = insertOrder($clienteid, $moradaf, $moradae);

  foreach ($publicationscart as $publication) {
    insertPublicacaoEncomenda($publication['id'], $idencomenda);
  }

  
} catch (PDOException $e) {
  
  $_SESSION['error_messages'][] = 'Erro ao inserir encomenda';

  header("Location: $BASE_URL" . 'pages/users/checkout.php');
  exit;
}

$_SESSION['success_messages'][] = 'Encomenda inserida com sucesso';  
header("Location: $BASE_URL");
?>
