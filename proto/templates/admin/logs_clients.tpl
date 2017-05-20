{include file='admin/common/header.tpl'}
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Gestão de Logins</h3>
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
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Nome do Utilizador:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" id="nome_utilizador" placeholder="Nome do Cliente">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Email do Utilizador:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" id="email_utilizador" placeholder="Email do Cliente">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Data de Login</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12 xdisplay_inputx form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Data de Login" aria-describedby="inputSuccess2Status4">
                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                  <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Ordenar:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" id="ordenar">
                    <option>Escolha uma opção</option>
                    <option value="maisRecente">Data mais recente</option>
                    <option value="menosRecente">Data menos recente</option>
                  </select>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset">
                  <button class="btn btn-primary" id="clean" type="button">Limpar</button>
                  <button id="search" type="button" class="btn btn-success">Submeter</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Filters -->

    <!-- Books -->
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Dados</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="logs_content">
            <!-- start of books list -->
            {if $allLogs}
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 2%">ID</th>
                  <th style="width: 50%">Nome do Utilizador</th>
                  <th style="width: 48%">Data</th>
                </tr>
              </thead>
              <tbody>
                {foreach $allLogs as $log}
                <tr>
                  <td>{$log.loginid}</td>
                  <td>
                    <a>{$log.nome}</a>
                  </td>
                  <td>
                    <a>{$log.data|date_format:$parsedata.fulldata}</a>
                  </td>
                </tr>
                {/foreach}
              </tbody>
            </table>
            {/if}
            <!-- end of books list -->
          </div>
        </div>
      </div>
    </div>
    <!-- end of Books -->
  </div>
</div>
<!-- /page content -->
{include file='admin/common/footer.tpl'}
<script src="{$BASE_URL}javascript/admin/logs_search.js"></script>