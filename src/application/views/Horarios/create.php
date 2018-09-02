<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3">Registre novos horários</h2>
			</header>

			<form action="<?=base_url('HorariosController/add')?>" method="POST" class="ls-form ls-form-horizontal row" data-ls-module="form">
				<fieldset class="fields">

					<label class="ls-label col-md-12">
						<b class="ls-label-text">Meu horário</b>
					</label>

					<label class="ls-label col-md-3 col-xs-12">
						<p class="ls-label-info">Estou disponível das</p>
						<input type="time" name="hinicial">
					</label>

					<label class="ls-label col-md-3 col-xs-12">
						<p class="ls-label-info">Até as</p>
						<input type="time" name="final">
					</label>

					<label class="ls-label col-md-3 col-xs-12">
						<p class="ls-label-info">Selecione quais dias para essse horário:</p>

						<label class="ls-label-text">
							<input type="checkbox" name="dias[]" value="2" class="ls-field">Seg
						</label>

						<label class="ls-label-text">
							<input type="checkbox" name="dias[]" value="3" class="ls-field">Ter
						</label>

						<label class="ls-label-text">
							<input type="checkbox" name="dias[]" value="4" class="ls-field">Qua
						</label>

						<label class="ls-label-text">
							<input type="checkbox" name="dias[]" value="5" class="ls-field">Qui
						</label>

						<label class="ls-label-text">
							<input type="checkbox" name="dias[]" value="6" class="ls-field">Sex
						</label>
	
						<label class="ls-label-text">
							<input type="checkbox" name="dias[]" value="7" class="ls-field">Sáb
						</label>

						<label class="ls-label-text">
							<input type="checkbox" name="dias[]" value="1" class="ls-field">Dom
						</label>
					</label>

					<label class="ls-label col-md-3 col-xs-12">
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
						<span id="more" class="ls-btn ls-ico-plus" style="cursor:pointer;">Adcionar mais um horário</span>
						<button type="submit" class="ls-btn">Salvar</button>
					</div>			
				</fieldset>
			</form>

		</div>
	</div>
</div>


<script>
	$('#more').click(function(){
		$("
		<label class='ls-label col-md-12'>
		   <b class='ls-label-text'>Meu horário</b>
		</label>

		<label class='ls-label col-md-3 col-xs-12'>
			<p class='ls-label-info'>Estou disponível das</p>
			<input type='time' name='hinicial'>
		</label>

		<label class='ls-label col-md-3 col-xs-12'>
			<p class='ls-label-info'>Até as</p>
			<input type='time' name='hfinal'>
		</label>

		<label class='ls-label col-md-3 col-xs-12'>
			<p class='ls-label-info'>Selecione quais dias para essse horário:</p>

			<label class='ls-label-text'>
				<input type='checkbox' name='dias[]' value='2' class='ls-field'>Seg
			</label>

			<label class='ls-label-text'>
				<input type='checkbox' name='dias[]' value='3' class='ls-field'>Ter
			</label>

			<label class='ls-label-text'>
				<input type='checkbox' name='dias[]' value='4' class='ls-field'>Qua
			</label>

			<label class='ls-label-text'>
				<input type='checkbox' name='dias[]' value='5' class='ls-field'>Qui
			</label>

			<label class='ls-label-text'>
				<input type='checkbox' name='dias[]' value='6' class='ls-field'>Sex
			</label>

			<label class='ls-label-text'>
				<input type='checkbox' name='dias[]' value='7' class='ls-field'>Sáb
			</label>

			<label class='ls-label-text'>
				<input type='checkbox' name='dias[]' value='1' class='ls-field'>Dom
			</label>
		</label>

		<label class='ls-label col-md-3 col-xs-12'>
			<p class='ls-label-info'>Paciente</p>
			<div class='ls-custom-select'>
				<select name='paciente_id' class='ls-select' required='required'>
					<?php foreach ($paciente as $c): ?>
						<option value='<?=$c->id?>'><?=$c->nome?></option>
					<?php endforeach ?>
				</select>
			</div>
		</label>").appendTo('.fields')

	});

</script>