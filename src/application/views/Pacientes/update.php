<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3 ls-ico-pencil">Editar paciente</h2>
			</header>
			<form action="<?=base_url('PacientesController/update')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
				<fieldset>
					<label class="ls-label col-md-12">
						<b class="ls-label-text">Nome do paciente</b>
						<input type="text" name="nomepaciente" value ="<?=$pacientes->nomepaciente; ?>" required="required">
					</label>
					<label class="ls-label col-md-4">
					<b class="ls-label-text">Sexo</b>
					<div class="ls-custom-select">
						<select class="ls-custom" name="sexopaciente" required="required">
							<option value="<?=$pacientes->sexopaciente ?>">
								<?php if($pacientes->sexopaciente == 'F'):?> 
								<?="Feminino"?>
								<?php elseif($pacientes->sexopaciente == 'M'):?>
								<?="Masculino"?>
								<?php endif;?>
							</option>
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
						<input type="email" name="email" required="required" value="<?=$pacientes->emailpaciente ?>">
					</label>
					<label class="ls-label col-md-4 col-xs-12">
						<b class='ls-label-text'>Telefone</b>
						<input type="text" name="telefonepaciente" required="required" value="<?=$pacientes->telefonepaciente ?>" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
					</label>
				</fieldset>
					<input type="hidden" name="idpaciente" value="<?=$pacientes->idpaciente ?>">
					<button type="submit" class="ls-btn">Salvar dados do paciente</button>
				<a href="<?=base_url('view-paciente')?>" class="ls-btn-danger">Voltar</a>
			</form>
		</div>		
	</div>
</div>
