<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/admins.php');

  if (!$_POST['nome'] || !$_POST['genero'] || !$_POST['datanascimento'] || !$_POST['pais'] || !$_POST['username'] || !$_POST['password'] || !$_POST['atividade']) {
    error_log('if');
    $_SESSION['error_messages'][] = 'Todos os campos são de preenchimento obrigatório';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/admin/admin_add.php');
    exit;
  }

  $nome = strip_tags($_POST['nome']);
  $genero = strip_tags($_POST['genero']);
  $datanascimento = strip_tags($_POST['datanascimento']);
  $pais = strip_tags($_POST['pais']);
  $username = strip_tags($_POST['username']);
  $password = $_POST['password'];
  $atividade = strip_tags($_POST['atividade']);

  if($atividade == "Ativo")
    $atividade = TRUE;
  else
    $atividade = FALSE;

  $pieces = explode('/', $datanascimento);
  $diaNasc = $pieces[1];
  $mesNasc = $pieces[0];
  $anoNasc = $pieces[2];

  try {

    createAdmin($nome, $genero, $diaNasc, $mesNasc, $anoNasc, $pais, $username, $password, $atividade);

  } catch (PDOException $e) {
  
    if (strpos($e->getMessage(), 'cliente_username_key') !== false) {
      $_SESSION['error_messages'][] = 'Username duplicado';
      $_SESSION['field_errors']['username'] = 'Username escolhido já existe';
    }
    else $_SESSION['error_messages'][] = 'Erro ao criar utilizador';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/admin/admin_add.php');
    exit;
  }
  $_SESSION['success_messages'][] = 'Utilizador registado com sucesso';  
  header("Location: $BASE_URL" . 'pages/admin/admins.php');
?>
