<?php /* Smarty version Smarty-3.1.15, created on 2017-04-06 16:27:42
         compiled from "/opt/lbaw/lbaw1633/public_html/frmk/templates/common/menu_logged_out.tpl" */ ?>
<?php /*%%SmartyHeaderCode:69444651058e65e6ed15862-21388830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3007958bc4f26a20224276e7051e90332dfeeabd' => 
    array (
      0 => '/opt/lbaw/lbaw1633/public_html/frmk/templates/common/menu_logged_out.tpl',
      1 => 1386927924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69444651058e65e6ed15862-21388830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58e65e6ed20f08_55079435',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e65e6ed20f08_55079435')) {function content_58e65e6ed20f08_55079435($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php">Register</a>
<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">
  <input type="text" placeholder="username" name="username">
  <input type="password" placeholder="password" name="password">
  <input type="submit" value=">">
</form>
<?php }} ?>
