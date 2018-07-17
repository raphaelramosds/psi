<head>
	<title>Psi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="<?=base_url()?>assets/css/locastyle.css" rel="stylesheet" type="text/css">
	<link rel="icon" sizes="192x192" href="<?=base_url()?>assets/images/ico-boilerplate.png">
	<link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico-boilerplate.png">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/links_style.css" type="text/css">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
	<script src="<?=base_url()?>assets/js/locastyle.js" type="text/javascript"></script>
</head>
<div class="container" style="margin-top: 200px;max-width:900px;">
	<div class="ls-box ls-board-box" style="border:none;">
		<header class="ls-info-header" style="text-align:center;border:none">
			<h2 class="ls-title-3" >Nova <span style="background:#1DD1A4;padding:10px;color:white;display:inline-block;">senha</span></h2>
		</header>
		<form action="<?=base_url()?>UsuariosController/update_method_password" role="form" method="POST">
			<fieldset>
				<style>label{margin: 0 auto;}</style>
                <label for="" class="ls-label col-md-4">
	               <b class="ls-label-text ls-hidden-accessible">Senha</b>
	                <div class="ls-prefix-group ls-field-lg">
	                  <input id="password_field" class="ls-login-bg-password" name="senha" type="password" placeholder="Senha" required >
	                  <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
	                </div>
				</label>
				<label for="" class="ls-label col-md-4">
				<?php if (isset($erro_senha)): ?>
				<div class='ls-sm-space ls-txt-center' style='font-size:20px; color:red;'><?=$erro_senha?></div>
				<?php endif ?>
               <b class="ls-label-text ls-hidden-accessible">Confirmação</b>
                <div class="ls-prefix-group ls-field-lg">
                  <input id="password_confirm" class="ls-login-bg-password" name="confirm_senha" type="password" placeholder="Confirme sua senha" required >
                  <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_confirm" href="#"></a>
                </div>
                </label>    
			</fieldset>
			<div class="ls-actions-btn" style="text-align:center;border:none;line-height:50px;">
				<button class="ls-btn"  style="background-color:#1DD1A4;color:white;padding:1em;width:250px;">Criar nova senha</button><br>
			</div>
		</form>
	</div>
</div>
