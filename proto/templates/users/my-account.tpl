{include file='common/header.tpl'}

        <div class="breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href="{$BASE_URL}">Página inicial</a></li>
                            <li><a href="#">Páginas</a></li>
                            <li class="active">Minha conta</li>
                        </ul><!-- end breadcrumb -->
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end breadcrumbs -->
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class="widget">
                            <h6 class="subtitle">Menu de navegação</h6>
                            
                            <ul class="list list-unstyled">
                                <li class="active">
                                    <a href="{$BASE_URL}pages/users/my-account.php">Minha conta</a>
                                </li>
                                <li>
                                    <a href="?page=cart">Meu carrinho <span class="text-primary">(3)</span></a>
                                </li>
                                <li>
                                   <a href="?page=order-list">Minhas encomendas </a>
                                </li>
                                <li>
                                    <a href="?page=wishlist">Lista de desejos <span class="text-primary">(5)</span></a>
                                </li>
                                <li>
                                    <a href="?page=user-information">Definições</a>
                                </li>
                            </ul>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            <h6 class="subtitle">Novidades</h6>
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="collection">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            
                            <ul class="items">
                                <li> 
                                    <a href="?page=single-product" class="product-image">
                                        <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <p class="product-name"> 
                                            <a href="?page=single-product">Lorem Ipsum dolor sit</a> 
                                        </p>
                                        <span class="Preço text-primary">€19.99</span>
                                        <div class="rate text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li><!-- end item -->
                                <li> 
                                    <a href="?page=single-product" class="product-image">
                                        <img src="{$BASE_URL}images/publications/books/books_6.jpg" alt="Sample Product ">
                                    </a>
                                    <div class="product-details">
                                        <p class="product-name"> 
                                            <a href="?page=single-product">Lorem Ipsum dolor sit</a> 
                                        </p>
                                        <span class="Preço text-primary">€19.99</span>
                                        <div class="rate text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li><!-- end item -->
                            </ul>

                            <hr class="spacer-10 no-border">
                            <a href="shop-sidebar-left.html" class="btn btn-default btn-block semi-circle btn-sm">Todos os produtos</a>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->

                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Minha conta</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <p>Olá <strong>{$USERNAME}</strong>! podes mudar a tua informação <a href="?page=user-information">aqui</a></p>
                                
                                <hr class="spacer-30 no-border">
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="mb-20 thin"><a href="javascript:void(0);">Vistos recentemente</a></h5>
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <div id="owl-demo" class="owl-carousel column-5 owl-theme">
                                    <div class="item">
                                        <figure>
                                            <a href="?page=single-product">
                                                <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div><!-- end item -->
                                    <div class="item">
                                        <figure>
                                            <a href="?page=single-product">
                                                <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div><!-- end item -->
                                    <div class="item">
                                        <figure>
                                            <a href="?page=single-product">
                                                <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div><!-- end item -->
                                    <div class="item">
                                        <figure>
                                            <a href="?page=single-product">
                                                <img src="{$BASE_URL}images/publications/books/books_5.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div><!-- end item -->
                                    <div class="item">
                                        <figure>
                                            <a href="?page=single-product">
                                                <img src="{$BASE_URL}images/publications/books/books_6.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div><!-- end item -->
                                    <div class="item">
                                        <figure>
                                            <a href="?page=single-product">
                                                <img src="{$BASE_URL}images/publications/books/books_6.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div><!-- end item -->
                                    <div class="item">
                                        <figure>
                                            <a href="?page=single-product">
                                                <img src="{$BASE_URL}images/publications/books/books_6.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div><!-- end item -->
                                    <div class="item">
                                        <figure>
                                            <a href="?page=single-product">
                                                <img src="{$BASE_URL}images/publications/books/books_6.jpg" alt="">
                                            </a>
                                        </figure>
                                    </div><!-- end item -->
                                </div><!-- end owl carousel -->
                                
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->

{include file='common/footer.tpl'}