<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

	if (!$_SESSION['username']) {
    $_SESSION['error_messages'][] = 'Undefined username';
    header("Location: $BASE_URL");
    exit;
  }

  $username = $_SESSION['username'];

  $userdata = getUserData($username);
  
  $smarty->assign('USER_DATA', $userdata[0]);
  $smarty->display('users/user-information.tpl');
?>