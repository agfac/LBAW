{include file='common/header.tpl'}

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="?page=home">Página inicial</a></li>
					<li class="active">Produto</li>
				</ul><!-- end breadcrumb -->
			</div><!-- end col -->    
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end breadcrumbs -->
{assign var=val value=0}
<!-- start section -->
<section class="section white-backgorund">
	<div class="container">
		<div class="row">
			<!-- start sidebar -->
			<div class="col-sm-4">
				<div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
					<div class='carousel-inner'>
						<div class='item active'>
							<figure>
								<img src='{$BASE_URL}{$publication.$val.url}' alt='' />
							</figure>
						</div><!-- end item -->
					</div><!-- end carousel-inner -->
				</div><!-- end carousel -->
			</div><!-- end col -->
			<!-- end sidebar -->
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="title">{$publication.$val.titulo}</h2>
						<p class="text-gray alt-font">ID: {$publication.$val.publicacaoid}</p>
						
						<ul class="list list-inline">
							<li><h6 class="text-danger text-xs">€{$publication.$val.preco}</h6></li>
							<li><h5 class="text-primary">€{$publication.$val.precopromocional}</h5></li>
							<li>
								{for $value=1 to ($publication.$val.classificacao)|floor}
								<i class="fa fa-star text-warning"></i>
								{/for}
								{if $publication.$val.classificacao}
								{if is_numeric($publication.$val.classificacao) && (float)(int)$publication.$val.classificacao===(float)$publication.$val.classificacao}
								{else}
								<i class="fa fa-star-half-o text-warning"></i>
								{/if}
								{/if}
							</li>
							<li><a href="javascript:void(0);">
								(
								{if $publication.$val.comentarios == 1} {$publication.$val.comentarios} comentário
								{else}
								{$publication.$val.comentarios} comentários
								{/if}
								)</a></li>
							</ul>
						</div><!-- end col -->
					</div><!-- end row -->

					<hr class="spacer-5"><hr class="spacer-10 no-border">

					<div class="row">
						<div class="col-sm-12">
							<p>{$publication.$val.descricao}</p>
							<hr class="spacer-15">
							<div class="row">

								<div class="col-md-4 col-sm-12">
									<select class="form-control" name="select">
										<option value="" selected>Quantidade</option>
										<option value="">1</option>
										<option value="">2</option>
										<option value="">3</option>
										<option value="">4</option>
										<option value="">5</option>
										<option value="">6</option>
										<option value="">7</option>
									</select>
								</div><!-- end col -->
							</div><!-- end row -->
							<hr class="spacer-15">

							<ul class="list list-inline">
								<li><button type="button" class="btn btn-default btn-md round"><i class="glyphicon glyphicon-shopping-cart mr-5"></i>Adicionar ao carrinho</button></li>
								<li><button type="button" class="btn btn-gray btn-md round"><i class="glyphicon glyphicon-heart mr-5"></i>Adicionar à lista de desejos</button></li>
								<br><br>
								<li>Partilhar este produto: </li>
								<li>
									<ul class="social-icons style1">
										<li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="pinterest"><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
									</ul>
								</li>
							</ul>
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end col -->
			</div><!-- end row -->

			<hr class="spacer-60">

			<div class="row">
				<div class="col-xs-12 col-sm-3">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs style2 tabs-left">
						<li class="active"><a href="#description" data-toggle="tab">Informação adicional</a></li>
						<li><a href="#reviews" data-toggle="tab">Comentários ({$publication.$val.comentarios})</a></li>
					</ul>
				</div><!-- end col -->
				<div class="col-xs-12 col-sm-9">
					<!-- Tab panes -->
					<div class="tab-content style2">
						<div class="tab-pane active" id="description">
							<h5>Informação adicional</h5>

							<hr class="spacer-15">

							<div class="row">
								<div class="col-sm-12 col-md-6">
									<dl class="dl-horizontal">
										<dt>Ano de publicação</dt>
										<dd>{$publication.$val.datapublicacao}</dd>
										<dt>Autor</dt>
										<dd>{$publication.$val.nome_autor}</dd>
									</dl>
								</div><!-- end col -->
								<div class="col-sm-12 col-md-6">
									<dl class="dl-horizontal">
										<dt>Editora</dt>
										<dd>{$publication.$val.nome_editora}</dd>
										<dt>ISBN</dt>
										<dd>{$publication.$val.isbn}</dd>
									</dl>
								</div><!-- end col -->
							</div><!-- end row -->
						</div><!-- end tab-pane -->
						<div class="tab-pane" id="reviews">
							<h5>{if $publication.$val.comentarios == 1} {$publication.$val.comentarios} comentário
								{else}
								{$publication.$val.comentarios} comentários
								{/if} para "{$publication.$val.titulo}"</h5>

								<hr class="spacer-10 no-border">
								{foreach $publication as $publi}
								<div class="comments">
									<div class="comment-image">
										<figure>
											<img src='{$BASE_URL}{$publi.url}' alt="" />
										</figure>
									</div><!-- end comments-image -->
									<div class="comment-content">
										<div class="comment-content-head">
											<h6 class="comment-title">{$publi.titulo}</h6>
											<ul class="list list-inline comment-meta">
												<li>
													{for $valor=1 to ($publi.classificacao)|floor}
													<i class="fa fa-star text-warning"></i>
													{/for}
													{if $publi.classificacao}
													{if is_numeric($publi.classificacao) && (float)(int)$publi.classificacao===(float)$publi.classificacao}
													{else}
													<i class="fa fa-star-half-o text-warning"></i>
													{/if}
													{/if}
												</li>
											</ul>
										</div><!-- end comment-content-head -->
										<p>{$publi.texto}</p>
										<cite>{$publi.nome_cliente}</cite>
									</div><!-- end comment-content -->
								</div><!-- end comments -->
								{/foreach}

								<hr class="spacer-30">

								<h5>Adicionar um comentário</h5>
								<p>Como classifica este produto?</p>

								<hr class="spacer-5 no-border">

								<form>
									<input type="text" class="rating rating-loading" value="5" data-size="sm" title="">
								</form>

								<hr class="spacer-10 no-border">

								<div class="form-group">
									<label for="reviewName">Nome</label>
									<input type="text" id="reviewName" class="form-control input-md" placeholder="Nome">
								</div><!-- end form-group -->
								<div class="form-group">
									<label for="reviewEmail">E-mail</label>
									<input type="text" id="reviewEmail" class="form-control input-md" placeholder="E-mail">
								</div><!-- end form-group -->
								<div class="form-group">
									<label for="reviewMessage">Comentário</label>
									<textarea id="reviewMessage" rows="5" class="form-control" placeholder="Comentário"></textarea>
								</div><!-- end form-group -->
								<div class="form-group">
									<input type="submit" class="btn btn-default round btn-md" value="Submeter">
								</div><!-- end form-group -->
							</div><!-- end tab-pane -->
						</div><!-- end tab-content -->
					</div><!-- end col -->
				</div><!-- end row -->

				<hr class="spacer-60">

				<div class="row">
					<div class="col-sm-12">
						<h4 class="mb-20">Recomendações</h4>
					</div><!-- end col -->
				</div><!-- end row -->

				<div class="row">
					<div class="col-sm-12">
						<div id="owl-demo" class="owl-carousel column-4 owl-theme">
							<div class="item">
								<div class="thumbnail store style1">
									<div class="header">
										<figure>
											<a href="?page=single-product">
												<img src='{$BASE_URL}images/publications/books/books_5.jpg' alt="">
											</a>
										</figure>
									</div>
									<div class="caption">
										<h6 class="regular"><a href="?page=single-product">Lorem ipsum dolor sit amet</a></h6>
										<div class="price">
											<small class="amount off">€68.99</small>
											<span class="amount text-primary">€59.99</span>
										</div>
										<span class="product-badge bottom left text-warning">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
											<i class="fa fa-star-o"></i>
										</span>
									</div><!-- end caption -->
								</div><!-- end thumbnail -->
							</div><!-- end item -->

							<div class="item">
								<div class="thumbnail store style1">
									<div class="header">
										<figure>
											<a href="?page=single-product">
												<img src='{$BASE_URL}images/publications/books/books_5.jpg' alt="">
											</a>
										</figure>
									</div>
									<div class="caption">
										<h6 class="regular"><a href="?page=single-product">Lorem ipsum dolor sit amet</a></h6>
										<div class="price">
											<small class="amount off">€68.99</small>
											<span class="amount text-primary">€59.99</span>
										</div>
										<span class="product-badge bottom left text-warning">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
											<i class="fa fa-star-o"></i>
										</span>
									</div><!-- end caption -->
								</div><!-- end thumbnail -->
							</div><!-- end item -->

							<div class="item">
								<div class="thumbnail store style1">
									<div class="header">
										<figure>
											<a href="?page=single-product">
												<img src='{$BASE_URL}images/publications/books/books_5.jpg' alt="">
											</a>
										</figure>
									</div>
									<div class="caption">
										<h6 class="regular"><a href="?page=single-product">Lorem ipsum dolor sit amet</a></h6>
										<div class="price">
											<small class="amount off">€68.99</small>
											<span class="amount text-primary">€59.99</span>
										</div>
										<span class="product-badge bottom left text-warning">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
											<i class="fa fa-star-o"></i>
										</span>
									</div><!-- end caption -->
								</div><!-- end thumbnail -->
							</div><!-- end item -->

							<div class="item">
								<div class="thumbnail store style1">
									<div class="header">
										<figure>
											<a href="?page=single-product">
												<img src='{$BASE_URL}images/publications/books/books_5.jpg' alt="">
											</a>
										</figure>
									</div>
									<div class="caption">
										<h6 class="regular"><a href="?page=single-product">Lorem ipsum dolor sit amet</a></h6>
										<div class="price">
											<small class="amount off">€68.99</small>
											<span class="amount text-primary">€59.99</span>
										</div>
										<span class="product-badge bottom left text-warning">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
											<i class="fa fa-star-o"></i>
										</span>
									</div><!-- end caption -->
								</div><!-- end thumbnail -->
							</div><!-- end item -->
							<div class="item">
								<div class="thumbnail store style1">
									<div class="header">
										<figure>
											<a href="?page=single-product">
												<img src='{$BASE_URL}images/publications/books/books_5.jpg' alt="">
											</a>
										</figure>
									</div>
									<div class="caption">
										<h6 class="regular"><a href="?page=single-product">Lorem ipsum dolor sit amet</a></h6>
										<div class="price">
											<small class="amount off">€68.99</small>
											<span class="amount text-primary">€59.99</span>
										</div>
										<span class="product-badge bottom left text-warning">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-o"></i>
											<i class="fa fa-star-o"></i>
										</span>
									</div><!-- end caption -->
								</div><!-- end thumbnail -->
							</div><!-- end item -->
						</div><!-- end owl carousel -->
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end container -->
		</section>
		<!-- end section -->
		{include file='common/footer.tpl'}