{include file='common/header.tpl'}

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="{$BASE_URL}">Página inicial</a></li>
					<li><a href="#">Páginas</a></li>
					<li class="active">Encomenda</li>
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
						<li>
							<a href="{$BASE_URL}pages/users/my-account.php">Minha conta</a>
						</li>
						<li>
							<a href="{$BASE_URL}pages/users/cart.php">Meu carrinho <span class="text-primary">(3)</span></a>
						</li>
						<li class="active">
							<a href="{$BASE_URL}pages/users/order-list.php">Minhas encomendas </a>
						</li>
						<li>
							<a href="{$BASE_URL}pages/users/wishlist.php">Lista de desejos<span class="text-primary">(5)</span></a>
						</li>
						<li>
							<a href="{$BASE_URL}pages/users/user-information.php">Definições</a>
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
						<h2 class="title">Encomenda </h2>
					</div><!-- end col -->
				</div><!-- end row -->
				
				<hr class="spacer-5"><hr class="spacer-20 no-border">
				
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">    
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th colspan="2">Produtos</th>
										<th>Preço</th>
										<th>Data</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									{foreach $orders as $order}
									<tr>
										<td>
											{$order.encomendaid}
										</td>
										<td>
											<a href="?page=single-product">
												<img width="60px" src="{$BASE_URL}{$order.url}" alt="product">
											</a>
										</td>
										<td>
											<h6 class="regular"><a href="?page=single-product">{$order.titulo}</a></h6>
											<p>Sed aliquam tincidunt tempus</p>
										</td>
										<td>
											<span>€{$order.total}</span>
										</td>
										<td>
											{$order.data}
										</td>
										<td>
											<span class="label label-primary">{$order.estado}</span>
										</td>
									</tr>
									{/foreach}

									<tr>
										<td>
											#2MA269
										</td>
										<td>
											<a href="?page=single-product">
												<img width="60px" src="{$BASE_URL}images/publications/books/books_5.jpg" alt="product">
											</a>
										</td>
										<td>
											<h6 class="regular"><a href="?page=single-product">Lorem Ipsum dolor sit</a></h6>
											<p>Sed aliquam tincidunt tempus</p>
										</td>
										<td>
											<span>€39.99</span>
										</td>
										<td>
											09 Nov 2016
										</td>
										<td>
											<span class="label label-danger">Cancelado</span>
										</td>
									</tr>
									<tr>
										<td>
											#973C5J
										</td>
										<td>
											<a href="?page=single-product">
												<img width="60px" src="{$BASE_URL}images/publications/books/books_5.jpg" alt="product">
											</a>
										</td>
										<td>
											<h6 class="regular"><a href="?page=single-product">Lorem Ipsum dolor sit</a></h6>
											<p>Sed aliquam tincidunt tempus</p>
										</td>
										<td>
											<span>€29.99</span>
										</td>
										<td>
											23 Oct 2016
										</td>
										<td>
											<span class="label label-success">Finalizada</span>
										</td>
									</tr>
									<tr>
										<td>
											#113V5G
										</td>
										<td>
											<a href="?page=single-product">
												<img width="60px" src="{$BASE_URL}images/publications/books/books_6.jpg" alt="product">
											</a>
										</td>
										<td>
											<h6 class="regular"><a href="?page=single-product">Lorem Ipsum dolor sit</a></h6>
											<p>Sed aliquam tincidunt tempus</p>
										</td>
										<td>
											<span>€19.99</span>
										</td>
										<td>
											17 Sep 2016
										</td>
										<td>
											<span class="label label-default">Desativada</span>
										</td>
									</tr>
									<tr>
										<td>
											#113V5G
										</td>
										<td>
											<a href="?page=single-product">
												<img width="60px" src="{$BASE_URL}images/publications/books/books_6.jpg" alt="product">
											</a>
										</td>
										<td>
											<h6 class="regular"><a href="?page=single-product">Lorem Ipsum dolor sit</a></h6>
											<p>Sed aliquam tincidunt tempus</p>
										</td>
										<td>
											<span>€19.99</span>
										</td>
										<td>
											13 Sep 2016
										</td>
										<td>
											<span class="label label-warning">Esperando</span>
										</td>
									</tr>
								</tbody>
							</table><!-- end table -->
						</div><!-- end table-responsive -->
						
						<hr class="spacer-10 no-border">
						
						<a href="checkout.html" class="btn btn-light semi-circle btn-sm">
							<i class="fa fa-arrow-left mr-5"></i> Continuar a comprar
						</a>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end col -->
		</div><!-- end row -->                
	</div><!-- end container -->
</section>
<!-- end section -->

{include file='common/footer.tpl'}