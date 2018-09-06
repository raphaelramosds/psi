<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-pencil">Editar paciente</h1>	
		<div class="ls-box ls-board-box ls-no-border">
			<form action="<?=base_url('PacientesController/update')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
				<fieldset>
					<label class="ls-label col-md-12">
						<b class="ls-label-text">Nome do paciente</b>
						<input type="text" name="nome" value ="<?=$pacientes->nome; ?>" required="required">
					</label>
					<label class="ls-label col-md-4">
					<b class="ls-label-text">Sexo</b>
					<div class="ls-custom-select">
						<select class="ls-custom" name="sexo" required="required">
							<option value="M">Masculino</option>
							<option value="F">Feminino</option>
						</select>
					</div>
					</label>
					<label class="ls-label col-md-4 col-xs-12">
						<b class="ls-label-text">Profissão</b>
						<input type="text" name="profissao" value="<?=$pacientes->profissao; ?>" required="required">
					</label>
					<input type="hidden" name="id_psicologo" value="<?=$pacientes->id_psicologo; ?>" required="required">
					<label class="ls-label col-md-4 col-xs-12">
						<b class="ls-label-text">Cartão de saúde</b>
						<p class="ls-labe-info">Número do cartão de saúde</p>
						<input type="number" name="cartaosaude"  value="<?=$pacientes->cartaosaude; ?>">
					</label>
					<label class="ls-label col-md-4 col-xs-12">
						<b class="ls-label-text">Número SUS</b>
						<p class="ls-labe-info">Número do cartão SUS</p>
						<input type="number" name="numerosus"  value="<?=$pacientes->numerosus ?>">
					</label>
					<label class="ls-label col-md-4 col-xs-12">
						<b class="ls-label-text">Email</b>
						<p class="ls-labe-info">Para melhor contato</p>
						<input type="email" name="email" required="required" value="<?=$pacientes->email ?>">
					</label>
					<label class="ls-label col-md-4 col-xs-12">
						<b class='ls-label-text'>Telefone</b>
						<input type="text" name="telefone" required="required" value="<?=$pacientes->telefone ?>" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
					</label>
					<div class="ls-actions-btn">
						<input type="hidden" name="id" value="<?=$pacientes->id ?>">
						<button type="submit" class="ls-btn">Salvar dados do paciente</button>
						<a href="<?=base_url('view-paciente')?>" class="ls-btn-danger">Voltar</a>
					</div>
				</fieldset>
			</form>
		</div>		
	</div>
</div>
