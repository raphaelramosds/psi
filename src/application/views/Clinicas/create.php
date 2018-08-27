<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3">Registre uma nova clínica</h2>
			</header>
			<form action="<?=base_url('ClinicasController/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
				<fieldset>
					<label class="ls-label col-md-12">
						<b class="ls-label-text">Nome da clínica</b>
						<input type="text" name="nome" required="required">
					</label>
					<label class="ls-label col-md-4 col-xs-12">
						<b class="ls-label-text">Estado</b>
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
						<input type="text" name="cidade">	
					</label>
					<label class="ls-label col-md-4 col-xs-12">
						<b class="ls-label-text">Telefone</b>
						<p class="ls-labe-info">Para um contato...</p>
						<input type="text" name="telefone" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
					</label>
					
					<div class="ls-actions-btn">
						<input type="hidden" name="id_psicologo" required="required" value="<?php echo $psicologo; ?>">
						<button type="submit" class="ls-btn">Salvar dados da clínica</button>
						<a href="<?=base_url('view-clinica')?>" class="ls-btn-danger">Voltar</a>						
					</div>

				</fieldset>
			</form>
		</div>
	</div>
</div>
