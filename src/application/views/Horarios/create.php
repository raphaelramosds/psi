<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3">Registre novos horários</h2>
			</header>

			<form action="<?=base_url('HorariosController/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
				<fieldset>
					<label class="ls-label col-md-12">
						<p class="ls-label-info">Paciente</p>
						<div class="ls-custom-select">
							<select name="paciente_id" class="ls-select" required="required">
								<?php foreach ($paciente as $c): ?>
									<option value="<?=$c->id?>"><?=$c->nome?></option>
								<?php endforeach ?>
							</select>
						</div>

					</label>
					
		
					<div class="ls-actions-btn">
						<input type="hidden" value="<?=$agenda?>" name="agenda_id">
						<button type="submit" class="ls-btn">Salvar dados</button>
					</div>			
				</fieldset>
			</form>

		</div>
	</div>
</div>