<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 15:19:54
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/common/contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1784850261592c1890c5b818-24502417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e9486c34fec793e50750f168600b39278aceb45' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/common/contacts.tpl',
      1 => 1496067073,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1784850261592c1890c5b818-24502417',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c1890c99389_10043792',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USER_DATA' => 0,
    'FORM_VALUES' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c1890c99389_10043792')) {function content_592c1890c99389_10043792($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="?page=home">Página inicial</a></li>
					<li class="active">Contacte-nos</li>
				</ul><!-- end breadcrumb -->
			</div><!-- end col -->    
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end breadcrumbs -->

<!-- start section -->
<section class="section white-backgorund">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-wrap">
					<h2 class="title lines">Contacte-nos</h2>
				</div>
			</div><!-- end col -->    
		</div><!-- end row -->

		<div class="row column-3">
			<div class="col-sm-6 col-md-4">
				<div class="icon-boxes style1">
					<div class="icon">
						<i class="fa fa-commenting-o text-warning"></i>
					</div><!-- end icon -->
					<div class="box-content">
						<h6 class="thin">Precisa de ajuda?</h6>
						<h5 class="text-warning">Deixe aqui a sua mensagem!</h5>
					</div>
				</div><!-- icon-box -->
			</div><!-- end col -->   
			<div class="col-sm-6 col-md-4">
				<div class="icon-boxes style1">
					<div class="icon">
						<i class="fa fa-phone text-info"></i>
					</div><!-- end icon -->
					<div class="box-content">
						<h6 class="thin">Pergunta rápida?</h6>
						<h5 class="text-info">Contacte-nos: 213 456 789!</h5>
					</div>
				</div><!-- icon-box -->
			</div><!-- end col -->   
			<div class="col-sm-6 col-md-4">
				<div class="icon-boxes style1">
					<div class="icon">
						<i class="fa fa-envelope-o text-success"></i>
					</div><!-- end icon -->
					<div class="box-content">
						<h6 class="thin">Ou envie-nos um email</h6>
						<h5 class="text-success">apoio@awesomebookshop.pt</h5>
					</div>
				</div><!-- icon-box -->
			</div><!-- end col --> 
		</div><!-- end row -->

		<hr class="spacer-40 no-border">

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/common/send_message.php" method="post" class="form-horizontal">
					<div class="form-group">
						<label for="nome" class="control-label">
						Nome <span class="text-danger">*</span>
						</label>
						<input type="text" name="nome" class="form-control input-lg" 
						<?php if ($_smarty_tpl->tpl_vars['USER_DATA']->value) {?>
						value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['nome'];?>
"
						<?php } else { ?>
						value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['nome'];?>
"
						<?php }?>
						placeholder="Name">
					</div>
					<div class="form-group">
						<label for="email" class="control-label">E-mail <span class="text-danger">*</span></label>
						<input type="email" name="email" class="form-control input-lg" 
						<?php if ($_smarty_tpl->tpl_vars['USER_DATA']->value) {?>
						value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['email'];?>
"
						<?php } else { ?>
						value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
"
						<?php }?>
						placeholder="E-mail">
					</div>
					<div class="form-group">
						<label class="control-label" for="message">Mensagem <span class="text-danger">*</span></label>
						<textarea name="mensagem" rows="6" class="form-control input-lg" placeholder="Messagem"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default round btn-lg">
						Submeter
						</button>
					</div>
				</form>
			</div><!-- end col -->
		</div><!-- end row -->

	</div><!-- end container -->
</section>
<!-- end section -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/common/contacts.js"></script><?php }} ?>
