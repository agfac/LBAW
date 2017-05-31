<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:50:53
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/users/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186706824959296550c6d844-52325658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c30c8f54b594aacf827c99ab8d7ecb0048f16f1c' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/users/login.tpl',
      1 => 1496091050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186706824959296550c6d844-52325658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_59296550ccc328_70946299',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'val' => 0,
    'eightnewpublications' => 0,
    'FORM_VALUES' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59296550ccc328_70946299')) {function content_59296550ccc328_70946299($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- start section -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Página inicial</a></li>
                    <li class="active">Login</li>
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
                        <?php $_smarty_tpl->tpl_vars['val'] = new Smarty_variable(0, null, 0);?>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['publicacaoid'];?>
">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['eightnewpublications']->value[$_smarty_tpl->tpl_vars['val']->value]['url'];?>
" alt="collection">
                        </a>
                    </figure>
                </div><!-- end widget -->
            </div><!-- end col -->
            <!-- end sidebar -->

            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="title">Entre na sua conta</h2>
                    </div><!-- end col -->
                </div><!-- end row -->
                <hr class="spacer-5"><hr class="spacer-20 no-border">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-lg-8">
                        <form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control input-md" name="username" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['username'];?>
">
                              </div>
                          </div><!-- end form-group -->
                          <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control input-md" name="password">
                          </div>
                      </div><!-- end form-group -->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox-input mb-10">
                                <input id="remember" class="styled" type="checkbox">
                                <label for="remember">
                                    Lembrar-me
                                </label>
                            </div><!-- end checkbox-input -->
                        </div><!-- end col -->
                        <div class="col-sm-offset-2 col-sm-10">
                            <label><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/forgot-password.php">Recuperar password</a></label>
                        </div>
                    </div><!-- end form-group -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default round btn-md">
                              <i class="fa fa-lock mr-5"></i>
                              Entrar
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
<?php }} ?>
