<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:48:17
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/users/register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6433354885929d0d1a8f165-09981608%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5449b980f23c7b3c96309859478e7e743ae631b6' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/users/register.tpl',
      1 => 1496087237,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6433354885929d0d1a8f165-09981608',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5929d0d1afe4f8_84242305',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'newpublication' => 0,
    'FORM_VALUES' => 0,
    'GENDER_ARRAY' => 0,
    'DAY_ARRAY' => 0,
    'MONTH_ARRAY' => 0,
    'MONTH_NAMES_ARRAY' => 0,
    'YEAR_ARRAY' => 0,
    'countries' => 0,
    'key' => 0,
    'label' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929d0d1afe4f8_84242305')) {function content_5929d0d1afe4f8_84242305($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include '/Applications/MAMP/htdocs/LBAW/proto/lib/smarty/plugins/function.html_radios.php';
if (!is_callable('smarty_function_html_options')) include '/Applications/MAMP/htdocs/LBAW/proto/lib/smarty/plugins/function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- start section -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Página inicial</a></li>
          <li class="active">Registo</li>
        </ul><!-- end breadcrumb -->
      </div><!-- end col -->    
    </div><!-- end row -->
  </div><!-- end container -->
</div><!-- end breadcrumbs -->
<section class="section white-backgorund">
  <div class="container">
    <div class="row">

      <!-- start sidebar -->
      <div class="col-sm-3">
        <div class="widget">
          <h6 class="subtitle">Novidades</h6>
          <figure>
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['newpublication']->value['publicacaoid'];?>
">
              <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['newpublication']->value['url'];?>
" alt="collection">
            </a>
          </figure>
        </div><!-- end widget -->
      </div><!-- end col -->
      <!-- end sidebar -->

      <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-12 text-left">
            <h2 class="title">Criar uma conta nova</h2>
          </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-5"><hr class="spacer-20 no-border">

        <div class="row">
          <div class="col-sm-12 col-md-10 col-lg-12">
            <form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="post" class="form-horizontal">
              <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input type="text" class="form-control input-md" name="nome" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['nome'];?>
" placeholder="Nome">
                </div>
              </div><!-- end form-group -->
              <div class="form-group">
                <label for="genero" class="col-sm-2 control-label">Género<span class="text-danger">*</span></label>
                <div class="checkbox-input mb-10">
                  <?php echo smarty_function_html_radios(array('name'=>'genero','options'=>$_smarty_tpl->tpl_vars['GENDER_ARRAY']->value,'class'=>"row-gender-edit"),$_smarty_tpl);?>

                </div>
              </div><!-- end form-group -->
              <div class="form-group">
               <label for="dataNascimento" class="col-sm-2 control-label">Data de Nascimento<span class="text-danger">*</span></label>
               <div class="col-sm-2">
                <select class="form-control" name="diaNasc">
                  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['DAY_ARRAY']->value),$_smarty_tpl);?>

                </select>
              </div><!-- end col -->
              <div class="col-sm-2">
                <select class="form-control" name="mesNasc">
                    <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['MONTH_ARRAY']->value,'output'=>$_smarty_tpl->tpl_vars['MONTH_NAMES_ARRAY']->value),$_smarty_tpl);?>

                  </select>
              </div><!-- end col -->
              <div class="col-sm-2">
                <select class="form-control" name="anoNasc">
                    <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['YEAR_ARRAY']->value),$_smarty_tpl);?>

                  </select>
                </select>
              </div><!-- end col -->
            </div>
            <div class="form-group">
              <label for="morada" class="col-sm-2 control-label">Morada<span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-md" name="morada" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['morada'];?>
" placeholder="Morada">
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <label for="localidade" class="col-sm-2 control-label">Localidade<span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-md" name="localidade" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['localidade'];?>
" placeholder="Localidade">
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <label for="codigoPostal" class="col-sm-2 control-label">Código-Postal<span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text" id="row-codpost" class="form-control input-md" name="cod1" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['cod1'];?>
" placeholder="Cod1">
                <input type="text" id="row-codpost" class="form-control input-md" name="cod2" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['cod2'];?>
" placeholder="Cod2">
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <label for="pais" class="col-sm-2 control-label">País<span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <select class="form-control" name="pais">
                  <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value) {
$_smarty_tpl->tpl_vars['label']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['label']->value['nome'];?>

                  </option>
                  <?php } ?>
                </select>
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <label for="telefone" class="col-sm-2 control-label">Telefone</label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-md" name="telefone" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['telefone'];?>
" placeholder="Telefone">
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <label for="email" class="col-sm-2 control-label">E-mail <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="email" class="form-control input-md" name="email" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
" placeholder="E-mail">
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <label for="nif" class="col-sm-2 control-label">NIF <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-md" name="nif" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['nif'];?>
" placeholder="NIF">
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="text" class="form-control input-md" name="username" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['username'];?>
" placeholder="Username">
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input type="password" class="form-control input-md" name="password" placeholder="Password">
              </div>
            </div><!-- end form-group -->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default round btn-md">
                  <i class="fa fa-user-plus mr-5"></i>
                  Registar
                </button>
              </div>
            </div><!-- end form-group -->
          </form>
        </div><!-- end col -->
      </div><!-- end row -->
    </div><!-- end col -->
  </div><!-- end row -->                
</div><!-- end container -->
</section>
<!-- end section -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/users/register.js"></script>
<?php }} ?>
