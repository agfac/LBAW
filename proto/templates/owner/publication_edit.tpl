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
            <h2>Editar Publicação: <span>{$publicationData.titulo}</span></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            <form class="form-horizontal form-label-left input_mask">

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Nome </label>
                <div class="col-md-10 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="titulo" required="required" value="{$publicationData.titulo}" placeholder="Nome da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Descrição </span>
                </label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                  <textarea class="form-control" rows="3" name="descricao" placeholder="Descrição da Publicação">{$publicationData.descricao}</textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Editora </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="editora" required="required" value="{$publicationData.nome_editora}" placeholder="Nome da Editora da Publicação">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Sub-Categoria </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="subcategoria" required="required" value="{$publicationData.nome_subcategoria}" placeholder="Nome da Sub-Categoria da Publicação">
                </div>
              </div>

              <div class="form-group">
                <!-- DATA -->
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Data da Publicação
                </label>
                <div class="col-md-4 col-sm-6 col-xs-12 has-feedback">
                  <input type="text" class="form-control has-feedback-left" name="datapublicacao" value="{$publicationData.datapublicacao}" aria-describedby="inputSuccess2Status4">
                  <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                  <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Stock </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" class="form-control" name="stock" required="required" value="{$publicationData.stock}" placeholder="Stock da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Peso (gr)</label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" class="form-control" name="peso" required="required" value="{$publicationData.peso}" placeholder="Peso da Publicação (gr)">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Páginas </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" class="form-control" name="nrpaginas" value="{$publicationData.paginas}" placeholder="Número de páginas da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Preço </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" step="0.01" class="form-control" name="preco" required="required" value="{$publicationData.preco}" placeholder="Preço da Publicação">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Preço Promocional </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" step="0.01" class="form-control" name="precopromocional" value="{$publicationData.precopromocional}" placeholder="Preço Promocional da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Código de Barras </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="number" class="form-control" name="codigobarras" required="required" value="{$publicationData.codigobarras}" placeholder="Código de Barras da Publicação">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">ISBN </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="isbn" value="{$publicationData.isbn}" placeholder="ISBN da Publicação">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-2 col-sm-3 col-xs-12">Edição </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="edicao" value="{$publicationData.edicao}" placeholder="Edição da Publicação">
                </div>

                <label class="control-label col-md-2 col-sm-3 col-xs-12">Periodicidade </label>
                <div class="col-md-4 col-sm-3 col-xs-12">
                  <select class="form-control">
                    <option>Escolha uma opção</option>
                    {if $publicationData.periodicidade == "Diário"}
                    <option value="diario" selected>Diário</option>
                    {else}
                    <option value="diario">Diário</option>
                    {/if}
                    {if $publicationData.periodicidade == "Semanal"}
                    <option value="semanal" selected>Semanal</option>
                    {else}
                    <option value="semanal">Semanal</option>
                    {/if}
                    {if $publicationData.periodicidade == "Mensal"}
                    <option value="mensal" selected>Mensal</option>
                    {else}
                    <option value="mensal">Mensal</option>
                    {/if}
                    {if $publicationData.periodicidade == "Anual"}
                    <option value="mensal" selected>Anual</option>
                    {else}
                    <option value="mensal">Anual</option>
                    {/if}
                  </select>
                </div>
              </div>

              <div class="form-group">
                <p>Imagens do Produto</p>
                <div class="col-md-55">
                  <div class="thumbnail">
                    <div class="image view view-first">
                      <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                      <div class="mask">
                        <p>Your Text</p>
                        <div class="tools tools-bottom">
                          <a href="#"><i class="fa fa-link"></i></a>
                          <a href="#"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="caption">
                      <p>Imagem 1</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-55">
                  <div class="thumbnail">
                    <div class="image view view-first">
                      <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                      <div class="mask">
                        <p>Your Text</p>
                        <div class="tools tools-bottom">
                          <a href="#"><i class="fa fa-link"></i></a>
                          <a href="#"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="caption">
                      <p>Imagem 2</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-55">
                  <div class="thumbnail">
                    <div class="image view view-first">
                      <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                      <div class="mask">
                        <p>Your Text</p>
                        <div class="tools tools-bottom">
                          <a href="#"><i class="fa fa-link"></i></a>
                          <a href="#"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="caption">
                      <p>Imagem 3</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-55">
                  <div class="thumbnail">
                    <div class="image view view-first">
                      <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                      <div class="mask">
                        <p>Your Text</p>
                        <div class="tools tools-bottom">
                          <a href="#"><i class="fa fa-link"></i></a>
                          <a href="#"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="caption">
                      <p>Imagem 4</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-55">
                  <div class="thumbnail">
                    <div class="image view view-first">
                      <img style="width: 100%; display: block;" src="images/media.jpg" alt="image" />
                      <div class="mask">
                        <p>Your Text</p>
                        <div class="tools tools-bottom">
                          <a href="#"><i class="fa fa-link"></i></a>
                          <a href="#"><i class="fa fa-pencil"></i></a>
                          <a href="#"><i class="fa fa-times"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="caption">
                      <p>Imagem 5</p>
                    </div>
                  </div>
                </div>
              </div>

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