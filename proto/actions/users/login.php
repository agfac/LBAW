<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');  

if (!$_POST['username'] || !$_POST['password']) {
  $_SESSION['error_messages'][] = 'Login invalido';
  $_SESSION['form_values'] = $_POST;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}

$username = $_POST['username'];
$password = $_POST['password'];

if (isLoginCorrect($username, $password)) {
  $_SESSION['username'] = $username;

  $userdata = getUserData($username);
  $userid = $userdata[0]['clienteid'];

  $_SESSION['userid'] = $userid;
  
  $_SESSION['success_messages'][] = 'Login efetuado com sucesso';

  header("Location: $BASE_URL");
} else {
  $_SESSION['error_messages'][] = 'Username ou password incorretos';  
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
