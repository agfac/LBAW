<!-- start sidebar -->
<div class="col-sm-3">
	<div class="widget">
		<h6 class="subtitle">Menu de navegação</h6>

		<ul class="list list-unstyled">
			<li>
				<a href="{$BASE_URL}pages/users/my-account.php">
					<i class="fa fa-user mr-5"></i>
					Minha conta
				</a>
			</li>
			<li>
				<a href="{$BASE_URL}pages/users/user-information.php">
					<i class="fa fa-edit mr-5"></i>
					Meus dados pessoais
				</a>
			</li>
			<li>
				<a href="{$BASE_URL}pages/users/cart.php">
					<i class="fa fa-shopping-cart mr-5"></i>
					Meu carrinho 
					<span class="text-primary">(3)</span>
				</a>
			</li>
			<li>
				<a href="{$BASE_URL}pages/users/order-list.php">
					<i class="fa fa fa-bar-chart mr-5"></i>
					Minhas encomendas 
				</a>
			</li>
			<li>
				<a href="{$BASE_URL}pages/users/wishlist.php">
					<i class="fa fa fa-heart mr-5"></i>
					Lista de desejos 
					<span class="text-primary">(5)</span>
				</a>
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

<script src="{$BASE_URL}javascript/users/sidebar.js"></script>
