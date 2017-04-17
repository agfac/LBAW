<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/tweets.php');

  $smarty->display('home/home.tpl');
?>
