<?php
include_once '../../config/init.php';
include_once $BASE_DIR . 'database/publications.php';

$publication_id = $_POST['publication_id'];

$datapublicacao = strip_tags($_POST['datapublicacao']);
$pieces = explode('-', $datapublicacao);
$diaPub = $pieces[2];
$mesPub = $pieces[1];
$anoPub = $pieces[0];

$newuserinformation = array(
    'nome'          => strip_tags($_POST['nome']),
    'diaNasc'       => $diaPub,
    'mesNasc'       => $mesPub,
    'anoNasc'       => $anoPub,
);

try {
    
} catch (PDOException $e) {

}

$_SESSION['success_messages'][] = 'Publicação editada com sucesso';
header("Location: $BASE_URL" . 'pages/owner/publications.php');
?>