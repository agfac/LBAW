<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/orders.php');

  $allOrders = getAllOrders();

  $smarty->assign('allOrders', $allOrders);
  $smarty->display('owner/orders.tpl');
?>