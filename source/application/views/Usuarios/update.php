<div class="ls-main">
	<div class="ls-box ls-board-box">
	<header class="ls-info-header">
		<h2 class="ls-title-3">Editar usuário</h2>
	</header>
	<form action="<?=base_url()?>usuarioscontroller/update" role="form" method="POST">
		<fieldset>
			<label for="" class="ls-label col-md-3">
				<b class="ls-label-text">Nome de usuário</b>
				<p class="ls-label-info">Digite o nome de usuário</p>
				<input type="text" name ="username" required="required" value="<?=$user->username;?>">
			</label>
			<label for="" class="ls-label col-md-3">
				<b class="ls-label-text">Senha</b>
				<p class="ls-label-info">Digite a sua senha</p>
				<input type="password" name ="senha" required="required" value="<?=$user->senha; ?>">
			</label>
		</fieldset>
		<div class="ls-actions-btn">
			<input type="hidden" name="idusuario" value="<?=$user->idusuario; ?>">
			<button class="ls-btn-primary">Salvar</button>
		</div>
	</form>
	</div>
</div>
