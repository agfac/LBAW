<?php /* Smarty version Smarty-3.1.15, created on 2017-05-31 23:18:29
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/home/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1960955245929643f8e2f10-83265387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51ddc2bc6bc9d58453a4c47e8883062d17e4788a' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/home/home.tpl',
      1 => 1496230085,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1960955245929643f8e2f10-83265387',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5929643fa16085_19215814',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'subcategoriasLivros' => 0,
    'publication' => 0,
    'subcategoriasLivrosEscolares' => 0,
    'subcategoriasApoioEscolar' => 0,
    'subcategoriasRevistas' => 0,
    'subcategoriasDicionarios' => 0,
    'subcategoriasGuiasEMapas' => 0,
    'eightnewpublications' => 0,
    'fivemostsellpublications' => 0,
    'randompublications' => 0,
    'arterandompublication' => 0,
    'desportorandompublication' => 0,
    'direitorandompublication' => 0,
    'engenhariarandompublication' => 0,
    'gestaorandompublication' => 0,
    'historiarandompublication' => 0,
    'commentedpublications' => 0,
    'val' => 0,
    'monthscommented' => 0,
    'dayscommented' => 0,
    'yearscommented' => 0,
    'fivenewpublications' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929643fa16085_19215814')) {function content_5929643fa16085_19215814($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- start section -->
<section class="section light-backgorund">
  <div class="container">
    <div class="row">
      <div class="col-sm-4 col-md-3">
        <div class="navbar-vertical">
          <ul class="nav nav-stacked">
            <li class="header">
              <h6 class="text-uppercase">Categorias <i class="fa fa-navicon pull-right"></i></h6>
            </li>
            <li>
              <a class="dropdown-toggle" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=1">
                Livros <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
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
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=2">
                Livros Escolares <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
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
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=3">
                Apoio Escolar <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
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
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=4">
                Revistas <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
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
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=5">
                Dicionários e Enciclopédias <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
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
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=6">
                Guias Turísticos e Mapas <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
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
              </ul>
            </li>
          </ul>
        </div><!-- end navbar-vertical -->
      </div><!-- end col -->
      <div class="col-sm-8 col-md-9">
        <div class="owl-carousel slider owl-theme">
          <div class="item">
            <figure>
              <a>
                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/slider/banner_books.jpg" alt="banner"/>
              </a>
            </figure>
          </div><!-- end item -->
          <div class="item">
            <figure>
              <a>
                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/slider/banner_descontos.jpg" alt="banner"/>
              </a>
            </figure>
          </div><!-- end item -->
          <div class="item">
            <figure>
              <a>
                <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/slider/books_3.jpg" alt="banner"/>
              </a>
            </figure>
          </div><!-- end item -->
        </div><!-- end owl carousel -->
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>
<!-- end section -->


<!-- start section -->
<section class="section white-background">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="title-wrap">
          <h2 class="title">Publicações<span class="text-primary"> Novas</span></h2>
        </div>
      </div><!-- end col -->
    </div><!-- end row -->

    <div class="row column-4">
      <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eightnewpublications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail store style1">
          <div class="header">
            <div class="badges">
              <span class="product-badge bottom right info-background text-white semi-circle">Novidade</span>
              <?php if ($_smarty_tpl->tpl_vars['publication']->value['stock']==0) {?>
              <span class="product-badge bottom left warning-background text-white semi-circle">Indisponível</span>
              <?php }?>
              <?php if ($_smarty_tpl->tpl_vars['publication']->value['preco']!=$_smarty_tpl->tpl_vars['publication']->value['precopromocional']) {?>
              <span class="product-badge top right danger-background text-white semi-circle">-<?php echo sprintf("%.0f",(100-($_smarty_tpl->tpl_vars['publication']->value['precopromocional']*100/$_smarty_tpl->tpl_vars['publication']->value['preco'])));?>
%</span>
              <?php }?>
              <span class="product-badge top left text-warning">
                <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['val']->step = 1;$_smarty_tpl->tpl_vars['val']->total = (int) ceil(($_smarty_tpl->tpl_vars['val']->step > 0 ? floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['val']->step));
if ($_smarty_tpl->tpl_vars['val']->total > 0) {
for ($_smarty_tpl->tpl_vars['val']->value = 1, $_smarty_tpl->tpl_vars['val']->iteration = 1;$_smarty_tpl->tpl_vars['val']->iteration <= $_smarty_tpl->tpl_vars['val']->total;$_smarty_tpl->tpl_vars['val']->value += $_smarty_tpl->tpl_vars['val']->step, $_smarty_tpl->tpl_vars['val']->iteration++) {
$_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->iteration == 1;$_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration == $_smarty_tpl->tpl_vars['val']->total;?>
                <i class="fa fa-star"></i>
                <?php }} ?>
                <?php if ($_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                <?php if (is_numeric($_smarty_tpl->tpl_vars['publication']->value['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['publication']->value['classificacao']===(float)$_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                <?php } else { ?>
                <i class="fa fa-star-half-o"></i>
                <?php }?>
                <?php }?>
              </span>
            </div>
            <figure class="layer">
              <a>
                <img class="front" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" alt="Publicacao">
                <img class="back" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" alt="Publicacao">
              </a>
            </figure>
            <div class="icons">
              <a class="icon semi-circle" data-type="Adicionar à wishlist" data-toggle="tooltip" data-placement="top" title="Adicionar à wishlist" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"><i class="fa fa-heart-o"></i></a>
              <a class="icon semi-circle" data-type="Adicionar ao carrinho" data-toggle="tooltip" data-placement="top" title="Adicionar ao carrinho" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"><i class="fa fa-cart-plus"></i></a>
              <a class="icon semi-circle" data-toggle="tooltip" data-placement="top" title="Ver página da publicação"href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><i class="fa fa-search"></i></a>
            </div>
          </div>
          <div class="caption">
            <h6 class="regular"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a></h6>
            <div class="price">
              <small class="amount off">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</small>
              <span class="amount text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
</span>
            </div>
            <a data-type="Adicionar ao carrinho" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"><i class="fa fa-cart-plus mr-5"></i>Adcionar ao carrinho</a>
          </div><!-- end caption -->
        </div><!-- end thumbnail -->
      </div><!-- end col -->
      <?php } ?>
    </div><!-- end row -->

    <hr class="spacer-30 no-border"/>

    <div class="row">
      <div class="col-sm-6">
        <div class="box-banner-img">
          <figure>
            <a>
              <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/banners/banner_plano_nacional_leitura.jpg" alt="banner"/>
            </a>
          </figure>
        </div><!-- end box-banner-img -->
      </div><!-- end col -->
      <div class="col-sm-6">
        <div class="box-banner-img">
          <figure>
            <a>
              <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
images/banners/banner_edu_literaria.jpg" alt="banner"/>
            </a>
          </figure>
        </div><!-- end box-banner-img -->
      </div><!-- end col -->
    </div><!-- end row -->

    <hr class="spacer-30 no-border"/>

    <div class="row">
      <div class="col-sm-12">
        <div class="title-wrap">
          <h2 class="title">Publicações <span class="text-primary">Populares</span></h2>
        </div>
      </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
      <div class="col-sm-12">
        <div class="owl-carousel column-4 owl-theme">
          <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fivemostsellpublications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
          <div class="item">
            <div class="thumbnail store style1">
              <div class="header">
                <figure class="layer">
                  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" alt="Publicacao">
                  </a>
                </figure>
                <div class="badges">
                  <?php if ($_smarty_tpl->tpl_vars['publication']->value['preco']!=$_smarty_tpl->tpl_vars['publication']->value['precopromocional']) {?>
                  <span class="product-badge top right danger-background text-white semi-circle">-<?php echo sprintf("%.0f",(100-($_smarty_tpl->tpl_vars['publication']->value['precopromocional']*100/$_smarty_tpl->tpl_vars['publication']->value['preco'])));?>
%</span>
                  <?php }?>
                  <span class="product-badge top left text-warning">
                    <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['val']->step = 1;$_smarty_tpl->tpl_vars['val']->total = (int) ceil(($_smarty_tpl->tpl_vars['val']->step > 0 ? floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['val']->step));
if ($_smarty_tpl->tpl_vars['val']->total > 0) {
for ($_smarty_tpl->tpl_vars['val']->value = 1, $_smarty_tpl->tpl_vars['val']->iteration = 1;$_smarty_tpl->tpl_vars['val']->iteration <= $_smarty_tpl->tpl_vars['val']->total;$_smarty_tpl->tpl_vars['val']->value += $_smarty_tpl->tpl_vars['val']->step, $_smarty_tpl->tpl_vars['val']->iteration++) {
$_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->iteration == 1;$_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration == $_smarty_tpl->tpl_vars['val']->total;?>
                    <i class="fa fa-star"></i>
                    <?php }} ?>
                    <?php if ($_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                    <?php if (is_numeric($_smarty_tpl->tpl_vars['publication']->value['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['publication']->value['classificacao']===(float)$_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                    <?php } else { ?>
                    <i class="fa fa-star-half-o"></i>
                    <?php }?>
                    <?php }?>
                  </span>
                </div>
                <div class="icons">
                  <a class="icon semi-circle" data-type="Adicionar à wishlist" data-toggle="tooltip" data-placement="top" title="Adicionar à wishlist" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"><i class="fa fa-heart-o"></i></a>
                  <a class="icon semi-circle" data-type="Adicionar ao carrinho" data-toggle="tooltip" data-placement="top" title="Adicionar ao carrinho" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"><i class="fa fa-cart-plus"></i></a>
                  <a class="icon semi-circle" data-toggle="tooltip" data-placement="top" title="Ver página da publicação"href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><i class="fa fa-search"></i></a>
                </div>
              </div>
              <div class="caption">
                <h6 class="regular"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a></h6>
                <div class="price">
                  <?php if ($_smarty_tpl->tpl_vars['publication']->value['preco']!=$_smarty_tpl->tpl_vars['publication']->value['precopromocional']) {?>
                  <small class="amount off">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</small>
                  <span class="amount text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
</span>
                  <?php } else { ?>
                  <span class="amount text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</span>
                  <?php }?>
                </div>
                <a data-type="Adicionar ao carrinho" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"><i class="fa fa-cart-plus mr-5"></i>Adcionar ao carrinho</a>
              </div><!-- end caption -->
            </div><!-- end thumbnail -->
          </div><!-- end item -->
          <?php } ?>
        </div><!-- end owl carousel -->
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>
<!-- end section -->


<!-- start section -->
<section class="section light-backgorund">
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="owl-carousel product-showcase owl-theme">
          <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['randompublications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
          <div class="product">
            <div class="row">
              <div class="col-sm-4 vertical-align">
                <figure>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"> 
                    <img alt="Publicacao" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
">
                  </a>
                </figure>
              </div><!-- end col -->
              <div class="col-sm-8 vertical-align">
                <h4><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a></h4>
                <ul class="list list-inline">
                  <?php if ($_smarty_tpl->tpl_vars['publication']->value['preco']!=$_smarty_tpl->tpl_vars['publication']->value['precopromocional']) {?>
                  <li><del class="text-danger">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</del></li>
                  <li><h5 class="text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
</h5></li>
                  <?php } else { ?>
                  <li><h5 class="text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</h5></li>
                  <?php }?>
                  <li>
                    <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['val']->step = 1;$_smarty_tpl->tpl_vars['val']->total = (int) ceil(($_smarty_tpl->tpl_vars['val']->step > 0 ? floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['val']->step));
if ($_smarty_tpl->tpl_vars['val']->total > 0) {
for ($_smarty_tpl->tpl_vars['val']->value = 1, $_smarty_tpl->tpl_vars['val']->iteration = 1;$_smarty_tpl->tpl_vars['val']->iteration <= $_smarty_tpl->tpl_vars['val']->total;$_smarty_tpl->tpl_vars['val']->value += $_smarty_tpl->tpl_vars['val']->step, $_smarty_tpl->tpl_vars['val']->iteration++) {
$_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->iteration == 1;$_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration == $_smarty_tpl->tpl_vars['val']->total;?>
                    <i class="fa fa-star text-warning"></i>
                    <?php }} ?>
                    <?php if ($_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                    <?php if (is_numeric($_smarty_tpl->tpl_vars['publication']->value['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['publication']->value['classificacao']===(float)$_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                    <?php } else { ?>
                    <i class="fa fa-star-half-o text-warning"></i>
                    <?php }?>
                    <?php }?>
                  </li>
                </ul>
                <p><?php echo $_smarty_tpl->tpl_vars['publication']->value['descricao'];?>
</p>

                <a title="Adcionar ao carrinho" class="btn btn-default btn-sm semi-circle" data-type="Adicionar ao carrinho" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"> 
                  <i class="fa fa-shopping-cart mr-5"></i> Adcionar ao carrinho
                </a>
              </div><!-- end col -->
            </div><!-- end row -->
          </div><!-- end product -->
          <?php } ?>
        </div><!-- end owl carousel -->
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>
<!-- end section -->


<!-- start section -->
<section class="section image-background layer-dark" style="background-image: url();">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="title-wrap">
          <h2 class="title text-white">Categorias</h2>
          <p class="text-white">Encontre aqui os livros relacionados com os temas do seu interesse</p>
        </div>
      </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
      <div class="col-sm-12">
        <div class="owl-carousel column-5 owl-theme">
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['arterandompublication']->value['publicacaoid'];?>
">
                  <img alt="Publicacao" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['arterandompublication']->value['url'];?>
" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['arterandompublication']->value['nome_subcategoria'];?>
&cat=<?php echo $_smarty_tpl->tpl_vars['arterandompublication']->value['nome_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['arterandompublication']->value['nome_subcategoria'];?>
</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['desportorandompublication']->value['publicacaoid'];?>
">
                  <img alt="Publicacao" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['desportorandompublication']->value['url'];?>
" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['desportorandompublication']->value['nome_subcategoria'];?>
&cat=<?php echo $_smarty_tpl->tpl_vars['desportorandompublication']->value['nome_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['desportorandompublication']->value['nome_subcategoria'];?>
</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['direitorandompublication']->value['publicacaoid'];?>
">
                  <img alt="Publicacao" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['direitorandompublication']->value['url'];?>
" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['direitorandompublication']->value['nome_subcategoria'];?>
&cat=<?php echo $_smarty_tpl->tpl_vars['direitorandompublication']->value['nome_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['direitorandompublication']->value['nome_subcategoria'];?>
</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['engenhariarandompublication']->value['publicacaoid'];?>
">
                  <img alt="Publicacao" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['engenhariarandompublication']->value['url'];?>
" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['engenhariarandompublication']->value['nome_subcategoria'];?>
&cat=<?php echo $_smarty_tpl->tpl_vars['engenhariarandompublication']->value['nome_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['engenhariarandompublication']->value['nome_subcategoria'];?>
</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['gestaorandompublication']->value['publicacaoid'];?>
">
                  <img alt="Publicacao" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['gestaorandompublication']->value['url'];?>
" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['gestaorandompublication']->value['nome_subcategoria'];?>
&cat=<?php echo $_smarty_tpl->tpl_vars['gestaorandompublication']->value['nome_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['gestaorandompublication']->value['nome_subcategoria'];?>
</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['historiarandompublication']->value['publicacaoid'];?>
">
                  <img alt="Publicacao" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['historiarandompublication']->value['url'];?>
" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['historiarandompublication']->value['nome_subcategoria'];?>
&cat=<?php echo $_smarty_tpl->tpl_vars['historiarandompublication']->value['nome_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['historiarandompublication']->value['nome_subcategoria'];?>
</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
        </div><!-- end owl carousel -->
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</section>
<!-- end section -->


<!-- start section -->
<section class="section white-backgorund">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="title-wrap">
          <h2 class="title"><span class="text-primary">Comentários</span> & <span class="text-primary">Sugestões</span></h2>
        </div>
      </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
      <div class="col-sm-12">
        <div id="owl-demo" class="owl-carousel column-3 owl-theme">
          <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable(0, null, 0);?>
          <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commentedpublications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
          <div class="item">
            <div class="thumbnail blog">
              <div class="header">
                <figure>
                  <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" alt="Publicacao">
                </figure>
                <div class="meta">
                  <span><i class="fa fa-comment mr-5"></i>(<?php echo $_smarty_tpl->tpl_vars['publication']->value['comentarios'];?>
)</span>
                  <span><i class="fa fa-area-chart mr-5"></i>(<?php echo $_smarty_tpl->tpl_vars['publication']->value['numvendas'];?>
)</span>
                </div>
              </div>
              <div class="caption">
                <div class="author-category">
                  <span class="author mr-20">
                    <i class="fa fa-user mr-5"></i><span><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_cliente'];?>
</span>
                  </span>
                  <span><i class="fa fa-calendar mr-5"></i>
                    <?php if ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='01') {?>
                    JAN
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='02') {?>
                    FEV
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='03') {?>
                    MAR
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='04') {?>
                    ABR
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='05') {?>
                    MAI
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='06') {?>
                    JUN
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='07') {?>
                    JUL
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='08') {?>
                    AGO
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='09') {?>
                    SET
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='10') {?>
                    OUT
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='11') {?>
                    NOV
                    <?php } elseif ($_smarty_tpl->tpl_vars['monthscommented']->value[$_smarty_tpl->tpl_vars['val']->value]=='12') {?>
                    DEZ
                    <?php }?> <?php echo $_smarty_tpl->tpl_vars['dayscommented']->value[$_smarty_tpl->tpl_vars['val']->value];?>
, <?php echo $_smarty_tpl->tpl_vars['yearscommented']->value[$_smarty_tpl->tpl_vars['val']->value];?>
</span>
                    <div class="category">
                      <i class="fa fa-book text-danger mr-5"></i>
                      <?php if ($_smarty_tpl->tpl_vars['publication']->value['nome_categoria']=='Livros') {?>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=1"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
</a>
                      <?php } elseif ($_smarty_tpl->tpl_vars['publication']->value['nome_categoria']=='Livros Escolares') {?>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=2"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
</a>
                      <?php } elseif ($_smarty_tpl->tpl_vars['publication']->value['nome_categoria']=='Apoio Escolar') {?>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=3"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
</a>
                      <?php } elseif ($_smarty_tpl->tpl_vars['publication']->value['nome_categoria']=='Revistas') {?>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=4"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
</a>
                      <?php } elseif ($_smarty_tpl->tpl_vars['publication']->value['nome_categoria']=='Dicionarios e Enciclopedias') {?>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=5"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
</a>
                      <?php } elseif ($_smarty_tpl->tpl_vars['publication']->value['nome_categoria']=='Guias Turisticos e Mapas') {?>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publicationListByCat.php?cat=6"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
</a>
                      <?php }?>
                      <span> | </span>
                      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_subcategoria'];?>
&cat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_subcategoria'];?>
</a>
                    </div>
                  </div>
                  <p><?php echo $_smarty_tpl->tpl_vars['publication']->value['texto'];?>
</p>
                  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" class="btn btn-default semi-circle btn-sm">Saiba mais</a>
                </div><!-- end caption -->
              </div><!-- end thumbnail -->
            </div><!-- end item -->
            <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable($_smarty_tpl->tpl_vars['val']->value+1, null, 0);?>
            <?php } ?>
          </div><!-- end owl carousel -->
        </div><!-- end col -->
      </div><!-- end row -->

      <hr class="spacer-30 no-border"/>

      <div class="row">
        <div class="col-sm-4">
          <div class="widget">
            <h5 class="subtitle text-uppercase">Publicações <span class="text-primary">Novas</span></h5>

            <ul class="items">
              <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fivenewpublications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
              <li> 
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" class="product-image">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" alt="Publicacao">
                </a>
                <div class="product-details">
                  <h6 class="regular"> 
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a> 
                  </h6>
                  <?php if ($_smarty_tpl->tpl_vars['publication']->value['preco']!=$_smarty_tpl->tpl_vars['publication']->value['precopromocional']) {?>
                  <span class="price text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
</span>
                  <?php } else { ?>
                  <span class="price text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</span>
                  <?php }?>
                  <div class="rate text-warning">
                    <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['val']->step = 1;$_smarty_tpl->tpl_vars['val']->total = (int) ceil(($_smarty_tpl->tpl_vars['val']->step > 0 ? floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['val']->step));
if ($_smarty_tpl->tpl_vars['val']->total > 0) {
for ($_smarty_tpl->tpl_vars['val']->value = 1, $_smarty_tpl->tpl_vars['val']->iteration = 1;$_smarty_tpl->tpl_vars['val']->iteration <= $_smarty_tpl->tpl_vars['val']->total;$_smarty_tpl->tpl_vars['val']->value += $_smarty_tpl->tpl_vars['val']->step, $_smarty_tpl->tpl_vars['val']->iteration++) {
$_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->iteration == 1;$_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration == $_smarty_tpl->tpl_vars['val']->total;?>
                    <i class="fa fa-star"></i>
                    <?php }} ?>
                    <?php if ($_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                    <?php if (is_numeric($_smarty_tpl->tpl_vars['publication']->value['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['publication']->value['classificacao']===(float)$_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                    <?php } else { ?>
                    <i class="fa fa-star-half-o"></i>
                    <?php }?>
                    <?php }?>
                  </div>
                </div>
              </li><!-- end item -->
              <?php } ?>
            </ul>
          </div><!-- end widget -->
        </div><!-- end col -->

        <div class="col-sm-4">
          <div class="widget">
            <h5 class="subtitle text-uppercase">Publicações <span class="text-primary">Mais vendidas</span></h5>

            <ul class="items">
              <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fivemostsellpublications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
              <li> 
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" class="product-image">
                  <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" alt="Publicacao">
                </a>
                <div class="product-details">
                  <h6 class="regular"> 
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a> 
                  </h6>
                  <?php if ($_smarty_tpl->tpl_vars['publication']->value['preco']!=$_smarty_tpl->tpl_vars['publication']->value['precopromocional']) {?>
                  <span class="price text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
</span>
                  <?php } else { ?>
                  <span class="price text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</span>
                  <?php }?>
                  <div class="rate text-warning">
                    <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['val']->step = 1;$_smarty_tpl->tpl_vars['val']->total = (int) ceil(($_smarty_tpl->tpl_vars['val']->step > 0 ? floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['val']->step));
if ($_smarty_tpl->tpl_vars['val']->total > 0) {
for ($_smarty_tpl->tpl_vars['val']->value = 1, $_smarty_tpl->tpl_vars['val']->iteration = 1;$_smarty_tpl->tpl_vars['val']->iteration <= $_smarty_tpl->tpl_vars['val']->total;$_smarty_tpl->tpl_vars['val']->value += $_smarty_tpl->tpl_vars['val']->step, $_smarty_tpl->tpl_vars['val']->iteration++) {
$_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->iteration == 1;$_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration == $_smarty_tpl->tpl_vars['val']->total;?>
                    <i class="fa fa-star"></i>
                    <?php }} ?>
                    <?php if ($_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                    <?php if (is_numeric($_smarty_tpl->tpl_vars['publication']->value['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['publication']->value['classificacao']===(float)$_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
                    <?php } else { ?>
                    <i class="fa fa-star-half-o"></i>
                    <?php }?>
                    <?php }?>
                  </div>
                </div>
              </li><!-- end item -->
              <?php } ?>
            </ul>
          </div><!-- end widget -->
        </div><!-- end col -->
      </div><!-- end row -->
    </div><!-- end container -->
  </section>
  <!-- end section -->


  <!-- start section -->
  <section class="primary-background">
    <div class="container">
      <div class="box-banner-wide primary-background">
        <div class="row">
          <div class="col-sm-4 vertical-align">
            <h2 class="alt-font text-uppercase text-white">
              <span class="regular">Portes </span>
              <br>grátis!
            </h2>
          </div><!-- end col -->
          <div class="col-sm-4 vertical-align">
            <p class="mt-20">Oferta de portes em compras de valor igual ou superior a 30€</p>
          </div><!-- end col -->
          <div class="col-sm-4 vertical-align text-right">
            <a target="_blank" class="btn btn-light semi-circle btn-md">Aproveite já!</a>
          </div><!-- end col -->   
        </div><!-- end row -->
      </div><!-- end box-banner-wide -->
    </div><!-- end container -->
  </section>
  <!-- end section -->

  <?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
