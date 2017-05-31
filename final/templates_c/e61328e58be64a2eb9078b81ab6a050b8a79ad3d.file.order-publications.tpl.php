<?php /* Smarty version Smarty-3.1.15, created on 2017-05-28 13:27:21
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/users/order-publications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:891071032592ac2299c7fa9-24315445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e61328e58be64a2eb9078b81ab6a050b8a79ad3d' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/users/order-publications.tpl',
      1 => 1495839747,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '891071032592ac2299c7fa9-24315445',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'orderid' => 0,
    'orderpublications' => 0,
    'publication' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592ac229a2bfd6_53928143',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592ac229a2bfd6_53928143')) {function content_592ac229a2bfd6_53928143($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Página inicial</a></li>
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
			<?php echo $_smarty_tpl->getSubTemplate ('common/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-12 text-left">
						<h2 class="title">Encomenda #<?php echo $_smarty_tpl->tpl_vars['orderid']->value;?>
</h2>
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
										<th >Imagem</th>
										<th >Título</th>
										<th>Preço</th>
										<th>Quantidade</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderpublications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
									<tr>
										<td>
											#<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>

										</td>
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
											<p>Sed aliquam tincidunt tempus</p>
										</td>
										<td>
											<span>€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</span>
										</td>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['publication']->value['quantidade'];?>

										</td>
										<td>
											€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco']*$_smarty_tpl->tpl_vars['publication']->value['quantidade'];?>

										</td>
									</tr>
									<?php } ?>
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
<?php }} ?>
