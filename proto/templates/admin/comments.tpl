{include file='admin/common/header.tpl'}
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Gestão de Comentários</h3>
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
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Nome do Cliente:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Nome do Cliente">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Email do Cliente:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Email do Cliente">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Nome da Publicação:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" placeholder="Nome da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-0 col-xs-12">Ordenar:</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control">
                    <option>Escolha uma opção</option>
                    <option>Melhor classificado</option>
                    <option>Menor classificado</option>
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
            <h2>Comentários e Classificações</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <p>Comentários das publicações na loja</p>
            <!-- start of list -->
            <table class="table table-striped projects">
              <thead>
                <tr>
                  <th style="width: 2%">ID</th>
                  <th style="width: 15%">Nome do livro</th>
                  <th style="width: 15%">Nome do Cliente</th>
                  <th style="width: 10%">Classificação</th>
                  <th style="width: 20%">Comentário</th>
                  <th style="width: 15%">#Editar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <a>Maria Adelaide Ribeiro</a>
                  </td>
                  <td>
                    <a>Arte Portuguesa no Século XX</a>
                  </td>
                  <td>
                    <a class="fa fa-star"> 1</a>
                  </td>
                  <td>
                    <a>Não gostei nada do livro, penso que foi dinheiro mal gasto.</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eleminar </a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <a>Teresa de Jesus Teixeira Ferreira</a>
                  </td>
                  <td>
                    <a>O Amor É Contagioso</a>
                  </td>
                  <td>
                    <a class="fa fa-star"> 1</a>
                  </td>
                  <td>
                    <a>Deveria ter gasto o dinheiro em outro livro.</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eleminar </a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <a>Maria Adelaide Ribeiro</a>
                  </td>
                  <td>
                    <a>O feitiço de Marraquexe</a>
                  </td>
                  <td>
                    <a class="fa fa-star"> 4</a>
                  </td>
                  <td>
                    <a>Achei bastante interessante, faltava no final uma conclusao para valer as 5 estrelas</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eleminar </a>
                  </td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <a>Fernando Jose Costa Matosl</a>
                  </td>
                  <td>
                    <a>Arte Portuguesa no Século XX</a>
                  </td>
                  <td>
                    <a class="fa fa-star"> 3</a>
                  </td>
                  <td>
                    <a>Não está mau, mas tambem não está bom, poderia ser melhor</a>
                  </td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Ver </a>
                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Eleminar </a>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- end list -->
          </div>
        </div>
      </div>
    </div>
    <!-- end of Content -->
  </div>
</div>
<!-- /page content -->

{include file='admin/common/footer.tpl'}