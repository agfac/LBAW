{include file='common/header.tpl'}

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
              <a class="dropdown-toggle" data-toggle="dropdown">
                Livros <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
                {foreach $subcategoriasLivros as $publication}
                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat={$publication.nome}&cat=Livros">{$publication.nome}</a></li>
                {/foreach}
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Livros Escolares <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
                {foreach $subcategoriasLivrosEscolares as $publication}
                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat={$publication.nome}&cat=Livros Escolares">{$publication.nome}</a></li>
                {/foreach}
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Apoio Escolar <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
                {foreach $subcategoriasApoioEscolar as $publication}
                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat={$publication.nome}&cat=Apoio Escolar">{$publication.nome}</a></li>
                {/foreach}
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Revistas <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
                {foreach $subcategoriasRevistas as $publication}
                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat={$publication.nome}&cat=Revistas">{$publication.nome}</a></li>
                {/foreach}
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Dicionários e Enciclopédias <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
                {foreach $subcategoriasDicionarios as $publication}
                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat={$publication.nome}&cat=Dicionarios e Enciclopedias">{$publication.nome}</a></li>
                {/foreach}
              </ul>
            </li>
            <li>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Guias Turísticos e Mapas <i class="fa fa-angle-right pull-right"></i>
              </a>
              <ul class="dropdown-menu">
                {foreach $subcategoriasGuiasEMapas as $publication}
                <li><a href="{$BASE_URL}pages/publications/publication-list.php?subcat={$publication.nome}&cat=Guias Turisticos e Mapas">{$publication.nome}</a></li>
                {/foreach}
              </ul>
            </li>
          </ul>
        </div><!-- end navbar-vertical -->
      </div><!-- end col -->
      <div class="col-sm-8 col-md-9">
        <div class="owl-carousel slider owl-theme">
          <div class="item">
            <figure>
              <a href="javascript:void(0);">
                <img src="{$BASE_URL}images/slider/banner_books.jpg" alt=""/>
              </a>
            </figure>
          </div><!-- end item -->
          <div class="item">
            <figure>
              <a href="javascript:void(0);">
                <img src="{$BASE_URL}images/slider/banner_descontos.jpg" alt=""/>
              </a>
            </figure>
          </div><!-- end item -->
          <div class="item">
            <figure>
              <a href="javascript:void(0);">
                <img src="{$BASE_URL}images/slider/books_3.jpg" alt=""/>
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
      {foreach $eightnewpublications as $publication}
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail store style1">
          <div class="header">
            <div class="badges">
              <span class="product-badge bottom right info-background text-white semi-circle">Novidade</span>
              {if $publication.stock == 0}
              <span class="product-badge bottom left warning-background text-white semi-circle">Indisponível</span>
              {/if}
              {if $publication.preco != $publication.precopromocional}
              <span class="product-badge top right danger-background text-white semi-circle">-{(100-($publication.precopromocional* 100/$publication.preco))|string_format:"%.0f"}%</span>
              {/if}
              <span class="product-badge top left text-warning">
                {for $val=1 to ($publication.classificacao)|floor}
                <i class="fa fa-star"></i>
                {/for}
                {if $publication.classificacao}
                {if is_numeric($publication.classificacao) && (float)(int)$publication.classificacao===(float)$publication.classificacao}
                {else}
                <i class="fa fa-star-half-o"></i>
                {/if}
                {/if}
              </span>
            </div>
            <figure class="layer">
              <a href="javascript:void(0);">
                <img class="front" src="{$BASE_URL}{$publication.url}" alt="">
                <img class="back" src="{$BASE_URL}{$publication.url}" alt="">
              </a>
            </figure>
            <div class="icons">
              <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
              <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
              <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
            </div>
          </div>
          <div class="caption">
            <h6 class="regular"><a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}">{$publication.titulo}</a></h6>
            <div class="price">
              <small class="amount off">€{$publication.preco}</small>
              <span class="amount text-primary">€{$publication.precopromocional}</span>
            </div>
            <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Adcionar ao carrinho</a>
          </div><!-- end caption -->
        </div><!-- end thumbnail -->
      </div><!-- end col -->
      {/foreach}
    </div><!-- end row -->

    <hr class="spacer-30 no-border"/>

    <div class="row">
      <div class="col-sm-6">
        <div class="box-banner-img">
          <figure>
            <a href="javascript:void(0);">
              <img src="{$BASE_URL}images/banners/banner_plano_nacional_leitura.jpg" alt=""/>
            </a>
          </figure>
        </div><!-- end box-banner-img -->
      </div><!-- end col -->
      <div class="col-sm-6">
        <div class="box-banner-img">
          <figure>
            <a href="javascript:void(0);">
              <img src="{$BASE_URL}images/banners/banner_edu_literaria.jpg" alt=""/>
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
          {foreach $fivemostsellpublications as $publication}
          <div class="item">
            <div class="thumbnail store style1">
              <div class="header">
                <figure class="layer">
                  <a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}">
                    <img src="{$BASE_URL}{$publication.url}" alt="">
                  </a>
                </figure>
                <div class="badges">
                  {if $publication.preco != $publication.precopromocional}
                  <span class="product-badge top right danger-background text-white semi-circle">-{(100-($publication.precopromocional* 100/$publication.preco))|string_format:"%.0f"}%</span>
                  {/if}
                  <span class="product-badge top left text-warning">
                    {for $val=1 to ($publication.classificacao)|floor}
                    <i class="fa fa-star"></i>
                    {/for}
                    {if $publication.classificacao}
                    {if is_numeric($publication.classificacao) && (float)(int)$publication.classificacao===(float)$publication.classificacao}
                    {else}
                    <i class="fa fa-star-half-o"></i>
                    {/if}
                    {/if}
                  </span>
                </div>
                <div class="icons">
                  <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-heart-o"></i></a>
                  <a class="icon semi-circle" href="javascript:void(0);"><i class="fa fa-gift"></i></a>
                  <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                </div>
              </div>
              <div class="caption">
                <h6 class="regular"><a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}">{$publication.titulo}</a></h6>
                <div class="price">
                  {if $publication.preco != $publication.precopromocional}
                  <small class="amount off">€{$publication.preco}</small>
                  <span class="amount text-primary">€{$publication.precopromocional}</span>
                  {else}
                  <span class="amount text-primary">€{$publication.preco}</span>
                  {/if}
                </div>
                <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Adcionar ao carrinho</a>
              </div><!-- end caption -->
            </div><!-- end thumbnail -->
          </div><!-- end item -->
          {/foreach}
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
          {foreach $randompublications as $publication}
          <div class="product">
            <div class="row">
              <div class="col-sm-4 vertical-align">
                <figure>
                  <a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}"> 
                    <img alt="img" src="{$BASE_URL}{$publication.url}">
                  </a>
                </figure>
              </div><!-- end col -->
              <div class="col-sm-8 vertical-align">
                <h4><a href="?page=single-product">{$publication.titulo}</a></h4>
                <ul class="list list-inline">
                  {if $publication.preco != $publication.precopromocional}
                  <li><del class="text-danger">€{$publication.preco}</del></li>
                  <li><h5 class="text-primary">€{$publication.precopromocional}</h5></li>
                  {else}
                  <li><h5 class="text-primary">€{$publication.preco}</h5></li>
                  {/if}
                  <li>
                    {for $val=1 to ($publication.classificacao)|floor}
                    <i class="fa fa-star text-warning"></i>
                    {/for}
                    {if $publication.classificacao}
                    {if is_numeric($publication.classificacao) && (float)(int)$publication.classificacao===(float)$publication.classificacao}
                    {else}
                    <i class="fa fa-star-half-o text-warning"></i>
                    {/if}
                    {/if}
                  </li>
                </ul>
                <p>{$publication.descricao}</p>

                <a title="Adcionar ao carrinho" class="btn btn-default btn-sm semi-circle"> 
                  <i class="fa fa-shopping-cart mr-5"></i> Adcionar ao carrinho
                </a>
              </div><!-- end col -->
            </div><!-- end row -->
          </div><!-- end product -->
          {/foreach}
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
                <a href="{$BASE_URL}pages/publications/publication.php?id={$arterandompublication.publicacaoid}">
                  <img src="{$BASE_URL}{$arterandompublication.url}" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="javascript:void(0)">Arte</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="{$BASE_URL}pages/publications/publication.php?id={$desportorandompublication.publicacaoid}">
                  <img src="{$BASE_URL}{$desportorandompublication.url}" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="javascript:void(0)">Desporto e lazer</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="{$BASE_URL}pages/publications/publication.php?id={$direitorandompublication.publicacaoid}">
                  <img src="{$BASE_URL}{$direitorandompublication.url}" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="javascript:void(0)">Direito</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="{$BASE_URL}pages/publications/publication.php?id={$engenhariarandompublication.publicacaoid}">
                  <img src="{$BASE_URL}{$engenhariarandompublication.url}" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="javascript:void(0)">Engenharia</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="{$BASE_URL}pages/publications/publication.php?id={$gestaorandompublication.publicacaoid}">
                  <img src="{$BASE_URL}{$gestaorandompublication.url}" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="javascript:void(0)">Gestão</a></h6>
            </div><!-- end cat-title -->
          </div><!-- end cat-item -->
          <div class="cat-item">
            <div class="cat-img">
              <figure>
                <a href="{$BASE_URL}pages/publications/publication.php?id={$historiarandompublication.publicacaoid}">
                  <img src="{$BASE_URL}{$historiarandompublication.url}" />
                </a>
              </figure>
            </div><!-- end cat-img -->
            <div class="cat-title">
              <h6><a href="javascript:void(0)">História</a></h6>
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
          {foreach $commentedpublications as $publication}
          <div class="item">
            <div class="thumbnail blog">
              <div class="header">
                <figure>
                  <img src="{$BASE_URL}{$publication.url}" alt="">
                </figure>
                <div class="meta">
                  <span><i class="fa fa-calendar mr-5"></i>Oct 25, 2016</span>
                  <span><i class="fa fa-comment mr-5"></i>({$publication.comentarios})</span>
                  <span><i class="fa fa-heart mr-5"></i>({$publication.numvendas})</span>
                </div>
              </div>
              <div class="caption">
                <div class="author-category">
                  <span class="author mr-20">
                    <i class="fa fa-user mr-5"></i><span>{$publication.nome_cliente}</span>
                  </span>
                  <div class="category">
                    <i class="fa fa-book text-danger mr-5"></i>
                    <a href="javascript:void(0);">{$publication.nome_categoria}</a>
                    <span> | </span>
                    <a href="javascript:void(0);">{$publication.nome_subcategoria}</a>
                  </div>
                </div>
                <p>{$publication.texto}</p>
                <a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}" class="btn btn-default semi-circle btn-sm">Saiba mais</a>
              </div><!-- end caption -->
            </div><!-- end thumbnail -->
          </div><!-- end item -->
          {/foreach}
        </div><!-- end owl carousel -->
      </div><!-- end col -->
    </div><!-- end row -->

    <hr class="spacer-30 no-border"/>

    <div class="row">
      <div class="col-sm-4">
        <div class="widget">
          <h5 class="subtitle text-uppercase">Publicações <span class="text-primary">Novas</span></h5>

          <ul class="items">
            {foreach $fivenewpublications as $publication}
            <li> 
              <a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}" class="product-image">
                <img src="{$BASE_URL}{$publication.url}" alt="Sample Product ">
              </a>
              <div class="product-details">
                <h6 class="regular"> 
                  <a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}">{$publication.titulo}</a> 
                </h6>
                {if $publication.preco != $publication.precopromocional}
                <span class="price text-primary">€{$publication.precopromocional}</span>
                {else}
                <span class="price text-primary">€{$publication.preco}</span>
                {/if}
                <div class="rate text-warning">
                  {for $val=1 to ($publication.classificacao)|floor}
                  <i class="fa fa-star"></i>
                  {/for}
                  {if $publication.classificacao}
                  {if is_numeric($publication.classificacao) && (float)(int)$publication.classificacao===(float)$publication.classificacao}
                  {else}
                  <i class="fa fa-star-half-o"></i>
                  {/if}
                  {/if}
                </div>
              </div>
            </li><!-- end item -->
            {/foreach}
          </ul>
        </div><!-- end widget -->
      </div><!-- end col -->

      <div class="col-sm-4">
        <div class="widget">
          <h5 class="subtitle text-uppercase">Publicações <span class="text-primary">Mais vendidas</span></h5>

          <ul class="items">
            {foreach $fivemostsellpublications as $publication}
            <li> 
              <a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}" class="product-image">
                <img src="{$BASE_URL}{$publication.url}" alt="Sample Product ">
              </a>
              <div class="product-details">
                <h6 class="regular"> 
                  <a href="{$BASE_URL}pages/publications/publication.php?id={$publication.publicacaoid}">{$publication.titulo}</a> 
                </h6>
                {if $publication.preco != $publication.precopromocional}
                <span class="price text-primary">€{$publication.precopromocional}</span>
                {else}
                <span class="price text-primary">€{$publication.preco}</span>
                {/if}
                <div class="rate text-warning">
                  {for $val=1 to ($publication.classificacao)|floor}
                  <i class="fa fa-star"></i>
                  {/for}
                  {if $publication.classificacao}
                  {if is_numeric($publication.classificacao) && (float)(int)$publication.classificacao===(float)$publication.classificacao}
                  {else}
                  <i class="fa fa-star-half-o"></i>
                  {/if}
                  {/if}
                </div>
              </div>
            </li><!-- end item -->
            {/foreach}
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
          <a target="_blank" href="javascript:void(0);" class="btn btn-light semi-circle btn-md">Aproveite já!</a>
        </div><!-- end col -->   
      </div><!-- end row -->
    </div><!-- end box-banner-wide -->
  </div><!-- end container -->
</section>
<!-- end section -->

{include file='common/footer.tpl'}
