<div class="ls-main">
	<div class="container-fluid">
<div class="ls-box ls-board-box ls-no-border">
		<h1 class="ls-title-intro ls-ico-pencil">Editar clínica</h1>
		<form action="<?=base_url()?>ClinicasController/update" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
			<fieldset>

				<label class="ls-label col-md-12">
					<b class="ls-label-text">Nome da clínica</b>
					<input type="text" name="nome" value="<?=$clinicas->nome;?>" required="required">
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
					<input type="text" name="cidade" value="<?=$clinicas->cidade; ?>">
				</label>

				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Telefone</b>
					<p class="ls-labe-info">Para um contato...</p>
					<input type="text" name="telefone" value="<?=$clinicas->telefone;?>" class="ls-mask-phone8_with_ddd" placeholder="(99) 9999-9999">
				</label>
				
				<div class="ls-actions-btn">
					<input type="hidden" name="id_psicologo" required="required" value="<?=$clinicas->id_psicologo;?>">
					<input type="hidden" name="id" value="<?=$clinicas->id;?>">
					<button type="submit" class="ls-btn">Salvar dados da clínica</button>
					<a href="<?=base_url()?>ClinicasController" class="ls-btn-danger">Voltar</a>
				</div>
				
			</fieldset>
		</form>
	</div>
	</div>
</div>
