{include file='common/header.tpl'}

<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="?page=home">Página inicial</a></li>
                    <li><a href="#">Páginas</a></li>
                    <li class="active">Pesquisa</li>
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
                    <h6 class="subtitle">Pesquisa</h6>

                    <form>
                        <input type="text" id="lastname" class="form-control input-sm" placeholder="Pesquisa">
                    </form>
                </div><!-- end widget -->

                <div class="widget">
                   <h6 class="subtitle">Categorias</h6>
                   <select class="form-control" required="required" name="categoria" id="categoria">
                   {foreach $subcategory as $s}
                        {if $s.nome == $def_cat}
                            <option value="{$s.nome}" selected="selected" /> {$s.nome} </br>
                        {else}
                            <option value="{$s.nome}" /> {$s.nome} </br>
                        {/if}
                    {/foreach}
                   </select>

               </div><!-- end widget -->
               <div class="widget">
                <h6 class="subtitle">Preços</h6>

                <form method="post" class="price-range" data-start-min="10" data-start-max="200" data-min="0" data-max="1000" data-step="1">
                    <div class="ui-range-values">
                        <div class="ui-range-value-min">
                            €<span></span>
                            <input type="hidden">
                        </div> -
                        <div class="ui-range-value-max">
                            €<span></span>
                            <input type="hidden">
                        </div>
                    </div>
                    <div class="ui-range-slider"></div>
                    <button type="submit" class="btn btn-default btn-block btn-sm">Filtros</button>
                </form>
            </div><!-- end widget -->


            <div class="widget">
                <h6 class="subtitle">Novidades</h6>
                <figure>
                    <a href="javascript:void(0);">
                        <img src="{$BASE_URL}img/books/books_5.jpg" alt="collection">
                    </a>
                </figure>
            </div><!-- end widget -->
            <div class="widget">
                <h6 class="subtitle">Tags populares</h6>

                <ul class="tags">
                    <li>
                        <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">arte</a>
                    </li>
                    <li>
                        <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">economia</a>
                    </li>
                    <li>
                        <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">gestão</a>
                    </li>
                    <li>
                        <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">história</a>
                    </li>
                </ul>
            </div><!-- end widget -->
        </div><!-- end col -->
        <!-- end sidebar -->
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12 text-left">
                    <h2 class="title">Pesquisa de produtos</h2>
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="spacer-5"><hr class="spacer-20 no-border">

            <div class="row column-3" id="products-listing">
                <div class="row column-3" id="sub-products-listing">

                </div>
            </div><!-- end row -->
        </div><!-- end col -->   
    </section>
    <!-- end section -->

    {include file='common/footer.tpl'}
    <script src="{$BASE_URL}javascript/publications/filtering.js"></script>