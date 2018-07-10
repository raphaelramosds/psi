<head>
	<title>Psi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="<?=base_url()?>assets/css/locastyle.css" rel="stylesheet" type="text/css">
	<link rel="icon" sizes="192x192" href="<?=base_url()?>assets/images/ico-boilerplate.png">
	<link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico-boilerplate.png">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
	<script src="<?=base_url()?>assets/js/locastyle.js" type="text/javascript"></script>
</head>
<div class="container" style="margin-top: 200px;max-width:900px;">
	<div class="ls-box ls-board-box" style="border:none;">
		<header class="ls-info-header" style="text-align:center;border:none">
			<h2 class="ls-title-3" >Cadastre seu <span style="background:#1dd1a4;color:white;padding:5px;font-weight:normal;display:inline-block;">usuário</span></h2>
		</header>
		<form action="<?=base_url()?>UsuariosController/add" role="form" method="POST">
			<fieldset>
				<style>label{margin: 0 auto;}</style>
				<label for="" class="ls-label col-md-4" >
					<b class="ls-label-text">Nome de usuário</b>
					<p class="ls-label-info">Digite o nome de usuário. Ex.: usuario123</p>
					<input type="text" name ="username" required="required">
				</label>
				<label for="" class="ls-label col-md-4">
	               <b class="ls-label-text ls-hidden-accessible">Senha</b>
	                <div class="ls-prefix-group ls-field-lg">
	                  <input id="password_field" class="ls-login-bg-password" name="senha" type="password" placeholder="Senha" required >
	                  <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
	                </div>
				</label>
				<label for="" class="ls-label col-md-4">
				<?php if (isset($erro_senha)): ?>
					<?=$erro_senha?>
				<?php endif ?>
               <b class="ls-label-text ls-hidden-accessible">Confirmação</b>
                <div class="ls-prefix-group ls-field-lg">
                  <input id="password_confirm" class="ls-login-bg-password" name="confirm_senha" type="password" placeholder="Confirme sua senha" required >
                  <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_confirm" href="#"></a>
                </div>
				</label>
				
			</fieldset>
			<div class="ls-actions-btn" style="text-align:center;border:none">
				<button class="ls-btn"  style="background-color:#1DD1A4;color:white;padding:1em;width:250px;">Avançar</button>
				<p class="ls-login-signup"><a href="<?=base_url()?>LoginController">Voltar</a></p>
			</div>
		</form>
	</div>
</div>
