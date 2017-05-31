<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:31:49
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/admin/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168922950592c8535c65f05-55470871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '559392a1998dafa875f92b7d053317ca9375268d' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/admin/home.tpl',
      1 => 1495438243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168922950592c8535c65f05-55470871',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'infoHome' => 0,
    'comment' => 0,
    'order' => 0,
    'publication' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c8535cdeae4_02892967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c8535cdeae4_02892967')) {function content_592c8535cdeae4_02892967($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- page content -->
<div class="right_col" role="main">
	<div class="row top_tiles">
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-sign-in"></i></div>
				<div class="count"><?php echo $_smarty_tpl->tpl_vars['infoHome']->value['nrOfLastClients'];?>
</div>
				<h3>Novos Registos</h3>
				<p>Número de novos clientes nos últimos 7 dias.</p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-comments-o"></i></div>
				<div class="count"><?php echo $_smarty_tpl->tpl_vars['infoHome']->value['nrOfLastComments'];?>
</div>
				<h3>Novos comentários</h3>
				<p>Número de novos comentários nos últimos 7 dias.</p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-eye"></i></div>
				<div class="count"><?php echo $_smarty_tpl->tpl_vars['infoHome']->value['nrOfLastLogs'];?>
</div>
				<h3>Novos visitantes</h3>
				<p>Número de novos visitantes nos últimos 7 dias.</p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-cart-plus"></i></div>
				<div class="count"><?php echo $_smarty_tpl->tpl_vars['infoHome']->value['nrOfLastCarts'];?>
</div>
				<h3>Novos carrinhos</h3>
				<p>Número de novos carrinhos nos últimos 7 dias.</p>
			</div>
		</div>
	</div>
	<!-- /top tiles -->

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row x_title">
				<div class="col-md-6">
					<h3>Registo de atividades</h3>
				</div>
				<div class="col-md-6">
					<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
						<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
						<span></span> <b class="caret"></b>
					</div>
				</div>
			</div>

			<!-- <div class="col-md-12 col-sm-12 col-xs-12">
				<div id="chart_plot_01" class="demo-placeholder"></div>
			</div> -->
			<div class="clearfix"></div>
		</div>

		<div class="col-md-4">
			<div class="x_panel top_comentarios">
				<div class="x_title">
					<h2>Últimos 5 Comentários </h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php if ($_smarty_tpl->tpl_vars['infoHome']->value['getLast5CommentsByDate']) {?>
					<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infoHome']->value['getLast5CommentsByDate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-comments-o aero"></i>
						</a>
						<div class="media-body">
							<a class="title"><?php echo $_smarty_tpl->tpl_vars['comment']->value['nome'];?>
</a>
							<p><?php echo $_smarty_tpl->tpl_vars['comment']->value['texto'];?>
</p>
						</div>
					</article>
					<?php } ?>
					<?php } else { ?>
					<article class="media event">
						<div class="media-body">
                    		<a class="title">Sem comentários na data selecionada</a>
                  		</div>
					</article>
					<?php }?>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="x_panel top_usuarios">
				<div class="x_title">
					<h2>Top Usuários <small>Últimos 7 dias</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php if ($_smarty_tpl->tpl_vars['infoHome']->value['getBest5UsersOrdersByDate']) {?>
					<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infoHome']->value['getBest5UsersOrdersByDate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title"><?php echo $_smarty_tpl->tpl_vars['order']->value['nomecliente'];?>
</a>
							<p>Valor total gasto <strong><?php echo $_smarty_tpl->tpl_vars['order']->value['total'];?>
€</strong> em publicações.</p>
						</div>
					</article>
					<?php } ?>
					<?php } else { ?>
					<article class="media event">
						<div class="media-body">
                    		<a class="title">Sem encomendas na data selecionada</a>
                  		</div>
					</article>
					<?php }?>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="x_panel top_livros">
				<div class="x_title">
					<h2>Top Publicações <small>Últimos 7 dias</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<?php if ($_smarty_tpl->tpl_vars['infoHome']->value['getBest5PublicationsOrdersByDate']) {?>
					<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infoHome']->value['getBest5PublicationsOrdersByDate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-book aero"></i>
						</a>
						<div class="media-body">
							<a class="title"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a>
							<p>Foram vendidos <strong><?php echo $_smarty_tpl->tpl_vars['publication']->value['quantidade'];?>
</strong> exemplares.</p>
						</div>
					</article>
					<?php } ?>
					<?php } else { ?>
					<article class="media event">
						<div class="media-body">
                    		<a class="title">Sem Publicações entre as datas selecionadas</a>
                  		</div>
					</article>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

<?php echo $_smarty_tpl->getSubTemplate ('admin/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/admin/home.js"></script><?php }} ?>
