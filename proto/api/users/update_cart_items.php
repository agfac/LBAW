<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  updateCartItems($_SESSION['userid'], $_GET['id'], $_GET['value']);  
  
  echo true;
?>
