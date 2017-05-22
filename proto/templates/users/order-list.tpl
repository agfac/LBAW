{include file='common/header.tpl'}

<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul>
					<li><a href="{$BASE_URL}">Página inicial</a></li>
					<li><a href="#">Páginas</a></li>
					<li class="active">Minhas Encomendas</li>
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
						<h2 class="title">Minhas encomendas</h2>
					</div><!-- end col -->
				</div><!-- end row -->
				
				<hr class="spacer-5"><hr class="spacer-20 no-border">
				
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">    
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Preço</th>
										<th>Data</th>
										<th>Estado</th>
									</tr>
								</thead>
								<tbody>
									{assign var=val value=0}
									{foreach $orders as $order}
									<tr>
										<td>
											{$order.encomendaid}
										</td>
										<td>
											<span>€{$order.total}</span>
										</td>
										<td>
											{$days.$val}
											{if $months.$val eq '01'}
											JAN
											{elseif $months.$val eq '02'}
											FEV
											{elseif $months.$val eq '03'}
											MAR
											{elseif $months.$val eq '04'}
											ABR
											{elseif $months.$val eq '05'}
											MAI
											{elseif $months.$val eq '06'}
											JUN
											{elseif $months.$val eq '07'}
											JUL
											{elseif $months.$val eq '08'}
											AGO
											{elseif $months.$val eq '09'}
											SET
											{elseif $months.$val eq '10'}
											OUT
											{elseif $months.$val eq '11'}
											NOV
											{elseif $months.$val eq '12'}
											DEZ
											{/if}
											{$years.$val}
										</td>
										<td>
											{if $order.estado eq 'Enviada'} 
											<span class="label label-success">
											{elseif $order.estado eq 'Processada'} 
											<span class="label label-info">
											{elseif $order.estado eq 'Devolvida'} 
											<span class="label label-default">
											{elseif $order.estado eq 'Em processamento'}
											<span class="label label-warning">
											{elseif $order.estado eq 'Cancelada'}
											<span class="label label-danger">
											{/if}
											{$order.estado}</span>
										</td>
									</tr>
									{assign var=val value=$val+1}
									{/foreach}
								</tbody>
							</table><!-- end table -->
						</div><!-- end table-responsive -->
						
						<hr class="spacer-10 no-border">
						
						<a href="{$BASE_URL}" class="btn btn-light semi-circle btn-sm">
							<i class="fa fa-arrow-left mr-5"></i> Continuar a comprar
						</a>
					</div><!-- end col -->
				</div><!-- end row -->
			</div><!-- end col -->
		</div><!-- end row -->                
	</div><!-- end container -->
</section>
<!-- end section -->

{include file='common/footer.tpl'}