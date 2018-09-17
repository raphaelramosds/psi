<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<html>
	<head>
		<title>Psi</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link href="<?=base_url()?>assets/css/locastyle.css" rel="stylesheet" type="text/css">
		<link rel="icon" sizes="10x5" href="<?=base_url('assets/images/logo.png')?>">
		<link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico-boilerplate.png">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/links_style.css" type="text/css">
	</head>
	<body>
		<div class="container" style="margin-top: 200px;max-width:900px;">
			<div class="ls-box ls-board-box" style="border:none;">
				<header class="ls-info-header" style="text-align:center;border:none">
					<h2 class="ls-title-3" >Código de ativação</h2><br>
					<hr>
					<small>Espere alguns minutos até chegar ao seu email...</small>
				</header>
				<form action="<?=base_url()?>UsuariosController/confirm_code" role="form" method="POST">
					<fieldset>
						<style>label{margin: 0 auto;}</style>
						<?php if(isset($erro_code)):?>
						<div class='ls-sm-space ls-txt-center' style='font-size:20px; color:red;'><?=$erro_code?></div>
						<?php endif;?>
						<label for="" class="ls-label col-md-4">
						<b class="ls-label-text ls-hidden-accessible">Código de ativação:</b>
							<input class="input-style"  name="code" type="text" placeholder="Digite aqui seu código de ativação" required >
						</label>  
					</fieldset>
					<div class="ls-actions-btn" style="text-align:center;border:none;line-height:50px;">
						<button class="ls-btn"  style="background-color:#1DD1A4;color:white;padding:1em;width:250px;">Criar nova senha</button><br>
					</div>
				</form>
			</div>
		</div>

		<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
		<script src="<?=base_url()?>assets/js/locastyle.js" type="text/javascript"></script>
	</body>
</html>

