<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Gestão de Funcionários</h3>
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
                  <input type="text" class="form-control" placeholder="Nome do funcionário">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Email:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Email do funcionário">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Data de Admissão</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12 xdisplay_inputx form-group has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="Data de Admissão" aria-describedby="inputSuccess2Status4">
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
            <h2>Funcionarios</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><div class="x_content">
                <a href="?page=worker_add"type="button" class="btn btn-round btn-success btn-xs">Adicionar</a>
              </div>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <p>Funcionários da loja</p>
            <!-- start of list -->
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 2%">ID</th>
                  <th style="width: 40%">Nome do Funcionário</th>
                  <th style="width: 18%">Data de Admissão</th>
                  <th style="width: 10%">Estado</th>
                  <th style="width: 20%">#Editar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <a>Manuel Pereira Lopes</a>
                  </td>
                  <td>
                    <a>02/09/2009 12:12:50</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-xs">Ativo</button>
                  </td>
                  <td>
                    <a href="?page=worker_edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver / Editar </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-warning"></i> Banir </a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <a>Rui Manuel Fernandes Varela</a>
                  </td>
                  <td>
                    <a>15/08/2012 15:48:15</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-xs">Ativo</button>
                  </td>
                  <td>
                    <a href="?page=worker_edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver / Editar </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-warning"></i> Banir </a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <a>Emanuel Jose Costa Frade</a>
                  </td>
                  <td>
                    <a>19/11/2002 11:50:50</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-success btn-xs">Ativo</button>
                  </td>
                  <td>
                    <a href="?page=worker_edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver / Editar </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-warning"></i> Banir </a>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <a>Fernanda Goncalves Teixeira</a>
                  </td>
                  <td>
                    <a>07/05/2014 09:40:20</a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-warning btn-xs">Inativo</button>
                  </td>
                  <td>
                    <a href="?page=worker_edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Ver / Editar </a>
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