<div class="ls-main">
	<div class="container-fluid">
		<h1 class="ls-title-intro ls-ico-calendar">Registre uma nova agenda</h1>
		<div class="ls-box ls-board-box ls-no-border">
			<form action="<?=base_url('HorariosController/create')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
				<fieldset>
					
					<label class="ls-label col-md-6 col-xs-12">
						<p class="label-info">Mês</p>
						<div class="ls-custom-select">
							<select name="mes" class='ls-select' required='required'>
								<option value=""></option>
								<option value="1">Janeiro</option>
								<option value="2">Fevereiro</option>
								<option value="3">Março</option>
								<option value="4">Abril</option>
								<option value="5">Maio</option>
								<option value="6">Junho</option>
								<option value="7">Julho</option>
								<option value="8">Agosto</option>
								<option value="9">Setembro</option>
								<option value="10">Outubro</option>
								<option value="11">Novembro</option>
								<option value="12">Dezembro</option>
							</select>
						</div>
					</label>


					<label class="ls-label col-md-6 col-xs-12">
						<p class="ls-label-info">Ano</p>
						<div class="ls-custom-select">
							<select name="ano" class="ls-select" required='required'>
								<option value=""></option>
								<?php for ($i=2018; $i < 2040; $i++): ?>
								<option value="<?=$i?>"><?=$i?></option>
								<?php endfor; ?>
							</select>
						</div>
					</label>

					<label class="ls-label col-md-12">
						<p class="ls-label-info">Clínica</p>
						<div class="ls-custom-select">
							<select name="clinica_id" class="ls-select" required="required">
								<?php foreach ($clinicas as $c): ?>
									<option value="<?=$c->id?>"><?=$c->nome?></option>
								<?php endforeach ?>
							</select>
						</div>

					</label>


					<div class="ls-actions-btn">
						<input type="hidden" name="psicologo_id" value="<?=$psicologo?>">
						<input type="hidden" name="id">
						<button type="submit" class="ls-btn">Salvar dados e registrar horários</button>
					</div>
			
				</fieldset>
			</form>

		</div>
	</div>
</div>

