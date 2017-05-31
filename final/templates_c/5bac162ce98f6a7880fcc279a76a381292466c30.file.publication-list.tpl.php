<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 11:03:02
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/publications/publication-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:81815056592bbb2729caa9-05198951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5bac162ce98f6a7880fcc279a76a381292466c30' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/publications/publication-list.tpl',
      1 => 1496052178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81815056592bbb2729caa9-05198951',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592bbb2732e3d1_93016901',
  'variables' => 
  array (
    'category' => 0,
    'c' => 0,
    'def_cat' => 0,
    'def_subcat_array' => 0,
    'sub' => 0,
    'def_subcat' => 0,
    'BASE_URL' => 0,
    'def_pubs' => 0,
    'publication' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592bbb2732e3d1_93016901')) {function content_592bbb2732e3d1_93016901($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <li><a href="?page=home">Página inicial</a></li>
                    <li class="active">Pesquisa</li>
                </ul><!-- end breadcrumb -->
            </div><!-- end col -->    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end breadcrumbs -->

<!-- start section -->
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <!-- start sidebar -->
            <div class="col-sm-3">
                <div class="widget">
                    <h6 class="subtitle">Pesquisa</h6>

                    <form>
                        <input type="text" id="lastname" class="form-control input-sm" placeholder="Pesquisa">
                    </form>
                </div><!-- end widget -->

                <div class="widget">
                   <h6 class="subtitle">Categorias</h6>
                   <select class="form-control" name="categoria" id="categoria-form">
                    <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['c']->value['nome']==$_smarty_tpl->tpl_vars['def_cat']->value) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['categoriaid'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['c']->value['nome'];?>
</option>
                    <?php } else { ?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['categoriaid'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['nome'];?>
</option>
                    <?php }?>
                    <?php } ?>
                </select>
            </div><!-- end widget -->

            <div class="widget">
               <h6 class="subtitle">Subcategorias</h6>
               <select class="form-control" name="subcategoria" id="subcategoria-form">
                   <?php  $_smarty_tpl->tpl_vars['sub'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['def_subcat_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub']->key => $_smarty_tpl->tpl_vars['sub']->value) {
$_smarty_tpl->tpl_vars['sub']->_loop = true;
?>
                   <?php if ($_smarty_tpl->tpl_vars['sub']->value['nome']==$_smarty_tpl->tpl_vars['def_subcat']->value) {?>
                   <option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value['subcategoriaid'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['sub']->value['nome'];?>
</option>
                   <?php } else { ?>
                   <option value="<?php echo $_smarty_tpl->tpl_vars['sub']->value['subcategoriaid'];?>
"><?php echo $_smarty_tpl->tpl_vars['sub']->value['nome'];?>
</option>
                   <?php }?>
                   <?php } ?>
               </select>
           </div><!-- end widget -->

           <div class="widget">
            <h6 class="subtitle">Preços</h6>
            <form method="post" id="price-filter" class="price-range" data-start-min="0" data-start-max="50" data-min="0" data-max="150" data-step="5">
                <div class="ui-range-values">
                    <div class="ui-range-value-min">
                        €<span></span>
                        <input type="hidden" id="min-val">
                    </div> -
                    <div class="ui-range-value-max">
                        €<span></span>
                        <input type="hidden" id="max-val">
                    </div>
                </div>
                <div class="ui-range-slider">
                </div>
            </form>
            <button id="price-submit" class="btn btn-default btn-block btn-sm">Filtrar Preços</button>
        </div><!-- end widget -->


        <div class="widget">
            <h6 class="subtitle">Novidades</h6>
            <figure>
                <a href="javascript:void(0);">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
img/books/books_5.jpg" alt="collection">
                </a>
            </figure>
        </div><!-- end widget -->
        <div class="widget">
            <h6 class="subtitle">Tags populares</h6>

            <ul class="tags">
                <li>
                    <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">arte</a>
                </li>
                <li>
                    <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">economia</a>
                </li>
                <li>
                    <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">gestão</a>
                </li>
                <li>
                    <a class="btn btn-gray-outline semi-circle btn-xs" href="javascript:void(0);">história</a>
                </li>
            </ul>
        </div><!-- end widget -->
    </div><!-- end col -->
    <!-- end sidebar -->
    <div class="col-sm-9">
        <div class="row">
            <div class="col-sm-12 text-left">
                <h2 class="title">Pesquisa de produtos</h2>
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="spacer-5"><hr class="spacer-20 no-border">

        <div class="col-sm-12 text-left" id="products-listing">
            <div class="sub-products-listing" >
               <table class="table" id="products-table">
                <tbody>
                    <?php if ($_smarty_tpl->tpl_vars['def_pubs']->value[0]['publicacaoid']==null) {?>
                    <p>Sem publicações sobre <?php echo $_smarty_tpl->tpl_vars['def_pubs']->value[0]['nome_subcategoria'];?>
</p>
                    <?php } else { ?>
                    <?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['def_pubs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
                    <tr>
                        <td>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"></a>
                            <img src='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
' width='70px' />
                        </td>
                        <td>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"> <?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a>
                      </td>
                      <td>
                          <h7> <?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_autor'];?>
 </h7>
                      </td>
                      <td>
                          <strike><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['publication']->value['preco']);?>
€</strike>
                      </td>
                      <td>
                          <h7><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['publication']->value['precopromocional']);?>
€</h7>
                      </td>
                  </tr>
                  <?php } ?>
                  <?php }?>
              </tbody>
          </table>
      </div>
  </div><!-- end row -->
</div><!-- end col -->   
</div>

</section>
<!-- end section -->

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/publications/filter.js"></script><?php }} ?>
