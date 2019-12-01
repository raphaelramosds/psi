<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
  <head>
    <title>Tela de Login </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link href="<?=base_url('assets/css/locastyle.css')?>" rel="stylesheet" type="text/css">
		<link rel="icon" sizes="10x5" href="<?=base_url('assets/images/logo.png')?>">
		<link rel="apple-touch-icon" href="<?=base_url('assets/images/ico-boilerplate.png')?>">
		<link rel="stylesheet" href="<?=base_url('assets/css/links_style.css')?>" type="text/css">
  </head>
  <body>
    <div class="ls-login-parent" style="background:#1DD1A4">
      <div class="ls-login-inner">
        <div class="ls-login-container">
          <div class="headerlogo">
          <img src="<?=base_url('assets/images/Negativa.png')?>" style="height:7vh" class="img-responsive" alt="Logotipo do sistema">
          </div>
          <div class="ls-login-box ls-md-margin-top"  style="background-color:white;color:white;">
              <style>.headerlogo{margin-bottom:20px;}.input-style{border-bottom:3px solid white;}</style>
              <form role="form" class="ls-form ls-login-form" action="<?=base_url('Usuarios/redirecionarcadastro')?>" method="POST">
                <fieldset>
                  <label class="ls-label">
                    <b class="ls-label-text">Cadastar-se como:</b>
                    <div class="ls-custom-select">
                            <select name="escolha" class="ls-select" required>
                                <option value="">Escolha a sua opção</option>
                                <option value="secretaria">Secretária</option>
                                <option value="psicologo">Psicólogo</option>
                            </select>
                        </div>
                  </label>
                  <div class="ls-action-btn">
                    <input type="submit" value="Prosseguir" class="ls-btn">
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
    </div>


    <script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/js/locastyle.js')?>" type="text/javascript"></script>
   
  </body>
</html>