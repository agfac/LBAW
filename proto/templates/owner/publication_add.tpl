{include file='owner/common/header.tpl'}
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Gestão de Publicações</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <!-- Content -->
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

          <div class="x_title">
            <h2>Adicionar nova Publicação</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form action="{$BASE_URL}actions/owner/publication_add.php" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left input_mask">

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Titulo <span class="required">*</span></label>
                <div class="col-md-10 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" required="required" name="titulo" value="{$FORM_VALUES.titulo}" placeholder="Titulo da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Descrição </span>
                </label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                  <textarea class="form-control" rows="3" name="descricao" placeholder="Descrição da Publicação">{$FORM_VALUES.descricao}</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Editora <span class="required">*</span></label>
                <div class="col-md-10 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" required="required" name="editora" value="{$FORM_VALUES.editora}" placeholder="Nome da Editora da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Categoria <span class="required">*</span> </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <select class="form-control" required="required" name="categoria" id="categoria" placeholder="Nome da Categoria da Publicação">
                    {foreach $allCategorys as $category}
                    <option value="{$category.categoriaid}">{$category.nome}</option>
                    {/foreach}
                  </select>
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Sub-Categoria <span class="required">*</span> </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <select class="form-control" required="required" name="subcategoria" id="subcategoria" placeholder="Nome da Sub-Categoria da Publicação">
                    {foreach $allSubCategories as $subcategory}
                    <option value="{$subcategory.subcategoriaid}">{$subcategory.nome}</option>
                    {/foreach}
                  </select>
                </div>
              </div>

              <div class="form-group">
                <!-- DATA -->
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Data da Publicação <span class="required">*</span>
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12 has-feedback">
                  <input type="text" class="form-control has-feedback-left" id="single_cal1" name="datapublicacao" required="required" placeholder="Data da Publicação" aria-describedby="inputSuccess2Status4">
                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                  <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Stock <span class="required">*</span></label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" class="form-control" required="required" name="stock" value="{$FORM_VALUES.stock}" placeholder="Stock da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Peso <span class="required">*</span></label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" class="form-control" required="required" name="peso" value="{$FORM_VALUES.stock}" placeholder="Peso da Publicação (gr)">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Páginas </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" class="form-control" name="nrpaginas" value="{$FORM_VALUES.nrpaginas}" placeholder="Número de páginas da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Preço <span class="required">*</span></label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" step="0.01" class="form-control" required="required" name="preco" value="{$FORM_VALUES.preco}" placeholder="Preço da Publicação">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Preço Promocional </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" step="0.01" class="form-control" name="precopromocional" value="{$FORM_VALUES.precopromocional}" placeholder="Preço Promocional da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Código de Barras</label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" class="form-control" name="codigobarras" value="{$FORM_VALUES.codigobarras}" placeholder="Código de Barras da Publicação">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">ISBN </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="isbn" value="{$FORM_VALUES.isbn}" placeholder="ISBN da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Edição </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="edicao" value="{$FORM_VALUES.edicao}" placeholder="Edição da Publicação">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Periodicidade </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <select class="form-control" name="periodicidade">
                    <option>Escolha uma opção</option>
                    <option value="Diario">Diário</option>
                    <option value="Semanal">Semanal</option>
                    <option value="Mensal">Mensal</option>
                    <option value="Anual">Anual</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-6 col-sm-9 col-xs-12 control-label">Novidade</span>
                </label>
                <div class="col-md-4 col-sm-9 col-xs-12">
                  <div class="radio">
                    <label>
                      <input type="radio" checked="" value="TRUE" name="novidade"> Sim
                    </label>
                    <label>
                      <input type="radio" value="FALSE" name="novidade"> Não
                    </label>
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
              <div class="ln_solid"></div>


              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Autor </label>
                <div class="col-md-10 col-sm-3 col-xs-12">
                  <select class="form-control" name="autor" id="autor" placeholder="Nome do Autor">
                    <option value="6">Sem Autor</option>
                    <option value="novoAutor">Novo Autor</option>
                    {foreach $allAutors as $autor}
                    <option value="{$autor.autorid}">{$autor.nome}</option>
                    {/foreach}
                  </select>
                </div>
              </div>

              <div class="clearfix"></div>
              <div class="ln_solid"></div>

              <div class="form-group">
                <p>Imagens do Produto</p>
                <div class="col-md-55">
                  <input type="file" name="fileUpload">
                </div>
              </div>

              <div class="clearfix"></div>
              <div class="ln_solid"></div>

              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset">
                  <a href="{$BASE_URL}pages/owner/publications.php" type="button" class="btn btn-primary">Cancelar</a>
                  <button class="btn btn-primary" type="reset">Limpar</button>
                  <button type="submit" class="btn btn-success">Submeter</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Content -->
  </div>
</div>
<!-- /page content -->
{include file='owner/common/footer.tpl'}

<script src="{$BASE_URL}javascript/owner/publication.js"></script>