{include file='owner/common/header.tpl'}
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Gestão de Encomendas</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <!-- Filters -->
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Filtros de pesquisa</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left input_mask">

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Nome Cliente:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Nome do Cliente">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Email Cliente:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Nome do Cliente">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">ID:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="ID da encomenda">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Estado:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control">
                    <option>Escolha uma opção</option>
                    <option>Em processamento</option>
                    <option>Processada</option>
                    <option>Enviada</option>
                    <option>Devolvida</option>
                  </select>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset">
                  <button class="btn btn-primary" type="reset">Limpar</button>
                  <button type="submit" class="btn btn-success">Submeter</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Filters -->

    <!-- Orders -->
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Encomendas</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <p>Encomendas listadas da loja</p>
            <!-- start of orders list -->
            {if $allOrders}
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 1%">ID</th>
                  <th style="width: 30%">Nome cliente</th>
                  <th>Preço Total</th>
                  <th>Estado</th>
                  <th>Data</th>
                  <th style="width: 15%">#Editar</th>
                </tr>
              </thead>
              <tbody>
                {foreach $allOrders as $order}
                <tr>
                  <td>{$order.encomendaid}</td>
                  <td>
                    <a>{$order.nomecliente}</a>
                  </td>
                  <td>
                    <a>{$order.total|string_format:"%.2f"} €</a>
                  </td>
                  <td>
                    {if $order.estado == "Em processamento"}
                    <button type="button" class="btn btn-info btn-xs">Em processamento</button>
                    {else if $order.estado == "Processada"}
                    <button type="button" class="btn btn-primary btn-xs">Processada</button>
                    {else if $order.estado == "Enviada"}
                    <button type="button" class="btn btn-success btn-xs">Enviada</button>
                    {else}
                    <button type="button" class="btn btn-warning btn-xs">Cancelada</button>
                    {/if}
                  </td>
                  <td>
                    <a>{$order.data|date_format:$parsedata.fulldata}</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                  </td>
                </tr>
                {/foreach}
              </tbody>
            </table>
            {else}
              <span>Não existem Encomendas</span>
            {/if}
            <!-- end of orders list -->
          </div>
        </div>
      </div>
    </div>
    <!-- end of Orders -->
  </div>
</div>
<!-- /page content -->
{include file='owner/common/footer.tpl'}