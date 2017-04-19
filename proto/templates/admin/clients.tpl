{include file='admin/common/header.tpl'}
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Gestão de Clientes</h3>
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
                  <input type="text" class="form-control" placeholder="Nome do cliente">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Email:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Email do cliente">
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
            <h2>Clientes</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <p>Clientes da loja</p>
            <!-- start of list -->
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 2%">ID</th>
                  <th style="width: 55%">Nome do cliente</th>
                  <th style="width: 13%">Estado</th>
                  <th style="width: 20%">#Editar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <a>Maria Adelaide Ribeiro</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-xs">Ativo</button>
                  </td>
                  <td>
                    <a href="{$BASE_URL}pages/admin/client_edit.php" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver/Editar </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-warning"></i> Banir </a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <a>Fernando Jose Costa Matosl</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-xs">Ativo</button>
                  </td>
                  <td>
                    <a href="{$BASE_URL}pages/admin/client_edit.php" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver/Editar </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-warning"></i> Banir </a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <a>Teresa de Jesus Teixeira Ferreira</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-xs">Ativo</button>
                  </td>
                  <td>
                    <a href="{$BASE_URL}pages/admin/client_edit.php" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver/Editar </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-warning"></i> Banir </a>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <a>Jorge Manuel Rodrigues Goncalves</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-warning btn-xs">Inativo</button>
                  </td>
                  <td>
                    <a href="{$BASE_URL}pages/admin/client_edit.php" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver/Editar </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-warning"></i> Banir </a>
                  </td>
                </tr>
              </tbody>
            </table>
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