<?php /* Smarty version Smarty-3.1.15, created on 2017-05-31 23:27:49
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13725352675929643fa2d8e6-53821002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdabc0eff6c70f687462ef97c1f3b359cd9d2143' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/common/header.tpl',
      1 => 1496269644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13725352675929643fa2d8e6-53821002',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5929643fb18fd8_30350803',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
    'USERNAME' => 0,
    'subcategoriasLivros' => 0,
    'publication' => 0,
    'subcategoriasLivrosEscolares' => 0,
    'subcategoriasApoioEscolar' => 0,
    'subcategoriasRevistas' => 0,
    'subcategoriasDicionarios' => 0,
    'subcategoriasGuiasEMapas' => 0,
    'var' => 0,
    'eightnewpublications' => 0,
    'USER_DATA' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929643fb18fd8_30350803')) {function content_5929643fb18fd8_30350803($_smarty_tpl) {?><!DOCTYPE html>
<html lang="pt-pt">
<head>
  <title>AwesomeBookShop - A sua livraria móvel</title>
  <meta charset="utf-8">
  <meta name="description" content="Livraria online">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <!--Favicon-->
  <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/icons/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/icons/favicon.ico" type="image/x-icon">
  
  <!-- css files -->
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/owl.theme.default.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/animate.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/swiper.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/register.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/login.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/edit-form.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/jquery-confirm.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/paymentfont.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/paymentfont.min.css" />

  <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
  <link id="pagestyle" rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/default.css" />
  
  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">

  <!-- JavaScript Files -->
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/jquery.scrollTo.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/jquery.scrollTo.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/owl.carousel.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/jquery.downCount.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/nouislider.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/jquery.sticky.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/pace.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/star-rating.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/wow.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/gmaps.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/swiper.min.js"></script>
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/main.js"></script>
  
</head>
<body>

  <body>
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

    <!-- start section -->
    <section class="primary-background">
      <div class="container-fluid">
        <div class="row grid-space-0">
          <div class="col-sm-12">
          </div><!-- end col -->
        </div><!-- end row -->
      </div><!-- end container -->
    </section>
    <!-- end section -->

    <!-- start topBar -->
    <div class="topBar">
      <div class="container">
        <ul class="list-inline pull-left hidden-sm hidden-xs">
          <li><span class="text-primary">Tem alguma dúvida?</span></li>
          <li><i class="fa fa-phone mr-5"></i>+224 567 891</li>
          <li><i class="fa fa-envelope mr-5"></i>apoio@awesomebookshop.pt</li>
        </ul>

        <ul class="topBarNav pull-right">
          <li class="linkdown">
            <a href="javascript:void(0);">
              <i class="fa fa-eur mr-5"></i>
              EUR
              <i class="fa fa-angle-down ml-5"></i>
            </a>
            <ul class="w-100">
              <li><a href="javascript:void(0);"><i class="fa fa-usd mr-5"></i>USD</a></li>
              <li class="active"><a href="javascript:void(0);"><i class="fa fa-eur mr-5"></i>EUR</a></li>
              <li><a href="javascript:void(0);"><i class="fa fa-gbp mr-5"></i>GBP</a></li>
            </ul>
          </li>
          <li class="linkdown">
            <a href="javascript:void(0);">
              <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/flags/flag-pt.jpg" class="mr-5" alt="bandeira portuguesa">
              <span class="hidden-xs">
                Português 
                <i class="fa fa-angle-down ml-5"></i>
              </span>    
            </a>
            <ul class="w-110">
              <li><a href="javascript:void(0);"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/flags/flag-english.jpg" class="mr-5" alt="bandeira inglesa">English</a></li>
              <li class="active"><a><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/flags/flag-pt.jpg" class="mr-5" alt="bandeira portuguesa">Português</a></li>
            </ul>
          </li>
          <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
          <?php echo $_smarty_tpl->getSubTemplate ('common/menu_logged_in.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

          <?php } else { ?>
          <?php echo $_smarty_tpl->getSubTemplate ('common/menu_logged_out.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

          <?php }?>
          
          <div class="middleBar">
            <div class="container">
              <div class="row table">
                <div class="col-sm-3 vertical-align text-left hidden-xs col-lg-offset-2 col-lg-3">
                  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">
                    <img width="180" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/logos/logo_abs_4.png" alt="logotipo" />
                  </a>
                </div><!-- end col -->
                <div class="col-sm-6 vertical-align text-center col-lg-offset-3">
                  <form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/publication/getPublicationsFTS.php" method="post" class="form-horizontal form-label-left input_mask">
                    <label for="searchpublication" alt="caixa de pesquisa" aria-label="pesquisa"> </label>
                    <input type="text" placeholder="Pesquisar" name="searchpublication" id="searchpublication" class="form-control input-md">
                    <button type="submit" class="btn btn-success">Pesquisar</button>
                  </form>
                </div><!-- end col -->
                <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
                <div class="col-sm-3 vertical-align header-items">
                  <div class="header-item mr-5">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/wishlist.php" data-toggle="tooltip" data-placement="top" title="Wishlist">
                      <i class="fa fa-heart-o"></i>
                      <sub></sub>
                    </a>
                  </div>
                  <div class="header-item"> </div>
                </div><!-- end col -->
                <?php }?>
              </div><!-- end  row -->
            </div><!-- end container -->
          </div><!-- end middleBar -->

          <!-- start navbar -->
          <div class="navbar yamm navbar-default">
            <div class="container">
              <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-3" class="navbar-toggle" alt="butao navegacao" aria-label="butao navegacao">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="javascript:void(0);" class="navbar-brand visible-xs">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/logos/logo_abs_4_micro.png" alt="logo">
                </a>
              </div>
              <div id="navbar-collapse-3" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <!-- Home -->
                  <li class="dropdown active">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">
                      <i class="fa fa-home mr-5"></i>
                      Página inicial
                    </a>
                  </li><!-- end li dropdown -->    
                  <!-- Categorias -->
                  <li class="dropdown yamm-fw">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                      <i class="fa fa-navicon mr-5"></i>
                      Categorias
                      <i class="fa fa-angle-down ml-5"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <!-- Content container to add padding -->
                        <div class="yamm-content">
                          <div class="row">
                            <ul class="col-sm-3">
                              <li class="title">
                                <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=1"><span class="text-primary">Livros</span></a></h6>
                              </li>
                              <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategoriasLivros']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
                              <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
&cat=Livros"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
</a></li>
                              <?php } ?>
                            </ul><!-- end ul col -->
                            <ul class="col-sm-3">
                              <li class="title">
                                <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=2"><span class="text-primary">Livros Escolares</span></a></h6>
                              </li>
                              <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategoriasLivrosEscolares']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
                              <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
&cat=Livros Escolares"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
</a></li>
                              <?php } ?>
                              <li class="title">
                                <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=3"><span class="text-primary">Apoio Escolar</span></a></h6>
                              </li>
                              <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategoriasApoioEscolar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
                              <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
&cat=Apoio Escolar"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
</a></li>
                              <?php } ?>
                            </ul><!-- end ul col -->
                            <ul class="col-sm-3">
                              <li class="title">
                                <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=4"><span class="text-primary">Revistas</span></a></h6>
                              </li>
                              <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategoriasRevistas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
                              <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
&cat=Revistas"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
</a></li>
                              <?php } ?>
                            </ul><!-- end ul col -->
                            <ul class="col-sm-3">
                              <li class="title">
                                <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=5"><span class="text-primary">Dicionários e Enciclopédias</span></a></h6>
                                <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategoriasDicionarios']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
&cat=Dicionarios e Enciclopedias"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
</a></li>
                                <?php } ?>
                              </li>
                              <li class="title">
                                <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=6"><span class="text-primary">Guias Turísticos e Mapas</span></a></h6>
                                <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategoriasGuiasEMapas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
                                <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
&cat=Guias Turisticos e Mapas"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome'];?>
</a></li>
                                <?php } ?>
                              </li>

                            </ul><!-- end ul col -->
                          </div><!-- end row -->
                        </div><!-- end yamn-content -->
                      </li><!-- end li -->
                    </ul><!-- end ul dropdown-menu -->
                  </li><!-- end li dropdown -->
                  <!-- Novidades -->
                  <li class="dropdown yamm-fw">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                      <i class="fa fa-star mr-5"></i>
                      Novidades
                      <i class="fa fa-angle-down ml-5"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <div class="yamm-content">
                          <div class="row">
                            <?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? 3+1 - (0) : 0-(3)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 0, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
                            <div class="col-xs-12 col-sm-3">
                              <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['publicacaoid'];?>
">
                                <figure class="zoom-out">
                                  <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['url'];?>
">
                                </figure>
                              </a>
                            </div><!-- end col -->
                            <?php }} ?>
                          </div><!-- end row -->

                          <hr class="spacer-20 no-border">

                          <div class="row">
                            <div class="col-xs-12 col-sm-3">
                              <h6>Novidades</h6>
                              <p>Confira aqui as mais recentes publicações. Fique a par das últimas novidades. Queremos que esteja sempre atualizado!</p>
                              <button type="button" class="btn btn-default round btn-sm">Saiba mais</button>
                            </div><!-- end col -->
                            <?php $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['var']->step = 1;$_smarty_tpl->tpl_vars['var']->total = (int) ceil(($_smarty_tpl->tpl_vars['var']->step > 0 ? 6+1 - (4) : 4-(6)+1)/abs($_smarty_tpl->tpl_vars['var']->step));
if ($_smarty_tpl->tpl_vars['var']->total > 0) {
for ($_smarty_tpl->tpl_vars['var']->value = 4, $_smarty_tpl->tpl_vars['var']->iteration = 1;$_smarty_tpl->tpl_vars['var']->iteration <= $_smarty_tpl->tpl_vars['var']->total;$_smarty_tpl->tpl_vars['var']->value += $_smarty_tpl->tpl_vars['var']->step, $_smarty_tpl->tpl_vars['var']->iteration++) {
$_smarty_tpl->tpl_vars['var']->first = $_smarty_tpl->tpl_vars['var']->iteration == 1;$_smarty_tpl->tpl_vars['var']->last = $_smarty_tpl->tpl_vars['var']->iteration == $_smarty_tpl->tpl_vars['var']->total;?>
                            <div class="col-xs-12 col-sm-3">
                              <div class="thumbnail store style1">
                                <div class="header">
                                  <div class="badges">
                                    <?php if ($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['preco']!=$_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['precopromocional']) {?>
                                    <span class="product-badge top left white-backgorund text-primary semi-circle">Promoção</span>
                                    <?php }?>
                                    <span class="product-badge top right text-primary">
                                      <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['val']->step = 1;$_smarty_tpl->tpl_vars['val']->total = (int) ceil(($_smarty_tpl->tpl_vars['val']->step > 0 ? floor(($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['val']->step));
if ($_smarty_tpl->tpl_vars['val']->total > 0) {
for ($_smarty_tpl->tpl_vars['val']->value = 1, $_smarty_tpl->tpl_vars['val']->iteration = 1;$_smarty_tpl->tpl_vars['val']->iteration <= $_smarty_tpl->tpl_vars['val']->total;$_smarty_tpl->tpl_vars['val']->value += $_smarty_tpl->tpl_vars['val']->step, $_smarty_tpl->tpl_vars['val']->iteration++) {
$_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->iteration == 1;$_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration == $_smarty_tpl->tpl_vars['val']->total;?>
                                      <i class="fa fa-star"></i>
                                      <?php }} ?>
                                      <?php if ($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['classificacao']) {?>
                                      <?php if (is_numeric($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['classificacao']===(float)$_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['classificacao']) {?>
                                      <?php } else { ?>
                                      <i class="fa fa-star-half-o"></i>
                                      <?php }?>
                                      <?php }?>
                                    </span>
                                  </div>
                                  <figure class="layer">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['url'];?>
" alt="">
                                  </figure>
                                  <div class="icons">
                                    <a class="icon semi-circle" data-type="Adicionar à wishlist" data-toggle="tooltip" data-placement="top" title="Adicionar à wishlist" data-id="<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['precopromocional'];?>
"><i class="fa fa-heart-o"></i></a>
                                    <a class="icon semi-circle" data-type="Adicionar ao carrinho" data-toggle="tooltip" data-placement="top" title="Adicionar ao carrinho" data-id="<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['precopromocional'];?>
"><i class="fa fa-cart-plus"></i></a>
                                    <a class="icon semi-circle" data-toggle="tooltip" data-placement="top" title="Ver página da publicação"href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['publicacaoid'];?>
"><i class="fa fa-search"></i></a>
                                  </div>
                                </div>
                                <div class="caption">
                                  <h6 class="thin"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['titulo'];?>
</a></h6>
                                  <div class="price">
                                    <?php if ($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['preco']!=$_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['precopromocional']) {?>
                                    <small class="amount off">€<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['preco'];?>
</small>
                                    <span class="amount text-primary">€<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['precopromocional'];?>
</span>
                                    <?php } else { ?>
                                    <span class="amount text-primary">€<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['var']->value]['preco'];?>
</span>
                                    <?php }?>
                                  </div>
                                </div><!-- end caption -->
                              </div><!-- end thumbnail -->
                            </div><!-- end col -->
                            <?php }} ?>
                          </div><!-- end row -->
                        </div><!-- end yamm-content -->
                      </li><!-- end li -->
                    </ul><!-- end dropdown-menu -->
                  </li><!-- end dropdown -->
                  <!-- promoções -->
                  <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publications-promotion.php">
                      <i class="glyphicon glyphicon-piggy-bank mr-5"></i>
                      Promoções
                    </a>
                  </li>
                </ul><!-- end navbar-nav -->
              </div><!-- end navbar collapse -->
            </div><!-- end container -->
          </div><!-- end navbar -->

          <?php if (isset($_smarty_tpl->tpl_vars['USER_DATA']->value)) {?>
          
          <script type="text/javascript">
            var userdata = '{$USER_DATA}';
          </script>
          
          <?php }?>
          <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/header.js"></script><?php }} ?>
