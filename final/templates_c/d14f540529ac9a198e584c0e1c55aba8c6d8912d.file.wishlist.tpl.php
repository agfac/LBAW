<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 12:03:06
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/users/wishlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57806867959296a90018e41-43656674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd14f540529ac9a198e584c0e1c55aba8c6d8912d' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/users/wishlist.tpl',
      1 => 1496055175,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57806867959296a90018e41-43656674',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59296a90093f52_97820093',
  'variables' => 
  array (
    'publicationswishlist' => 0,
    'publication' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59296a90093f52_97820093')) {function content_59296a90093f52_97820093($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="?page=home">Página incial</a></li>
					<li class="active">Wishlist</li>
				</ul><!-- end breadcrumb -->
			</div><!-- end col -->    
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end breadcrumbs -->

<!-- start section -->
<section class="section white-backgorund">
	<div class="container">
		<div class="row">
			
			<?php echo $_smarty_tpl->getSubTemplate ('common/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-12 text-left">
						<h2 class="title">A minha lista de desejos</h2>
					</div><!-- end col -->
				</div><!-- end row -->
				
				<hr class="spacer-5"><hr class="spacer-20 no-border">
				
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
						<?php if ($_smarty_tpl->tpl_vars['publicationswishlist']->value) {?>    
							<table class="table">
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publicationswishlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
									<tr data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
">
										<td>
											<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
">
												<img width="60px" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" alt="product">
											</a>
										</td>
										<td>
											<h6 class="regular"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a></h6>
											<small><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
 | <?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_subcategoria'];?>
</small>
										</td>
										<td>
											<span class="text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</span>
										</td>
										<td>
											<button type="button" class="btn btn-default round btn-sm"><i class="fa fa-cart-plus mr-5"></i> Adicionar ao carrinho</button>
										</td>
										<td>
											<button type="button" class="close">×</button>
										</td>
									</tr>
									<?php } ?>
									<?php } else { ?>
									<tr>
										<span>Não existem produtos na sua lista de desejos</span>
									</tr>
									<?php }?>
								</tbody>
							</table><!-- end table -->
						</div><!-- end table-responsive -->
						
						<hr class="spacer-10 no-border">
						
						<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" class="btn btn-light semi-circle btn-sm">
							<i class="fa fa-arrow-left mr-5"></i> Continuar a comprar
						</a>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end col -->
		</div><!-- end row -->                
	</div><!-- end container -->
</section>
<!-- end section -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/users/wishlist.js"></script><?php }} ?>
