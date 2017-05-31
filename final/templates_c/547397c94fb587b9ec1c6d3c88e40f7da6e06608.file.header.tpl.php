<?php /* Smarty version Smarty-3.1.15, created on 2017-05-31 23:20:46
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/owner/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1944577350592c85c3138295-63542788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '547397c94fb587b9ec1c6d3c88e40f7da6e06608' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/owner/common/header.tpl',
      1 => 1496095373,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1944577350592c85c3138295-63542788',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c85c316c9f3_99095816',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
    'workerData' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c85c316c9f3_99095816')) {function content_592c85c316c9f3_99095816($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Owner Dashboard | AwesomeBookShop</title>

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
css/owner/custom.min.css" rel="stylesheet">

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
pages/owner/home.php" class="site_title"><i class="fa fa-book"></i> <span>Funcionário</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/owner/user.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bem vindo,</span>
              <h2><?php echo $_smarty_tpl->tpl_vars['workerData']->value['nome'];?>
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
pages/owner/home.php">Página Inicial</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/owner/orders.php">Encomendas</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/owner/publications.php">Publicações</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/owner/questions.php">Perguntas Utilizador</a></li>
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
images/owner/user.png" alt="" id="nomeUser"><?php echo $_smarty_tpl->tpl_vars['workerData']->value['nome'];?>
</img>
                  <span class=" fa fa-angle-down" ></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/home/home.php"><i class="fa fa-home pull-right"></i> Home Page</a></li>
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                </ul>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </div>
        <!-- /top navigation --><?php }} ?>
