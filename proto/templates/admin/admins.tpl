{include file='admin/common/header.tpl'}

<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Gestão de Administradores</h3>
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
            <form class="form-horizontal form-label-left input_mask">

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Nome:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Nome do Administrador">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Email:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Email do Administrador">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Data de Cessação</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12 xdisplay_inputx form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Data de Cessação" aria-describedby="inputSuccess2Status4">
                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                  <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Estado:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control">
                    <option>Escolha uma opção</option>
                    <option>Ativo</option>
                    <option>Inativo</option>
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

    <!-- Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">

          <div class="x_title">
            <h2>Administradores</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><div class="x_content">
                <a href="{$BASE_URL}pages/admin/admin_add.php"type="button" class="btn btn-round btn-success btn-xs">Adicionar</a>
              </div>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        
        <div class="x_content">
          <p>Administradores da loja</p>
          <!-- start of list -->
          {if $allAdmins}
          <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 2%">ID</th>
                <th style="width: 40%">Nome do Administrador</th>
                <th style="width: 18%">Data de Cessação</th>
                <th style="width: 10%">Estado</th>
                <th style="width: 20%">#Editar</th>
              </tr>
            </thead>
            <tbody>
              {foreach $allAdmins as $admin}
              <tr>
                <td>{$admin.administradorid}</td>
                <td>
                  <a>{$admin.nome}</a>
                </td>
                <td>
                  {if $admin.datacessacao}
                    <a>{$admin.datacessacao|date_format:$parsedata.data}</a>
                  {else}
                    <a>N/A</a>
                  {/if}
                </td>
                <td>
                  {if $admin.ativo}
                    <button type="button" class="btn btn-success btn-xs">Ativo</button>
                  {else}
                    <button type="button" class="btn btn-warning btn-xs">Inativo</button>
                  {/if}
                </td>
                <td>
                  <a href="{$BASE_URL}pages/admin/admin_edit.php?username={$admin.username}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver / Editar </a>
                  <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-warning"></i> Banir </a>
                </td>
              </tr>
              {/foreach}
              </tbody>
            </table>
            {else}
              <span>Não existem Administradores</span>
            {/if}
            <!-- end of list -->
          </div>

        </div>
      </div>
    </div>
    <!-- end of Content -->
  </div>
</div>
<!-- /page content -->
{include file='admin/common/footer.tpl'}