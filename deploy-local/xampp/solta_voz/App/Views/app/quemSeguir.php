<nav class="navbar navbar-expand-lg menu">
	<div class="container">
	  <div class="navbar-nav">
	  	<a class="menuItem" href="/solta_voz/timeline">
	  		Home
	  	</a>

	  	<a class="menuItem" href="/solta_voz/sair">
	  		Sair
	  	</a>
			<img src="img/soltavoz.png" class="menuIco" />
	  </div>
	</div>
</nav>

<div class="container mt-5">
	<div class="row pt-2">
		
		<div class="col-md-3">

			<div class="perfil">
				<div class="perfilTopo">

				</div>

			<div class="perfilPainel">
							
			<div class="row mt-2 mb-2">
				<div class="col mb-2">
					<span class="perfilPainelNome"><?=$this->view->info_usuario['nome'];?></span>
				</div>
			</div>

				<div class="row mb-2">

				<div class="col">
					<span class="perfilPainelItem">Tweets</span><br />
					<span class="perfilPainelItemValor"><?=$this->view->total_tweets['total_tweet'];?></span>
				</div>

				<div class="col">
					<span class="perfilPainelItem">Seguindo</span><br />
					<span class="perfilPainelItemValor"><?=$this->view->total_seguindo['total_seguindo'];?></span>
				</div>

				<div class="col">
					<span class="perfilPainelItem">Seguidores</span><br />
					<span class="perfilPainelItemValor"><?=$this->view->total_seguidores['total_seguidores'];?></span>
				</div>

			</div>

			</div>

			</div>

		</div>

		<div class="col-md-6">
			
			<div class="row mb-2">
				<div class="col">
					<div class="card">
						<div class="card-body">
							<form method="GET" action="/solta_voz/quem_seguir">
								<div class="input-group mb-3">
									<input name="pesquisarPor" type="text" class="form-control" placeholder="Quem você está procurando?">
									<div class="input-group-append">
										<button class="btn btn-primary" type="submit">Procurar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php if(!empty($this->view->usuarios)): ?>
				<?php foreach($this->view->usuarios as $indice_arr => $usuario){ ?>
						<div class="row mb-2">
							<div class="col">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<?=$usuario['nome']?>
											</div>
										
											<div class="col-md-6 d-flex justify-content-end">
												<div>
													<?php if($usuario['seguindo_sn'] == 0) { ?>
														<a href="/solta_voz/acao?acao=seguir&id_usuario=<?=$usuario['id']?>" class="btn btn-success">Seguir</a>
													<?php } ?>
													<?php if($usuario['seguindo_sn'] == 1) { ?>
														<a href="/solta_voz/acao?acao=deixar_de_seguir&id_usuario=<?=$usuario['id']?>" class="btn btn-danger">Deixar de seguir</a>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
				<?php } ?>
			<?php else: ?>
				
			<?php endif; ?>
			
		</div>
	</div>
</div>