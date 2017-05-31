<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:08:48
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/users/user-information.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157594288592aa18320f223-31331444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78e323e2a4718fdfb3a6797b01a1b633c6288ecc' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/users/user-information.tpl',
      1 => 1496055179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157594288592aa18320f223-31331444',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592aa183288e87_56453612',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USER_DATA' => 0,
    'GENDER_ARRAY' => 0,
    'DAY_ARRAY' => 0,
    'BIRTH_DAY' => 0,
    'MONTH_ARRAY' => 0,
    'MONTH_NAMES_ARRAY' => 0,
    'BIRTH_MONTH' => 0,
    'YEAR_ARRAY' => 0,
    'BIRTH_YEAR' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592aa183288e87_56453612')) {function content_592aa183288e87_56453612($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include '/Applications/MAMP/htdocs/LBAW/proto/lib/smarty/plugins/function.html_radios.php';
if (!is_callable('smarty_function_html_options')) include '/Applications/MAMP/htdocs/LBAW/proto/lib/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="?page=home">Página inicial</a></li>
					<li class="active">Informação pessoal</li>
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
						<h2 class="title">Meus dados pessoais</h2>
					</div><!-- end col -->
				</div><!-- end row -->
				
				<hr class="spacer-5"><hr class="spacer-20 no-border">
				
				<div class="row">
					<div class="col-sm-12 col-md-10 col-lg-12">
						<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/user-information.php" method="post" class="form-horizontal">
							<div class="form-group">
								<label for="nome" class="col-sm-2 control-label">Nome<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="nome" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['nome'];?>
" placeholder="Nome">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="genero" class="col-sm-2 control-label">Género<span class="text-danger">*</span></label>
								<div class="checkbox-input mb-10">
									<?php echo smarty_function_html_radios(array('name'=>'genero','options'=>$_smarty_tpl->tpl_vars['GENDER_ARRAY']->value,'selected'=>$_smarty_tpl->tpl_vars['USER_DATA']->value['genero'],'class'=>"row-gender-edit"),$_smarty_tpl);?>

								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="dataNascimento" class="col-sm-2 control-label">Data de Nascimento<span class="text-danger">*</span></label>
								<div class="col-sm-2">
									<select class="form-control" name="diaNasc">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['DAY_ARRAY']->value,'selected'=>$_smarty_tpl->tpl_vars['BIRTH_DAY']->value),$_smarty_tpl);?>

									</select>
								</div><!-- end col -->
								<div class="col-sm-2">
									<select class="form-control" name="mesNasc">
										<?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['MONTH_ARRAY']->value,'output'=>$_smarty_tpl->tpl_vars['MONTH_NAMES_ARRAY']->value,'selected'=>$_smarty_tpl->tpl_vars['BIRTH_MONTH']->value),$_smarty_tpl);?>

									</select>
								</div><!-- end col -->
								<div class="col-sm-2">
									<select class="form-control" name="anoNasc">
										<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['YEAR_ARRAY']->value,'selected'=>$_smarty_tpl->tpl_vars['BIRTH_YEAR']->value),$_smarty_tpl);?>

									</select>
								</div><!-- end col -->
							</div>
							<div class="form-group">
								<label for="morada" class="col-sm-2 control-label">Morada<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="morada" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['rua'];?>
" placeholder="Morada">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="localidade" class="col-sm-2 control-label">Localidade<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="localidade" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['nomelocalidade'];?>
" placeholder="Localidade">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="codigoPostal" class="col-sm-2 control-label">Código-Postal<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" id="row-codpost" class="form-control input-md" name="cod1" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['cod1'];?>
" placeholder="Cod1">
									<input type="text" id="row-codpost" class="form-control input-md" name="cod2" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['cod2'];?>
" placeholder="Cod2">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="pais" class="col-sm-2 control-label">País<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="pais" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['nomepais'];?>
" placeholder="País">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="telefone" class="col-sm-2 control-label">Telefone</label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="telefone" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['telefone'];?>
" placeholder="Telefone">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">E-mail <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="email" class="form-control input-md" name="email" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['email'];?>
" placeholder="E-mail">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="nif" class="col-sm-2 control-label">NIF </label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="nif" value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['nif'];?>
" placeholder="NIF">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Password <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="password" class="form-control input-md" name="password" placeholder="Password">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Nova Password <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="password" class="form-control input-md" name="novapassword" placeholder="Nova Password">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Confirmar Password <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="password" class="form-control input-md" name="confpassword" placeholder="Confirmar Password">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10"> 
									<button type="submit" class="btn btn-default round btn-sm">
										<i class="fa fa-save mr-5"></i>
										Guardar
									</button>
								</div>
							</div><!-- end form-group -->
						</div><!-- end col -->

					</div><!-- end row -->
				</div><!-- end col -->
			</div><!-- end row -->                
		</div><!-- end container -->
	</section>
	<!-- end section -->

	<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/users/edit.js"></script>

	<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
