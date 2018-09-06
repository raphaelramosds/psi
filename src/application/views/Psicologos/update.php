<!--Tela de edição de dados do psicólogo-->
<div class="ls-main">
<div class="container-fluid">
	<h1 class="ls-title-intro ls-ico-pencil">Editar suas informações</h1>
		<div class="ls-box ls-board-box" style="border:none;">
		<form action="<?=base_url()?>PsicologosController/update" method="POST" class="ls-form ls-form-horizontal row">
			<fieldset>

				<label class="ls-label col-md-12">
					<b class="ls-label-text">Nome do psicologo</b>
					<input type="text" name="nome" required="required" value="<?=$psicologos->nome ?>">
				</label>

				<label class="ls-label col-md-12">
					<b class="ls-label-text">Data nascimento</b>
					<input type="date" name="datanascimento"  placeholder="Digite nesse formato: ano/mês/dia" value="<?=$psicologos->datanascimento ?>">
				</label>

				<label class="ls-label col-md-6">
				  <b class="ls-label-text">Sexo</b>
				  <div class="ls-custom-select">
				    <select class="ls-custom" name="sexo"  value="<?=$psicologos->sexo ?>">
				      <option value="M">Masculino</option>
				      <option value="F">Feminino</option>
				    </select>
				  </div>
				</label>

				<label class="ls-label col-md-6 col-xs-12">
					<b class="ls-label-text">CRP</b>
					<p class="ls-labe-info">Só você tem um...</p>
					<input type="text" name="crp" required="required" value="<?=$psicologos->crp ?>">
				</label>
				
				<div class="ls-actions-btn">
					<input type="hidden" name="usuario_idusuario" required="required" value="<?=$psicologos->usuario_idusuario ?>">
					<input name="id" type="hidden" value="<?=$psicologos->id?>">
			   		<button class="ls-btn">Salvar dados do psicólogo</button>
			 	</div>
			</fieldset>
		</form>
	</div>
</div>
</div>
