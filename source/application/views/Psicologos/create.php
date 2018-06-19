<head>
	<title>Psi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="<?=base_url()?>assets/css/locastyle.css" rel="stylesheet" type="text/css">
	<link rel="icon" sizes="192x192" href="<?=base_url()?>assets/images/ico-boilerplate.png">
	<link rel="apple-touch-icon" href="<?=base_url()?>assets/images/ico-boilerplate.png">
	<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
	<script src="<?=base_url()?>assets/js/locastyle.js" type="text/javascript"></script>
</head>
<!--Tela de cadastro psicólogo-->
<div class="container" style="margin-top:200px;">
	<div class="ls-box ls-board-box" style="border:none;">
		<header class="ls-info-header" style="border:none;">
			<h2 class="ls-title-3">Quase pronto, <span style="background:#1DD1A4;padding:10px;color:white;" >Psicólogo!</span></h2>
		</header>
		<form action="<?=base_url()?>PsicologosController/add" method="POST" class="ls-form ls-form-horizontal row">
			<fieldset>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Nome do psicologo</b>
					<input type="text" name="nomepsicologo" required="required">
				</label>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Data nascimento</b>
					<input type="date" name="datanasc" placeholder="Digite nesse formato: ano/mês/dia">
				</label>
				<label class="ls-label col-md-6">
				  <b class="ls-label-text">Sexo</b>
				  <div class="ls-custom-select">
				    <select class="ls-custom" name="sexopsicologo">
				      <option value="M">Masculino</option>
				      <option value="F">Feminino</option>
				    </select>
				  </div>
				</label>
				<label class="ls-label col-md-6 col-xs-12">
					<b class="ls-label-text">Email</b>
					<input type="text" name="emailpsicologo" required="required">
				</label>
				<label class="ls-label col-md-6 col-xs-12">
					<b class="ls-label-text">CRP</b>
					<p class="ls-labe-info">Só você tem um...</p>
					<input type="text" name="crp" required="required">
				</label>

					<input type="hidden" value="<?php echo $username[0]->idusuario ?>" name="idusuario" required="required">

			</fieldset>
			<div class="ls-actions-btn">
			   <button class="ls-btn"  style="background-color:#1DD1A4;color:white;padding:1em;width:200px;">Terminar!</button>
			 </div>
		</form>
	</div>
</div>
