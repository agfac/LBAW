<?php /* Smarty version Smarty-3.1.15, created on 2017-05-31 23:48:26
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/users/order-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9983305275929656a746994-67400612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b3d37fe70551f4390987720c46bcfdd184f4b6e' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/users/order-list.tpl',
      1 => 1496184757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9983305275929656a746994-67400612',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5929656a81ee31_47666628',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'orders' => 0,
    'order' => 0,
    'val' => 0,
    'days' => 0,
    'months' => 0,
    'years' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929656a81ee31_47666628')) {function content_5929656a81ee31_47666628($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Página inicial</a></li>
					<li class="active">Minhas Encomendas</li>
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
						<h2 class="title">Minhas encomendas</h2>
					</div><!-- end col -->
				</div><!-- end row -->
				
				<hr class="spacer-5"><hr class="spacer-20 no-border">
				
				<div class="row">
					<div class="col-sm-13">
						<div class="table-responsive">
							<?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>    
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Data</th>
										<th>Morada de Envio</th>
										<th>Código-Postal</th>
										<th>Localidade</th>
										<th>Portes</th>
										<th>Total</th>
										<th>Método de Pagamento</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable(0, null, 0);?>
									<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
									<tr>
										<td>
											<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/order-publications.php?id=<?php echo $_smarty_tpl->tpl_vars['order']->value['encomendaid'];?>
">
												#<?php echo $_smarty_tpl->tpl_vars['order']->value['encomendaid'];?>

											</a>
										</td>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['days']->value[$_smarty_tpl->tpl_vars['val']->value];?>

											<?php if ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='01') {?>
											JAN
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='02') {?>
											FEV
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='03') {?>
											MAR
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='04') {?>
											ABR
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='05') {?>
											MAI
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='06') {?>
											JUN
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='07') {?>
											JUL
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='08') {?>
											AGO
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='09') {?>
											SET
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='10') {?>
											OUT
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='11') {?>
											NOV
											<?php } elseif ($_smarty_tpl->tpl_vars['months']->value[$_smarty_tpl->tpl_vars['val']->value]=='12') {?>
											DEZ
											<?php }?>
											<?php echo $_smarty_tpl->tpl_vars['years']->value[$_smarty_tpl->tpl_vars['val']->value];?>

										</td>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['rua'];?>

										</td>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['cod1'];?>
-<?php echo $_smarty_tpl->tpl_vars['order']->value['cod2'];?>

										</td>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['nome'];?>

										</td>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['order']->value['portes']=='0') {?>
											Grátis
											<?php } else { ?>
											€<?php echo $_smarty_tpl->tpl_vars['order']->value['portes'];?>

											<?php }?>
										</td>
										<td>
											€<?php echo $_smarty_tpl->tpl_vars['order']->value['total'];?>

										</td>
										<td>
											<?php echo $_smarty_tpl->tpl_vars['order']->value['tipo'];?>

										</td>
										<td>
											<?php if ($_smarty_tpl->tpl_vars['order']->value['estado']=='Enviada') {?> 
											<span class="label label-success">
												<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['estado']=='Processada') {?> 
												<span class="label label-info">
													<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['estado']=='Devolvida') {?> 
													<span class="label label-default">
														<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['estado']=='Em processamento') {?>
														<span class="label label-warning">
															<?php } elseif ($_smarty_tpl->tpl_vars['order']->value['estado']=='Cancelada') {?>
															<span class="label label-danger">
																<?php }?>
																<?php echo $_smarty_tpl->tpl_vars['order']->value['estado'];?>
</span>
															</td>
														</tr>
														<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable($_smarty_tpl->tpl_vars['val']->value+1, null, 0);?>
														<?php } ?>
													</tbody>
												</table><!-- end table -->
												<?php } else { ?>
												<div>
													<p>Ainda não efetuou qualquer encomenda</p>
												</div>
												<?php }?>
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
