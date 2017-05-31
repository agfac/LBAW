<?php /* Smarty version Smarty-3.1.15, created on 2017-04-06 16:44:55
         compiled from "/opt/lbaw/lbaw1633/public_html/frmk/templates/common/menu_logged_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18926269458e662775cbf47-25971429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b258de341dae791f18c97d194902f6fffdc6a47' => 
    array (
      0 => '/opt/lbaw/lbaw1633/public_html/frmk/templates/common/menu_logged_in.tpl',
      1 => 1386927924,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18926269458e662775cbf47-25971429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_58e662777529b7_15601168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58e662777529b7_15601168')) {function content_58e662777529b7_15601168($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">Logout</a>
<span class="username"><?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
</span>
<?php }} ?>
