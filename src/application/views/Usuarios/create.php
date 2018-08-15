<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
	<head>
		<title>Psi</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link href="<?=base_url('assets/css/locastyle.css')?>" rel="stylesheet" type="text/css">
		<link rel="icon" sizes="192x192" href="<?=base_url('assets/images/ico-boilerplate.png')?>">
		<link rel="apple-touch-icon" href="<?=base_url('assets/images/ico-boilerplate.png')?>">
		<link rel="stylesheet" href="<?=base_url('assets/css/links_style.css')?>" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="ls-box ls-board-box col-md-5 col-md-offset-4" style="border:none;">
				<header class="ls-info-header" style="text-align:center;border:none">
					<h2 class="ls-title-3" >Cadastre-se</span></h2>
				</header>
				<form action="<?=base_url('UsuariosController/add')?>" role="form" method="POST">
					<fieldset>
						<label for="" class="ls-label">
							<b class="ls-label-text">Informações do usuário</b>
							<p class="ls-label-info">Digite o nome de usuário. Ex.: usuario123</p>
							<?php if (isset($erro_user)):?>
							<div class='ls-sm-space' style='font-size:20px; color:red;'><?=$erro_user?></div>
							<?php endif;?>
							<input type="text" name ="username" required="required">
						</label>

						<label for="" class="ls-label">
							<b class="ls-label-text">Senha</b>
							<p class="ls-label-info">Para sua segurança use letras e números</p>
							<div class="ls-prefix-group">
								<input id="password_field" class="ls-login-bg-password" name="senha" type="password" placeholder="Senha" required >
								<a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
							</div>
						</label>

						<label for="" class="ls-label">
							<?php if (isset($erro_senha)): ?>
								<div class='ls-sm-space ' style='font-size:20px; color:red;'><?=$erro_senha?></div>
							<?php endif ?>
							<b class="ls-label-text ls-hidden-accessible">Confirmação</b>
							<div class="ls-prefix-group">
								<input id="password_confirm" class="ls-login-bg-password" name="confirm_senha" type="password" placeholder="Confirme sua senha" required >
								<a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_confirm" href="#"></a>
							</div>
						</label>

						<label class="ls-label">
							<?php if(isset($erro_email)): ?>
								<div class='ls-sm-space' style='font-size:20px; color:red;'><?=$erro_email?></div>
							<?php endif ?>
							<input type="email" name="email" required="required" placeholder="Email">
						</label>

						<hr>
						<label class="ls-label">
							<b class="ls-label-text">Informações do psicólogo</b>
							<p class="ls-label-info">Algumas informações não são obrigadas</p>
							<input type="text" name="nome" required="required" placeholder="Seu nome completo">
						</label>

						<label class="ls-label">
							<p class="ls-label-info">Data nascimento</p>
							<input type="date" name="datanasc" placeholder="Digite nesse formato: ano/mês/dia">
						</label>

						<label class="ls-label">
							<p class="ls-label-info">Sexo</p>
							<div class="ls-custom-select">
								<select class="ls-custom" name="sexo">
									<option value="M">Masculino</option>
									<option value="F">Feminino</option>
								</select>
							</div>
						</label>

						<label class="ls-label">
							<?php if (isset($erro_crp)): ?>
								<div class='ls-sm-space' style='font-size:20px; color:red;'><?=$erro_crp?></div>
							<?php endif ?>
							<p class="ls-label-info">CRP</p>
							<input type="text" name="crp" required="required">
						</label>
						<input type="hidden" name="role" value="1" >
					</fieldset>
					<div class="ls-actions-btn" style="text-align:center;border:none;line-height:50px;">
						<button class="ls-btn"  style="background-color:#1DD1A4;color:white;padding:1em;width:250px;">Terminar</button>
						<br>
						<a href="<?=base_url()?>login" class="link_direct" >Voltar</a>
					</div>
				</form>
			</div>
		</div>	
		
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
		<script src="<?=base_url('assets/js/locastyle.js')?>" type="text/javascript"></script>
	</body>
</html>