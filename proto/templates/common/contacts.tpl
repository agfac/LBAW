{include file='common/header.tpl'}

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="?page=home">Página inicial</a></li>
					<li class="active">Contacte-nos</li>
				</ul><!-- end breadcrumb -->
			</div><!-- end col -->    
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end breadcrumbs -->

<!-- start section -->
<section class="section white-backgorund">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="title-wrap">
					<h2 class="title lines">Contacte-nos</h2>
				</div>
			</div><!-- end col -->    
		</div><!-- end row -->

		<div class="row column-3">
			<div class="col-sm-6 col-md-4">
				<div class="icon-boxes style1">
					<div class="icon">
						<i class="fa fa-commenting-o text-warning"></i>
					</div><!-- end icon -->
					<div class="box-content">
						<h6 class="thin">Precisa de ajuda?</h6>
						<h5 class="text-warning">Use o nosso chat!</h5>
					</div>
				</div><!-- icon-box -->
			</div><!-- end col -->   
			<div class="col-sm-6 col-md-4">
				<div class="icon-boxes style1">
					<div class="icon">
						<i class="fa fa-phone text-info"></i>
					</div><!-- end icon -->
					<div class="box-content">
						<h6 class="thin">Pergunta rápida?</h6>
						<h5 class="text-info">Contacte-nos - 213 456 789!</h5>
					</div>
				</div><!-- icon-box -->
			</div><!-- end col -->   
			<div class="col-sm-6 col-md-4">
				<div class="icon-boxes style1">
					<div class="icon">
						<i class="fa fa-envelope-o text-success"></i>
					</div><!-- end icon -->
					<div class="box-content">
						<h6 class="thin">Ou mande-nos email</h6>
						<h5 class="text-success">apoio@awesomebookshop.pt</h5>
					</div>
				</div><!-- icon-box -->
			</div><!-- end col --> 
		</div><!-- end row -->

		<hr class="spacer-40 no-border">

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<form>
					<div class="form-group">
						<label for="name">Nome</label>
						<input type="text" id="name" class="form-control input-lg" placeholder="Name">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" id="email" class="form-control input-lg" placeholder="E-mail">
					</div>
					<div class="form-group">
						<label class="control-label" for="message">Mensagem</label>
						<textarea id="message" rows="6" class="form-control input-lg" placeholder="Messagem"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-default round btn-lg" value="Submeter">
					</div>
				</form>
			</div><!-- end col -->
		</div><!-- end row -->

	</div><!-- end container -->
</section>
<!-- end section -->

{include file='common/footer.tpl'}