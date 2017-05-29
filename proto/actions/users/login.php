<?php
include_once('../../config/init.php');
include_once($BASE_DIR .'database/users.php');  

if (!$_POST['username'] || !$_POST['password']) {
  $_SESSION['error_messages'][] = 'Deverá preencher o username e a password para efetuar o login';
  $_SESSION['form_values'] = $_POST;
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}

$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);

if (isClientLoginCorrect($username, $password)) {
  $_SESSION['username'] = $username;
  $_SESSION['usertype'] = 'client';
  $userdata = getUserData($username);
  $userid = $userdata[0]['clienteid'];

  $_SESSION['userid'] = $userid;
  
  $_SESSION['success_messages'][] = 'Login efetuado com sucesso';

  header("Location: $BASE_URL");
} 
else if(isOwnerLoginCorrect($username, $password)){
  $_SESSION['username'] = $username;
  $_SESSION['usertype'] = 'owner';
  $userdata = getUserData($username);
  $userid = $userdata[0]['funcionarioid'];

  $_SESSION['userid'] = $userid;
  
  $_SESSION['success_messages'][] = 'Login efetuado com sucesso';

  header("Location: $BASE_URL");
}
else if(isAdminLoginCorrect($username, $password)){
  
  $_SESSION['username'] = $username;
  $_SESSION['usertype'] = 'admin';
  $userdata = getUserData($username);
  $userid = $userdata[0]['administradorid'];

  $_SESSION['userid'] = $userid;

  $_SESSION['success_messages'][] = 'Login efetuado com sucesso';

  header("Location: $BASE_URL");
}
else {
  $_SESSION['error_messages'][] = 'Username ou password incorretos';  
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
