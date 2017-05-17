{include file='admin/common/header.tpl'}

<!-- page content -->
<div class="right_col" role="main">
	<div class="row top_tiles">
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-sign-in"></i></div>
				<div class="count">{$infoHome.nrOfLastClients}</div>
				<h3>Novos Registos</h3>
				<p>Número de novos clientes nos últimos 7 dias.</p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-comments-o"></i></div>
				<div class="count">{$infoHome.nrOfLastComments}</div>
				<h3>Novos comentários</h3>
				<p>Número de novos comentários nos últimos 7 dias.</p>
			</div>
		</div>
		<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
			<div class="tile-stats">
				<div class="icon"><i class="fa fa-eye"></i></div>
				<div class="count">{$infoHome.nrOfLastLogs}</div>
				<h3>Novos visitantes</h3>
				<p>Número de novos visitantes nos últimos 7 dias.</p>
			</div>
		</div>
	</div>
	<!-- /top tiles -->

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="row x_title">
				<div class="col-md-6">
					<h3>Registo de atividades</h3>
				</div>
				<div class="col-md-6">
					<div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
						<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
						<span></span> <b class="caret"></b>
					</div>
				</div>
			</div>

			<!-- <div class="col-md-12 col-sm-12 col-xs-12">
				<div id="chart_plot_01" class="demo-placeholder"></div>
			</div> -->
			<div class="clearfix"></div>
		</div>
		<div class="col-md-4">
			<div class="x_panel">
				<div class="x_title">
					<h2>Top Usuários <small>Encomendas</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Joao Americo Pereira Ribeiro</a>
							<p>Efetuou <strong>453€</strong> em encomendas nos últimos 7 dias.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Antonio Joaquim dos Santos Teixeira</a>
							<p>Efetuou <strong>392€</strong> em encomendas nos últimos 7 dias.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Eduardo Paredes da Silva</a>
							<p>Efetuou <strong>281€</strong> em encomendas nos últimos 7 dias.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Alexandre Jose Ribeiro Gaspar</a>
							<p>Efetuou <strong>190€</strong> em encomendas nos últimos 7 dias.</p>
						</div>
					</article>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="x_panel">
				<div class="x_title">
					<h2>Últimos Comentários</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Joao Americo Pereira Ribeiro</a>
							<p>Não gostei nada do livro, penso que foi dinheiro mal gasto.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Eduardo Paredes da Silva</a>
							<p>Deveria ter gasto o dinheiro em outro livro.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Antonio Joaquim dos Santos Teixeira</a>
							<p>Poderia ter gasto dinheiro noutro livro melhor.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Antonio Joaquim dos Santos Teixeira</a>
							<p>Não está mau, mas tambem não está bom, poderia ser melhor.</p>
						</div>
					</article>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="x_panel">
				<div class="x_title">
					<h2>Top Livros <small>mais comprados</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Tenha Um Bom Dia!</a>
							<p>Foram vendidos <strong>3</strong> exemplares nos últimos 7 dias.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Os Últimos Dias de Estaline</a>
							<p>Foram vendidos <strong>2</strong> exemplares nos últimos 7 dias.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">Jorge Sampaio - Uma Biografia - 2.º volume</a>
							<p>Foram vendidos <strong>1</strong> exemplares nos últimos 7 dias.</p>
						</div>
					</article>
					<article class="media event">
						<a class="pull-left border-aero profile_thumb">
							<i class="fa fa-user aero"></i>
						</a>
						<div class="media-body">
							<a class="title" href="#">O Beijo da Palavrinha</a>
							<p>Foram vendidos <strong>1</strong> exemplares nos últimos 7 dias.</p>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

{include file='admin/common/footer.tpl'}
<script src="{$BASE_URL}javascript/admin/home.js"></script>