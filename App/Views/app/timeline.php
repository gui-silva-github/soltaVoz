<nav class="navbar navbar-expand-lg menu">
	<div class="container">
	  <div class="navbar-nav">
	  	<a class="menuItem" href="/timeline">
	  		Home
	  	</a>

	  	<a class="menuItem" href="/sair">
	  		Sair
	  	</a>
			<img src="/img/soltavoz.png" class="menuIco" />
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
				<div class="col tweetBox">
					<form method="POST" action="/tweet">
						<textarea name="tweet" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
						
						<div class="col mt-2 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Tweet</button>
						</div>

					</form>
				</div>
			</div>

			<?php foreach($this->view->tweets as $id_tweet => $tweet) { ?>

				<div class="row tweet">
					<div class="col">
						<p><strong><?=$tweet['nome'];?></strong> <small><span class="text text-muted">- <?=$tweet['data'];?></span></small></p>
						<p><?=$tweet['tweet'];?></p>

						<br/>
						<?php if($tweet['id_usuario'] == $_SESSION['id']) { ?>
							
								<div class="col d-flex justify-content-end">
									<a href="/acao?acao=remover&id_tweet=<?=$tweet['id']?>" class="btn btn-danger"><small>Remover</small></a>
								</div>
								
						<?php } ?>	
					</div>
				</div>
			
			<?php } ?>

			<nav aria-label="Page navigation example">
				<ul class="pagination">
					<li class="page-item"><a class="page-link" href="?pagina=1">Primeira</a></li>
					
					<?php for($i = 1; $i <= $this->view->total_de_paginas; $i++){ ?>
						
						<li class="page-item <?=$this->view->pagina_ativa == $i ? 'active' : ''?>">
							<a class="page-link" href="?pagina=<?=$i?>"><?=$i?></a>
						</li>

					<?php } ?>

					<li class="page-item"><a class="page-link" href="?pagina=<?=$this->view->total_de_paginas?>">Última</a></li>
				</ul>
			</nav>

		</div>


		<div class="col-md-3">
			<div class="quemSeguir">
				<span class="quemSeguirTitulo">Quem seguir</span><br />
				<hr />
				<a href="/quem_seguir" class="quemSeguirTxt">Procurar por pessoas conhecidas</a>
			</div>
		</div>

	</div>
</div>