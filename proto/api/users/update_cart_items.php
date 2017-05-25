<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  if($_GET['value'] != 0)
  	updateCartItems($_SESSION['userid'], $_GET['id'], $_GET['value']);  
  else
  	removeCartItem($_SESSION['userid'], $_GET['id']);
  
  echo true;
?>
