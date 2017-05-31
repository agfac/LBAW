<?php /* Smarty version Smarty-3.1.15, created on 2017-05-31 23:27:52
         compiled from "/Applications/MAMP/htdocs/LBAW/proto/templates/publications/publication.tpl" */ ?>
<?php /*%%SmartyHeaderCode:348564612592aa175786d62-56072365%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d3cd358b4026f09627dcb4451ad549be5230179' => 
    array (
      0 => '/Applications/MAMP/htdocs/LBAW/proto/templates/publications/publication.tpl',
      1 => 1496230171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '348564612592aa175786d62-56072365',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_592aa17580bc49_89508816',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'publication' => 0,
    'numcomments' => 0,
    'comments' => 0,
    'comment' => 0,
    'USERNAME' => 0,
    'bought' => 0,
    'havecommented' => 0,
    'ratingvalues' => 0,
    'rating_names' => 0,
    'USER_DATA' => 0,
    'FORM_VALUES' => 0,
    'recomendations' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_592aa17580bc49_89508816')) {function content_592aa17580bc49_89508816($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include '/Applications/MAMP/htdocs/LBAW/proto/lib/smarty/plugins/function.html_radios.php';
?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Página inicial</a></li>
					<li><a><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication-list.php?subcat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_subcategoria'];?>
&cat=<?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_subcategoria'];?>
</a></li>
					<li class="active"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</li>
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
			<div class="col-sm-4">
				<div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
					<div class='carousel-inner'>
						<div class='item active'>
							<figure>
								<img src='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
' alt='Publicacao' />
							</figure>
						</div><!-- end item -->
					</div><!-- end carousel-inner -->
				</div><!-- end carousel -->
			</div><!-- end col -->
			<!-- end sidebar -->
			<div class="col-sm-8">
				<div class="row">
					<div class="col-sm-12">
						<h2 class="title"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</h2>
						<p class="text-gray alt-font">ID: <?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
</p>
						
						<ul class="list list-inline">
							<?php if ($_smarty_tpl->tpl_vars['publication']->value['preco']!=$_smarty_tpl->tpl_vars['publication']->value['precopromocional']) {?>
							<li><h6 class="text-danger text-xs">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</h6></li>
							<?php }?>
							<li><h5 class="text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
</h5></li>
							<li>
								<?php if (isset($_smarty_tpl->tpl_vars['numcomments']->value)) {?>
								<?php $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int) ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? floor(($_smarty_tpl->tpl_vars['numcomments']->value['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['numcomments']->value['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0) {
for ($_smarty_tpl->tpl_vars['value']->value = 1, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++) {
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration == 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration == $_smarty_tpl->tpl_vars['value']->total;?>
								<i class="fa fa-star text-warning"></i>
								<?php }} ?>
								<?php if ($_smarty_tpl->tpl_vars['numcomments']->value['classificacao']) {?>
								<?php if (is_numeric($_smarty_tpl->tpl_vars['numcomments']->value['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['numcomments']->value['classificacao']===(float)$_smarty_tpl->tpl_vars['numcomments']->value['classificacao']) {?>
								<?php } else { ?>
								<i class="fa fa-star-half-o text-warning"></i>
								<?php }?>
								<?php }?>
								<?php }?>
							</li>
							<li><a data-type="gotocomments">
								(
								<?php if (isset($_smarty_tpl->tpl_vars['numcomments']->value)) {?>
								<?php if ($_smarty_tpl->tpl_vars['numcomments']->value['comentarios']==1) {?> <?php echo $_smarty_tpl->tpl_vars['numcomments']->value['comentarios'];?>
 comentário
								<?php } else { ?>
								<?php echo $_smarty_tpl->tpl_vars['numcomments']->value['comentarios'];?>
 comentários
								<?php }?>
								<?php } else { ?>
								0 comentários
								<?php }?>
								)</a></li>
							</ul>
						</div><!-- end col -->
					</div><!-- end row -->

					<hr class="spacer-5"><hr class="spacer-10 no-border">

					<div class="row">
						<div class="col-sm-12">
							<p><?php echo $_smarty_tpl->tpl_vars['publication']->value['descricao'];?>
</p>
							<hr class="spacer-15">
							<div class="row">

								<div class="col-md-4 col-sm-12">
									<select class="form-control" name="select">
										<option value="" selected>Quantidade</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
									</select>
								</div><!-- end col -->
							</div><!-- end row -->
							<hr class="spacer-15">

							<ul class="list list-inline">
								<li><a class="btn btn-default btn-md round" data-type="Adicionar ao cart" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"><i class="glyphicon glyphicon-shopping-cart mr-5"></i>Adicionar ao carrinho</a></li>
								<li><a class="btn btn-gray btn-md round" data-type="Adicionar à wish" data-id="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
" data-titulo="<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
" data-price="<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
"><i class="glyphicon glyphicon-heart mr-5"></i>Adicionar à lista de desejos</a></li>
								<br><br>
								<li>Partilhar este produto: </li>
								<li>
									<ul class="social-icons style1">
										<li class="facebook"><a><i class="fa fa-facebook"></i></a></li>
										<li class="twitter"><a><i class="fa fa-twitter"></i></a></li>
										<li class="pinterest"><a><i class="fa fa-pinterest"></i></a></li>
									</ul>
								</li>
							</ul>
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end col -->
			</div><!-- end row -->

			<hr class="spacer-60">

			<div class="row">
				<div class="col-xs-12 col-sm-3">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs style2 tabs-left">
						<li class="active"><a href="#description" data-toggle="tab">Informação adicional</a></li>
						<li><a href="#reviews" data-toggle="tab">Comentários (
							<?php if (isset($_smarty_tpl->tpl_vars['numcomments']->value)) {?>
							<?php echo $_smarty_tpl->tpl_vars['numcomments']->value['comentarios'];?>

							<?php } else { ?>
							0
							<?php }?>)</a></li>
						</ul>
					</div><!-- end col -->
					<div class="col-xs-12 col-sm-9">
						<!-- Tab panes -->
						<div class="tab-content style2">
							<div class="tab-pane active" id="description">
								<h5>Informação adicional</h5>

								<hr class="spacer-15">

								<div class="row">
									<div class="col-sm-12 col-md-6">
										<dl class="dl-horizontal">
											<dt>Categoria</dt>
											<dd><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_categoria'];?>
</dd>
											<dt>Ano de publicação</dt>
											<dd><?php echo $_smarty_tpl->tpl_vars['publication']->value['datapublicacao'];?>
</dd>
											<dt>Autor</dt>
											<dd><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_autor'];?>
</dd>
										</dl>
									</div><!-- end col -->
									<div class="col-sm-12 col-md-6">
										<dl class="dl-horizontal">
											<dt>Sub-Categoria</dt>
											<dd><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_subcategoria'];?>
</dd>
											<dt>Editora</dt>
											<dd><?php echo $_smarty_tpl->tpl_vars['publication']->value['nome_editora'];?>
</dd>
											<dt>ISBN</dt>
											<dd><?php echo $_smarty_tpl->tpl_vars['publication']->value['isbn'];?>
</dd>
										</dl>
									</div><!-- end col -->
								</div><!-- end row -->
							</div><!-- end tab-pane -->
							<div class="tab-pane" id="reviews">
								<h5>
									<?php if (isset($_smarty_tpl->tpl_vars['numcomments']->value)) {?>
									<?php if ($_smarty_tpl->tpl_vars['numcomments']->value['comentarios']==1) {?> 
									<?php echo $_smarty_tpl->tpl_vars['numcomments']->value['comentarios'];?>
 comentário
									<?php } else { ?>
									<?php echo $_smarty_tpl->tpl_vars['numcomments']->value['comentarios'];?>
 comentários
									<?php }?> 
									<?php } else { ?>
									0 comentários
									<?php }?>
									para "<?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
"</h5>

									<hr class="spacer-10 no-border">
									<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
									<div class="comments">
										<div class="comment-image">
											<figure>
												<img src='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
' alt="Publicacao" />
											</figure>
										</div><!-- end comments-image -->
										<div class="comment-content">
											<div class="comment-content-head">
												<h6 class="comment-title"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</h6>
												<ul class="list list-inline comment-meta">
													<li>
														<?php $_smarty_tpl->tpl_vars['valor'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['valor']->step = 1;$_smarty_tpl->tpl_vars['valor']->total = (int) ceil(($_smarty_tpl->tpl_vars['valor']->step > 0 ? floor(($_smarty_tpl->tpl_vars['comment']->value['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['comment']->value['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['valor']->step));
if ($_smarty_tpl->tpl_vars['valor']->total > 0) {
for ($_smarty_tpl->tpl_vars['valor']->value = 1, $_smarty_tpl->tpl_vars['valor']->iteration = 1;$_smarty_tpl->tpl_vars['valor']->iteration <= $_smarty_tpl->tpl_vars['valor']->total;$_smarty_tpl->tpl_vars['valor']->value += $_smarty_tpl->tpl_vars['valor']->step, $_smarty_tpl->tpl_vars['valor']->iteration++) {
$_smarty_tpl->tpl_vars['valor']->first = $_smarty_tpl->tpl_vars['valor']->iteration == 1;$_smarty_tpl->tpl_vars['valor']->last = $_smarty_tpl->tpl_vars['valor']->iteration == $_smarty_tpl->tpl_vars['valor']->total;?>
														<i class="fa fa-star text-warning"></i>
														<?php }} ?>
														<?php if ($_smarty_tpl->tpl_vars['comment']->value['classificacao']) {?>
														<?php if (is_numeric($_smarty_tpl->tpl_vars['comment']->value['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['comment']->value['classificacao']===(float)$_smarty_tpl->tpl_vars['comment']->value['classificacao']) {?>
														<?php } else { ?>
														<i class="fa fa-star-half-o text-warning"></i>
														<?php }?>
														<?php }?>
													</li>
												</ul>
											</div><!-- end comment-content-head -->
											<p><?php echo $_smarty_tpl->tpl_vars['comment']->value['texto'];?>
</p>
											<cite><?php echo $_smarty_tpl->tpl_vars['comment']->value['nome'];?>
</cite>
										</div><!-- end comment-content -->
									</div><!-- end comments -->
									<?php } ?>

									<hr class="spacer-30">
									<?php if ($_smarty_tpl->tpl_vars['USERNAME']->value&&$_smarty_tpl->tpl_vars['bought']->value&&!$_smarty_tpl->tpl_vars['havecommented']->value) {?>
									<h5>Adicionar um comentário</h5>
									<p>Como classifica este produto?</p>

									<hr class="spacer-5 no-border">

									<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/send_comment_item.php" method="post">
										<?php echo smarty_function_html_radios(array('name'=>'classificacao','values'=>$_smarty_tpl->tpl_vars['ratingvalues']->value,'output'=>$_smarty_tpl->tpl_vars['rating_names']->value,'separator'=>'<br />'),$_smarty_tpl);?>


										<hr class="spacer-10 no-border">

										<div class="form-group">
											<label for="nome">Nome<span class="text-danger">*</span></label>
											<input type="text" name="nome" class="form-control input-md" <?php if ($_smarty_tpl->tpl_vars['USER_DATA']->value) {?>
											value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['nome'];?>
"
											<?php } else { ?>
											value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['nome'];?>
"
											<?php }?>
											placeholder="Nome">
										</div><!-- end form-group -->
										<div class="form-group">
											<label for="email">E-mail<span class="text-danger">*</span></label>
											<input type="email" name="email" class="form-control input-md" <?php if ($_smarty_tpl->tpl_vars['USER_DATA']->value) {?>
											value="<?php echo $_smarty_tpl->tpl_vars['USER_DATA']->value['email'];?>
"
											<?php } else { ?>
											value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
"
											<?php }?>
											placeholder="E-mail">
										</div><!-- end form-group -->
										<div class="form-group">
											<label for="comentario">Comentário<span class="text-danger">*</span></label>
											<textarea name="comentario" rows="5" class="form-control" placeholder="Comentário"></textarea>
										</div><!-- end form-group -->
										<div class="form-group">
											<input type="hidden" name="publicacaoid" value="<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
">
										</div><!-- end form-group -->
										<div class="form-group">
											<button type="submit" class="btn btn-default round btn-md">Submeter
											</button>
										</div><!-- end form-group -->
									</form>
									<?php }?>
								</div><!-- end tab-pane -->
							</div><!-- end tab-content -->
						</div><!-- end col -->
					</div><!-- end row -->

					<hr class="spacer-60">

					<div class="row">
						<div class="col-sm-12">
							<h4 class="mb-20">Recomendações</h4>
						</div><!-- end col -->
					</div><!-- end row -->

					<div class="row">
						<div class="col-sm-12">
							<div id="owl-demo" class="owl-carousel column-4 owl-theme">
								<?php  $_smarty_tpl->tpl_vars['publication'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['publication']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['recomendations']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['publication']->key => $_smarty_tpl->tpl_vars['publication']->value) {
$_smarty_tpl->tpl_vars['publication']->_loop = true;
?>
								<div class="item">
									<div class="thumbnail store style1">
										<div class="header">
											<figure>
												<a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
">
													<img src='<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['publication']->value['url'];?>
' alt="Publicacao">
												</a>
											</figure>
										</div>
										<div class="caption">
											<h6 class="regular"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/publications/publication.php?id=<?php echo $_smarty_tpl->tpl_vars['publication']->value['publicacaoid'];?>
"><?php echo $_smarty_tpl->tpl_vars['publication']->value['titulo'];?>
</a></h6>
											<div class="price">
												<small class="amount off">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['preco'];?>
</small>
												<span class="amount text-primary">€<?php echo $_smarty_tpl->tpl_vars['publication']->value['precopromocional'];?>
</span>
											</div>
											<span class="product-badge bottom left text-warning">
												<?php $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['val']->step = 1;$_smarty_tpl->tpl_vars['val']->total = (int) ceil(($_smarty_tpl->tpl_vars['val']->step > 0 ? floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao']))+1 - (1) : 1-(floor(($_smarty_tpl->tpl_vars['publication']->value['classificacao'])))+1)/abs($_smarty_tpl->tpl_vars['val']->step));
if ($_smarty_tpl->tpl_vars['val']->total > 0) {
for ($_smarty_tpl->tpl_vars['val']->value = 1, $_smarty_tpl->tpl_vars['val']->iteration = 1;$_smarty_tpl->tpl_vars['val']->iteration <= $_smarty_tpl->tpl_vars['val']->total;$_smarty_tpl->tpl_vars['val']->value += $_smarty_tpl->tpl_vars['val']->step, $_smarty_tpl->tpl_vars['val']->iteration++) {
$_smarty_tpl->tpl_vars['val']->first = $_smarty_tpl->tpl_vars['val']->iteration == 1;$_smarty_tpl->tpl_vars['val']->last = $_smarty_tpl->tpl_vars['val']->iteration == $_smarty_tpl->tpl_vars['val']->total;?>
												<i class="fa fa-star"></i>
												<?php }} ?>
												<?php if ($_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
												<?php if (is_numeric($_smarty_tpl->tpl_vars['publication']->value['classificacao'])&&(float)(int)$_smarty_tpl->tpl_vars['publication']->value['classificacao']===(float)$_smarty_tpl->tpl_vars['publication']->value['classificacao']) {?>
												<?php } else { ?>
												<i class="fa fa-star-half-o"></i>
												<?php }?>
												<?php }?>
											</span>
										</div><!-- end caption -->
									</div><!-- end thumbnail -->
								</div><!-- end item -->
								<?php } ?>
							</div><!-- end owl carousel -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->
			</section>
			<!-- end section -->

			<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			
			<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/publications/publication.js"></script><?php }} ?>
