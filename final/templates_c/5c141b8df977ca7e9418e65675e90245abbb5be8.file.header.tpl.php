<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:31:49
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/admin/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81776053592c8535ce3a81-45135256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c141b8df977ca7e9418e65675e90245abbb5be8' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/admin/common/header.tpl',
      1 => 1495966157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81776053592c8535ce3a81-45135256',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
    'adminData' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c8535d17874_06806546',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c8535d17874_06806546')) {function content_592c8535d17874_06806546($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Administrator Dashboard | AwesomeBookShop</title>

  <!-- Bootstrap -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/admin/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
    <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
    </div><!-- end alert -->
    <?php } ?>

    <?php  $_smarty_tpl->tpl_vars['success'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['success']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['success']->key => $_smarty_tpl->tpl_vars['success']->value) {
$_smarty_tpl->tpl_vars['success']->_loop = true;
?>
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</strong>
    </div><!-- end alert -->
    <?php } ?>
    
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/home.php" class="site_title"><i class="fa fa-book"></i> <span>Administrador</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/admin/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bem vindo,</span>
              <h2><?php echo $_smarty_tpl->tpl_vars['adminData']->value['nome'];?>
</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Geral</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Páginas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/home.php">Página inicial</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/clients.php">Clientes</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/workers.php">Funcionários</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/admins.php">Administradores</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/comments.php">Comentários</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/logs_clients.php">Logs Clientes</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/logs_search.php">Logs de Pesquisa</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/admin/user.png" alt=""><?php echo $_smarty_tpl->tpl_vars['adminData']->value['nome'];?>

                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
        <!-- /top navigation --><?php }} ?>
