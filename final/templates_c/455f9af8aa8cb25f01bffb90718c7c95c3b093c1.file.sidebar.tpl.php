<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:12:30
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/common/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32571155929656a830a69-26374921%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '455f9af8aa8cb25f01bffb90718c7c95c3b093c1' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/common/sidebar.tpl',
      1 => 1496088746,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32571155929656a830a69-26374921',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5929656a843625_74050984',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'val' => 0,
    'eightnewpublications' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929656a843625_74050984')) {function content_5929656a843625_74050984($_smarty_tpl) {?><!-- start sidebar -->
<div class="col-sm-3">
	<div class="widget">
		<h6 class="subtitle">Menu de navegação</h6>

		<ul class="list list-unstyled">
			<li>
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/my-account.php">
					<i class="fa fa-user mr-5"></i>
					Minha conta
				</a>
			</li>
			<li>
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/user-information.php">
					<i class="fa fa-edit mr-5"></i>
					Meus dados pessoais
				</a>
			</li>
			<li>
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/wishlist.php">
					<i class="fa fa-heart mr-5"></i>
					Lista de desejos 
				</a>
			</li>
			<li>
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/cart.php">
					<i class="fa fa-shopping-cart mr-5"></i>
					Meu carrinho 
				</a>
			</li>
			<li>
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/order-list.php">
					<i class="fa fa fa-bar-chart mr-5"></i>
					Minhas encomendas 
				</a>
			</li>
		</ul>
	</div><!-- end widget -->
	<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable(0, null, 0);?>
	<div class="widget">
		<h6 class="subtitle">Novidades</h6>
		<figure>
			<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['publicacaoid'];?>
">
				<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['url'];?>
" alt="collection">
			</a>
		</figure>
	</div><!-- end widget -->
	<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable($_smarty_tpl->tpl_vars['val']->value+1, null, 0);?>
	<div class="widget">

		<ul class="items">
			<li> 
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['publicacaoid'];?>
" class="product-image">
					<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['url'];?>
" alt="Sample Product ">
				</a>
				<div class="product-details">
					<p class="product-name"> 
						<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['titulo'];?>
</a> 
					</p>
					<span class="Preço text-primary">€<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['precopromocional'];?>
</span>
					<div class="rate text-warning">
						<?php $_smarty_tpl->tpl_vars['valor'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['valor']->step = 1;$_smarty_tpl->tpl_vars['valor']->total = (int) ceil(($_smarty_tpl->tpl_vars['valor']->step > 0 ? floor(($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['valor']->step));
if ($_smarty_tpl->tpl_vars['valor']->total > 0) {
for ($_smarty_tpl->tpl_vars['valor']->value = 1, $_smarty_tpl->tpl_vars['valor']->iteration = 1;$_smarty_tpl->tpl_vars['valor']->iteration <= $_smarty_tpl->tpl_vars['valor']->total;$_smarty_tpl->tpl_vars['valor']->value += $_smarty_tpl->tpl_vars['valor']->step, $_smarty_tpl->tpl_vars['valor']->iteration++) {
$_smarty_tpl->tpl_vars['valor']->first = $_smarty_tpl->tpl_vars['valor']->iteration == 1;$_smarty_tpl->tpl_vars['valor']->last = $_smarty_tpl->tpl_vars['valor']->iteration == $_smarty_tpl->tpl_vars['valor']->total;?>
						<i class="fa fa-star"></i>
						<?php }} ?>
						<?php if ($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao']) {?>
						<?php if (is_numeric($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao']===(float)$_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao']) {?>
						<?php } else { ?>
						<i class="fa fa-star-half-o"></i>
						<?php }?>
						<?php }?>
					</div>
				</div>
			</li><!-- end item -->
			<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable($_smarty_tpl->tpl_vars['val']->value+1, null, 0);?>
			<li> 
				<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['publicacaoid'];?>
" class="product-image">
					<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['url'];?>
" alt="Sample Product ">
				</a>
				<div class="product-details">
					<p class="product-name"> 
						<a href="?page=single-product"><?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['titulo'];?>
</a> 
					</p>
					<span class="Preço text-primary">€<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['precopromocional'];?>
</span>
					<div class="rate text-warning">
						<?php $_smarty_tpl->tpl_vars['valor'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['valor']->step = 1;$_smarty_tpl->tpl_vars['valor']->total = (int) ceil(($_smarty_tpl->tpl_vars['valor']->step > 0 ? floor(($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['valor']->step));
if ($_smarty_tpl->tpl_vars['valor']->total > 0) {
for ($_smarty_tpl->tpl_vars['valor']->value = 1, $_smarty_tpl->tpl_vars['valor']->iteration = 1;$_smarty_tpl->tpl_vars['valor']->iteration <= $_smarty_tpl->tpl_vars['valor']->total;$_smarty_tpl->tpl_vars['valor']->value += $_smarty_tpl->tpl_vars['valor']->step, $_smarty_tpl->tpl_vars['valor']->iteration++) {
$_smarty_tpl->tpl_vars['valor']->first = $_smarty_tpl->tpl_vars['valor']->iteration == 1;$_smarty_tpl->tpl_vars['valor']->last = $_smarty_tpl->tpl_vars['valor']->iteration == $_smarty_tpl->tpl_vars['valor']->total;?>
						<i class="fa fa-star"></i>
						<?php }} ?>
						<?php if ($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao']) {?>
						<?php if (is_numeric($_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao']===(float)$_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['classificacao']) {?>
						<?php } else { ?>
						<i class="fa fa-star-half-o"></i>
						<?php }?>
						<?php }?>
					</div>
				</div>
			</li><!-- end item -->
		</ul>

		<hr class="spacer-10 no-border">
		<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" class="btn btn-default btn-block semi-circle btn-sm">Todos os produtos</a>
	</div><!-- end widget -->
</div><!-- end col -->
<!-- end sidebar -->

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/users/sidebar.js"></script>
<?php }} ?>
