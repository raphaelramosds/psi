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
            <img src="<?=base_url('assets/images/logo2.png')?>" height="50px" widht="50px; ">
          </div>
          <div class="ls-login-box ls-md-margin-top"  style="background-color:white;color:white;border-radius:10px;">
              <style>.headerlogo{margin-bottom:20px;}.input-style{border-bottom:3px solid white;}</style>
              <form role="form" class="ls-form ls-login-form" action="UsuariosController/auth" method="POST">
                <fieldset>
                  <?php if(isset($success)):?>
                    <div class='ls-sm-space ls-txt-center ls-color-success' style='font-size:20px;'><?=$success?></div>
                  <?php elseif(isset($erro)):?>
                    <div class='ls-sm-space ls-txt-center' style='font-size:20px; color:red;'><?=$erro?></div>
                  <?php elseif(isset($success_update_password)):?>
                    <div class='ls-sm-space ls-txt-center ls-color-success' style='font-size:20px;'><?=$success_update_password?></div>
                  <?php elseif(isset($erro_update_password)):?>
                    <div class='ls-sm-space ls-txt-center ls-color-success' style='font-size:20px;'><?=$erro_update_password?></div>
                  <?php elseif(isset($user_noexists)):?>
                    <div class='ls-sm-space ls-txt-center ls-color-info' style='font-size:20px;'><?=$user_noexists?></div>
                  <?php endif;?>
                  <label class="ls-label">
                    <b class="ls-label-text ls-hidden-accessible">Usuário</b>
                    <input class="ls-login-bg-user ls-field-lg input-style"  name="username" type="text" placeholder="Usuário" required autofocus >
                  </label>
                  <label class="ls-label">
                    <b class="ls-label-text ls-hidden-accessible">Senha</b>
                    <div class="ls-prefix-group ls-field-lg">
                      <input id="password_field" class="ls-login-bg-password input-style" name="senha" type="password" placeholder="Senha" required >
                      <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#" ></a>
                    </div>
                  </label>
                  <input type="submit" value="Entrar" class="ls-btn ls-btn-block ls-btn-lg foco_input" style="background:#1DD1A4;color:white;">
                  <div style="line-height:25px;">
                    <a href="<?=base_url()?>escolher" class="link_direct">Cadastre-se</a><br>
                    <a href="<?=base_url()?>forgot-password" class="link_direct" >Esqueci minha senha</a>
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

