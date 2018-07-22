<!--Tela de edição de dados do psicólogo-->
<div class="ls-main">
<div class="container-fluid">
		<div class="ls-box ls-board-box" style="border:none;">
		<header class="ls-info-header" style="border:none;">
			<h2 class="ls-title-3">Editar suas informações</h2>
		</header>
		<form action="<?=base_url()?>PsicologosController/update" method="POST" class="ls-form ls-form-horizontal row">
			<fieldset>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Nome do psicologo</b>
					<input type="text" name="nomepsicologo" required="required" value="<?=$psicologos->nomepsicologo ?>">
				</label>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Data nascimento</b>
					<input type="date" name="datanasc" required="required" placeholder="Digite nesse formato: ano/mês/dia" value="<?=$psicologos->datanascimento ?>">
				</label>
				<label class="ls-label col-md-6">
				  <b class="ls-label-text">Sexo</b>
				  <div class="ls-custom-select">
				    <select class="ls-custom" name="sexopsicologo" required="required" value="<?=$psicologos->sexopsicologo ?>">
				      <option value="M">Masculino</option>
				      <option value="F">Feminino</option>
				    </select>
				  </div>
				</label>
				<label class="ls-label col-md-6 col-xs-12">
					<b class="ls-label-text">Email</b>
					<input type="text" name="emailpsicologo" required="required" value="<?=$psicologos->emailpsicologo ?>">
				</label>
				<label class="ls-label col-md-6 col-xs-12">
					<b class="ls-label-text">CRP</b>
					<p class="ls-labe-info">Só você tem um...</p>
					<input type="text" name="crp" required="required" value="<?=$psicologos->crp ?>">
				</label>



					<input type="hidden" name="idusuario" required="required" value="<?=$psicologos->usuario_idusuario ?>">

			</fieldset>
			<div class="ls-actions-btn">
				<input name="idpsicologo" type="hidden" value="<?=$psicologos->idpsicologo ?>">
			   <button class="ls-btn">Salvar dados do psicólogo</button>
			 </div>
		</form>
	</div>
</div>
</div>
