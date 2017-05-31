<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:00:19
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/users/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1201097671592aa17ee616d9-43991769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de6f01fe12784083d3986966be120772936368df' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/users/my-account.tpl',
      1 => 1496087987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1201097671592aa17ee616d9-43991769',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592aa17eebe422_88942055',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592aa17eebe422_88942055')) {function content_592aa17eebe422_88942055($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Página inicial</a></li>
                    <li class="active">Minha conta</li>
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
                        <h2 class="title">Minha conta</h2>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-5"><hr class="spacer-20 no-border">

                <div class="row">
                    <div class="col-sm-12">
                        <p>Olá <strong><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</strong>! podes mudar a tua informação <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/user-information.php">aqui</a></p>

                        <hr class="spacer-30 no-border">

                        </div><!-- end owl carousel -->

                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->                
    </div><!-- end container -->
</section>
<!-- end section -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
