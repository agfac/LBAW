<!DOCTYPE html>
<html lang="en">
<head>
  <title>AwesomeBookShop - A sua livraria móvel</title>
  <meta charset="utf-8">
  <meta name="description" content="Livraria online">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  
  <!--Favicon-->
  <link rel="shortcut icon" href="{$BASE_URL}images/icons/favicon.ico" type="image/x-icon">
  <link rel="icon" href="{$BASE_URL}images/icons/favicon.ico" type="image/x-icon">
  
  <!-- css files -->
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/owl.theme.default.min.css" />
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/animate.css" />
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/swiper.css" />
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/register.css" />
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/login.css" />
  <link rel="stylesheet" type="text/css" href="{$BASE_URL}css/edit-form.css" />

  <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
  <link id="pagestyle" rel="stylesheet" type="text/css" href="{$BASE_URL}css/default.css" />
  
  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">

  <!-- JavaScript Files -->
  <script type="text/javascript" src="{$BASE_URL}javascript/common/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/bootstrap.min.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/owl.carousel.min.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/jquery.downCount.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/nouislider.min.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/jquery.sticky.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/pace.min.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/star-rating.min.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/wow.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/gmaps.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/swiper.min.js"></script>
  <script type="text/javascript" src="{$BASE_URL}javascript/common/main.js"></script>
  
