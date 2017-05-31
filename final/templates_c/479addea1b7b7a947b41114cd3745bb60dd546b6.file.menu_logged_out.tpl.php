<?php /* Smarty version Smarty-3.1.15, created on 2017-05-27 12:34:23
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/common/menu_logged_out.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14069800135929643fb22f00-52326178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '479addea1b7b7a947b41114cd3745bb60dd546b6' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/common/menu_logged_out.tpl',
      1 => 1495839776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14069800135929643fb22f00-52326178',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5929643fb29c06_49618662',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929643fb29c06_49618662')) {function content_5929643fb29c06_49618662($_smarty_tpl) {?><li class="linkdown">
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/login.php">
    <i class="fa fa-user mr-5"></i>
    <span class="hidden-xs">
      Login
    </span>
  </a>
</li>
<li class="linkdown">
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php">
    <i class="fa fa-user-plus mr-5"></i>
    <span class="hidden-xs">
      Criar conta
    </span>
  </a>
</li>
<li class="linkdown">
</li>
</ul>
</div><!-- end container -->
</div>
  <!-- end topBar --><?php }} ?>
