<div class="ls-main">
	<div class="container-fluid">
		<div class="ls-box ls-board-box ls-no-border">
			<header class="ls-info-header ls-no-border">
				<h2 class="ls-title-3 ls-ico-stats">Registre um uma nova sessão</h2>
			</header>
			<form action="<?=base_url()?>SessoesController/add" method="POST" class="ls-form ls-form-horizontal row">
				<fieldset>
				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Título da sessão</b>
					<p class="ls-label-information">Seja claro e direto</p>
					<input type="text" required name="titulo" class="ls-field">
				</label>
				<label class="ls-label col-md-4 col-xs-12">
					<b class="ls-label-text">Data da sessao</b>
					<p class="ls-label-information">Quando ocorreu?</p>
					<input type="date" required name="data" class="ls-field">
				</label>
				<input type="hidden" required name="numero_prontuario" class="ls-field" value="<?=$prontuario ?>">
				<label class="ls-label col-md-12">
					<b class="ls-label-text">Descrição da sessão</b>
					<textarea rows="4" name="descricao"></textarea>
				</label>
				</fieldset>
				
				<div class="ls-actions-btn">
					<button type="submit" class="ls-btn">Salvar dados da sessão</button>
					<a href="<?=base_url()?>view-sessao" class="ls-btn-danger">Voltar</a>	
				</div>
			</form>
		</div>	
	</div>
	<div class="cronometro_box">
		<form name="form">	
			<span class = "in_box ls-ico-history " id="hora">00:</span><span class = "in_box" id="minuto">00:</span><span class = "in_box" id="segundo">00</span>
			<br>
			<button id = "comeca" onClick = "tempo(1)" class="btn_box" type="button"> INICIAR </button>
			<button id = "parar"  onClick="stop_time()" class="btn_box" type="button" style="display:none"> PARAR </button>
		</form>
	</div>
</div>

<script type="text/javascript" src="<?=base_url('assets/js/cronometro.js')?>"></script>