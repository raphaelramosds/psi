<div class="ls-main">
	<div class="ls-box ls-board-box">
		<header class="ls-info-header">
			<h2 class="ls-title-3">Registre um novo paciente</h2>
		</header>
		<form action="<?=base_url()?>pacientescontroller/add" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
			<fieldset>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Nome do paciente</b>
					<input type="text" name="nomepaciente" required="required">
				</label>
				<label class="ls-label col-md-4">
				  <b class="ls-label-text">Sexo</b>
				  <div class="ls-custom-select">
				    <select class="ls-custom" name="sexopaciente" required="required">
				      <option value="M">Masculino</option>
				      <option value="F">Feminino</option>
				    </select>
				  </div>
				</label>

				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Profissão</b>
					<input type="text" name="profissao" required="required">
				</label>

				<input type="hidden" name="psicologo_crp" required="required"
					value="<?php echo $crp?>">

				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Cartão de saúde</b>
					<p class="ls-labe-info">Número do cartão de saúde</p>
					<input type="number" name="cartaosaude" required="required">
				</label>

				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Número SUS</b>
					<p class="ls-labe-info">Número do cartão SUS</p>
					<input type="number" name="numerosus" required="required">
				</label>

				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Email</b>
					<p class="ls-labe-info">Para melhor contato</p>
					<input type="email" name="email" required="required">
				</label>

				<label class="ls-label col-md-4 col-xs-12">
					<b class='ls-label-text'>Telefone</b>
					<input type="text" name="telefonepaciente" required="required" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
				</label>

			</fieldset>
		   <button type="submit" class="ls-btn">Salvar dados do paciente</button>
			 <a href="<?=base_url()?>pacientescontroller" class="ls-btn-danger">Voltar</a>
		</form>
	</div>
</div>
