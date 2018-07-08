<head>
  <title>Tela de Login </title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href="<?=base_url()?>assets/css/locastyle.css" rel="stylesheet" type="text/css">
  <link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico-boilerplate.png">
  <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
  <script src="<?=base_url()?>assets/js/locastyle.js" type="text/javascript"></script>
</head>
<div class="ls-login-parent">
  <div class="ls-login-inner">
    <div class="ls-login-container">
      <h1 class="ls-login-logo">Prontuário eletrônico à <span style="background:#1dd1a4;color:white;padding:5px;">Psicologia</span></h1>
      <small><i>"Tenha seus prontuários a qualquer hora e em qualquer lugar"</i></small>
      <hr>
      <div class="ls-login-box">
          <form role="form" class="ls-form ls-login-form" action="LoginController/auth" method="POST">
            <fieldset>
              <?php
                if (isset($success)) {
                  echo "<div class='ls-sm-space ls-txt-center ls-color-success' style='font-size:20px;'><strong>Sucesso!</strong> agora entre no sistema </div>";
                }
                if (isset($erro)) {
                  echo $erro;
                }
                if ($this->session->userdata('erro_sessao') ) {
                  echo $this->session->userdata('erro_sessao');
                }
               ?>
              <label class="ls-label">
                <b class="ls-label-text ls-hidden-accessible">Usuário</b>
                <input class="ls-login-bg-user ls-field-lg"  name="username" type="text" placeholder="Usuário" required autofocus >
              </label>

              <label class="ls-label">
                <b class="ls-label-text ls-hidden-accessible">Senha</b>
                <div class="ls-prefix-group ls-field-lg">
                  <input id="password_field" class="ls-login-bg-password" name="senha" type="password" placeholder="Senha" required >
                  <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
                </div>
              </label>

              <input type="submit" value="Entrar" class="ls-btn ls-btn-block ls-btn-lg" style="background-color:#1DD1A4;color:white;">
              <p class="ls-txt-center ls-login-signup">Não possui um usuário no Psi? <br> <a href="<?=base_url()?>UsuariosController/create">Cadastre-se agora</a></p>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
</div>
