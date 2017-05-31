<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 22:46:57
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/common/menu_logged_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5324872315929655f7b89c1-92556662%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b26dc7db0e69743a12b8ee791d20c24db1c482b6' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/common/menu_logged_in.tpl',
      1 => 1496094063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5324872315929655f7b89c1-92556662',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5929655f814f54_07474228',
  'variables' => 
  array (
    'USERNAME' => 0,
    'USERTYPE' => 0,
    'BASE_URL' => 0,
    'PUBLICATIONSUSERCART' => 0,
    'publicationusercart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5929655f814f54_07474228')) {function content_5929655f814f54_07474228($_smarty_tpl) {?><li class="linkdown">
  <a href="javascript:void(0);">
    <i class="fa fa-user mr-5"></i>
    <span class="hidden-xs">
      <?php echo $_smarty_tpl->tpl_vars['USERNAME']->value;?>
 
      <i class="fa fa-angle-down ml-5"></i>
    </span>
  </a>
  <ul class="w-150">
  <?php if ($_smarty_tpl->tpl_vars['USERTYPE']->value=='client') {?>
    <li>
      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/my-account.php">
        <i class="fa fa-edit mr-5"></i>
        <span class="hidden-xs">
          Minha Conta
        </span></a>
      </li>
      <li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/wishlist.php">
          <i class="fa fa-heart mr-5"></i>
          <span class="hidden-xs">
            Wishlist
          </span></a>
        </li>
        <li>
          <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/cart.php">
            <i class="fa fa-shopping-cart mr-5"></i>
            <span class="hidden-xs">
              Ver Carrinho
            </span></a>
          </li>
          <li>
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/order-list.php">
              <i class="fa fa fa-bar-chart mr-5"></i>
              <span class="hidden-xs">
                Encomendas
              </span></a>
            </li>
            <li>
              <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/checkout.php">
                <i class="fa fa-credit-card mr-5"></i>
                <span class="hidden-xs">
                  Checkout
                </span></a>
              </li>
            </ul>
          </li>
          <?php }?>
          <?php if ($_smarty_tpl->tpl_vars['USERTYPE']->value=='owner') {?>
          <li class="linkdown">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/owner/home.php">
              <i class="fa fa-pie-chart mr-5"></i>
              <span class="hidden-xs">
                Dashboard
              </span>
            </a>
          </li>
          <?php } elseif ($_smarty_tpl->tpl_vars['USERTYPE']->value=='admin') {?>
          <li class="linkdown">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admin/home.php">
              <i class="fa fa-pie-chart mr-5"></i>
              <span class="hidden-xs">
                Dashboard
              </span>
            </a>
          </li>
          <?php }?>
          <li class="linkdown">
            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php">
              <i class="fa fa-user-times mr-5"></i>
              <span class="hidden-xs">
                Logout
              </span>
            </a>
          </li>
          <?php if ($_smarty_tpl->tpl_vars['USERTYPE']->value=='client') {?>
          <li class="linkdown">
            <a href="javascript:void(0);">
              <i class="fa fa-shopping-basket mr-5"></i>  
            </a>
            <ul class="cart w-250">
              <li>
                <div class="cart-items">
                  <ol class="items">
                    <?php  $_smarty_tpl->tpl_vars['publicationusercart'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publicationusercart']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PUBLICATIONSUSERCART']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publicationusercart']->key => $_smarty_tpl->tpl_vars['publicationusercart']->value) {
$_smarty_tpl->tpl_vars['publicationusercart']->_loop = true;
?>
                    <li data-id="<?php echo $_smarty_tpl->tpl_vars['publicationusercart']->value['publicacaoid'];?>
"> 
                      <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publicationusercart']->value['publicacaoid'];?>
" class="product-image">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publicationusercart']->value['url'];?>
" alt="Sample Product ">
                      </a>
                      <div class="product-details">
                        <div class="close-icon"> 
                          <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                        </div>
                        <p class="product-name"> 
                          <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publicationusercart']->value['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['publicationusercart']->value['titulo'];?>
</a> 
                        </p>
                        <strong data-type="quantidade"><?php echo $_smarty_tpl->tpl_vars['publicationusercart']->value['quantidade'];?>
</strong> x <span class="price text-primary">€<?php echo $_smarty_tpl->tpl_vars['publicationusercart']->value['preco'];?>
</span>
                      </div><!-- end product-details -->
                    </li><!-- end item -->
                    <?php } ?>
                  </ol>
                </div>
              </li>
              <li>
                <div class="cart-footer">
                  <a href="?page=cart" class="pull-right"><i class="fa fa-cart-plus mr-5"></i>Ver Carrinho Completo</a>
                  <a href="?page=checkout" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a>
                </div>
              </li>
            </ul>
          </li>
          <?php }?>
        </ul>
      </div><!-- end container -->
    </div>
    <!-- end topBar -->

    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/users/menu_logged_in.js"></script><?php }} ?>
