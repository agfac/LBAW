<?php
  session_set_cookie_params(3600, '/~lbaw1633'); //FIXME
  session_start();

  error_reporting(E_ERROR | E_WARNING); // E_NOTICE by default

  $BASE_DIR = '/opt/lbaw/lbaw1633/public_html/proto/'; //FIXME
  $BASE_URL = '/~lbaw1633/proto/'; //FIXME

  $conn = new PDO('pgsql:host=dbm;dbname=lbaw1633', 'lbaw1633', 'ex23tp55'); //FIXME
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  
  $conn->exec('SET SCHEMA \'proto\''); //FIXME?

  include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');
  
  $smarty = new Smarty;
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
  $smarty->assign('BASE_URL', $BASE_URL);

  $parsedata['fulldata'] = '%d-%m-%Y %H:%M:%S';
  $parsedata['data'] = '%d-%m-%Y';
  $smarty->assign('parsedata', $parsedata);
  
  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);  
  $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
  $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
  $smarty->assign('USERNAME', $_SESSION['username']);

  unset($_SESSION['success_messages']);
  unset($_SESSION['error_messages']);  
  unset($_SESSION['field_errors']);
  unset($_SESSION['form_values']);

  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  ini_set("log_errors", 1);
  ini_set("error_log", "/opt/lbaw/lbaw1633/public_html/proto/errors/php-error.log");
?>
