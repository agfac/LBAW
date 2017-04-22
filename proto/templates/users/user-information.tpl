{include file='common/header.tpl'}

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="?page=home">Página inicial</a></li>
					<li><a href="#">Páginas</a></li>
					<li class="active">Informação pessoal</li>
				</ul><!-- end breadcrumb -->
			</div><!-- end col -->    
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end breadcrumbs -->

<!-- start section -->
<section class="section white-backgorund">
	<div class="container">
		<div class="row">
			
			{include file='common/sidebar.tpl'}

			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-12 text-left">
						<h2 class="title">Meus dados pessoais</h2>
					</div><!-- end col -->
				</div><!-- end row -->
				
				<hr class="spacer-5"><hr class="spacer-20 no-border">
				
				<div class="row">
					<div class="col-sm-12 col-md-10 col-lg-12">
						<form action="{$BASE_URL}actions/users/register.php" method="post" class="form-horizontal">
							<div class="form-group">
								<label for="nome" class="col-sm-2 control-label">Nome<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="nome" value="{$USER_DATA.nome}" placeholder="Nome">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="genero" class="col-sm-2 control-label">Género<span class="text-danger">*</span></label>
								<div class="checkbox-input mb-10">
									<input type="radio" id="row-gender" name="genero" value="Masculino">Masculino
									<input type="radio" id="row-gender" name="genero" value="Feminino">Feminino
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="dataNascimento" class="col-sm-2 control-label">Data de Nascimento<span class="text-danger">*</span></label>
								<div class="col-sm-2">
									<select class="form-control" name="diaNasc">
										<option value="1">01</option>
										<option value="2">02</option>
										<option value="3">03</option>
										<option value="4">04</option>
										<option value="5">05</option>
										<option value="6">06</option>
										<option value="7">07</option>
										<option value="8">08</option>
										<option value="9">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
									</select>
								</div><!-- end col -->
								<div class="col-sm-2">
									<select class="form-control" name="mesNasc">
										<option value="january">Janeiro</option>
										<option value="february">Fevereiro</option>
										<option value="march">Março</option>
										<option value="april">Abril</option>
										<option value="may">Maio</option>
										<option value="june">Junho</option>
										<option value="july">Julho</option>
										<option value="agust">Agosto</option>
										<option value="september">Setembro</option>
										<option value="october">Outubro</option>
										<option value="november">Novembro</option>
										<option value="december">Dezembro</option>
									</select>
								</div><!-- end col -->
								<div class="col-sm-2">
									<select class="form-control" name="anoNasc">
										<option value="2006">2006</option>
										<option value="2005">2005</option>
										<option value="2004">2004</option>
										<option value="2003">2003</option>
										<option value="2002">2002</option>
										<option value="2001">2001</option>
										<option value="2000">2000</option>
										<option value="1999">1999</option>
										<option value="1998">1998</option>
										<option value="1997">1997</option>
										<option value="1996">1996</option>
										<option value="1995">1995</option>
										<option value="1994">1994</option>
										<option value="1993">1993</option>
										<option value="1992" selected>1992</option>
										<option value="1991">1991</option>
										<option value="1990">1990</option>
										<option value="1989">1989</option>
										<option value="1988">1988</option>
										<option value="1987">1987</option>
										<option value="1986">1986</option>
										<option value="1985">1985</option>
										<option value="1984">1984</option>
										<option value="1983">1983</option>
										<option value="1982">1982</option>
										<option value="1981">1981</option>
										<option value="1980">1980</option>
										<option value="1979">1979</option>
										<option value="1978">1978</option>
										<option value="1977">1977</option>
										<option value="1976">1976</option>
									</select>
								</div><!-- end col -->
							</div>
							<div class="form-group">
								<label for="morada" class="col-sm-2 control-label">Morada<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="morada" value="{$USER_DATA.morada}" placeholder="Morada">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="localidade" class="col-sm-2 control-label">Localidade<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="localidade" value="{$USER_DATA.localidade}" placeholder="Localidade">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="codigoPostal" class="col-sm-2 control-label">Código-Postal<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" id="row-codpost" class="form-control input-md" name="cod1" value="{$USER_DATA.cod1}" placeholder="Cod1">
									<input type="text" id="row-codpost" class="form-control input-md" name="cod2" value="{$USER_DATA.cod2}" placeholder="Cod2">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="pais" class="col-sm-2 control-label">País<span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="pais" value="{$USER_DATA.pais}" placeholder="País">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="telefone" class="col-sm-2 control-label">Telefone</label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="telefone" value="{$USER_DATA.telefone}" placeholder="Telefone">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">E-mail <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="email" class="form-control input-md" name="email" value="{$USER_DATA.email}" placeholder="E-mail">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="nif" class="col-sm-2 control-label">NIF </label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="nif" value="{$USER_DATA.nif}" placeholder="NIF">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="username" class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control input-md" name="username" value="{$USER_DATA.username}" placeholder="Username">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Password <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="password" class="form-control input-md" name="password" placeholder="Password">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Nova Password <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="password" class="form-control input-md" name="password" placeholder="Nova Password">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<label for="password" class="col-sm-2 control-label">Confirmar Password <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="password" class="form-control input-md" name="password" placeholder="Confirmar Password">
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<div class="checkbox-input checkbox-primary">
									<input id="newsletter" class="styled" type="checkbox" checked>
									<label for="newsletter">
										Desejo receber as últimas novidades
									</label>
								</div>
							</div><!-- end form-group -->
							<div class="form-group">
								<a href="javascript:void(0);" class="btn btn-default round btn-sm"><i class="fa fa-save mr-5"></i> Guardar</a>
							</div><!-- end form-group -->
						</div><!-- end col -->

					</div><!-- end row -->
				</div><!-- end col -->
			</div><!-- end row -->                
		</div><!-- end container -->
	</section>
	<!-- end section -->

	{include file='common/footer.tpl'}