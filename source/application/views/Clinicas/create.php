<div class="ls-main">
	<div class="container-fluid">
<div class="ls-box ls-board-box">
		<header class="ls-info-header">
			<h2 class="ls-title-3">Registre uma nova clínica</h2>
		</header>
		<form action="<?=base_url()?>ClinicasController/add" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
			<fieldset>
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Nome da clínica</b>
					<input type="text" name="nomeclinica" required="required">
				</label>
				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Estado</b>
					<!-- <input type="text" name="estado" required="required"> -->
					<div class="ls-custom-select">
						<?php
							$options = array(
								'empty' => '',
								'AL' => 'Alagoas',
								'AP' => 'Amapá',
								'AM' => 'Amazonas',
								'BA' => 'Bahia',
								'CE' => 'Ceará',
								'DF' => 'Distrito Federal',
								'ES' => 'Espírito Santo',
								'GO' => 'Goiás',
								'MA' => 'Maranhão',
								'MT' => 'Mato Grosso',
								'MS' => 'Mato Grosso do Sul',
								'MG' => 'Minas Gerais',
								'PA' => 'Pará',
								'PB' => 'Paraíba',
								'PR' => 'Paraná',
								'PE' => 'Pernambuco',
								'PI' => 'Piauí',
								'RJ' => 'Rio de Janeiro',
								'RN' => 'Rio Grande do Norte',
								'RS' => 'Rio Grande do Sul',
								'RO' => 'Rondônia',
								'RR' => 'Roraima',
								'SC' => 'Santa Catarina',
								'SP' => 'São Paulo',
								'SE' => 'Sergipe',
								'TO' => 'Tocantins'
							);
							echo form_dropdown('estado', $options, array('class'=>'ls-select'));
						 ?>
					</div>
				</label>
				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Cidade</b>
					<input type="text" name="cidade" required="required">
				</label>
				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Telefone</b>
					<p class="ls-labe-info">Para um contato...</p>
					<input type="text" name="telefone" required="required" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
				</label>
				<input type="hidden" name="id_psicologo" required="required" value="<?php echo $crp; ?>">
			</fieldset>
			<button type="submit" class="ls-btn">Salvar dados da clínica</button>
			<a href="<?=base_url()?>ClinicasController" class="ls-btn-danger">Voltar</a>
		</form>
	</div>
	</div>
</div>
