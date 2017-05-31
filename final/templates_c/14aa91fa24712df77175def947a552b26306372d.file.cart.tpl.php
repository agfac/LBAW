<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 22:23:13
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/users/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:952711396592984adb1ff43-55276631%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14aa91fa24712df77175def947a552b26306372d' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/users/cart.tpl',
      1 => 1496092888,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '952711396592984adb1ff43-55276631',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592984adba4b57_56572771',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'publicationscart' => 0,
    'publication' => 0,
    'qtOptions' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592984adba4b57_56572771')) {function content_592984adba4b57_56572771($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/Applications/MAMP/htdocs/LBAW/proto/lib/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Página inicial</a></li>
					<li class="active">Carrinho</li>
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
						<h2 class="title">Carrinho</h2>
					</div><!-- end col -->
				</div><!-- end row -->
				
				<hr class="spacer-5"><hr class="spacer-20 no-border">
				
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">  
							<?php if ($_smarty_tpl->tpl_vars['publicationscart']->value) {?>  
							<table class="table table-striped">
								<thead>
									<tr>
										<th colspan="2">Produtos</th>
										<th>Preço</th>
										<th>Quantidade</th>
										<th colspan="2">Total</th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['publicationscart']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
											<p><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
 | <?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_subcategoria'];?>
</p>
										</td>
										<td>
											<span>€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</span>
										</td>
										<td>
											<select class="form-control" name="select">
												<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['qtOptions']->value,'selected'=>$_smarty_tpl->tpl_vars['publication']->value['quantidade']),$_smarty_tpl);?>

											</select>
										</td>
										<td data-column="total">
											<span class="text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco']*$_smarty_tpl->tpl_vars['publication']->value['quantidade'];?>
</span>
										</td>
										<td>
											<button type="button" class="close">×</button>
										</td>
									</tr>
									<?php } ?>
									<?php } else { ?>
									<tr>
										<span>Não existem produtos no carrinho</span>
									</tr>
									<?php }?>
								</tbody>
							</table><!-- end table -->
						</div><!-- end table-responsive -->
						
						<hr class="spacer-10 no-border">
						
						<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
" class="btn btn-light semi-circle btn-sm pull-left">
							<i class="fa fa-arrow-left mr-5"></i> Continuar a comprar
						</a>
						<?php if ($_smarty_tpl->tpl_vars['publicationscart']->value) {?>
						<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/checkout.php" class="btn btn-default semi-circle btn-sm pull-right" data-type="checkoutbutton">
							Checkout <i class="fa fa-arrow-right ml-5"></i>
						</a>
						<?php }?>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end col -->
		</div><!-- end row -->                
	</div><!-- end container -->
</section>
<!-- end section -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/users/cart.js"></script><?php }} ?>
