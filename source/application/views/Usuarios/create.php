<head>
	<title>Psi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="<?=base_url()?>assets/css/locastyle.css" rel="stylesheet" type="text/css">
	<link rel="icon" sizes="192x192" href="<?=base_url()?>assets/images/ico-boilerplate.png">
	<link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico-boilerplate.png">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
	<script src="<?=base_url()?>assets/js/locastyle.js" type="text/javascript"></script>
</head>
<div class="container" style="margin-top: 200px;">
	<div class="ls-box ls-board-box">
		<header class="ls-info-header">
			<h2 class="ls-title-3">Novo usuário</h2>
		</header>
		<form action="<?=base_url()?>usuarioscontroller/add" role="form" method="POST">
			<fieldset>
				<label for="" class="ls-label col-md-3">
					<b class="ls-label-text">Nome de usuário</b>
					<p class="ls-label-info">Digite o nome de usuário</p>
					<input type="text" name ="username" required="required">
				</label>
				<label for="" class="ls-label col-md-3">
					<b class="ls-label-text">Senha</b>
					<p class="ls-label-info">Digite a sua senha</p>
					<input type="password" name ="senha" required="required">
				</label>
			</fieldset>
			<div class="ls-actions-btn">
				<button class="ls-btn">Avançar</button>
			</div>
		</form>
	</div>
</div>