</head>
<body>

  <body>
    {foreach $ERROR_MESSAGES as $error}
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>{$error}</strong>
    </div><!-- end alert -->
    {/foreach}

    {foreach $SUCCESS_MESSAGES as $success}
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <strong>{$success}</strong>
    </div><!-- end alert -->
    {/foreach}

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
              <img src="{$BASE_URL}images/flags/flag-pt.jpg" class="mr-5" alt="">
              <span class="hidden-xs">
                Português 
                <i class="fa fa-angle-down ml-5"></i>
              </span>    
            </a>
            <ul class="w-110">
              <li><a href="javascript:void(0);"><img src="{$BASE_URL}images/flags/flag-english.jpg" class="mr-5" alt="">English</a></li>
              <li class="active"><a href="javascript:void(0);"><img src="{$BASE_URL}images/flags/flag-pt.jpg" class="mr-5" alt="">Português</a></li>
            </ul>
          </li>
          {if $USERNAME}
          {include file='common/menu_logged_in.tpl'}
          {else}
          {include file='common/menu_logged_out.tpl'}
          {/if}
          
          <div class="middleBar">
            <div class="container">
              <div class="row table">
                <div class="col-sm-3 vertical-align text-left hidden-xs col-lg-offset-2 col-lg-3">
                  <a href="{$BASE_URL}">
                    <img width="180" src="{$BASE_URL}images/logos/logo_abs_4.png" alt="" />
                  </a>
                </div><!-- end col -->
                <div class="col-sm-6 vertical-align text-center col-lg-offset-3">
                  <input type="text" placeholder="Pesquisar" name="email" class="form-control input-md">
                </div><!-- end col -->
                <div class="col-sm-3 vertical-align header-items">
                  <div class="header-item mr-5">
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Wishlist">
                      <i class="fa fa-heart-o"></i>
                      <sub>32</sub>
                    </a>
                  </div>
                  <div class="header-item"> </div>
                </div><!-- end col -->
              </div><!-- end  row -->
            </div><!-- end container -->
          </div><!-- end middleBar -->

          <!-- start navbar -->
          <div class="navbar yamm navbar-default">
            <div class="container">
              <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-3" class="navbar-toggle">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a href="javascript:void(0);" class="navbar-brand visible-xs">
                  <img src="{$BASE_URL}images/logos/logo_abs_4_micro.png" alt="logo">
                </a>
              </div>
              <div id="navbar-collapse-3" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <!-- Home -->
                  <li class="dropdown active">
                    <a href="{$BASE_URL}">
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
                                <h6>Livros</h6>
                              </li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Arte&cat=Livros">Arte</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Banda Desenhada&cat=Livros">Banda Desenhada</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Ciencias Exatas e Naturais&cat=Livros">Ciências Exatas e Naturais</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Ciencias Sociais e Humanas&cat=Livros">Ciências Sociais e Humanas</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Desenvolvimento Pessoal e Espiritual&cat=Livros">Desenvolvimento Pessoal e Espiritual</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Desporto e Lazer&cat=Livros">Desporto e Lazer</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Dicionarios e Enciclopedias&cat=Livros">Dicionários e Enciclopédias</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Direito&cat=Livros">Direito</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Economia, Financas e Contabilidade&cat=Livros">Economia, Finanças e Contabilidade</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Engenharia&cat=Livros">Engenharia</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Ensino e Educacao&cat=Livros">Ensino e Educação</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Gastronomia e Vinhos&cat=Livros">Gastronomia e Vinhos</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Gestao&cat=Livros">Gestão</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Guias Turisticos e Mapas&cat=Livros">Guias Turísticos e Mapas</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Historia&cat=Livros">História</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Informatica&cat=Livros">Informática</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Literatura&cat=Livros">Literatura</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Medicina&cat=Livros">Medicina</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Politica&cat=Livros">Política</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Religiao e Moral&cat=Livros">Religião e Moral</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Saude e Bem Estar&cat=Livros">Saúde e Bem Estar</a></li>
                            </ul><!-- end ul col -->
                            <ul class="col-sm-3">
                              <li class="title">
                                <h6>Livros Escolares</h6>
                              </li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=1.º ano&cat=Livros Escolares">1.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=2.º ano&cat=Livros Escolares">2.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=3.º ano&cat=Livros Escolares">3.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=4.º ano&cat=Livros Escolares">4.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=5.º e 6.º ano&cat=Livros Escolares">5.º e 6.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=7.º, 8.º e 9.º ciclo&cat=Livros Escolares">7.º, 8.º e 9.º ciclo</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Ensino Secundario&cat=Livros Escolares">Ensino Secundário</a></li>
                              <li class="title">
                                <h6>Apoio Escolar</h6>
                              </li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=1.º ano&cat=Apoio Escolar">1.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=2.º ano&cat=Apoio Escolar">2.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=3.º ano&cat=Apoio Escolar">3.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=4.º ano&cat=Apoio Escolar">4.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=5.º e 6.º ano&cat=Apoio Escolar">5.º e 6.º ano</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=7.º, 8.º e 9.º ciclo&cat=Apoio Escolar">7.º, 8.º e 9.º ciclo</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Ensino Secundario&cat=Apoio Escolar">Ensino Secundário</a></li>
                            </ul><!-- end ul col -->
                            <ul class="col-sm-3">
                              <li class="title">
                                <h6>Revistas</h6>
                              </li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Agricultura&cat=Revistas">Agricultura</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Arquitetura&cat=Revistas">Arquitetura</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Arte&cat=Revistas">Arte</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Automobilismo&cat=Revistas">Automobilismo</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Aviacao&cat=Revistas">Aviação</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Cientificas&cat=Revistas">Científicas</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Cinema&cat=Revistas">Cinema</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Decoracao&cat=Revistas">Decoração</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Desporto&cat=Revistas">Desporto</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Direito&cat=Revistas">Direito</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Economia&cat=Revistas">Economia</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Fotografia&cat=Revistas">Fotografia</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Historia&cat=Revistas">História</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Humor&cat=Revistas">Humor</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Infantis&cat=Revistas">Infantis</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Informatica&cat=Revistas">Informática</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Moda&cat=Revistas">Moda</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Musica&cat=Revistas">Música</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Quebra-cabecas&cat=Revistas">Quebra-cabeças</a></li>
                              <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Turismo&cat=Revistas">Turismo</a></li>
                            </ul><!-- end ul col -->
                            <ul class="col-sm-3">
                              <li class="title">
                                <h6>Dicionários e Enciclopédias</h6>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Portugues&cat=Dicionarios e Enciclopedias">Português</a></li>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Ingles&cat=Dicionarios e Enciclopedias">Inglês</a></li>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Frances&cat=Dicionarios e Enciclopedias">Francês</a></li>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Alemao&cat=Dicionarios e Enciclopedias">Alemão</a></li>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Espanhol&cat=Dicionarios e Enciclopedias">Espanhol</a></li>
                              </li>
                              <li class="title">
                                <h6>Guias Turísticos e Mapas</h6>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Africa&cat=Guias Turisticos e Mapas">África</a></li>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=America&cat=Guias Turisticos e Mapas">América</a></li>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Asia&cat=Guias Turisticos e Mapas">Ásia</a></li>
                                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat=Europa&cat=Guias Turisticos e Mapas">Europa</a></li>
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
                            <div class="col-xs-12 col-sm-3">
                              <a href="javascript:void(0);">
                                <figure class="zoom-out">
                                  <img alt="" src="{$BASE_URL}images/publications/books/books_5.jpg">
                                </figure>
                              </a>
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-3">
                              <a href="javascript:void(0);">
                                <figure class="zoom-in">
                                  <img alt="" src="{$BASE_URL}images/publications/books/books_5.jpg">
                                </figure>
                              </a>
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-3">
                              <a href="javascript:void(0);">
                                <figure class="zoom-out">
                                  <img alt="" src="{$BASE_URL}images/publications/books/books_6.jpg">
                                </figure>
                              </a>
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-3">
                              <a href="javascript:void(0);">
                                <figure class="zoom-in">
                                  <img alt="" src="{$BASE_URL}images/publications/books/books_6.jpg">
                                </figure>
                              </a>
                            </div><!-- end col -->
                          </div><!-- end row -->

                          <hr class="spacer-20 no-border">

                          <div class="row">
                            <div class="col-xs-12 col-sm-3">
                              <h6>Pellentes que nec diam lectus</h6>
                              <p>Proin pulvinar libero quis auctor pharet ra. Aenean fermentum met us orci, sedf eugiat augue pulvina r vitae. Nulla dolor nisl, molestie nec aliquam vitae, gravida sodals dolor...</p>
                              <button type="button" class="btn btn-default round btn-sm">Saiba mais</button>
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-3">
                              <div class="thumbnail store style1">
                                <div class="header">
                                  <div class="badges">
                                    <span class="product-badge top left white-backgorund text-primary semi-circle">Promoção</span>
                                    <span class="product-badge top right text-primary">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star-half-o"></i>
                                    </span>
                                  </div>
                                  <figure class="layer">
                                    <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">
                                  </figure>
                                  <div class="icons">
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-search"></i></a>
                                  </div>
                                </div>
                                <div class="caption">
                                  <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                  <div class="price">
                                    <small class="amount off">€68.99</small>
                                    <span class="amount text-primary">€59.99</span>
                                  </div>
                                  <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Adicionar ao carrinho</a>
                                </div><!-- end caption -->
                              </div><!-- end thumbnail -->
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-3">
                              <div class="thumbnail store style1">
                                <div class="header">
                                  <div class="badges">
                                    <span class="product-badge top left white-backgorund text-primary semi-circle">Promoção</span>
                                    <span class="product-badge top right text-primary">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star-half-o"></i>
                                    </span>
                                  </div>
                                  <figure class="layer">
                                    <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">
                                  </figure>
                                  <div class="icons">
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-search"></i></a>
                                  </div>
                                </div>
                                <div class="caption">
                                  <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                  <div class="price">
                                    <small class="amount off">€68.99</small>
                                    <span class="amount text-primary">€59.99</span>
                                  </div>
                                  <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Adicionar ao carrinho</a>
                                </div><!-- end caption -->
                              </div><!-- end thumbnail -->
                            </div><!-- end col -->
                            <div class="col-xs-12 col-sm-3">
                              <div class="thumbnail store style1">
                                <div class="header">
                                  <div class="badges">
                                    <span class="product-badge top left white-backgorund text-primary semi-circle">Promoção</span>
                                    <span class="product-badge top right text-primary">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star-half-o"></i>
                                    </span>
                                  </div>
                                  <figure class="layer">
                                    <img src="{$BASE_URL}images/publications/books/books_6.jpg" alt="">
                                  </figure>
                                  <div class="icons">
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                                    <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-search"></i></a>
                                  </div>
                                </div>
                                <div class="caption">
                                  <h6 class="thin"><a href="javascript:void(0);">Lorem Ipsum dolor sit</a></h6>
                                  <div class="price">
                                    <small class="amount off">€68.99</small>
                                    <span class="amount text-primary">€59.99</span>
                                  </div>
                                  <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Adicionar ao carrinho</a>
                                </div><!-- end caption -->
                              </div><!-- end thumbnail -->
                            </div><!-- end col -->
                          </div><!-- end row -->
                        </div><!-- end yamm-content -->
                      </li><!-- end li -->
                    </ul><!-- end dropdown-menu -->
                  </li><!-- end dropdown -->
                  <!-- promoções -->
                  <li>
                    <a href="javascript:void(0);">
                      <i class="glyphicon glyphicon-piggy-bank mr-5"></i>
                      Promoções
                    </a>
                  </li>
                </ul><!-- end navbar-nav -->
              </div><!-- end navbar collapse -->
            </div><!-- end container -->
  </div><!-- end navbar -->