<!DOCTYPE html>
<html>
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
	<body>
		<div class="ls-box ls-board-box" style="border:none;margin-top:25vh;">
			<header class="ls-info-header" style="text-align:center;border:none">
				<h2 class="ls-title-3" >Recupere sua <span style="background:#1DD1A4;padding:10px;color:white;display:inline-block;">senha</span></h2>
			</header>
			<div>
				<form action="<?=base_url()?>LoginController/recoveryPass" role="form" method="POST">
					<fieldset style="text-align:center">
						<label for="" class="ls-label col-md-4" style="margin: 0 auto;">
							<b class="ls-label-text">Email</b>
							<p class="ls-label-info">Informe corretamente o seu email</b>
							<input class=" input-style" style="margin-top:20px;" name="email" type="text" placeholder="exemplo@dominio.com" required autofocus >
						</label>
						<?php if(isset($invalid_email)):?>
							<div class='ls-sm-space ls-color-danger' style='font-size:20px;'><?=$invalid_email?></div>
						<?php elseif(isset($success_send_email)):?>
							<div class='ls-sm-space ls-color-success' style='font-size:20px;'><?=$success_send_email?></div>
						<?php elseif(isset($erro_send_email)):?>
							<div class='ls-sm-space ls-color-danger' style='font-size:20px;'><?=$erro_send_email?></div>
						<?php endif;?>
					</fieldset>
					<div class="ls-actions-btn" style="text-align:center;border:none;line-height:50px;">
						<button class="ls-btn"  style="background-color:#1DD1A4;color:white;">Submeter</button><br>
						<a href="<?=base_url()?>login" class="link_direct">Voltar</a>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>