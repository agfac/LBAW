<?php /* Smarty version Smarty-3.1.15, created on 2017-05-29 21:34:11
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/owner/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1007510021592c85c30bdd51-17263855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2bb237e47c8dc823f0477f4523738582be720565' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/owner/home.tpl',
      1 => 1495438243,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1007510021592c85c30bdd51-17263855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'infoHome' => 0,
    'bestOrder' => 0,
    'lastOrder' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592c85c3133b71_78237389',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592c85c3133b71_78237389')) {function content_592c85c3133b71_78237389($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('owner/common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="row top_tiles" style="margin: 10px 0;">
    <div class="col-md-3 col-sm-3 col-xs-6 tile">
      <span>Número de Publicações</span>
      <h2><?php echo $_smarty_tpl->tpl_vars['infoHome']->value['publicationsNumber'];?>
</h2>
      <span class="sparkline_one" style="height: 160px;">
        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
      </span>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile">
      <span>Total de Vendas</span>
      <h2><?php echo $_smarty_tpl->tpl_vars['infoHome']->value['totalValueOfOrders'];?>
€</h2>
      <span class="sparkline_one" style="height: 160px;">
        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
      </span>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile">
      <span>Número de Clientes</span>
      <h2><?php echo $_smarty_tpl->tpl_vars['infoHome']->value['totalNumberOfClients'];?>
</h2>
      <span class="sparkline_three" style="height: 160px;">
        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
      </span>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile">
      <span>Número de Encomendas</span>
      <h2><?php echo $_smarty_tpl->tpl_vars['infoHome']->value['totalNumberOfOrders'];?>
</h2>
      <span class="sparkline_one" style="height: 160px;">
        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
      </span>
    </div>
  </div>
  <br />
  <!-- /top tiles -->

  <!-- 2nd -->
  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Estatísticas de vendas</h2>
          <div class="filter">
            <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
              <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
              <span></span> <b class="caret"></b>
            </div>
          </div>
          
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <!-- <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_title">
              <h2>Encomendas nos últimos 7 dias</h2>
              <div class="clearfix"></div>
            </div>
            <div class="demo-container" style="height:280px">
              <div id="chart_plot_02" class="demo-placeholder"></div>
            </div>
            <div class="tiles">
              <div class="clearfix"></div>
            </div>
          </div> -->

          <div class="col-md-6 col-sm-12 col-xs-12">
            <div>
              <div class="x_title">
                <h2 >Top 5 Encomendas <small class="top5ordersTitle">Últimos 7 dias</small></h2>
                <div class="clearfix"></div>
              </div>
              <ul class="list-unstyled top_profiles scroll-view">
                <div class="top5orders">
                  <?php if ($_smarty_tpl->tpl_vars['infoHome']->value['best5Orders']) {?>
                  <?php  $_smarty_tpl->tpl_vars['bestOrder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['bestOrder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infoHome']->value['best5Orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['bestOrder']->key => $_smarty_tpl->tpl_vars['bestOrder']->value) {
$_smarty_tpl->tpl_vars['bestOrder']->_loop = true;
?>
                  <li class="media event">
                    <a class="pull-left border-aero profile_thumb">
                      <i class="fa fa-user aero"></i>
                    </a>
                    <div class="media-body">
                      <a class="title"><?php echo $_smarty_tpl->tpl_vars['bestOrder']->value['nomecliente'];?>
</a>
                      <p><strong><?php echo $_smarty_tpl->tpl_vars['bestOrder']->value['total'];?>
€. </strong> Pagos na encomenda </p>
                      <p> <small><?php echo $_smarty_tpl->tpl_vars['bestOrder']->value['nrEncomendasHoje'];?>
 Encomenda(s) hoje</small>
                      </p>
                    </div>
                  </li>
                  <?php } ?>
                  <?php } else { ?>
                  <li class="media event">
                    <div class="media-body">
                      <a class="title">Sem encomendas entre as datas selecionadas</a>
                    </div>
                  </li>
                  <?php }?>
                </div>
              </ul>
            </div>
          </div>

          <div class="col-md-6 col-sm-12 col-xs-12">
            <div>
              <div class="x_title">
                <h2 >Últimas 5 Publicações vendidas <small class="last5ordersTitle">Últimos 7 dias</small></h2>
                <div class="clearfix"></div>
              </div>
              <ul class="list-unstyled top_profiles scroll-view">
                <div class="last5orders">
                  <?php if ($_smarty_tpl->tpl_vars['infoHome']->value['getLast5Orders']) {?>
                  <?php  $_smarty_tpl->tpl_vars['lastOrder'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lastOrder']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infoHome']->value['getLast5Orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lastOrder']->key => $_smarty_tpl->tpl_vars['lastOrder']->value) {
$_smarty_tpl->tpl_vars['lastOrder']->_loop = true;
?>
                  <li class="media event">
                    <a class="pull-left border-aero profile_thumb">
                      <i class="fa fa-book aero"></i>
                    </a>
                    <div class="media-body">
                      <a class="title"><h5><?php echo $_smarty_tpl->tpl_vars['lastOrder']->value['titulopublicacao'];?>
</h5></a>
                      <p>Preço publicação <strong><?php echo $_smarty_tpl->tpl_vars['lastOrder']->value['total'];?>
 €</strong> </p>
                    </p>
                  </div>
                </li>
                <?php } ?>
                <?php } else { ?>
                <li class="media event">
                  <div class="media-body">
                    <a class="title">Sem publicações vendidas entre as datas selecionadas</a>
                  </div>
                </li>
                <?php }?>
              </div>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->
<?php echo $_smarty_tpl->getSubTemplate ('owner/common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/owner/home.js"></script><?php }} ?>
