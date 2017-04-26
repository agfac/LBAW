<?php
include_once '../../config/init.php';
include_once $BASE_DIR . 'database/workers.php';

$username = $_POST['worker_username'];

$datanascimento = strip_tags($_POST['datanascimento']);
$pieces = explode('-', $datanascimento);
$diaNasc = $pieces[2];
$mesNasc = $pieces[1];
$anoNasc = $pieces[0];

$codigopostal = strip_tags($_POST['codigopostal']);
$pieces = explode('-', $codigopostal);
$cod1 = $pieces[0];
$cod2 = $pieces[1];

$atividade = strip_tags($_POST['atividade']);

  if($atividade === "Ativo")
    $atividade = 1;
  else
    $atividade = 0;

$newuserinformation = array(
    'nome'          => strip_tags($_POST['nome']),
    'genero'        => strip_tags($_POST['genero']),
    'diaNasc'       => $diaNasc,
    'mesNasc'       => $mesNasc,
    'anoNasc'       => $anoNasc,
    'morada'        => strip_tags($_POST['morada']),
    'localidade'    => strip_tags($_POST['localidade']),
    'cod1'          => $cod1,
    'cod2'          => $cod2,
    'pais'          => strip_tags($_POST['pais']),
    'telefone'      => strip_tags($_POST['telefone']),
    'nif'           => strip_tags($_POST['nif']),
    'cartaocidadao' => strip_tags($_POST['cartaocidadao']),
    'email'         => strip_tags($_POST['email']),
    'username'      => strip_tags($_POST['username']),
    'atividade'     => $atividade,
);

try {
    
    $userdata = getWorkersAllData($username);
    
    updateWorkerInformation($username, $userdata, $newuserinformation);

} catch (PDOException $e) {

    if (strpos($e->getMessage(), 'cliente_email_key') !== false || strpos($e->getMessage(), 'cliente_nif_key') !== false || strpos($e->getMessage(), 'cliente_username_key') !== false) {
        $_SESSION['error_messages'][]         = 'Duplicate username';
        $_SESSION['field_errors']['username'] = 'Username already exists';
    } else {
        $_SESSION['error_messages'][] = 'Error user information edition';
    }

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/admin/worker_edit.php?username=' . $username);
    exit;
}
$_SESSION['success_messages'][] = 'User data edited successfully';
header("Location: $BASE_URL" . 'pages/admin/workers.php');
?>