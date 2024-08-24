<div class="container">
  <div class="d-flex justify-content-center mt-5">
    <div class="card" style="width: 36rem;">
      <div class="card-body">

        <div class="d-flex justify-content-center">
          <img src="img/soltavoz.png" />
        </div>

        <div class="row">
          <div class="col">
            <h2>Crie sua conta</h2>
          </div>
        </div>

        <div class="row">
          <div class="col">
            
            <form action="/solta_voz/registrar" method="post">
              <div class="form-group">
                <input value="<?= $this->view->usuario['nome'] ?>" required name="nome" type="text" class="form-control" placeholder="Nome">
              </div>
              
              <div class="form-group">
                <input value="<?= $this->view->usuario['email'] ?>" required name="email" type="email" class="form-control" placeholder="E-mail">
              </div>

              <div class="form-group">
                <input value="<?= $this->view->usuario['senha'] ?>" required name="senha" type="password" class="form-control" placeholder="Senha">
              </div>
              
              <div class="mt-4 mb-4">
                <small class="form-text">
                  Ao inscrever-se, você concorda com os Termos de Serviço e com as Políticas de Privacidade, incluindo o Uso de Cookies. Outras pessoas poderão encontrar você pelo e-mail ou número de telefone fornecido · Opções de Privacidade
                </small>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Inscrever-se</button>

              <?php if($this->view->erroCadastro) { ?>

                <small class="form-text text-danger">*Erro ao tentar realizar o cadastro, verifique se os campos foram preenchidos corretamente.
                </small>

              <?php } ?>

            </form>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>



    
  